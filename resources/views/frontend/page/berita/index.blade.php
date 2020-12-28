@push('css')

@endpush

@extends('frontend.main-1')

@section('content')

@include('frontend.include.breadcrumb')
<div class="site-content">
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Main Wrapper
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="main-wrapper ptb-80 style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!--~~~~~ Start Site Main ~~~~~-->
                    <main class="site-main">
                        <div class="row">
                            
                            <!--~~~~~ Start Post ~~~~~-->
                            @foreach($list_berita as $item)
                            <div class="col-12 load-post">
                                <article class="post hentry post-list">
                                    <div class="entry-thumb">
                                        <figure class="thumb-wrap">
                                            <a href="{{ url('/berita/'.$item->slug) }}">
                                                <img src="{{ asset('uploads/images/gambar-berita/'.$item->thumbnail) }}" width="270px" height="220px" alt="{{ $item->judul }}">
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
                                            <div class="entry-date">
                                                <span><i class="fa fa-eye"></i> {{ $item->dilihat }} </span>
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
                            
                        </div>
                    </main>
                    <!--~./ end site main ~-->
                    
                    <!--~~~~~ Load More Area ~~~~~-->
                    <div class="load-more-area text-center mt-30">
                        {{ $list_berita->links() }}
                    </div><!--/.load-more-area-->
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