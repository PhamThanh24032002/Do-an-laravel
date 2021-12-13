<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blog_category;

use App\Models\Comment;
use App\Models\reply_comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\favorite;
use App\Models\Cart;
use App\Models\item;

class BloguserController extends Controller
{
    public function get_data()
    {
        $data = [];
        if (Auth::check()) {
            $data['listFavorite'] = favorite::where("user_id", Auth::id())->get();
            $data['wl_page'] = favorite::where("user_id", Auth::id())->join('products', 'products.id', '=', 'favorites.product_id')->get(['favorites.id as wl_id', 'favorites.user_id', 'products.*']);
            $data['cl_page'] = cart::where("user_id", Auth::id())->join('products', 'products.id', '=', 'carts.product_id')->get(['carts.*', 'products.price as pro_price', 'products.image', 'products.name', 'products.sale_price'])->toArray();
        }
        return $data;
    }
    public function blog(Request $request)
    {

        $blog = Blog::leftjoin('admins', 'admins.id', 'blogs.admin_id')
            ->select('admins.name as admin_name', 'blogs.*')
            ->paginate(4);
        $Latest = Blog::orderBy('created_at', 'ASC')->limit(3)->get();

        $Recent_Comments = Comment::leftjoin('users', 'users.id', '=', 'comments.user_id')
            ->leftjoin('blogs', 'blogs.id', 'comments.blog_id')
            ->select('users.name as cus_name', 'users.id as cus_id', 'blogs.title as blog_name', 'blogs.id as blog_id', 'users.image as cus_avt', 'comments.*')
            ->orderBy('created_at', 'desc')
            ->distinct()
            ->limit(5)
            ->get();
        $banner_page = item::where('status', 1)
            ->where('page', 'blog')->first();
        // dd($Recent_Comments);
        $category_blog = Blog_category::where('status', 1)->get();

        if ($request->has('id')) {
            $blog = blog::where('blog_category_id', $request->id)->paginate(5);
        }

        if ($request->has('search')) {
            $blog = blog::where('title', 'like', "%$request->search%")->paginate(5);
        }
        $data = $this->get_data();
        return view('Customer.Blog', compact('blog', 'data', 'Latest', 'Recent_Comments', 'category_blog', 'banner_page'));
    }

    public function blog_detail($id, Request $request)
    {
        $find_blog = Blog::find($id);
        $Latest = Blog::orderBy('created_at', 'ASC')->limit(3)->get();
        $cate_blog = Blog::where('blog_category_id', $id)->limit(3)->get();
        $find_blog = Blog::find($id);


        $comments = Comment::leftjoin('users', 'users.id', '=', 'comments.user_id')
            ->leftjoin('blogs', 'blogs.id', 'comments.blog_id')
            ->select('users.name as cus_name', 'users.id as cus_id', 'users.image as cus_avt', 'comments.*')
            ->where('blogs.id', $id)
            ->distinct()
            ->get();
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
        $Latest = Blog::orderBy('created_at', 'ASC')->limit(3)->get();

        $Recent_Comments = Comment::leftjoin('users', 'users.id', '=', 'comments.user_id')
            ->leftjoin('blogs', 'blogs.id', 'comments.blog_id')
            ->select('users.name as cus_name', 'users.id as cus_id', 'blogs.title as blog_name', 'blogs.id as blog_id', 'users.image as cus_avt', 'comments.*')
            ->orderBy('created_at', 'desc')
            ->distinct()
            ->limit(5)
            ->get();

        $category_blog = Blog_category::where('status', 1)->get();

        if ($request->has('id')) {
            $blog = blog::where('blog_category_id', $request->id)->paginate(5);
        }

        if ($request->has('search')) {
            $blog = blog::where('title', 'like', "%$request->search%")->paginate(5);
        }
        $data = $this->get_data();
        $count_all_reply_and_comments = $count_reply + count($comments);
        return view('Customer.Blog_detail', compact('find_blog','count_all_reply_and_comments', 'data', 'Latest', 'cate_blog', 'comments', 'reply', 'Recent_Comments', 'category_blog'));
    }
    public function post_reviews(Request $request)
    {

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'blog_id' => $request->blog_id
        ]);

        return redirect()->back();
    }
    public function edit_comment(Request $request, $id)
    {
        // dd();
        $eidt_comment = Comment::find($id);
        $eidt_comment->update([
            'content' => $request->name_comment,

        ]);
        return redirect()->back();
    }
    public function delete_comment(Request $request, $id)
    {

        $find_reply = reply_comments::where('reply_to',$id)->get();
        foreach ($find_reply as $key => $value) {
            $value->delete($value->id);
        }
        $delete_comment = Comment::destroy($id);

        return redirect()->back();
    }



    public function reply_comment(Request $request)
    {
        $reply_comments = reply_comments::create([
            'name_comment' => $request->name_comment,
            'id_user' => Auth::user()->id,

            'reply_to' => $request->reply_to
        ]);

        return redirect()->back();
    }

    public function edit_reply_comment(Request $request, $id)
    {
        $edit_ply = reply_comments::find($id);
        
        $edit_ply->update([
            'name_comment' => $request->name_comment,

        ]);
        return redirect()->back();
    }
    public function deletereply($id)
    {
        $delete_comment = reply_comments::destroy($id);
        return redirect()->back();
    }
}
