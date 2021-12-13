@extends('Customer.master.master')
@section('tiêu đề','blog_detail')

@section('main')

<main>

    <!-- blog area start -->
    <section class="blog__area pt-55">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar__wrapper">
                        <div class="sidebar__widget mb-55">
                            <div class="widget__search p-relative">
                                <form action="{{route('blog')}}">
                                    <input name="search" type="text" placeholder="Search...">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-title mb-25">
                                <h3>Blog Categories</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="categories">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header white-bg" id="accessories">
                                                @foreach($category_blog as $cac)
                                                <form method="GET" action="{{route('blog')}}">
                                                    <input type="hidden" name="id" value="{{$cac->id}}">
                                                    <div class="sidebar-widget-list-left">
                                                        <a href="#">
                                                            <button type="submit" class="btn btn-default">{{$cac->name}} </button>
                                                        </a>
                                                    </div>
                                                </form>
                                                @endforeach
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-title mb-25">
                                <h3>Latest Posts</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="rc__post-wrapper">
                                    <ul>
                                        @foreach ($Latest as $value)
                                        <li class="d-flex">
                                            <div class="rc__post-thumb mr-20 ">
                                                <a href="blog-details.html"><img width="100px" src="{{url('imageBlog')}}/{{$value->image}}" alt="blog-1"></a>
                                            </div>
                                            <div class="rc__post-content">
                                                <h6>
                                                    <a href="blog-details.html">{!! Str::limit($value->title, 25) !!}</a>
                                                </h6>
                                                <div class="rc__meta">
                                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');}}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget mb-55">
                            <div class="sidebar__widget-title mb-25">
                                <h3>Recent Comments</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="rc__comments">
                                    <ul>
                                        @foreach ($Recent_Comments as $value)
                                        <li class="d-flex mb-20">
                                            <div class="rc__comments-avater mr-15">
                                                <img style="width:80px;height:80px;border-radius: 50%;" src="{{url('uploads')}}/{{$value->cus_avt}}" alt="">
                                            </div>
                                            <div class="rc__comments-content">

                                                <h6> {{Auth::user()->name}}</h6>
                                                <p>{{$value->content}}...</p>

                                                <span>on <span class="highlight comment"> <a href="">{{$value->blog_name}}</a> </span></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="postbox__title mb-55">
                        <h1><a href="blog.html">{{$find_blog->title}}</a></h1>
                        <div class="blog__meta">
                            <span>By <a href="#">{{$find_blog->admin_name}}</a></span>
                            <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $find_blog->created_at)->format('d F Y');}}</span>
                        </div>
                    </div>
                    <div class="postbox__thumb w-img">
                        <img src="{{url('imageBlog')}}/{{$find_blog->image}}" alt="">
                    </div>
                    <div class="postbox__wrapper mb-70">
                        <div class="postbox__text mt-65">
                            <p>{!!$find_blog->content!!}</p>
                        </div>

                    </div>
                    <div class="postbox__share mb-95">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="postbox__social">
                                    <span>Share to friends:</span>
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="postbox__tag f-right">
                                    <span>Tags :</span>
                                    <a href="#">Furniture,</a>
                                    <a href="#">Erentheme,</a>
                                    <a href="#">Chair, </a>
                                    <a href="#">Decor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="postbox__related-title">
                        <h3>You Might Also Like</h3>
                    </div>
                    <div class="postbox__related-item">
                        <div class="row">
                            @foreach ($cate_blog as $value)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="blog__item mb-30">
                                    <div class="blog__thumb fix">
                                        <a href="#" class="w-img"><img src="{{url('imageBlog')}}/{{$value->image}}" alt="blog"></a>
                                    </div>
                                    <div class="blog__content">
                                        <h4><a href="blog-details.html">{{$value->title}}</a></h4>
                                        <div class="blog__meta">
                                            <span>By <a href="#">Shahnewaz Sakil</a></span>
                                            <span>/{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="postbox__line mt-65"></div>
                    <div class="postbox__comments pt-90">
                        <div class="postbox__comment-title mb-30">
                            <h3>Comments ({{$count_all_reply_and_comments}})</h3>
                        </div>
                        <div class="latest-comments mb-30">
                            <ul>
                                @foreach ($comments as $value)
                                <li>
                                    <div class="comments-box">
                                        <div class="comments-avatar">
                                            <img width="70px" height="70px" src="{{url('uploads')}}/{{$value->cus_avt}}" alt="">
                                        </div>
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <h5>{{$value->cus_name}}</h5>
                                                <span> /{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');}} </span>
                                                <a class="reply" id="reply{{$value->id}}" onclick="replyto({{$value->id}})">Leave Reply</a>

                                            </div>
                                            @if($value->cus_id == Auth::user()->id)
                                            <a onclick="edit({{$value->id}})">Sửa</a>
                                            <a href="{{route('comment.delete',$value->id)}}" onclick="return confirm('Bạn có chắc muốn xóa bình luận này chứ')">Xóa</a>

                                            @endif
                                            <p>{{$value->content}}</p>
                                        </div>
                                    </div>


                                    <!-- edit comment -->
                                    <div id="editcontent{{$value->id}}" class="d-none">
                                        <form method="POST" class="conatct-post-form" action="{{route('customer.edit_comment',$value->id)}}">
                                            @csrf

                                            <!-- <input type="hidden" name="edit" id="input" class="form-control" value="{{$value->id}}"> -->
                                            <div class="row">

                                                <div class="col-xl-12">
                                                    <div class="contact-icon p-relative contacts-message">
                                                        <textarea name="name_comment" id="comments" cols="20" rows="10" placeholder=" edit Comments">{{$value->content}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <button class="os-btn os-btn-black" type="submit">edit comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>






                                    <!-- reply -->
                                    <div id="content{{$value->id}}" class="d-none">
                                        <form method="post" class="conatct-post-form" action="{{route('reply_comment')}}">
                                            @csrf

                                            <input type="hidden" name="reply_to" id="input" class="form-control" value="{{$value->id}}">
                                            <div class="row">

                                                <div class="col-xl-12">
                                                    <div class="contact-icon p-relative contacts-message">
                                                        <textarea name="name_comment" id="comments" cols="20" rows="10" placeholder=" Reply Comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <button class="os-btn os-btn-black" type="submit">Reply comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>




                                </li>
                                @if(array_key_exists($value->id,$reply))
                                @foreach ($reply[$value->id] as $ply)

                                <li class="children">
                                    <div class="comments-box">
                                        <div class="comments-avatar">
                                            <img width="70px" height="70px" src="{{url('uploads')}}/{{$ply->cus_avt}}" alt="">
                                        </div>
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <h5>{{$ply-> cus_name}}</h5>
                                                @if($ply->cus_id == Auth::user()->id)
                                                <a onclick="edit_reply({{$value->id}})"> Sửa </a>
                                                <a href="{{route('deletereply',$ply->id)}}" onclick="return confirm('Bạn có chắc muốn xóa bình luận này chứ')">Xóa</a>
                                                @endif
                                                <a class="reply" href="#">/{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ply->created_at)->format('d F Y');}}</a>

                                            </div>
                                            <p>{{$ply->name_comment}}</p>
                                        </div>
                                    </div>


                                    <!-- edit reply -->
                                    <div id="edit_reply{{$value->id}}" class="d-none">
                                        <form method="post" class="conatct-post-form" action="{{route('edit_reply_comment',$value->id)}}">
                                            @csrf
                                            <!-- <input type="hidden" name="edit_reply" id="input" class="form-control" value="{{$value->id}}"> -->
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="contact-icon p-relative contacts-message">
                                                        <textarea name="name_comment" id="comments" cols="20" rows="10" placeholder=" Reply Comments">{{$ply->name_comment}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <button class="os-btn os-btn-black" type="submit">Edit comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </li>
                                @endforeach
                                @endif


                                @endforeach



                            </ul>
                        </div>
                    </div>
                    <div class="postbox__line mb-95"></div>
                    <div class="post-comments-form mb-100">
                        <div class="post-comments-title mb-30">
                            <h3>conment</h3>
                        </div>
                        <form method="post" class="conatct-post-form" action="{{route('post_reviews')}}">
                            @csrf

                            <input type="hidden" name="blog_id" id="input" class="form-control" value="{{$find_blog->id}}">

                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="contact-icon p-relative contacts-message">
                                        <textarea name="content" id="comments" cols="30" rows="10" placeholder="Comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="os-btn os-btn-black" type="submit">Post comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- blog area end -->
</main>

@stop
@section('djtme_js')
<script>
    function replyto(id) {
        if ($('#content' + id).hasClass('d-none')) {
            $('#content' + id).removeClass('d-none');
        } else {
            $('#content' + id).addClass('d-none');
        }
    }
</script>
<script>
    function edit(id) {
        if ($('#editcontent' + id).hasClass('d-none')) {
            $('#editcontent' + id).removeClass('d-none');
        } else {
            $('#editcontent' + id).addClass('d-none');
        }
    }
</script>
<script>
    function edit_reply(id) {
        if ($('#edit_reply' + id).hasClass('d-none')) {
            $('#edit_reply' + id).removeClass('d-none');
        } else {
            $('#edit_reply' + id).addClass('d-none');
        }
    }
</script>
@stop