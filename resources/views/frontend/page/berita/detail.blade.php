@push('css')

@endpush

@extends('frontend.main-1')

@section('content')


<div class="site-content">
    <div class="single-post-three pt-60" style="margin-bottom: -100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="post-header single-post-header">
                        <div class="content-entry-wrap">
                            <h3 class="entry-title">
                                <a href="#">{{ $detail_berita->judul }}</a>
                            </h3><!--./ entry-title -->
                            <div class="entry-meta-content">
                                <div class="entry-meta-author">
                                    <div class="entry-author-thumb">
                                        <img class="avatar photo" src="{{ asset('uploads/images/gambar-berita/40.png') }}" alt="author">
                                    </div>
                                    <div class="entry-author-name">
                                        <a href="#">{{ $detail_berita->nama_user }}</a>
                                    </div>
                                </div><!--./ entry-meta-author -->
                                <div class="entry-date">
                                    <span>{{ tgl_indo($detail_berita->updated_at) }}</span>
                                </div><!--./ entry-date -->
                                <div class="entry-date">
                                    <span><i class="fa fa-eye"></i> {{ $detail_berita->dilihat }} </span>
                                </div><!--./ entry-date -->

                                <div class="entry-category">
                                    <a class="cat" href="{{ ('/kategori-berita/'.$detail_berita->slug_kategori) }}">{{ $detail_berita->nama_kategori }}</a>
                                </div><!--./ entry-category -->
                            </div><!--./ entry-meta-content -->
                        </div><!--./ content-entry-wrap -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Main Wrapper
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="main-wrapper ptb-80 style-two">
        <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!--~~~~~ Start Site Main ~~~~~-->
                        <main class="site-main">
                            <div class="post single-post single-post-three">
                                <div class="single-post-content">
                                    <div class="post-share-area">
                                        <h3>221<span>SHARES</span></h3>
                                        <div class="share">
                                            <a class="facebook" href="#">
                                                <span class="fa fa-facebook"></span>
                                                <span class="text">SHARE POST</span>
                                            </a>
                                            <a class="twitter" href="#">
                                                <span class="fa fa-twitter"></span>
                                                <span class="text">TWEET POST</span>
                                            </a>
                                            <a class="google" href="#">
                                                <span class="fa fa-google-plus"></span>
                                                <span class="text">SHARE POST</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="entry-content">
                                        {!! $detail_berita->konten !!}
                                    </div><!--entry content-->  
                                    @if(count($unduhan) > 0)
                                    {{-- <blockquote>
                                        <img src="{{ asset('assets/frontend/images/icon/quote.png') }}" alt="icon">
                                        <p>Data Dokumen Terkait</p>
                                    </blockquote> --}}
                                    <div class="table-responsive">
                                        <table id="tabel" class="styled-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA DOKUMEN</th>
                                                    <th>KETERANGAN / TENTANG</th>
                                                    <th width="15%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($unduhan as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td width="15%">
                                                        {{-- <a href="{{ asset('/uploads/unduhan/'.$item->file) }}" target="_blank" class="btn"><i class="fa fa-download" aria-hidden="true"></i> Unduh</a> --}}
                                                        <div class="dlbutton">
                                                            <a href="{{ asset('/uploads/unduhan/'.$item->file) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Unduh</a><br />
                                                            <div class="slide top">File Unduhan</div>
                                                            {{-- <div class="slide bottom">Size : 40 MB</div> --}}
                                                            </div>
                                                    </td>
                                                </tr>
                                                <?php $i++;?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="width:100%">
                                        <?php $i = 1; ?>
                                        @foreach($unduhan as $item)
                                        <div class="wrap-collabsible">
                                                <input id="collapsible{{ $i }}" class="toggle" type="checkbox">
                                                <label for="collapsible{{ $i }}" class="lbl-toggle">{{ $item->nama }}</label>
                                                <div class="collapsible-content"><div class="content-inner">
                                                    <p>
                                                        <embed height="990px" src="{{ asset('/uploads/unduhan/'.$item->file) }}" width="100%">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++;?>
                                        @endforeach
                                    </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!--~~~~~ Start post Navigation ~~~~~--> 
                            <nav class="post-navigation mb-80">
                                @if(isset($sebelum))
                                <div class="post-previou    s bg-image bg-overlay" style="background-image:url({{ asset('/uploads/images/gambar-berita/'.$sebelum->thumbnail) }});width:430px;height:185px;">
                                    <a rel="prev" href="{{ url('/berita/'.$sebelum->slug) }}">
                                        <span class="label">Berita Sebelumnya</span>
                                        <h3>{{ $sebelum->judul }}</h3>
                                    </a>
                                </div>
                                @endif
                                @if(isset($sesudah))
                                <div class="post-next active bg-image bg-overlay" style="background-image:url({{ asset('/uploads/images/gambar-berita/'.$sesudah->thumbnail) }});width:430px;height:185px;">
                                    <a rel="prev" href="{{ url('/berita/'.$sesudah->slug) }}">
                                        <span class="label">Berita Seterusnya</span>
                                        <h3>{{ $sesudah->judul }}</h3>
                                    </a>
                                </div>  
                                @endif     
                            </nav><!--~./ end post navigation ~-->

                            <!--~~~~~ Start Author Info ~~~~~--> 
                           
                            @if(count($kategori_related) != 0)
                            <!--~~~~~ Start Related Category Post ~~~~~--> 
                            <div class="related-category-post">
                                <h3 class="headline">Berita Lainnya Dari {{ $category_name }}</h3>
                                <div class="row">
                                    <!--~~~~~ Start Post ~~~~~-->
                                    @foreach($kategori_related as $item)
                                    <div class="col-lg-6">
                                        <article class="post hentry post-list post-list-small">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="{{ url('/berita/'.$item->slug) }}">
                                                        <img width="100px" height="100px" src="{{ asset('uploads/images/gambar-berita/'.$item->thumbnail) }}" alt="{{ $item->judul }}">
                                                    </a>
                                                </figure><!--./ thumb-wrap -->
                                            </div><!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-content">
                                                    <h3 class="entry-title">
                                                        <a href="{{ url('/berita/'.$item->slug) }}">{{ $item->judul }}</a>
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
                            </div><!--~./ end related category post ~-->
                            @endif
                            <!--~~~~~ Start Add Banner ~~~~~--> 
                            {{-- <div class="add-banner bg-gray">           
                                <div class="add-content text-center ptb-20">
                                    <a title="add" href="#">
                                        <img src="http://via.placeholder.com/728x90" alt="add">
                                    </a>
                                </div>
                            </div><!--~./ end add banner ~--> --}}

                            @if(count($berita_related) != 0)
                            <!--~~~~~ Start Related Post ~~~~~--> 
                            <div class="related-post pt-80 mb-30">
                                <h3 class="headline">Berita Lainnya</h3>
                                <div class="row">
                                    @foreach($berita_related as $item)
                                    <!--~~~~~ Start Post ~~~~~-->
                                    <div class="col-12">
                                        <article class="post hentry post-list">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a href="{{ url('/berita/'.$item->slug) }}">
                                                        <img src="{{ asset('uploads/images/gambar-berita/'.$item->thumbnail) }}" width="270px" height="220px" alt="post">
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
                                                        <a href="{{ url('/berita/'.$item->slug) }}">{{ $item->judul }}</a>
                                                    </h3><!--./ entry-title -->
                                                </div><!--./ entry-content -->
                                                <div class="entry-meta-content">
                                                    <div class="entry-meta-author">
                                                        <div class="entry-author-thumb">
                                                            <img class="avatar photo" src="{{ asset('uploads/images/gambar-berita/40.png') }}" alt="author">
                                                        </div>
                                                        <div class="entry-author-name">
                                                            <a href="#">{{ $item->nama_user }}</a>
                                                        </div>
                                                    </div><!--./ entry-meta-author -->
                                                    <div class="entry-date">
                                                        <span>{{ tgl_indo($item->updated_at) }}</span>
                                                    </div><!--./ entry-date -->
                                                   
                                                    <div class="entry-category">
                                                        <a class="cat" href="{{ url('/kategori-berita/'.$item->slug_kategori) }}">{{ $item->nama_kategori }}</a>
                                                    </div><!--./ entry-category -->
                                                </div><!--./ entry-meta-content -->
                                                <div class="entry-summary">
                                                    <p>{!! $item->meta_deskripsi !!}</p>
                                                </div>
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    @endforeach
                                   
                                </div> <!-- /.row -->    
                            </div> <!--~./ end related post ~-->
                            @endif
                            <!--~~~~~ Start Comments Area ~~~~~-->
                            
                        </main>
                        <!--~./ end site main ~-->
                    </div>

                    <!--~~~~~ Start sidebar ~~~~~-->
                    @include('frontend.include.sidebar')
                </div>
            </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection
@push('css')
<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #145A32;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #145A32;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #F4D03F;
}
input[type='checkbox'] { display: none; } 
.wrap-collabsible { margin: 1.2rem 0; } 
.lbl-toggle { 
    display: block; 
    font-weight: bold; 
    font-family: monospace; 
    font-size: 1.2rem; 
    text-transform: uppercase; 
    text-align: center; 
    padding: 1rem; 
    color: #DDD; 
    background: #1A5276; 
    cursor: pointer; 
    border-radius: 7px; 
    transition: all 0.25s ease-out; }
    .lbl-toggle:hover { color: #FFF; }
    .lbl-toggle::before {
        content: ' ';
        display: inline-block;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
        border-left: 5px solid currentColor;
        vertical-align: middle; margin-right: .7rem;
        transform: translateY(-2px);
        transition: transform .2s ease-out; }
        .toggle:checked+.lbl-toggle::before { 
            transform: rotate(90deg) translateX(-3px); 
            } 
            .collapsible-content { 
                max-height: 0px; 
                overflow: hidden; 
                transition: max-height .25s ease-in-out; 
                } 
                .toggle:checked + .lbl-toggle + .collapsible-content { max-height: 350px; } 
                .toggle:checked+.lbl-toggle { border-bottom-right-radius: 0; border-bottom-left-radius: 0; } 
                .collapsible-content .content-inner { 
                    background: rgba(51, 102, 153); 
                    border-bottom: 1px solid rgba(51, 102, 153); 
                    border-bottom-left-radius: 7px; 
                    border-bottom-right-radius: 7px; 
                    padding: .5rem 1rem; } 
.collapsible-content p { margin-bottom: 0; }
/* DOWNLOAD BUTTON */
.dlbutton br {display: none !important;}
.dlbutton {
margin: 0px auto;
width: 200px;
position: relative;
z-index: 1;
}
.dlbutton a {
color: white !important;
display: block;
width: 200px;
height: 50px;
background: #145A32;
text-align: center;
text-decoration: none;
text-transform: uppercase;
font: 17px/50px Helvetica, Verdana, sans-serif;
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=&amp;amp;#39;#00b7ea&amp;amp;#39;, endColorstr=&amp;amp;#39;#009ec3&amp;amp;#39;,GradientType=0 );
}
.dlbutton a, .slide {
-webkit-box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
-moz-box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
}
.slide {
position: absolute;
z-index: -1;
display: block;
margin: -50px 0 0 10px;
width: 180px;
height: 40px;
background: #444;
color: #fff;
text-align: center;
font: 12px/45px Helvetica, Verdana, sans-serif;
-webkit-transition: margin 0.5s ease;
-moz-transition: margin 0.5s ease;
-ms-transition: margin 0.5s ease;
-o-transition: margin 0.5s ease;
transition: margin 0.5s ease;
}
.dlbutton:hover .bottom {
margin: -10px 0 0 10px;
}
.dlbutton:hover .top {
margin: -80px 0 0 10px;
line-height: 35px;
}
.dlbutton a:active {
background: #145A32;
background: -moz-linear-gradient(top,  #145A32 36%, #145A32 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(36%,#145A32), color-stop(100%,#145A32));
background: -webkit-linear-gradient(top,  #145A32 36%,#145A32 100%);
background: -o-linear-gradient(top,  #145A32 36%,#145A32 100%);
background: -ms-linear-gradient(top,  #145A32 36%,#145A32 100%);
background: linear-gradient(top,  #145A32 36%,#145A32 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=&amp;amp;#39;#00695C&amp;amp;#39;, endColorstr=&amp;amp;#39;black&amp;amp;#39;,GradientType=0 );
}
.dlbutton:active .bottom {
margin: -20px 0 0 10px;
}
.dlbutton:active .top {
margin: -70px 0 0 10px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
@endpush

@push('js')
@endpush

