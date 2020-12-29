

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
                        <h2 class="section-title text-center">SELURUH GALERI GAMBAR</h2>
                        <div class="content-gal">
                            
                            @foreach($galeri as $item)
                            <div class="wrapper-gal">
                                <a href="{{ url('/galeri/'.$item->slug) }}">
                                    <div class="box-gal vintage-gal">
                                        <img src="{{ asset('uploads/images/gambar-galeri/'.$item->gambar) }}" alt="{{ $item->nama }}" >
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
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/frontend/galeri.scss')}}">
@endpush

@push('js')

@endpush