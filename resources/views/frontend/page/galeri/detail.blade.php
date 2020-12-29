

@extends('frontend.main-1')

@section('content')
@include('frontend.include.breadcrumb')
<div class="site-content">
    
    <div class="main-wrapper ptb-40 style-two">
        <div class="container-gal">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-gal">
                        <!-- <h4 class="header-gal text-center">SEMUA GAMBAR DARI GALERI {{ strtoupper($page_name) }}</h4> -->
                        <h2 class="section-title text-center">{{ strtoupper($page_name) }}</h2>
                        <p class="text-center" style="text-align: justify;">{{ $data_galeri->keterangan }}</p>
                        <div class="content-gal">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-8">
                                    <div id="sync1" class="owl-carousel owl-theme">
                                        @foreach($detail_galeri as $item)
                                        <div class="item">
                                        <h4>
                                            <img
                                            src="{{ asset('uploads/images/detail-galeri/'.$item->gambar) }}"
                                            alt="landscape" width="1170" height="570"
                                            />
                                        </h4>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    
                                    <div id="sync2" class="owl-carousel owl-theme">
                                        @foreach($detail_galeri as $item)
                                        <div class="item">
                                        <img
                                            src="{{ asset('uploads/images/detail-galeri/'.$item->gambar) }}"
                                            alt="landscape" height="250px"
                                        />
                                        </div>
                                        @endforeach
                                    </div>
                                    <a href="{{ url('/galeri') }}" class="btn btn-primary text-center"><i class="fas fa-arrow-left"></i> KEMBALI KE DAFTAR GALERI</a>
                                </div>
                                
                            </div>
                        </div>
                      </div>
                    </div>
                    </main>
                    <!--~./ end site main ~-->
                    
                    
                </div>
                
            </div>
        </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection

@push('css')
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/assets/owl.carousel.min.css"
/>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css"
/>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
/>
<link rel="stylesheet" href="{{ asset('assets/frontend/detail-galeri.css')}}">
@endpush

@push('js')
<script>
    jQuery(document).ready(function() {
    var sync1 = jQuery("#sync1");
    var sync2 = jQuery("#sync2");
    var slidesPerPage = 5; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1
      .owlCarousel({
      items: 1,
      slideSpeed: 3000,
      nav: true,

      //   animateOut: 'fadeOut',
      animateIn: "fadeIn",
      autoplayHoverPause: true,
      autoplaySpeed: 1400, //過場速度
      dots: false,
      loop: true,
      responsiveClass: true,
      responsive: {
        0: {
          item: 1,
          autoplay: false
        },
        600: {
          items: 1,
          autoplay: true
        }
      },
      responsiveRefreshRate: 200,
      navText: [
        '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
        '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
      ]
    })
      .on("changed.owl.carousel", syncPosition);

    sync2
      .on("initialized.owl.carousel", function() {
      sync2
        .find(".owl-item")
        .eq(0)
        .addClass("current");
    })
      .owlCarousel({
      items: slidesPerPage,
      dots: true,
      //   nav: true,
      smartSpeed: 1000,
      slideSpeed: 1000,
      slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
      responsiveRefreshRate: 100
    })
      .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
      //if you set loop to false, you have to restore this next line
      //var current = el.item.index;

      //if you disable loop you have to comment this block
      var count = el.item.count - 1;
      var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

      if (current < 0) {
        current = count;
      }
      if (current > count) {
        current = 0;
      }

      //end block

      sync2
        .find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
      var onscreen = sync2.find(".owl-item.active").length - 1;
      var start = sync2
      .find(".owl-item.active")
      .first()
      .index();
      var end = sync2
      .find(".owl-item.active")
      .last()
      .index();

      if (current > end) {
        sync2.data("owl.carousel").to(current, 100, true);
      }
      if (current < start) {
        sync2.data("owl.carousel").to(current - onscreen, 100, true);
      }
    }

    function syncPosition2(el) {
      if (syncedSecondary) {
        var number = el.item.index;
        sync1.data("owl.carousel").to(number, 100, true);
      }
    }

    sync2.on("click", ".owl-item", function(e) {
      e.preventDefault();
      var number = jQuery(this).index();
      sync1.data("owl.carousel").to(number, 300, true);
    });
  });
    </script>
@endpush