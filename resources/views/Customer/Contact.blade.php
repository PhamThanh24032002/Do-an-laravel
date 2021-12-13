@extends('Customer.master.master')
@section('main')
@section('contact','activesss')
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
                                    <li class="breadcrumb-item active" aria-current="page"> Contact</li>
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
                    <h1>CONTACT US</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Contact</li>
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

    <!-- contact area start -->
    <section class="contact__area pb-100 pt-95">
        <div class="container">
            @if (count($contact) != 0)
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__info">
                        <h3>Find us here.</h3>
                        @foreach ($contact as $value)
                        <ul class="mb-55">
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Address:</h6>
                                    <span>{{$value->address}}</span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Email:</h6>
                                    <span><a href="https://themepure.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eead81809a8f8d9aae8b9c8b809a868b838bc08d8183">{{$value->email}}</a></span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Number Phone:</h6>
                                    <span>{{$value->phone}}</span>
                                </div>
                            </li>
                        </ul>
                        <p>Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                        @endforeach


                        <div class="contact__social">
                            <ul>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__form">
                        <h3>Contact Us.</h3>
                        <form action="{{route('contactpost')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="contact__input">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="contact__input">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" value="{{Auth::user()->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__input">
                                        <label>Message</label>
                                        <textarea cols="30" rows="10" name="desscription"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__submit">
                                        <button type="submit" class="os-btn os-btn-black">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="ajax-response"></p>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__info">
                        <h3>Find us here.</h3>
                       
                        <ul class="mb-55">
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Address:</h6>
                                    <span>Đức Long-Nho Quan-Ninh Bình</span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Email:</h6>
                                    <span><a href="https://themepure.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eead81809a8f8d9aae8b9c8b809a868b838bc08d8183">Thachpham240202@gmail.com</a></span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Number Phone:</h6>
                                    <span>0839206561</span>
                                </div>
                            </li>
                        </ul>
                        <p></p>
                     


                        <div class="contact__social">
                            <ul>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__form">
                        <h3>Contact Us.</h3>
                        <form action="{{route('contactpost')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="contact__input">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="contact__input">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__input">
                                        <label>Message</label>
                                        <textarea cols="30" rows="10" name="desscription"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__submit">
                                        <button type="submit" class="os-btn os-btn-black">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="ajax-response"></p>
                    </div>
                </div>
            </div>
            @endif
         
        </div>
    </section>
    <!-- contact area end -->

    <!-- contact map area start -->
    @if (count($contact) != 0)
    <section class="contact__map">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="contact__map-wrapper p-relative">
                        @foreach ($googlemap as $map)
                        <div class="div">
                            {!! $map->links !!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="contact__map">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="contact__map-wrapper p-relative">      
                        <div class="div">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657600815621!2d105.78125685060922!3d21.046381985920004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1633444296170!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- contact map area end -->

    <!-- subscribe area start -->
    <section class="subscribe__area pb-100">
        <div class="container">
            <div class="subscribe__inner subscribe__inner-2 pt-95">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="subscribe__content text-center">
                            <h2>Phản Hồi Của Người Dùng</h2>
                            
                            <div class="subscribe">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe area end -->
</main>

@stop