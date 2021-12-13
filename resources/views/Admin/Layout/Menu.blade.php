<body onload="startTime()">
  <div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
      <defs></defs>
      <filter id="goo">
        <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
      </filter>
    </svg>
  </div>
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->
  <!-- page-wrapper Start-->

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->

    <div class="page-header">
      <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
          <div class="form-group w-100">
            <div class="Typeahead Typeahead--twitterUsers">
              <div class="u-posRelative">
                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
              </div>
              <div class="Typeahead-menu"></div>
            </div>
          </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{url('assets')}}/images/logo/logo.png" alt=""></a></div>
          <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
        </div>
        <div  class="left-header col horizontal-wrapper ps-0">
          <ul class="horizontal-menu">
            <li hidden class="mega-menu outside"><a class="nav-link" href="#!"><i data-feather="layers"></i><span>Bonus Ui</span></a>
              <div class="mega-menu-container nav-submenu menu-to-be-close header-mega">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col mega-box">
                      <div class="mobile-title d-none">
                        <h5>Mega menu</h5><i data-feather="x"></i>
                      </div>
                      <div class="link-section icon">
                        <div>
                          <h6>Error Page</h6>
                        </div>
                        <ul>
                          <li><a href="error-400.html">Error page 400</a></li>
                          <li><a href="error-401.html">Error page 401</a></li>
                          <li><a href="error-403.html">Error page 403</a></li>
                          <li><a href="error-404.html">Error page 404</a></li>
                          <li><a href="error-500.html">Error page 500</a></li>
                          <li><a href="error-503.html">Error page 503</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section doted">
                        <div>
                          <h6> Authentication</h6>
                        </div>
                        <ul>
                          <li><a href="login.html">Login</a></li>
                          <li><a href="login_one.html">Login with image</a></li>
                          <li><a href="login-bs-validation.html">Login with validation</a></li>
                          <li><a href="sign-up.html">Sign Up</a></li>
                          <li><a href="sign-up-one.html">SignUp with image</a></li>
                          <li><a href="sign-up-two.html">SignUp with image</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section dashed-links">
                        <div>
                          <h6>Usefull Pages</h6>
                        </div>
                        <ul>
                          <li><a href="search.html">Search Website</a></li>
                          <li><a href="unlock.html">Unlock User</a></li>
                          <li><a href="forget-password.html">Forget Password</a></li>
                          <li><a href="reset-password.html">Reset Password</a></li>
                          <li><a href="maintenance.html">Maintenance</a></li>
                          <li><a href="login-sa-validation.html">Login validation</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section">
                        <div>
                          <h6>Email templates</h6>
                        </div>
                        <ul>
                          <li class="ps-0"><a href="basic-template.html">Basic Email</a></li>
                          <li class="ps-0"><a href="email-header.html">Basic With Header</a></li>
                          <li class="ps-0"><a href="template-email.html">Ecomerce Template</a></li>
                          <li class="ps-0"><a href="template-email-2.html">Email Template 2</a></li>
                          <li class="ps-0"><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                          <li class="ps-0"><a href="email-order-success.html">Order Success</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col mega-box">
                      <div class="link-section">
                        <div>
                          <h6>Coming Soon</h6>
                        </div>
                        <ul class="svg-icon">
                          <li><a href="comingsoon.html"> <i data-feather="file"> </i>Coming-soon</a></li>
                          <li><a href="comingsoon-bg-video.html"> <i data-feather="film"> </i>Coming-video</a></li>
                          <li><a href="comingsoon-bg-img.html"><i data-feather="image"> </i>Coming-Image</a></li>
                        </ul>
                        <div>
                          <h6>Other Soon</h6>
                        </div>
                        <ul class="svg-icon">
                          <li><a class="txt-primary" href="landing-page.html"> <i data-feather="cast"></i>Landing Page</a></li>
                          <li><a class="txt-secondary" href="sample-page.html"> <i data-feather="airplay"></i>Sample Page</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li hidden class="level-menu outside"><a class="nav-link" href="#!"><i data-feather="inbox"></i><span>Level Menu</span></a>
              <ul class="header-level-menu menu-to-be-close">
                <li><a href="file-manager.html" data-original-title="" title=""> <i data-feather="git-pull-request"></i><span>File manager </span></a></li>
                <li><a href="#!" data-original-title="" title=""> <i data-feather="users"></i><span>Users</span></a>
                  <ul class="header-level-sub-menu">
                    <li><a href="file-manager.html" data-original-title="" title=""> <i data-feather="user"></i><span>User Profile</span></a></li>
                    <li><a href="file-manager.html" data-original-title="" title=""> <i data-feather="user-minus"></i><span>User Edit</span></a></li>
                    <li><a href="file-manager.html" data-original-title="" title=""> <i data-feather="user-check"></i><span>Users Cards</span></a></li>
                  </ul>
                </li>
                <li><a href="kanban.html" data-original-title="" title=""> <i data-feather="airplay"></i><span>Kanban Board</span></a></li>
                <li><a href="bookmark.html" data-original-title="" title=""> <i data-feather="heart"></i><span>Bookmark</span></a></li>
                <li><a href="social-app.html" data-original-title="" title=""> <i data-feather="zap"></i><span>Social App </span></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
          <ul class="nav-menus">
            <li class="language-nav">
              <div class="translate_wrapper">
                <div class="current_lang">
                  <div class="lang"><i class="flag-icon flag-icon-vn"></i><span class="lang-txt">VN </span></div>
                </div>
               
              </div>
            </li>
            <li> <span class="header-search"><i data-feather="search"></i></span></li>
            <li class="onhover-dropdown">
              <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">4 </span></div>
              <ul class="notification-dropdown onhover-show-div">
                <li><i data-feather="bell"></i>
                  <h6 class="f-18 mb-0">Notitications</h6>
                </li>
                <li>
                  <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                </li>
                <li>
                  <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                </li>
                <li>
                  <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                </li>
                <li>
                  <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                </li>
                <li><a class="btn btn-primary" href="#">Check all notification</a></li>
              </ul>
            </li>
            <li class="onhover-dropdown">
              <div class="notification-box"><i data-feather="star"></i></div>
              <div class="onhover-show-div bookmark-flip">
                <div class="flip-card">
                  <div class="flip-card-inner">
                    <div class="front">
                      <ul class="droplet-dropdown bookmark-dropdown">
                        <li class="gradient-primary"><i data-feather="star"></i>
                          <h6 class="f-18 mb-0">Bookmark</h6>
                        </li>
                        <li>
                          <div class="row">
                            <div class="col-4 text-center"><i data-feather="file-text"></i></div>
                            <div class="col-4 text-center"><i data-feather="activity"></i></div>
                            <div class="col-4 text-center"><i data-feather="users"></i></div>
                            <div class="col-4 text-center"><i data-feather="clipboard"></i></div>
                            <div class="col-4 text-center"><i data-feather="anchor"></i></div>
                            <div class="col-4 text-center"><i data-feather="settings"></i></div>
                          </div>
                        </li>
                        <li class="text-center">
                          <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                        </li>
                      </ul>
                    </div>
                    <div class="back">
                      <ul>
                        <li>
                          <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                            <input type="text" placeholder="search...">
                          </div>
                        </li>
                        <li>
                          <button class="d-block flip-back" id="flip-back">Back</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li>
           
            <li class="onhover-dropdown"><i data-feather="message-square"></i>
              <ul class="chat-dropdown onhover-show-div">
                <li><i data-feather="message-square"></i>
                  <h6 class="f-18 mb-0">Message Box </h6>
                </li>
                <li>
                  <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/1.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="media-body"><span>Erica Hughes</span>
                      <p>Lorem Ipsum is simply dummy...</p>
                    </div>
                    <p class="f-12 font-success">58 mins ago</p>
                  </div>
                </li>
                <li>
                  <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/2.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="media-body"><span>Kori Thomas</span>
                      <p>Lorem Ipsum is simply dummy...</p>
                    </div>
                    <p class="f-12 font-success">1 hr ago</p>
                  </div>
                </li>
                <li>
                  <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/4.jpg" alt="">
                    <div class="status-circle offline"></div>
                    <div class="media-body"><span>Ain Chavez</span>
                      <p>Lorem Ipsum is simply dummy...</p>
                    </div>
                    <p class="f-12 font-danger">32 mins ago</p>
                  </div>
                </li>
                <li class="text-center"> <a class="btn btn-primary" href="#">View All </a></li>
              </ul>
            </li>
            <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            <li class="profile-nav onhover-dropdown p-0 me-0">
              <div class="media profile-media"><img class="b-r-10" style="width:30px px; height: 30px;" src="{{url('uploads')}}/{{auth('admin')->user()->image}}" alt="">
                <div class="media-body"><span>{{auth('admin')->user()->name}}</span>
                  <p class="mb-0 font-roboto">@if(auth('admin')->user()->role==0)
                    ADMIN
                    @elseif(auth('admin')->user()->role==1)
                    CENSOR
                    @elseif(auth('admin')->user()->role==2)
                    CONTENT CREATORS
                    @endif
                    <i class="middle fa fa-angle-down"></i>
                  </p>
                </div>
              </div>
              <ul class="profile-dropdown onhover-show-div">
                <li><a href="{{route('admin.update.profile')}}"><i data-feather="user"></i><span>Account </span></a></li>
                <li><a href="{{route('change.password')}}"><i data-feather="refresh-ccw"></i><span>Password</span></a></li>
                <li><a href="{{route('show.admin.logout')}}"><i data-feather="log-in"> </i><span>Log out</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
          <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
      </div>
    </div>
    <!-- Page Header Ends                              -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

      <!-- Page Sidebar Start-->
      <div class="sidebar-wrapper">
        <div>
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-main-title">
                  <div>
                    <h6 class="">Chức Năng</h6>
                    <p class="">Danh Mục,Sản Phẩm.v.v</p>
                  </div>
                </li>
                <li class="sidebar-list">
                  <label class="badge badge-success">{{count($category)}}</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span>Danh Mục </span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{route('category.create')}}">Thêm Danh Mục</a></li>
                    <li><a href="{{route('category.index')}}">Danh Sách Danh Mục</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="airplay"></i><span>Sản Phẩm</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{route('product.create')}}">Thêm Sản Phẩm</a></li>
                    <li><a href="{{route('product.index')}}">Danh Sách Sản Phẩm</a></li>
                    <li><a href="{{route('trashbin.index')}}">Thùng rác</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="layout"></i><span class="">Thuộc Tính Sản Phẩm</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{route('color.index')}}">Quản Lý Màu</a></li>
                    <li><a href="{{route('size.index')}}">Quản Lý size</a></li>

                  </ul>
                </li>
                <li class="sidebar-main-title">
                  <div>
                    <h6 class="">Các Chức Năng Khác</h6>
                    <p class="">Quản Lý Trang Người Dùng</p>
                  </div>
                </li>
                <li class="sidebar-list">
                  <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Thống Kê</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{route('profit')}}">Danh Sách Thống Kê</a></li>
                    <li><a href="">Các Thống Kê Khác</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="file-text"></i><span>Quản Lý Bài Viết</span></a>
                  <ul class="sidebar-submenu">
                    <li><a class="submenu-title" href="#">Bài Viết<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                      <ul class="nav-sub-childmenu submenu-content">
                        <li><a href="{{route('blog.create')}}">Thêm Bài Viết</a></li>
                        <li><a href="{{route('blog.index')}}">Danh Sách Bài Viết</a></li>
                      </ul>
                    </li>
                    <li><a class="submenu-title" href="#">Danh Mục Bài Viết<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                      <ul class="nav-sub-childmenu submenu-content">
                        <li><a href="{{route('category_blog.create')}}">Thêm Danh Mục</a></li>
                        <li><a href="{{route('category_blog.index')}}">Danh Sách</a></li>
                      </ul>
                    </li>

                  </ul>
                </li>
                <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Quản Lý Bài Viết</span></a></li>
                  <li class="sidebar-list">  
                    <label class="badge badge-info">Thêm Bài Viết Mới</label><a class="sidebar-link sidebar-title link-nav" href="kanban.html"><i data-feather="monitor"> </i><span>kanban Board</span></a>
                  </li> -->
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-bag"></i><span>Quản Lý Đơn Hàng</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{route('orders')}}">Danh Sách Đơn Hàng</a></li>


                  </ul>
                </li>
                <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="mail"></i><span>Các Bình Luận</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="email-application.html">Danh Sách Bình Luận</a></li>

                  </ul>
                </li> -->
                <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="message-circle"></i><span>Chat</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="chat.html">Chat App</a></li>
                      <li><a href="chat-video.html">Video chat</a></li>
                    </ul>
                  </li> -->
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Quản Lý Người Dùng</span></a>
                  <ul class="sidebar-submenu">
                  <li><a href="{{route('admin.list.admin')}}">Danh Sách Admin</a></li>
                  <li><a href="{{route('admin.list.customer')}}">Danh Sách User</a></li>
                  <li><a href="{{route('feedback')}}">feedback users</a></li>
                  </ul>
   <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="bookmark.html"><i data-feather="heart"> </i><span>Sản Phẩm Được Yêu Thích</span></a></li>                </li>
              -->
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="list"></i><span>Quản Lý Thông Tin Khác</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{route('slider.index')}}">Quản Lý slider </a></li>
                    <li><a href="{{route('banner.index')}}">QL Banner Danh Mục </a></li>
                    <li><a href="{{route('banner_page.index')}}">Quản Lý Banner pages </a></li>
                    <li><a href="{{route('logo.index')}}">Quản Lý Logo </a></li>
                    <li><a href="{{route('googlemap.create')}}">Quản Lý map </a></li>
                    <li><a href="{{route('admin.list.contact')}}">Thông Tin Liên Lạc </a></li>
                  </ul>
                </li>
                <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="task.html"><i data-feather="check-square"> </i><span>Tasks</span></a></li> -->


            </div>

          </nav>
        </div>
      </div>