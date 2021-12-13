@extends('Customer.master.master')
@section('tiêu đề','blog')

@section('main')
<main>

    <!-- page title area start -->
    @if(($banner_page) != [])
    <section class="page__title p-relative d-flex align-items-center" data-background="{{url('imageBanner')}}/{{$banner_page->image}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>{{$banner_page->content}}</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Blog Standard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="page__title p-relative d-flex align-items-center" data-background="http://thegioidohoacom.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2018/12/12020604/thi%E1%BA%BFt-k%E1%BA%BF-banner-m%E1%BB%B9-ph%E1%BA%A9m-61.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                    <h1>Blog US</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">  Blog Standard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
   
    <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar__wrapper">
                        <div class="sidebar__widget mb-55">
                            <div class="widget__search p-relative">
                                <form action="{{route('blog')}}" >
                                    <input  name="search" type="text" placeholder="Search...">
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
                                                <a href=""><img width="100px" src="{{url('imageBlog')}}/{{$value->image}}" alt="blog-1"></a>
                                            </div>
                                            <div class="rc__post-content">
                                                <h6>
                                                    <a href="">{!! Str::limit($value->title, 25) !!}</a>
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
                                            <div class="rc__comments-avater mr-15" >
                                                <img style="width:80px;height:80px;border-radius: 50%;"  src="{{url('uploads')}}/{{$value->cus_avt}}" alt="">
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

                <div class="col-xl-9 col-lg-8 ">
                    <div class="blog__wrapper">
                        <div class="row">
                            
                            @foreach ($blog as $value )
                          
                            <div class="col-xl-6">
                                <div class="blog__item blog__border-bottom mb-60 pb-60">
                                    <div class="blog__thumb fix">
                                        <a href="{{route('blog_detail',$value->id)}}" class="w-img"><img style="height: 300px;object-fit: cover;" src="{{url('imageBlog')}}/{{$value->image}}" alt="blog"></a>
                                    </div>
                                    <div class="blog__content">
                                        <h4 class="blog__title"><a href="{{route('blog_detail',$value->id)}}">{{$value->title}}</a></h4>
                                        <div class="blog__metax">
                                            <span>By <a href="">{{$value->admin_name}}</a></span>
                                            <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');}}</span>
                                        </div>
                                    
                                        <p >{!! Str::limit($value->content, 150) !!}</p>
                                        <a href="{{route('blog_detail',$value->id)}}" class="os-btn">read more</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                
                                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="{{($blog->currentPage() == 1)? 'page-link d-none' : 'page-link'}}" href="{{$blog->previousPageUrl()}}" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                @for($i = 1; $i <= $blog->lastPage() ;$i++ )
                                                    <li class="{{($blog->currentPage() == $i)? 'page-item active' : 'page-item'}}">
                                                        <a class="page-link" href="{{$blog->url($i)}}">{{$i}}</a>
                                                    </li>
                                                    @endfor
                                                    <li class="page-item">
                                                        <a class="{{($blog->currentPage() == $blog->lastPage())? 'page-link d-none' : 'page-link'}}" href="{{$blog->nextPageUrl()}}" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                            </ul>
                                        </nav>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
</main>

@stop
