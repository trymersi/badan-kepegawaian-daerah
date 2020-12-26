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
                                        <img class="avatar photo" src="http://via.placeholder.com/40x40" alt="author">
                                    </div>
                                    <div class="entry-author-name">
                                        <a href="#">{{ $detail_berita->nama_user }}</a>
                                    </div>
                                </div><!--./ entry-meta-author -->
                                <div class="entry-date">
                                    <span>{{ tgl_indo($detail_berita->updated_at) }}</span>
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
                                    <blockquote>
                                        <img src="{{ asset('assets/frontend/images/icon/quote.png') }}" alt="icon">
                                        <p>Data Dokumen Terkait</p>
                                    </blockquote>
                                    <div class="table-responsive">
                                        <table id="tabel" class="tabel table table-striped display" style="width:100%">
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
                                                    <td width="15%"><a href="{{ asset('/uploads/unduhan/'.$item->file) }}" target="_blank" class=""><i class="fa fa-download" aria-hidden="true"></i> Unduh</a></td>
                                                </tr>
                                                <?php $i++;?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                      </div>
                                    @endif
                                </div>
                            </div>

                            <!--~~~~~ Start post Navigation ~~~~~--> 
                            <nav class="post-navigation mb-80">
                                @if(isset($sebelum))
                                <div class="post-previous bg-image bg-overlay" style="background-image:url({{ asset('/uploads/images/gambar-berita/'.$sebelum->thumbnail) }});width:430px;height:185px;">
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
                                                </div><!--./ entry-meta-content -->
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    @endforeach
                                </div>
                            </div><!--~./ end related category post ~-->

                            <!--~~~~~ Start Add Banner ~~~~~--> 
                            <div class="add-banner bg-gray">           
                                <div class="add-content text-center ptb-20">
                                    <a title="add" href="#">
                                        <img src="http://via.placeholder.com/728x90" alt="add">
                                    </a>
                                </div>
                            </div><!--~./ end add banner ~-->

                            <!--~~~~~ Start Related Post ~~~~~--> 
                            <div class="related-post pt-80 mb-30">
                                <h3 class="headline">Berita Lainnya</h3>
                                <div class="row">
                                    @foreach($berita_related as $key)
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
                                                            <img class="avatar photo" src="http://via.placeholder.com/40x40" alt="author">
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
                                                    <p>{{ $item->meta_deskripsi }}</p>
                                                </div>
                                            </div><!--./ content-entry-wrap -->
                                        </article>
                                    </div><!--~./ end post ~-->
                                    @endforeach
                                   
                                </div> <!-- /.row -->    
                            </div> <!--~./ end related post ~-->

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

@push('js')

@endpush