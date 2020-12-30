@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                <div class="col-lg-6">
                    <!--~~~~~ Start Site Main ~~~~~-->
                    <main class="site-main">
                        <div class="col-sm-12 alert alert-success">
                            <div class="media addressContent">
                              <span class="media-left bg-color-1" href="#">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                              </span>
                              <div class="media-body">
                                <h3 class="media-heading"> Alamat :</h3>
                                <p>{{ $pengaturan_website->alamat }}</p>
                              </div>
                            </div>
                        
                            <div class="media addressContent">
                              <span class="media-left bg-color-2" href="#">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                              </span>
                              <div class="media-body">
                                <h3 class="media-heading"> Telepon/HP :</h3>
                                <p><i class="fa fa-phone"></i>{{ $pengaturan_website->telpon }}</i></p>
                              </div>
                            </div>
                        
                            <div class="media addressContent">
                              <span class="media-left bg-color-3" href="#">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                              </span>
                              <div class="media-body">
                                <h3 class="media-heading"> Email :</h3>
                                <p><a href="mailto:{{ $pengaturan_website->telpon }}"><i class="fa fa-envelope"></i> {{ $pengaturan_website->email }}</a>
                                </p>
                              </div>
                            </div>
                            
                          </div>
                          <hr>
                                <div id="map">
                                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.620697572557!2d106.82673854241668!3d-6.181494096835563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42e09439117%3A0x57202985a884ff41!2sBadan+Kepegawaian+Daerah+Provinsi+DKI+Jakarta!5e0!3m2!1sid!2sid!4v1504863906805" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe> --}}
                                    {!! $pengaturan_website->embed_maps !!}
                                </div> 
                    </main>
                    <!--~./ end site main ~-->
                </div>

                <div class="col-lg-6">
                    <div class="sidebar">
                        <div class="sidebar-inner">
                            <!--~~~~~ Start Widget Advertisement ~~~~~-->
                            <aside class="widget widget-text">           
                                <div class="widget-content">
                                   <!--~~~~~ Start Comments Area ~~~~~-->
                        <div class="comments-area" id="comments">
                            <div class="comment-respond" id="respond">
                                <h3 class="comment-reply-title headline"><span>Konsultasi</span></h3>
                                <p style="color: black">Anda dapat bertanya ke kami melalui formulir di bawah ini</p>
                                @if(session()->has('gagal'))
                                    {{-- <div class="reviews-comments-item-text fl-wrap" style="margin-bottom:10px;">
                                        <p>" {{ session()->get('message') }} "</p>
                                    </div> --}}
                                    <div class="alert alert-danger" role="alert">
                                        <p>{{ session()->get('gagal') }}</p>
                                      </div>
                                @endif
                                @if(session()->has('sukses'))
                                    {{-- <div class="reviews-comments-item-text fl-wrap" style="margin-bottom:10px;">
                                        <p>" {{ session()->get('message') }} "</p>
                                    </div> --}}
                                    <div class="alert alert-success" role="alert">
                                        <p>{{ session()->get('sukses') }}</p>
                                      </div>
                                @endif
                                <form name="contactForm" id='contact_form' method="post" action="{{ action('Frontend\HomeController@konsultasiSave') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='text' name='nama' id='nama' class="form-controllar"  aria-required="true" placeholder="Nama Anda*" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='email' name='email' id='email-comments' class="form-controllar"  aria-required="true" placeholder="Email Anda*" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='text' name='telpon' id='telpon' class="form-controllar"  aria-required="true" placeholder="Telepon/HP Anda" required>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p>
                                                <select height="150px" name="pertanyaan"  id="bidang" class="form-control select" style="width: 100%;" required>
                                                    <option selected="selected" value="">Pilih Pertanyaan</option>
                                                    @foreach($pertanyaan as $item)
                                                        <option @if(old('pertanyaan') == $item->id) selected="" @endif value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <textarea name='pesan' id='pesan' class="form-controllar" aria-required="true" rows="8" cols="45" placeholder="Pesan Anda...." required></textarea>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="form-submit">
                                                <input type="submit" value="Kirim Pesan" id="submit" name="submit">
                                            </p>
                                        </div>
                                    </div>
                                </form> 
                            </div><!-- #respond -->      
                        </div> <!--~./ end comments area ~-->
                                </div>
                            </aside><!--~./ end widget advertisement ~-->
                            
                        </div>
                    </div>
                </div><!--~./ end sidebar ~-->
        </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection




@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();
    });
  </script> 
@endpush