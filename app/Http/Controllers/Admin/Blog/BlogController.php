<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\blog\addBlogRequest;
use App\Http\Requests\Admin\blog\editblogRequest;
use App\Models\admin;
use App\Models\Blog;
use App\Models\Blog_category;
use App\Models\category;
use App\Models\Comment;
use App\Models\reply_comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_query = Blog::join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
            ->select('blogs.*', 'blog_categories.name as cate_name')->paginate(5);
            
        return view('Admin.Blog.List_blog', compact('blog_query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_blog = Blog_category::all();
        return view('Admin.Blog.Add_blog', compact('category_blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addBlogRequest $request)
    {
       
        // dd($request->all());
        if ($request->has('other_image')) {
            $other_image = $request->other_image;
            $des_pt_name = time() . $other_image->getClientOriginalName();
            $other_image->move(public_path('imageBlog'), $des_pt_name);
        }
    
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'blog_category_id' => $request->blog_category_id,
            'admin_id'=>Auth::guard('admin')->user()->id,
            'image' => $des_pt_name
        ]);
        return redirect()->route('blog.index')->with('add_success',"Thêm mới bài viết thành công");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $old_blog = Blog::find($id);
        $category_blog = Blog_category::all();

        $comments = Comment::leftjoin('users', 'users.id', '=', 'comments.user_id')
        ->leftjoin('blogs', 'blogs.id', 'comments.blog_id')
        ->select('users.name as cus_name', 'users.id as cus_id', 'users.image as cus_avt', 'comments.*')
        ->where('blogs.id', $id)
        ->distinct()
        ->get();
        $who = admin::find($old_blog->admin_id);
        $reply = [];
        $count_reply=0;
        foreach ($comments as $key => $value) {
            $find_reply = reply_comments::leftjoin('users', 'users.id', '=', 'reply_comments.id_user')
                ->leftjoin('comments', 'comments.id', 'reply_comments.reply_to')
                ->select('users.name as cus_name', 'users.id as cus_id', 'users.image as cus_avt', 'reply_comments.*')
                ->where('reply_comments.reply_to',$value->id)
                ->distinct()
                ->get();
                $count_reply += count($find_reply);
            // $find_reply = reply_comments::where('reply_to',$value->id)->get();
            $reply[$value->id] = $find_reply;
        }
        $count_all_reply_and_comments = $count_reply + count($comments);
        return view('Admin.Blog.detail_blog',compact('count_all_reply_and_comments','old_blog','category_blog','comments','reply','who'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old_blog = Blog::find($id);
        $category_blog = Blog_category::all();
        return view('Admin.Blog.Edit_blog', compact('category_blog', 'old_blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editblogRequest $request, $id)
    {
        $blog = Blog::find($id);
        if ($request->has('other_image')) {
            $other_image = $request->other_image;
            $des_pt_name = time().$other_image->getClientOriginalName();
            $other_image->move(public_path('imageBlog'), $des_pt_name);
        }else{
        
            $des_pt_name = $blog->image;
        };
        $blog =$blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'blog_category_id' => $request->blog_category_id,
            'image' => $des_pt_name
        ]);
        return redirect()->route('blog.index')->with('edit_success',"Sửa bài viết thành công");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fin_blog = Blog::find($id);
        $fin_blog->delete();
        return redirect()->back()->with('delete_success',"Xóa bài viết thành công");;
    }
    // public function detail($id)
    // {
    //     $old_blog = Blog::find($id);
    //     $category_blog = Blog_category::all();
    //     return view('Admin.Blog.detail_blog');
    // }
}
