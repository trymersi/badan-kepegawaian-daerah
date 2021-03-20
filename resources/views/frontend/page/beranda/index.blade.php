@push('css')

@endpush

@extends('frontend.main-1')

@section('content')

<div class="site-content" style="margin-top: -30px; ">
        
    <div class="frontpage-slider-posts slider-style-two mt-30">
        <div id="frontpage-slider" class="owl-carousel frontpage-slider-three carousel-nav-align-center"> 
            @foreach($slider as $item)
            <article class="slider-item">
                <figure class="slider-thumb">  
                    <img src="{{ asset('uploads/images/gambar-slider/'.$item->gambar) }}" width="1170" height="570" alt="{{ $item->nama }}"> 
                </figure><!--./ slider-thumb -->
            </article><!--./ slider-item -->
            @endforeach
        
        </div><!--/#frontpage-slide --> 
    </div>
    
    
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
                       @foreach($berita_tajuk as $item)
                        <article class="post hentry post-grid">
                            <div class="entry-thumb">
                                <figure class="thumb-wrap">
                                    <a href="{{ url('/berita/'.$item->slug) }}">
                                        <img src="{{ asset('uploads/images/gambar-berita/thumbnail/'.$item->thumbnail) }}" alt="{{ $item->judul }}" width="370px" height="200px">
                                    </a>
                                </figure><!--./ thumb-wrap -->
                            </div><!--./ entry-thumb -->
                            <div class="content-entry-wrap">
                                <div class="entry-content">
                                    <h3 class="entry-title">
                                        <a href="{{ url('/berita/'.$item->slug) }}">{{ ucwords($item->judul) }}</a>
                                    </h3><!--./ entry-title -->
                                </div><!--./ entry-content -->
                                <div class="entry-meta-content">
                                    <div class="entry-date">
                                        <span><i class="fa fa-calendar"></i> {{ tgl_indo($item->updated_at) }} </span>
                                    </div><!--./ entry-date -->
                                    <div class="entry-date">
                                        <span><i class="fa fa-eye"></i> {{ $item->dilihat }} </span>
                                    </div><!--./ entry-date -->
                                    <div class="entry-category">
                                        <a class="cat" href="{{ url('/kategori-berita/'.$item->slug_kategori) }}">{{ $item->nama_kategori }}</a>
                                    </div><!--./ entry-category -->
                                </div><!--./ entry-meta-content -->
                            </div><!--./ content-entry-wrap -->
                        </article><!--~./ end post ~-->
                        @endforeach
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
                                @foreach($berita as $item)
                                <div class="col-lg-6">
                                    <article class="post hentry post-list post-list-small">
                                        <div class="entry-thumb">
                                            <figure class="thumb-wrap">
                                                <a href="{{ url('/berita/'.$item->slug) }}">
                                                    <img src="{{ asset('uploads/images/gambar-berita/thumbnail/'.$item->thumbnail) }}" width="140px" height="140px" alt="post">
                                                </a>
                                               
                                            </figure><!--./ thumb-wrap -->
                                        </div><!--./ entry-thumb -->
                                        <div class="content-entry-wrap">
                                            <div class="entry-content">
                                                <h3 class="entry-title">
                                                    <a href="{{ url('/berita/'.$item->slug) }}">{{ ucwords($item->judul) }}</a>
                                                </h3><!--./ entry-title -->
                                            </div><!--./ entry-content -->
                                            <div class="entry-meta-content">
                                                <div class="entry-date">
                                                    <span>{{ tgl_indo($item->updated_at) }} </span>
                                                </div><!--./ entry-date -->
                                                <div class="entry-date">
                                                    <span><i class="fa fa-eye"></i> {{ $item->dilihat }} </span>
                                                </div><!--./ entry-date -->
                                                <div class="entry-category">
                                                    <a class="cat" href="{{ url('/kategori-berita/'.$item->slug_kategori) }}">{{ $item->nama_kategori }}</a>
                                                </div><!--./ entry-category -->
                                            </div><!--./ entry-meta-content -->
                                        </div><!--./ content-entry-wrap -->
                                    </article>
                                </div><!--~./ end post ~-->
                                @endforeach
                                
                            </div>
                        </div><!--~./ end frontpage cat posts ~-->
                        
                    </main>
                    <!--~./ end site main ~-->
                    
                   
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
                       @foreach($aplikasi as $item)
                        <article class="post hentry post-grid">
                            <div class="entry-thumb">
                                <figure class="thumb-wrap">
                                    <a href="{{ $item->link }}" target="_blank">
                                        <img src="{{ asset('uploads/images/aplikasi-terkait/'.$item->gambar) }}" width="350px" height="150px" alt="post">
                                    </a>
                                </figure><!--./ thumb-wrap -->
                            </div><!--./ entry-thumb -->
                        </article><!--~./ end post ~-->
                        @endforeach
                        
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
                            <?php $i = 1; ?>
                            @foreach($galeri as $item)
                            <li>
                                <a data-toggle="tab" href="#{{ $item->slug }}" role="tab"><i class="fa fa-picture-o"></i>Galeri {{ $i }}</a>
                            </li>
                            <?php $i++; ?>
                            @endforeach
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
                                @foreach($galeri_seluruh as $item)
                                <div class="col-lg-3 col-md-6">
                                    <article class="post hentry post-grid">
                                        <div class="entry-thumb">
                                            <figure class="thumb-wrap">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/images/detail-galeri/'.$item->gambar) }}" width="370px" height="250px alt="{{ $item->nama }}">
                                                </a>
                                            </figure><!--./ thumb-wrap -->
                                        </div><!--./ entry-thumb -->
                           
                     
                                    </article>
                                </div><!--~./ end post ~-->
                                @endforeach
                            </div><br>
                        </div><!--~./ end tab pane ~-->
                        @foreach($galeri as $item)
                        <div class="tab-pane fade" id="{{ $item->slug }}" role="tabpanel">
                            <div class="row">
                                <!--~~~~~ Start Post ~~~~~-->
                                @foreach(getGaleriDetail($item->id) as $item)
                                <div class="col-lg-3 col-md-6">
                                    <article class="post hentry post-grid">
                                        <div class="entry-thumb">
                                            <figure class="thumb-wrap">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/images/detail-galeri/'.$item->gambar) }}" width="370px" height="250px" alt="{{ $item->nama }}">
                                                </a>
                                            </figure><!--./ thumb-wrap -->
                                        </div><!--./ entry-thumb -->
                           
                     
                                    </article>
                                </div><!--~./ end post ~-->
                                @endforeach
                                
                            </div><br>
                        </div><!--~./ end tab pane ~-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!--~./ end top stories block ~-->
    
    <div class="frontpage-popular-posts pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h2 class="section-title">Link BKD Kabupaten / Kota</h2>
                    </div><!--~./ end section header ~-->
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div id="bkd-terkait-carousel" class="owl-carousel carousel-nav-circle">
                        @foreach($link_terkait as $item)
                        <article class="post hentry post-grid">
                            <div class="entry-thumb">
                                <figure class="thumb-wrap">
                                    <a href="{{ $item->link }}" target="_blank">
                                        <img src="{{ asset('uploads/images/link-terkait/'.$item->gambar) }}" width="350px" height="150px" alt="{{ $item->nama }}">
                                    </a>
                                </figure><!--./ thumb-wrap -->
                            </div><!--./ entry-thumb -->
                        </article><!--~./ end post ~-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!--~./End frontpage popular posts ~-->

    <div class="video-channels-posts-block bg-blue ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tab-content filter-tab-content video-filter-tab-content">
                        <!--~~~~~ Start Tab Pane ~~~~~--> 
                        <?php $i = 0; ?>
                        @foreach($video as $item)
                        <div class="tab-pane fade  @if($i == 0) show active @endif" id="{{ $item->slug }}" role="tabpanel">
                            <div class="video-single">
                                <iframe src="https://www.youtube.com/embed/{{ getYoutubeID($item->url_video) }}" allow="fullscreen" allowfullscreen></iframe>
                            </div>
                        </div><!--~./ end tab pane ~-->
                        <?php $i++;?>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="filter-tab-area video-list">
                        <div class="section-header">
                            <h2 class="section-title">Galeri Video</h2>
                        </div><!--~./ end section header ~-->
                        
                        <div class="video-channels-inner tse-scrollable">
                            <div class="tse-content">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach($video as $item)
                                    <li>
                                        <a  data-toggle="tab" href="#{{ $item->slug }}" role="tab">
                                            <article class="post hentry post-list post-list-small">
                                                <div class="entry-thumb">
                                                    <figure class="thumb-wrap">
                                                        <img src="https://img.youtube.com/vi/{{ getYoutubeID($item->url_video) }}/1.jpg" alt="post">
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
                                                            {{ $item->nama }}
                                                        </h3><!--./ entry-title -->
                                                    </div><!--./ entry-content -->
                                                    <div class="current-play-now">
                                                        <span class="fa fa-play-circle-o"></span> Play Now
                                                    </div>
                                                    <div class="entry-meta-content">
                                                        <div class="entry-date">
                                                            <span>{{ tgl_indo($item->updated_at) }} </span>
                                                        </div><!--./ entry-date -->
                                                        <div class="entry-category">
                                                            <span># Galeri Video</span>
                                                        </div><!--./ entry-category -->
                                                    </div><!--./ entry-meta-content -->
                                                </div><!--./ content-entry-wrap -->
                                            </article> 
                                        </a>
                                    </li>
                                    @endforeach
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
  
@endsection

@push('js')

@endpush