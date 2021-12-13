@extends('Admin.master.master')
@section('main')
<div class="page-body">

  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Blog Single</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Blog</li>
            <li class="breadcrumb-item active">Blog Single</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-single">
          <div class="blog-box blog-details"><img class="img-fluid w-100" src="{{url('imageBlog')}}/{{$old_blog->image}}" width="100%" alt="{{$old_blog->image}}">
            <div class="blog-details">
              <ul class="blog-social">
                <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $old_blog->created_at)->format('d F Y');}}</li>
                <li>Author : {{$who->name}}</li>
               
                <li>Comments : ({{$count_all_reply_and_comments}})</li>
              </ul>
              <h4>
                {{$old_blog->title}}
              </h4>
              <div class="single-blog-content-top">
                <p> {!!$old_blog->content!!}</p>

              </div>
            </div>
          </div>
          <section class="comment-box">
            <h4>Comments ({{$count_all_reply_and_comments}})</h4>
            <hr>
            <ul>
              @foreach ($comments as $value)
              <li>
                <div class="media align-self-center"><img class="align-self-center" style="object-fit: cover;" src="{{url('uploads')}}/{{$value->cus_avt}}" alt="Generic placeholder image">
                  <div class="media-body">
                    <div class="row">
                      <div class="col-md-4">
                        <h6 class="mt-0">{{$value->cus_name}}<span>  <a href="{{route('comment.delete',$value->id)}}" onclick="return confirm('Bạn có chắc muốn xóa bình luận này chứ')">Xóa</a></span></h6>
                      </div>
                      <div class="col-md-8">
                        <ul class="comment-social float-start float-md-end">
                         
                          <!-- <li><a hclass="reply" id="reply{{$value->id}}" onclick="replyto({{$value->id}})">reply comment</a> </li> -->
                        </ul>
                      </div>
                    </div>
                    <p>{{$value->content}}</p>
                  </div>
                </div>
                <div id="content{{$value->id}}" class="d-none">
                  <form method="post" class="conatct-post-form" action="{{route('reply_comment')}}">
                    @csrf

                    
                    <input type="hidden" name="reply_to" id="input" class="form-control" value="{{$value->id}}">
                    <div class="row">

                      <div class="col-xl-12">
                        <div class="contact-icon p-relative contacts-message">
                          <textarea name="name_comment" id="comments" cols="40" rows="4" placeholder=" Reply Comments"></textarea>
                        </div>
                      </div>
                      <div class="col-xl-12">
                        <button class="btn btn-danger" type="submit">Reply comment</button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              @if(array_key_exists($value->id,$reply))
              @foreach ($reply[$value->id] as  $ply)
              <li>
                <ul>
                  <li>
                    <div class="media"><img class="align-self-center" src="{{url('uploads')}}/{{$value->cus_avt}}" alt="Generic placeholder image">
                      <div class="media-body">
                        <div class="row">
                          <div class="col-xl-12">
                            <h6 class="mt-0">{{$ply-> cus_name}}<span>
                            <a href="{{route('deletereply',$ply->id)}}" onclick="return confirm('Bạn có chắc muốn xóa bình luận này chứ')">Xóa</a>
                            </span></h6>
                          </div>
                        </div>
                        <p>{{$ply->name_comment}}</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              @endforeach
              @endif
              @endforeach
            </ul>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
  <!-- <div class="post-comments-form mb-100">
    <div class="post-comments-title mb-30">
      <h3>conment</h3>
    </div>
    <form method="post" class="conatct-post-form" action="{{route('post_reviews')}}">
      @csrf
      <input type="hidden" name="blog_id" id="input" class="form-control" value="{{$old_blog->id}}">

      <div class="row">

        <div class="col-xl-12">
          <div class="contact">
            <textarea name="content" id="comments" cols="80" rows="6" placeholder="Comments"></textarea>
          </div>
        </div>
        <div class="col-xl-12">
          <button class="btn btn-danger" type="submit">Post comment</button>
        </div>
      </div>
    </form>
  </div> -->
</div>

@stop
@section('js')
<script>
  function replyto(id) {
    if ($('#content' + id).hasClass('d-none')) {
      $('#content' + id).removeClass('d-none');
    } else {
      $('#content' + id).addClass('d-none');
    }
  }
</script>
@stop