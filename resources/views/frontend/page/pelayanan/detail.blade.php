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
                                <a href="#">{{ $detail->nama }}</a>
                            </h3><!--./ entry-title -->
                            <div class="entry-meta-content">
                                <div class="entry-meta-author">
                                    <div class="entry-author-thumb">
                                        <img class="avatar photo" src="{{ asset('uploads/images/gambar-berita/40.png') }}" alt="author">
                                    </div>
                                    <div class="entry-author-name">
                                        <a href="#">{{ $detail->nama_user }}</a>
                                    </div>
                                </div><!--./ entry-meta-author -->
                                <div class="entry-date">
                                    <span>{{ tgl_indo($detail->updated_at) }}</span>
                                </div><!--./ entry-date -->
                                <div class="entry-date">
                                    <span><i class="fa fa-eye"></i> {{ $detail->dilihat }} </span>
                                </div><!--./ entry-date -->

                                <div class="entry-category">
                                    <a class="cat" href="#">{{ $detail->nama_kategori }}</a>
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
                                        {!! $detail->keterangan !!}
                                    </div><!--entry content-->  
                                </div>
                            </div>

                            
                            
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

