<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <!-- Page Title -->
    <title>Magala - Magazine and Blog Template</title>
    
    <!---Font Icon-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css')}}">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.ico')}}">

    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css')}}">
    
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css')}}">
    
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
                                <li><a href="#"><i class="fa fa-phone"></i> 021-3823033 / </a></li>
                                <li><a href="#"><i class="fa fa-fax"></i> 021-3823033 / </a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> aliakbar@riau.go.id</a></li>
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
                                <img src="{{ asset('assets/frontend//images/logo/logo-bkd.png')}}" alt="logo">
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
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a>
                                            <ul class="dropdown-content">
                                                <li class="dropdown-trigger"><a href="#">Magazine</a>
                                                    <ul class="dropdown-content">
                                                        <li><a href="{{ url('/') }}">Magazine one</a></li>
                                                        <li><a href="index02.html">Magazine two</a></li>
                                                        <li><a href="index03.html">Magazine Three</a></li>
                                                        <li><a href="index04.html">Magazine four</a></li>
                                                        <li><a href="index05.html">Magazine five</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-trigger"><a href="#">Blog</a>
                                                    <ul class="dropdown-content">
                                                        <li><a href="index06.html">Blog one</a></li>
                                                        <li><a href="index07.html">Blog two</a></li>
                                                        <li><a href="index08.html">Blog Three</a></li>
                                                        <li><a href="index09.html">Blog four</a></li>
                                                        <li><a href="index10.html">Blog five</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> BERITA</a>
                                            <ul class="dropdown-content">
                                                <li><a href="category-standard.html">Standard Post</a></li>
                                                <li><a href="category-grid.html">Grid Post</a></li>
                                                <li><a href="category-list.html">List Post</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-university" aria-hidden="true"></i> PROFILE</a>
                                            <ul class="dropdown-content">
                                                <li><a href="category-grid.html">Business</a></li>
                                                <li><a href="category-list.html">Fashion</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-download" aria-hidden="true"></i> UNDUHAN</a>
                                            <ul class="dropdown-content">
                                                <li><a href="#">Features</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-trigger"><a href="#"><i class="fa fa-list" aria-hidden="true"></i> APPS & LAINNYA</a>
                                            <ul class="dropdown-content">
                                                <li><a href="category-standard.html">Post standard</a></li>
                                                <li><a href="category-grid.html">Post Grid Two</a></li>
                                                <li><a href="category-list.html">Post list Three</a></li>
                                                <li><a href="post-details.html">Post details One</a></li>
                                                <li><a href="post-details-two.html">Post details Two</a></li>
                                                <li><a href="post-details-three.html">Post details Three</a></li>
                                            </ul>
                                        </li>
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
                                        <form action="#">
                                            <input type="search" placeholder="Search">
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
                            <div class="bn-label">Breaking News</div>
                            <div class="bn-news">
                                <ul>
                                    <li><a href="#">Taiwanese flag on artwork painted very pretty in australia & canada <span>Politics</span></a></li>
                                    <li><a href="#">The five biggest fashion looks for next spring <span>Fashion</span></a></li>
                                    <li><a href="#">Cold skateboard an annual booking release in brazil <span>Food</span></a></li>
                                    <li><a href="#">Return of the bench seat Concept show space big for sofas<span>Lifestyle</span></a></li>
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
    <div class="site-content">
        
        <div class="frontpage-slider-posts slider-style-two mt-30">
            <div id="frontpage-slider" class="owl-carousel frontpage-slider-three carousel-nav-align-center"> 
                <article class="slider-item">
                    <figure class="slider-thumb">  
                        <img src="http://via.placeholder.com/1170x570" alt="Thmubnail"> 
                    </figure><!--./ slider-thumb -->
                </article><!--./ slider-item -->
                
                <article class="slider-item">
                    <figure class="slider-thumb">  
                        <img src="http://via.placeholder.com/1170x570" alt="Thmubnail"> 
                    </figure><!--./ slider-thumb -->
                </article><!--./ slider-item -->
                
                <article class="slider-item">
                    <figure class="slider-thumb">  
                        <img src="http://via.placeholder.com/1170x570" alt="Thmubnail"> 
                    </figure><!--./ slider-thumb -->
                </article><!--./ slider-item -->
            </div><!--/#frontpage-slide --> 
        </div>
        
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Frontpage Featured Posts
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        {{-- <div class="frontpage-featured-posts featured-style-three">
            <div id="featured-carousel-two" class="owl-carousel carousel-nav-dots">
                <!--~~~~~ Start Featured Item ~~~~~-->
                <article class="featured-item">
                    <figure class="featured-media"> 
                        <a href="#" class="featured-link"> 
                            <img src="http://via.placeholder.com/384x480" alt="Thmubnail"> 
                        </a>
                        <div class="featured-badge-list">
                            <a class="trending" href="#">
                                <span class="fab fa-gripfire"></span>
                            </a>
                        </div><!--./ featured-badge-list -->
                    </figure><!--./ featured-media -->
                    <div class="content-entry-wrap">
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <a href="post-details.html">The five biggest fashion looks for next spring</a>
                            </h3><!--./ entry-title -->
                        </div><!--./ entry-content -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>October 24, 2019</span>
                            </div><!--./ entry-date -->
                            <div class="entry-category">
                                <a class="cat" href="#">Fashion</a>
                            </div><!--./ entry-category -->
                        </div><!--./ thumb-wrap -->
                    </div><!--./ content-entry-wrap -->
                </article><!--./ end featured item -->
                
                <!--~~~~~ Start Featured Item ~~~~~-->
                <article class="featured-item">
                    <figure class="featured-media"> 
                        <a href="#" class="featured-link"> 
                            <img src="http://via.placeholder.com/384x480" alt="Thmubnail"> 
                        </a>
                    </figure><!--./ featured-media -->
                    <div class="content-entry-wrap">
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <a href="post-details.html">The rumored iPhone come in hot pink, not rose gold</a>
                            </h3><!--./ entry-title -->
                        </div><!--./ entry-content -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>October 24, 2019</span>
                            </div><!--./ entry-date -->
                            <div class="entry-category">
                                <a class="cat" href="#">Gaming</a>
                            </div><!--./ entry-category -->
                        </div><!--./ thumb-wrap -->
                    </div><!--./ content-entry-wrap -->
                </article><!--./ end featured item -->
                
                <!--~~~~~ Start Featured Item ~~~~~-->
                <article class="featured-item">
                    <figure class="featured-media"> 
                        <a href="#" class="featured-link"> 
                            <img src="http://via.placeholder.com/384x480" alt="Thmubnail"> 
                        </a>
                        <div class="featured-badge-list">
                            <a class="trending" href="#">
                                <span class="fab fa-gripfire"></span>
                            </a>
                            <a class="featured" href="#">
                                <span class="fa fa-bolt"></span>
                            </a>
                        </div><!--./ featured-badge-list -->
                    </figure><!--./ featured-media -->
                    <div class="content-entry-wrap">
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <a href="post-details.html">How to live with some vegeterian when you eat</a>
                            </h3><!--./ entry-title -->
                        </div><!--./ entry-content -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>October 24, 2019</span>
                            </div><!--./ entry-date -->
                            <div class="entry-category">
                                <a class="cat" href="#">Food</a>
                            </div><!--./ entry-category -->
                        </div><!--./ thumb-wrap -->
                    </div><!--./ content-entry-wrap -->
                </article><!--./ end featured item -->
                
                <!--~~~~~ Start Featured Item ~~~~~-->
                <article class="featured-item">
                    <figure class="featured-media"> 
                        <a href="#" class="featured-link"> 
                            <img src="http://via.placeholder.com/384x480" alt="Thmubnail"> 
                        </a>
                    </figure><!--./ featured-media -->
                    <div class="content-entry-wrap">
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <a href="post-details.html">Supreme court girds for fight over census question</a>
                            </h3><!--./ entry-title -->
                        </div><!--./ entry-content -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>October 24, 2019</span>
                            </div><!--./ entry-date -->
                            <div class="entry-category">
                                <a class="cat" href="#">Lifestyle</a>
                            </div><!--./ entry-category -->
                        </div><!--./ thumb-wrap -->
                    </div><!--./ content-entry-wrap -->
                </article><!--./ end featured item -->
                
                <!--~~~~~ Start Featured Item ~~~~~-->
                <article class="featured-item">
                    <figure class="featured-media"> 
                        <a href="#" class="featured-link"> 
                            <img src="http://via.placeholder.com/384x480" alt="Thmubnail"> 
                        </a>
                        <div class="featured-badge-list">
                            <a class="featured" href="#">
                                <span class="fa fa-bolt"></span>
                            </a>
                        </div><!--./ featured-badge-list -->
                    </figure><!--./ featured-media -->
                    <div class="content-entry-wrap">
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <a href="post-details.html">The five biggest fashion looks for next spring</a>
                            </h3><!--./ entry-title -->
                        </div><!--./ entry-content -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>October 24, 2019</span>
                            </div><!--./ entry-date -->
                            <div class="entry-category">
                                <a class="cat" href="#">Fashion</a>
                            </div><!--./ entry-category -->
                        </div><!--./ thumb-wrap -->
                    </div><!--./ content-entry-wrap -->
                </article><!--./ end featured item -->
            </div>
        </div><!--~./End frontpage featured posts ~--> --}}
        
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Main Wrapper
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="frontpage-popular-posts pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header">
                            <h2 class="section-title">Tajuk Berita</h2>
                        </div><!--~./ end section header ~-->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div id="popular-posts-carousel" class="owl-carousel carousel-nav-circle">
                           <!--~~~~~ Start Post ~~~~~-->
                            <article class="post hentry post-grid">
                                <div class="entry-thumb">
                                    <figure class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/370x370" alt="post">
                                        </a>
                                    </figure><!--./ thumb-wrap -->
                                </div><!--./ entry-thumb -->
                                <div class="content-entry-wrap">
                                    <div class="entry-content">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">The five biggest fashion looks for next spring</a>
                                        </h3><!--./ entry-title -->
                                    </div><!--./ entry-content -->
                                    <div class="entry-meta-content">
                                        <div class="entry-meta-author">
                                            <div class="entry-author-thumb">
                                                <img class="avatar photo" src="http://via.placeholder.com/40x40" alt="author">
                                            </div>
                                            <div class="entry-author-name">
                                                <a href="#">Kinda Arafa </a>
                                            </div>
                                        </div><!--./ entry-meta-author -->
                                        <div class="entry-date">
                                            <span>October 24, 2019</span>
                                        </div><!--./ entry-date -->
                                        <div class="entry-category">
                                            <a class="cat" href="#">Gaming</a>
                                        </div><!--./ entry-category -->
                                    </div><!--./ thumb-wrap -->
                                </div><!--./ content-entry-wrap -->
                            </article><!--~./ end post ~-->

                            <!--~~~~~ Start Post ~~~~~-->
                            <article class="post hentry post-grid">
                                <div class="entry-thumb">
                                    <figure class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/370x370" alt="post">
                                        </a>
                                        <div class="featured-badge-list">
                                            <a class="trending" href="#">
                                                <span class="fab fa-gripfire"></span>
                                            </a>
                                        </div><!--./ featured-badge-list -->
                                    </figure><!--./ thumb-wrap -->
                                </div><!--./ entry-thumb -->
                                <div class="content-entry-wrap">
                                    <div class="entry-content">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">Cold skateboard an annual booking release in brazil</a>
                                        </h3><!--./ entry-title -->
                                    </div><!--./ entry-content -->
                                    <div class="entry-meta-content">
                                        <div class="entry-meta-author">
                                            <div class="entry-author-thumb">
                                                <img class="avatar photo" src="http://via.placeholder.com/40x40" alt="author">
                                            </div>  
                                            <div class="entry-author-name">
                                                <a href="#">Amany Arafa</a>
                                            </div>
                                        </div><!--./ entry-meta-author -->
                                        <div class="entry-date">
                                            <span>October 24, 2019</span>
                                        </div><!--./ entry-date -->
                                        <div class="entry-category">
                                            <a class="cat" href="#">Business</a>
                                        </div><!--./ entry-category -->
                                    </div><!--./ thumb-wrap -->
                                </div><!--./ content-entry-wrap -->
                            </article><!--~./ end post ~-->
                            <!--~~~~~ Start Post ~~~~~-->
                            <article class="post hentry post-grid">
                                <div class="entry-thumb">
                                    <figure class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/370x370" alt="post">
                                        </a>
                                        <div class="featured-badge-list">
                                            <a class="featured" href="#">
                                                <span class="fa fa-bolt"></span>
                                            </a>
                                        </div><!--./ featured-badge-list -->
                                    </figure><!--./ thumb-wrap -->
                                </div><!--./ entry-thumb -->
                                
                            </article><!--~./ end post ~-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--~./End frontpage popular posts ~-->

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Main Wrapper
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="main-wrapper ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--~~~~~ Start Site Main ~~~~~-->
                        <main class="site-main">
                            <!--~~~~~ Start Frontpage Cat Posts ~~~~~-->
                            <div class="frontpage-cat-posts pb-80">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="section-header">
                                            <h2 class="section-title">Berita Terbaru</h2>
                                        </div>
                                    </div>
                                </div><!--~./ end section header ~-->
                                
                                <div class="row">
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/140x140" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="featured" href="#">
                                                            <span class="fa fa-bolt"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="post-details.html">The rumored iPhone could come in hot pink, not rose gold and silver</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-date">
                                                        <span>July 24, 2019 </span>
                                                    </div><!--./ entry-date -->
                                                    <div class="entry-category">
                                                        <a class="cat" href="#">LifeStyle</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/140x140" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="trending" href="#">
                                                            <span class="fab fa-gripfire"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="post-details.html">This gun is advertised as the most popular gun in American crime</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-date">
                                                        <span>July 24, 2019 </span>
                                                    </div><!--./ entry-date -->
                                                    <div class="entry-category">
                                                        <a class="cat" href="#">Fashion</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/140x140" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="post-details.html">How to live with some vegeterian when you eat barbecue meat</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-date">
                                                        <span>July 24, 2019 </span>
                                                    </div><!--./ entry-date -->
                                                    <div class="entry-category">
                                                        <a class="cat" href="#">Business</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/140x140" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="post-details.html">The rumored iPhone could come in hot pink, not rose gold and silver</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-date">
                                                        <span>July 24, 2019 </span>
                                                    </div><!--./ entry-date -->
                                                    <div class="entry-category">
                                                        <a class="cat" href="#">LifeStyle</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/140x140" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="trending" href="#">
                                                            <span class="fab fa-gripfire"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="post-details.html">This gun is advertised as the most popular gun in American crime</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-date">
                                                        <span>July 24, 2019 </span>
                                                    </div><!--./ entry-date -->
                                                    <div class="entry-category">
                                                        <a class="cat" href="#">Fashion</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/140x140" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="post-details.html">How to live with some vegeterian when you eat barbecue meat</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-date">
                                                        <span>July 24, 2019 </span>
                                                    </div><!--./ entry-date -->
                                                    <div class="entry-category">
                                                        <a class="cat" href="#">LifeStyle</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article><!--~./ end post ~-->
                                    </div><!--~./ end post ~-->
                                </div>
                            </div><!--~./ end frontpage cat posts ~-->
                            
                        </main>
                        <!--~./ end site main ~-->
                        
                        <!--~~~~~ Load More Area ~~~~~-->
                        <div class="load-more-area text-center mt-60">
                            <button class="btn btn-load-more loadmore">
                                <i class="fa fa-spinner"></i>
                                Load More
                            </button><!--/#loadmore-->
                            <span class="no-posts">No more posts</span>
                        </div><!--/.load-more-area-->
                    </div>

                </div>
            </div>
        </div><!--~./ end main wrapper ~-->

        <div class="frontpage-popular-posts pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header">
                            <h2 class="section-title">Aplikasi Terkait</h2>
                        </div><!--~./ end section header ~-->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div id="aplikasi-terkait-carousel" class="owl-carousel carousel-nav-circle">
                           <!--~~~~~ Start Post ~~~~~-->
                            <article class="post hentry post-grid">
                                <div class="entry-thumb">
                                    <figure class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/350x150" alt="post">
                                        </a>
                                    </figure><!--./ thumb-wrap -->
                                </div><!--./ entry-thumb -->
                            </article><!--~./ end post ~-->

                            <!--~~~~~ Start Post ~~~~~-->
                            <article class="post hentry post-grid">
                                <div class="entry-thumb">
                                    <figure class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/350x150" alt="post">
                                        </a>
                                        <div class="featured-badge-list">
                                            <a class="trending" href="#">
                                                <span class="fab fa-gripfire"></span>
                                            </a>
                                        </div><!--./ featured-badge-list -->
                                    </figure><!--./ thumb-wrap -->
                                </div><!--./ entry-thumb -->
                            </article><!--~./ end post ~-->
                            <!--~~~~~ Start Post ~~~~~-->
                            <article class="post hentry post-grid">
                                <div class="entry-thumb">
                                    <figure class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/350x150" alt="post">
                                        </a>
                                        <div class="featured-badge-list">
                                            <a class="featured" href="#">
                                                <span class="fa fa-bolt"></span>
                                            </a>
                                        </div><!--./ featured-badge-list -->
                                    </figure><!--./ thumb-wrap -->
                                </div><!--./ entry-thumb -->

                            </article><!--~./ end post ~-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--~./End frontpage popular posts ~-->

        <div class="top-stories-block style-two ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="section-header">
                            <h2 class="section-title">Galeri Foto</h2>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="filter-tab-area">
                            <ul class="nav nav-tabs" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#semua" role="tab"><i class="fa fa-list"></i>Semua</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#pelantikan" role="tab"><i class="fa fa-picture-o"></i>Pelantikan</a>
                                </li>
                            </ul>
                        </div><!--~./ end filter tab area ~-->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content filter-tab-content">
                            <!--~~~~~ Start Tab Pane ~~~~~--> 

                            <div class="tab-pane fade show active" id="semua" role="tabpanel">
                                <div class="row">
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="trending" href="#">
                                                            <span class="fab fa-gripfire"></span>
                                                        </a>
                                                        <a class="featured" href="#">
                                                            <span class="fa fa-bolt"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                               
                         
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="featured" href="#">
                                                            <span class="fa fa-bolt"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                 
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                         
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="trending" href="#">
                                                            <span class="fab fa-gripfire"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                          
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                        
                                        </article>
                                    </div><!--~./ end post ~-->
                                </div><br>
                            </div><!--~./ end tab pane ~-->

                            <div class="tab-pane fade" id="pelantikan" role="tabpanel">
                                <div class="row">
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="trending" href="#">
                                                            <span class="fab fa-gripfire"></span>
                                                        </a>
                                                        <a class="featured" href="#">
                                                            <span class="fa fa-bolt"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                               
                         
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="featured" href="#">
                                                            <span class="fa fa-bolt"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                 
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                         
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                    <div class="featured-badge-list">
                                                        <a class="trending" href="#">
                                                            <span class="fab fa-gripfire"></span>
                                                        </a>
                                                    </div><!--./ featured-badge-list -->
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                          
                                        </article>
                                    </div><!--~./ end post ~-->

                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-lg-3 col-md-6">
                                        <article class="post hentry post-grid">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="post-details.html">
                                                        <img src="http://via.placeholder.com/370x370" alt="post">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                        
                                        </article>
                                    </div><!--~./ end post ~-->
                                </div><br>
                            </div><!--~./ end tab pane ~-->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div><!--~./ end top stories block ~-->
        
        <div class="video-channels-posts-block bg-blue ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="tab-content filter-tab-content video-filter-tab-content">
                            <!--~~~~~ Start Tab Pane ~~~~~--> 
                            <div class="tab-pane fade show active" id="video_post_one" role="tabpanel">
                                <div class="video-single">
                                    <iframe src="https://domainsultan.xyz/video/vid/12t8UV4cNrHT6JeAKVWLKX3E26JO0UXIW.mp4" allow="fullscreen" allowfullscreen></iframe>
                                </div>
                            </div><!--~./ end tab pane ~-->

                            <!--~~~~~ Start Tab Pane ~~~~~--> 
                            <div class="tab-pane fade" id="video_post_two" role="tabpanel">
                                <div class="video-single">
                                    <iframe src="https://domainsultan.xyz/video/vid/12t8UV4cNrHT6JeAKVWLKX3E26JO0UXIW.mp4" allow="fullscreen" allowfullscreen></iframe>
                                </div>
                            </div><!--~./ end tab pane ~-->

                            <!--~~~~~ Start Tab Pane ~~~~~--> 
                            <div class="tab-pane fade" id="video_post_three" role="tabpanel">
                                <div class="video-single">
                                    <iframe src="https://domainsultan.xyz/video/vid/12t8UV4cNrHT6JeAKVWLKX3E26JO0UXIW.mp4" allow="fullscreen" allowfullscreen></iframe>
                                </div>
                            </div><!--~./ end tab pane ~-->

                            <!--~~~~~ Start Tab Pane ~~~~~--> 
                            <div class="tab-pane fade" id="video_post_four" role="tabpanel">
                                <div class="video-single">
                                    <iframe src="https://domainsultan.xyz/video/vid/12t8UV4cNrHT6JeAKVWLKX3E26JO0UXIW.mp4" allow="fullscreen" allowfullscreen></iframe>
                                </div>
                            </div><!--~./ end tab pane ~-->
                        </div>

                    </div>
                    <div class="col-lg-5">
                        <div class="filter-tab-area video-list">
                            <div class="section-header">
                                <h2 class="section-title">Video Channels</h2>
                            </div><!--~./ end section header ~-->
                            
                            <div class="video-channels-inner tse-scrollable">
                                <div class="tse-content">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#video_post_one" role="tab">
                                                <article class="post hentry post-list post-list-small">
                                                    <div class="entry-thumb">
                                                        <figure class="thumb-wrap">
                                                            <img src="http://via.placeholder.com/140x140" alt="post">
                                                        </figure><!--./ thumb-wrap -->
                                                        <div class="play-now-overlay">
                                                            <div class="play-now-overlay-inner">        
                                                                <i class="fa fa-play"></i>
                                                                <span>play now</span>
                                                            </div>
                                                        </div>
                                                    </div><!--./ entry-thumb -->
                                                    <div class="content-entry-wrap">
                                                        <div class="entry-content">
                                                            <h3 class="entry-title">
                                                                This gun is advertised as the most popular gun in American crime
                                                            </h3><!--./ entry-title -->
                                                        </div><!--./ entry-content -->
                                                        <div class="current-play-now">
                                                            <span class="fa fa-play-circle-o"></span> Play Now
                                                        </div>
                                                        <div class="entry-meta-content">
                                                            <div class="entry-date">
                                                                <span>July 24, 2019 </span>
                                                            </div><!--./ entry-date -->
                                                            <div class="entry-category">
                                                                <span># Food</span>
                                                            </div><!--./ entry-category -->
                                                        </div><!--./ entry-meta-content -->
                                                    </div><!--./ content-entry-wrap -->
                                                </article> 
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#video_post_two" role="tab">
                                                <article class="post hentry post-list post-list-small">
                                                    <div class="entry-thumb">
                                                        <figure class="thumb-wrap">
                                                            <img src="http://via.placeholder.com/140x140" alt="post">
                                                        </figure><!--./ thumb-wrap -->
                                                        <div class="play-now-overlay">
                                                            <div class="play-now-overlay-inner">        
                                                                <i class="fa fa-play"></i>
                                                                <span>play now</span>
                                                            </div>
                                                        </div>
                                                    </div><!--./ entry-thumb -->
                                                    <div class="content-entry-wrap">
                                                        <div class="entry-content">
                                                            <h3 class="entry-title">
                                                                The rumored iPhone could come in hot pink, not rose gold and silver
                                                            </h3><!--./ entry-title -->
                                                        </div><!--./ entry-content -->
                                                        <div class="current-play-now">
                                                            <span class="fa fa-play-circle-o"></span> Play Now
                                                        </div>
                                                        <div class="entry-meta-content">
                                                            <div class="entry-date">
                                                                <span>July 24, 2019 </span>
                                                            </div><!--./ entry-date -->
                                                            <div class="entry-category">
                                                                <span># Food</span>
                                                            </div><!--./ entry-category -->
                                                        </div><!--./ entry-meta-content -->
                                                    </div><!--./ content-entry-wrap -->
                                                </article>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#video_post_three" role="tab">
                                                <article class="post hentry post-list post-list-small">
                                                    <div class="entry-thumb">
                                                        <figure class="thumb-wrap">
                                                            <img src="http://via.placeholder.com/140x140" alt="post">
                                                        </figure><!--./ thumb-wrap -->
                                                        <div class="play-now-overlay">
                                                            <div class="play-now-overlay-inner">        
                                                                <i class="fa fa-play"></i>
                                                                <span>play now</span>
                                                            </div>
                                                        </div>
                                                    </div><!--./ entry-thumb -->
                                                    <div class="content-entry-wrap">
                                                        <div class="entry-content">
                                                            <h3 class="entry-title">
                                                                How to live with some vegeterian when you eat barbecue meat
                                                            </h3><!--./ entry-title -->
                                                        </div><!--./ entry-content -->
                                                        <div class="current-play-now">
                                                            <span class="fa fa-play-circle-o"></span> Play Now
                                                        </div>
                                                        <div class="entry-meta-content">
                                                            <div class="entry-date">
                                                                <span>July 24, 2019 </span>
                                                            </div><!--./ entry-date -->
                                                            <div class="entry-category">
                                                                <span># Gameing</span>
                                                            </div><!--./ entry-category -->
                                                        </div><!--./ entry-meta-content -->
                                                    </div><!--./ content-entry-wrap -->
                                                </article>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#video_post_four" role="tab">
                                                <article class="post hentry post-list post-list-small">
                                                    <div class="entry-thumb">
                                                        <figure class="thumb-wrap">
                                                            <img src="http://via.placeholder.com/140x140" alt="post">
                                                        </figure><!--./ thumb-wrap -->
                                                        <div class="play-now-overlay">
                                                            <div class="play-now-overlay-inner">        
                                                                <i class="fa fa-play"></i>
                                                                <span>play now</span>
                                                            </div>
                                                        </div>
                                                    </div><!--./ entry-thumb -->
                                                    <div class="content-entry-wrap">
                                                        <div class="entry-content">
                                                            <h3 class="entry-title">
                                                                The rumored iPhone could come in hot pink, not rose gold and silver
                                                            </h3><!--./ entry-title -->
                                                        </div><!--./ entry-content -->
                                                        <div class="current-play-now">
                                                            <span class="fa fa-play-circle-o"></span> Play Now
                                                        </div>
                                                        <div class="entry-meta-content">
                                                            <div class="entry-date">
                                                                <span>July 24, 2019 </span>
                                                            </div><!--./ entry-date -->
                                                            <div class="entry-category">
                                                                <span># Food</span>
                                                            </div><!--./ entry-category -->
                                                        </div><!--./ entry-meta-content -->
                                                    </div><!--./ content-entry-wrap -->
                                                </article>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--~./ video-list-inner ~-->
                        </div><!--~./ end filter tab area ~-->
                    </div>
                </div>
            </div>
        </div><!--~./ end video channels posts block ~-->
        
    </div>
    <!-- End site content --> 
      
    
    <!--********************************************************-->
    <!--****************** MAGALA SIDE SIDEBAR *****************-->
    <!--********************************************************-->
    <div class="magala-side-sidebar tse-scrollable">
        <div class="tse-content">
            <a href="#" class="sidebar-close-button" tabindex="0"><i class="fa fa-close"></i></a>
            <div class="sidebar">
                <!--~~~~~ Start Popular Posts Widget~~~~~-->
                <aside class="widget popular-posts-widget">
                    <h4 class="widget-title"><span>Recent Post</span></h4>
                    <div class="widget-content">
                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">1</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">The rumored iPhone could come in hot pink</a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->

                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">2</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">This gun is advertise as the most popular gun</a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->

                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">3</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">How to live with some vegeterian when you eat </a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->
                        
                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">4</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">The rumored iPhone could come in hot pink</a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->

                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">5</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">This gun is advertise as the most popular gun</a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->

                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">6</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">How to live with some vegeterian when you eat </a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->
                        
                        <article class="post side-post">
                            <div class="thumb-wrap">
                                <a href="post-details.html">
                                    <img src="http://via.placeholder.com/100x100" alt="post">
                                </a>
                                <span class="count">7</span>
                            </div><!--./ thumb-wrap -->
                            <div class="content-entry-wrap">
                                <h3 class="entry-title">
                                    <a href="post-details.html">The rumored iPhone could come in hot pink</a>
                                </h3><!--./ entry-title -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span>July 24, 2019 </span>
                                    </div><!--./ entry-date -->
                                </div><!--./ entry-meta-content -->
                            </div>
                        </article><!--./ end post -->
                    </div>
                </aside><!--~./ end popular posts widget ~-->
            </div>
        </div>
    </div>
    <div class="magala-close-all-window"></div>
    <!--~./ end magala side sidebar ~-->
    
    
    <!--********************************************************-->
    <!--********************** SITE FOOTER *********************-->
    <!--********************************************************-->
    <footer class="site-footer footer-default-style bg-black pt-80">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Footer Widget Area
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="footer-widget-area pb-20">
            <div class="container">
                <div class="row">
                    <!--~~~~~ Start Widget About us Info ~~~~~--> 
                    <div class="col-lg-3">
                        <aside class="widget bt-about-us-widget">
                            <div class="widget-content">
                                <div class="about-logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend//images/logo/logo-bkd.png')}}" alt="Logo-footer-bkd-provinsi-riau"></a>
                                </div>
                                <p>BADAN KEPEGAWAIAN DAERAH PROVINSI RIAU</p>
                                <ul class="social-share">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </aside>
                    </div><!--~./ end about us widget ~-->
                    
                    <!--~~~~~ Start Latest Posts Widget~~~~~-->
                    <div class="col-lg-3">
                        <aside class="widget latest-posts-widget latest-posts-widget-two">
                            <h4 class="widget-title">Tentang Kami</h4>
                            <div class="widget-content">
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">The rumored been iPhone could in hot pink not rose</a>
                                        </h3><!--./ entry-title -->
                                        <div class="entry-meta-content">
                                            <div class="entry-date">
                                                <span>July 24, 2019 </span>
                                            </div><!--./ entry-date -->
                                        </div><!--./ entry-meta-content -->
                                    </div><!--./ content-entry-wrap -->
                                    <div class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/100x100" alt="post">
                                        </a>
                                    </div><!--./ thumb-wrap -->
                                </article><!--./ end post -->
                                
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">This gun is advertise as the most popular gun</a>
                                        </h3><!--./ entry-title -->
                                        <div class="entry-meta-content">
                                            <div class="entry-date">
                                                <span>July 24, 2019 </span>
                                            </div><!--./ entry-date -->
                                        </div><!--./ entry-meta-content -->
                                    </div><!--./ content-entry-wrap -->
                                    <div class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/100x100" alt="post">
                                        </a>
                                    </div><!--./ thumb-wrap -->
                                </article><!--./ end post -->
                            </div>
                        </aside>
                    </div><!--~./ end latest posts widget ~-->
                    
                    <!--~~~~~ Start Latest Posts Widget~~~~~-->
                    <div class="col-lg-3">
                        <aside class="widget latest-posts-widget latest-posts-widget-two">
                            <h4 class="widget-title">Unduhan</h4>
                            <div class="widget-content">
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">This gun is advertise as the most popular gun</a>
                                        </h3><!--./ entry-title -->
                                        <div class="entry-meta-content">
                                            <div class="entry-date">
                                                <span>July 24, 2019 </span>
                                            </div><!--./ entry-date -->
                                        </div><!--./ entry-meta-content -->
                                    </div><!--./ content-entry-wrap -->
                                    <div class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/100x100" alt="post">
                                        </a>
                                    </div><!--./ thumb-wrap -->
                                </article><!--./ end post -->
                                
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">The rumored been iPhone could in hot pink not rose</a>
                                        </h3><!--./ entry-title -->
                                        <div class="entry-meta-content">
                                            <div class="entry-date">
                                                <span>July 24, 2019 </span>
                                            </div><!--./ entry-date -->
                                        </div><!--./ entry-meta-content -->
                                    </div><!--./ content-entry-wrap -->
                                    <div class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/100x100" alt="post">
                                        </a>
                                    </div><!--./ thumb-wrap -->
                                </article><!--./ end post -->
                            </div>
                        </aside>
                    </div><!--~./ end latest posts widget ~-->
                    
                    <!--~~~~~ Start Subscribe Widget~~~~~-->
                        <!--~~~~~ Start Latest Posts Widget~~~~~-->
                        <div class="col-lg-3">
                        <aside class="widget latest-posts-widget latest-posts-widget-two">
                            <h4 class="widget-title">Berita</h4>
                            <div class="widget-content">
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">This gun is advertise as the most popular gun</a>
                                        </h3><!--./ entry-title -->
                                        <div class="entry-meta-content">
                                            <div class="entry-date">
                                                <span>July 24, 2019 </span>
                                            </div><!--./ entry-date -->
                                        </div><!--./ entry-meta-content -->
                                    </div><!--./ content-entry-wrap -->
                                    <div class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/100x100" alt="post">
                                        </a>
                                    </div><!--./ thumb-wrap -->
                                </article><!--./ end post -->
                                
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="post-details.html">The rumored been iPhone could in hot pink not rose</a>
                                        </h3><!--./ entry-title -->
                                        <div class="entry-meta-content">
                                            <div class="entry-date">
                                                <span>July 24, 2019 </span>
                                            </div><!--./ entry-date -->
                                        </div><!--./ entry-meta-content -->
                                    </div><!--./ content-entry-wrap -->
                                    <div class="thumb-wrap">
                                        <a href="post-details.html">
                                            <img src="http://via.placeholder.com/100x100" alt="post">
                                        </a>
                                    </div><!--./ thumb-wrap -->
                                </article><!--./ end post -->
                            </div>
                        </aside>
                    </div><!--~./ end latest posts widget ~-->
                </div>
            </div>
        </div>
        <!--~./ end footer widgets area ~-->
        
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Footer Bottom Area
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-text">
                            <p>Badan Kepegawaian Daerah Provinsi Riau. © Tahun 2020</p>
                        </div>
                    </div><!--~./ end copyright ~-->
                    <div class="col-lg-6  col-md-6">
                        <div class="footer-menu">
                            <ul class="list">
                                <li><a href="#">Hubungi Kami</a></li>
                                <!-- <li><a href="#">Private Policy</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Use Of Terms</a></li> -->
                            </ul>
                        </div><!--~./ end footer menu ~-->
                    </div>
                </div>
            </div>
        </div>
        <!--~./ end footer bottom area ~-->
    </footer>
    <!--~./ end site footer ~-->
    
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
</body>
</html>