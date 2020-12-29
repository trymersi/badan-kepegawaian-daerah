

@extends('frontend.main-1')

@section('content')
@include('frontend.include.breadcrumb')
<div class="site-content">
    
    <div class="main-wrapper ptb-40 style-two">
        <div class="container-gal" style="padding:0;">
            <div class="row" style="padding:0;">
                <div class="col-lg-12">
                    <div class="container-gal" style="padding:0;">
                        <!-- <p class="header-gal">SEMUA GALERI GAMBAR</p> -->
                        <h2 class="section-title text-center">SELURUH GALERI Video</h2>
                        <div class="content-gal">
                            
                            @foreach($galeri as $item)
                            <div class="wrapper-gal" style="cursor: pointer;">
                                <a  class="trigger" src="https://www.youtube.com/embed/{{ getYoutubeID($item->url_video) }}" data-target="#videoModal" data-toggle="modal">
                                    <div class="box-gal vintage-gal">
                                        <img src="https://img.youtube.com/vi/{{ getYoutubeID($item->url_video) }}/1.jpg" alt="{{ $item->nama }}" >
                                        <h2>{{ $item->nama }}</h2>
                                       
                                    </div>
                                </a>
                            </div>
                            @endforeach
                         
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

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
    
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/frontend/galeri.scss')}}">
@endpush

@push('js')
<script>
$(document).ready(function() {
  autoPlayYouTubeModal();
});

function autoPlayYouTubeModal() {
  var trigger = $('.trigger');
  trigger.click(function(e) {
    e.preventDefault();
    var theModal = $(this).data("target");
    var videoSRC = $(this).attr("src");
    var videoSRCauto = videoSRC + "?autoplay=1";
    $(theModal + ' iframe').attr('src', videoSRCauto);
    $(theModal).on('hidden.bs.modal', function(e) {
      $(theModal + ' iframe').attr('src', '');
    });
  });
};
</script>
@endpush