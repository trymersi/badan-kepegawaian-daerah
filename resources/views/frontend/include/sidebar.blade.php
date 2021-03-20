<!--~~~~~ Start sidebar ~~~~~-->
<div class="col-lg-3">
    <div class="sidebar">
        
        <!--~~~~~ Start Bt Widget Categories~~~~~-->
        <aside class="widget bt-widget-categories">
            <h4 class="widget-title"><span>Kategori Berita</span></h4>
            <div class="widget-content">
                @foreach($kategori_berita_menu as $item)
                <a href="{{ url('/kategori-berita/'.$item->slug) }}" class="cat-item">
                    <div class="cat-item-inner">
                        <div class="cat-thumb">
                            <img src="{{ asset('/assets/frontend/cat-image.jpg') }}" width="130" height="100" alt="img">
                        </div>
                        <div class="cat-name">
                            <span>{{ $item->nama }}</span>
                        </div>
                    </div>
                </a><!--~./ cat-item ~-->
                @endforeach
            </div>
        </aside><!--~./ end bt widget categories ~-->
           
        <!--~~~~~ Start Popular Posts Widget~~~~~-->
        <aside class="widget popular-posts-widget">
            <h4 class="widget-title"><span>Berita Populer</span></h4>
            <div class="widget-content">
                <?php $i = 1;?>
                @foreach($berita as $item)
                <article class="post side-post">
                    <div class="thumb-wrap">
                        <a href="post-details.html">
                            <img src="{{ asset('uploads/images/gambar-berita/thumbnail/'.$item->thumbnail) }}" width="100px" height="100px" alt="{{ $item->judul }}">
                        </a>
                        <span class="count">{{ $i }}</span>
                    </div><!--./ thumb-wrap -->
                    <div class="content-entry-wrap">
                        <h3 class="entry-title">
                            <a href="{{ url('/berita/'.$item->slug) }}">{{ $item->judul }}</a>
                        </h3><!--./ entry-title -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>{{ tgl_indo($item->updated_at) }}</span>
                            </div><!--./ entry-date -->
                            
                        </div><!--./ entry-meta-content -->
                    </div>
                </article><!--./ end post -->
                <?php $i++;?>
                @endforeach
                
            </div>
        </aside><!--~./ end popular posts widget ~-->
          
        <!--~~~~~ Start Widget Advertisement ~~~~~-->
        <!-- <aside class="widget widget-text">     
            <h4 class="widget-title"><span>Link Terkait</span></h4>      
            <div class="widget-content">
                @foreach($link_terkait as $item)
                <a title="add" href="{{ $item->link }}" target="_blank">
                    <img width="270px" src="{{ asset('uploads/images/link-terkait/'.$item->gambar) }}" alt="{{ $item->nama }}">
                </a>
                @endforeach
            </div>
        </aside> -->

        <aside class="widget tb-subscribe-widget">
        <h4 class="widget-title"><span>Link Terkait</span></h4>      
        @foreach($link_terkait as $item)
        <div class="widget-content">
                <div class="subscribe-box">
                    <div class="icon">
                    <a title="add" href="{{ $item->link }}" target="_blank">
                        <img src="{{ asset('uploads/images/link-terkait/'.$item->gambar) }}" alt="{{ $item->nama }}">
                    </a>
                    </div>
                </div>
        </div>
        @endforeach
        </aside>
        
    </div>
</div><!--~./ end sidebar ~-->