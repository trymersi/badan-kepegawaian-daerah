<!--~~~~~ Start sidebar ~~~~~-->
<div class="col-lg-3">
    <div class="sidebar">

        <!--~~~~~ Start Popular Posts Widget~~~~~-->
        <aside class="widget popular-posts-widget">
            <h4 class="widget-title"><span>Profil Kami</span></h4>
            <div class="widget-content">
                @php $no = 1;
                @endphp
                @foreach($profil as $item)
                <article class="post side-post">
                    <div class="thumb-wrap">
                        <a href="post-details.html">
                            <img src="{{ asset('assets/frontend/images/profil/profil.png')}}" alt="profil">
                        </a>
                        <span class="count">{{ $no }}</span>
                    </div><!--./ thumb-wrap -->
                    <div class="content-entry-wrap">
                        <h3 class="entry-title">
                            <a href="{{ url('/profil/'.$item->slug) }}">{{ $item->nama }}</a>
                        </h3><!--./ entry-title -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                <span>{{ tgl_indo($item->updated_at) }} </span>
                            </div><!--./ entry-date -->
                        </div><!--./ entry-meta-content -->
                    </div>
                </article><!--./ end post -->
                @php $no ++;
                @endphp
                @endforeach
            </div>
        </aside><!--~./ end popular posts widget ~-->
          
        <!--~~~~~ Start Widget Advertisement ~~~~~-->
        {{-- <aside class="widget widget-text">           
            <div class="widget-content">
                <a title="add" href="#">
                    <img src="http://via.placeholder.com/270x270" alt="">
                </a>
            </div>
        </aside><!--~./ end widget advertisement ~--> --}}
           
        <!--~~~~~ Start Subscribe Widget~~~~~-->
        {{-- <aside class="widget tb-subscribe-widget">
            <div class="widget-content">
                <div class="subscribe-box">
                    <div class="icon">
                        <img src="assets/images/widget/newsletter/icon.png" alt="icon">
                    </div>
                    <p>Subscribe to our mailing list to get the new updates!</p>
                    <div class="subscribe-form">
                        <!-- Subscribe form -->
                        <form class="dv-form" id="mc-form">
                            <div class="form-group">
                                <input id="mc-email" name="EMAIL" placeholder="Email Address" type="email">
                                <button class="btn btn-primary" name="Subscribe" id="subscribe-btn" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </aside><!--~./ end subscribe widget ~--> --}}
    </div>
</div><!--~./ end sidebar ~-->