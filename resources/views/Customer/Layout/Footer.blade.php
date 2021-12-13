<section class="footer__area footer-bg">
        <div class="footer__top pt-100 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="footer__widget mb-30">
                            <div class="footer__widget-title mb-25">
                                <a href="index-2.html"><img src="{{url('assetsCustomer')}}/img/logo/logo-2.png" alt="logo"></a>
                            </div>
                            <div class="footer__widget-content">
                                <p>Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready.</p>
                               
                                    @foreach ($contact as  $value)
                                    <div class="footer__contact">
                                 
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <i class="fal fa-map-marker-alt"></i>
                                            </div>
                                            <div class="text">
                                                <span>Add: {{$value->address}}.</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fal fa-envelope-open-text"></i>
                                            </div>
                                            <div class="text">
                                                <span>Email: <a href="https://themepure.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e1a28e8f95808295a183809288829589848c84cf828e8c">[email&#160;protected]</a></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fal fa-phone-alt"></i>
                                            </div>
                                            <div class="text">
                                                <span>Phone Number:  {{$value->phone}}</span>
                                            </div>
                                        </li>
                                    </ul>
                                    </div>
                                    @endforeach
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="footer__widget mb-30">
                            <div class="footer__widget-title">
                                <h5>Customer Service</h5>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__links">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('logincus')}}">Login</a></li>
                                        <li><a href="{{route('registercus')}}">Register</a></li>
                                        <li><a href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="footer__widget mb-30">
                            <div class="footer__widget-title mb-25">
                                <h5> information</h5>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__links">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                        <li><a href="{{route('blog')}}">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7">
                        <div class="footer__copyright">
                            <p>Copyright © <a href="index-2.html">Outstock</a> all rights reserved. Powered by <a href="index-2.html">basictheme</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="footer__social f-right">
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
            </div>
        </div>
    </section>