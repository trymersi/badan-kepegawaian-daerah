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
                        <aside class="widget latest-posts-widget latest-posts-widget-two widget-categories">
                            <h4 class="widget-title">Tentang Kami</h4>
                            <div class="widget-content">
                                <ul>  
                                    @foreach($profil as $item)
                                    <li class="cat-item">
                                        <a href="{{ url('/profil/'.$item->slug) }}">{{ $item->nama }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div><!--~./ end latest posts widget ~-->
                    
                    <!--~~~~~ Start Latest Posts Widget~~~~~-->
                    <div class="col-lg-3">
                        <aside class="widget latest-posts-widget latest-posts-widget-two widget-categories">
                            <h4 class="widget-title">Unduhan</h4>
                            <div class="widget-content">
                                <ul>  
                                    @foreach($kategori_unduhan_footer as $item)
                                    <li class="cat-item">
                                        <a href="{{ url('/unduhan/'.$item->slug) }}">{{ $item->nama }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                         
                            </div>
                        </aside>
                    </div><!--~./ end latest posts widget ~-->

                    <div class="col-lg-3">
                        <aside class="widget latest-posts-widget latest-posts-widget-two">
                            <h4 class="widget-title">Berita</h4>
                            <div class="widget-content">
                                @foreach($kategori_unduhan_footer as $item)
                                <article class="post side-post">
                                    <div class="content-entry-wrap">
                                        
                                        <h3 class="entry-title">
                                            <a href="{{ url('/unduhan/'.$item->slug) }}">{{ $item->nama }}</a>
                                        </h3><!--./ entry-title -->
                                        
                                    </div><!--./ content-entry-wrap -->
                                
                                </article><!--./ end post -->
                                @endforeach
                            </div>
                        </aside>
                    </div><!--~./ end latest posts widget ~-->
                    
                    <!--~~~~~ Start Subscribe Widget~~~~~-->
                        <!--~~~~~ Start Latest Posts Widget~~~~~-->
                        
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