<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <!-- Page Title -->
    <title>
        {{ $site_title }}
    </title>
    
    <!---Font Icon-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css')}}">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/backend/images/logo-letter.png') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css')}}">
    
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css')}}">
    @stack('css')
</head>
<body>
    <!--********************************************************-->
    <!--********************* SITE HEADER **********************-->
    <!--********************************************************-->
    <header class="site-header header-style-three">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Header Top Navbar
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="header-top-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="top-navbar-left">
                        <div class="social-profile">
                            <ul class="social-share-two">
                                <li><a href="#"><i class="fa fa-phone"></i> {{ $pengaturan_website->telpon }} / </a></li>
                                <li><a href="#"><i class="fa fa-fax"></i> {{ $pengaturan_website->telpon }} / </a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> {{ $pengaturan_website->email }}</a></li>
                            </ul>
                        </div><!--~./ social-profile ~-->
                        </div><!--~./ top-navbar-left ~-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="top-navbar-right">
                            <div class="social-profile">
                                <ul class="social-share-two">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div><!--~./ social-profile ~-->
                        </div><!--~./ top-navbar-right ~-->
                    </div>
                </div>
            </div>
        </div><!--~./ end header top navbar ~-->
       
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Header Middle Area
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="header-middle-area ptb-20">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="site-logo-block">
                            <a class="navbar-brand site-logo" href="{{ url('/') }}">
                                <img src="{{ asset('assets/frontend/images/logo/logo-bkd.png')}}" alt="logo">
                            </a>  
                        </div><!--~./ site-logo-block ~-->
                    </div>
                    <div class="col-lg-8">
                         <!--~~~~~ Start Add Banner ~~~~~--> 
                        <div class="add-banner">           
                            <div class="add-content text-right">
                                <a title="add" href="#">
                                    <img src="{{ asset('assets/frontend/images/slogan.png')}}" alt="slogan-bkd-riau">
                                </a>
                            </div>
                        </div><!--~./ end add banner ~-->
                    </div>
                </div>
            </div>
        </div><!--~./ end header middle area ~-->
       
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Site Navigation
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="site-navigation">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar navbar-expand-lg navigation-area">
                            <div class="mainmenu-area">
                                <nav class="menu">
                                    <ul id="nav">
                                        <li ><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a>
                                            
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> BERITA</a>
                                            <ul class="dropdown-content">
                                                @foreach($kategori_berita_menu as $item)
                                                <li><a href="{{ url('/kategori-berita/'.$item->slug) }}">{{ $item->nama }}</a></li>
                                                @endforeach
                                                <li><a href="{{ url('/berita') }}">Seluruh Berita</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-university" aria-hidden="true"></i> PROFIL</a>
                                            <ul class="dropdown-content">
                                                @foreach($profil as $item)
                                                <li><a href="{{ url('/profil/'.$item->slug) }}">{{ $item->nama }}</a></li>
                                                @endforeach
                                                <li class="dropdown-trigger"><a href="#">Bidang</a>
                                                    <ul class="dropdown-content">
                                                        @foreach($bidang_menu as $item)
                                                        <li><a href="{{ url('/bidang/'.$item->slug) }}">{{ $item->nama }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-download" aria-hidden="true"></i> UNDUHAN</a>
                                            <ul class="dropdown-content">
                                                @foreach($kategori_unduhan as $item)
                                                <li><a href="{{ url('/unduhan/'.$item->slug) }}">{{ $item->nama }}</a></li>
                                                @endforeach
                                                <li><a href="{{ url('/unduhan') }}">Seluruh Unduhan</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-list" aria-hidden="true"></i> APPS & LAINNYA</a>
                                            <ul class="dropdown-content">
                                                @foreach($aplikasi as $item)
                                                <li><a target="_blank" href="{{ $item->link}}">{{ $item->nama }}</a></li>
                                                @endforeach
                                                @foreach($link_terkait as $item)
                                                <li><a target="_blank" href="{{ $item->link}}">{{ $item->nama }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li ><a href="{{ url('/faq') }}"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQ</a>
                                    </ul>
                                </nav><!--/.menu-->
                            </div><!--~./ mainmenu-wrap ~-->
                            
                            <div class="header-navigation-right">
                                <div class="search-wrap">
                                    <div class="search-btn">
                                        <img src="{{ asset('assets/frontend/images/icon/search.png')}}" alt="icon">
                                        <span>PENCARIAN</span>
                                    </div>
                                    <div class="search-form">
                                        <form action="{{url('/pencarian-berita')}}">
                                            <input name="pencarian" type="search" placeholder="Cari Berita">
                                            <button type="submit"><i class='fa fa-search'></i></button>
                                        </form>
                                    </div>
                                </div><!--~./ search-wrap ~-->

                                <ul class="nav-btns">
                                    <li>
                                        <a id="random-post" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Random Post"><img src="{{ asset('assets/frontend/images/icon/random.png')}}" alt="icon"></a>
                                    </li>
                                    <li>
                                        <a href="#" id="bt-show-sidebar"><i class="fa fa-bars"></i></a>
                                    </li>
                                </ul>
                            </div><!--~./ header-navigation-right ~-->
                        </div><!--~./ navigation-area ~-->
                    </div>
                </div>
            </div>
        </div><!--~./ site-navigation ~-->
        
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Mobile Menu
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="mobile-menu">
            <a class="mobile-logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/frontend//images/logo/logo-bkd.png')}}" alt="logo">
            </a>
        </div><!--~~./ end mobile menu ~~-->
        <div class="breaking-news-area" >
            <div class="container">
                <div class="row">
                    <div class="col -12">
                        <div id="newsTicker" class="breaking-news-ticker">
                            <div class="bn-label">Berita Terbaru</div>
                            <div class="bn-news">
                                <ul>
                                    @foreach($berita as $item)
                                    <li><a href="{{ url('/berita/'.$item->slug) }}">{{ $item->judul }} <span>{{ $item->nama_kategori }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div><!--./ bn-news -->
                            <div class="bn-controls">
                                <button><span class="bn-arrow bn-prev"></span></button>
                                <button><span class="bn-arrow bn-next"></span></button>
                            </div><!--./ bn-controls -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--~./ end breaking news area ~-->
    </header>
    <!--~./ end site header ~-->
    
    
    <!--********************************************************-->
    <!--********************* SITE CONTENT *********************-->
    <!--********************************************************-->
    @yield('content')
    
    <!--********************************************************-->
    <!--****************** MAGALA SIDE SIDEBAR *****************-->
    <!--********************************************************-->
    <div class="magala-side-sidebar tse-scrollable">
        <div class="tse-content">
            <a href="#" class="sidebar-close-button" tabindex="0"><i class="fa fa-close"></i></a>
            <div class="sidebar">
                <!--~~~~~ Start Popular Posts Widget~~~~~-->
                <aside class="widget popular-posts-widget">
                    <h4 class="widget-title"><span>Berita Terbaru</span></h4>
                    <div class="widget-content">
                        @foreach ($berita_terbaru as $item)
                            <article class="post side-post" style="margin-bottom: 20px;">
                                <div class="thumb-wrap">
                                    <a href="{{ url('/berita/'.$item->slug) }}">
                                        <img src="{{ asset('uploads/images/gambar-berita/'.$item->thumbnail) }}" alt="{{ $item->judul }}" width="100" height="100">
                                    </a>
                                    <span class="count">1</span>
                                </div><!--./ thumb-wrap -->
                                <div class="content-entry-wrap">
                                    <h3 class="entry-title">
                                        <a href="{{ url('/berita/'.$item->slug) }}">{{ ucwords($item->judul) }}</a>
                                    </h3><!--./ entry-title -->
                                    <div class="entry-meta-content">
                                        <div class="entry-date">
                                            <span>{{ tgl_indo($item->updated_at) }} </span>
                                        </div><!--./ entry-date -->
                                    </div><!--./ entry-meta-content -->
                                </div>
                            </article><!--./ end post -->
                            
                        @endforeach
                        

                        
                    </div>
                </aside><!--~./ end popular posts widget ~-->
            </div>
        </div>
    </div>
    <div class="magala-close-all-window"></div>
    <!--~./ end magala side sidebar ~-->
    
    
    @include('frontend.include.footer')
    
    <!-- jQuery js -->
    <script src="{{ asset('assets/frontend/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/frontend/js/popper.min.js')}}"></script>
    <!-- Owl carousel js -->
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <!-- Masonary js -->
    <script src="{{ asset('assets/frontend/js/masonary.min.js')}}"></script>
    <!-- News Ticker js -->
    <script src="{{ asset('assets/frontend/js/breaking-news-ticker.min.js')}}"></script>
    <!-- Trackpad Scroll js -->
    <script src="{{ asset('assets/frontend/js/jquery.trackpad-scroll-emulator.min.js')}}"></script>
    <!-- Sticky ResizeSensor js -->
    <script src="{{ asset('assets/frontend/js/ResizeSensor.min.js')}}"></script>
    <!-- Sticky Sidebar js -->
    <script src="{{ asset('assets/frontend/js/theia-sticky-sidebar.min.js')}}"></script>
    <!-- Plugin js -->
    <script src="{{ asset('assets/frontend/js/plugins.js')}}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/frontend/js/main.js')}}"></script>
    @stack('js')
</body>
</html>