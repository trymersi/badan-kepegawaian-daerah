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
                    <div class="post single-post single-post-one">
                        <div class="post-share-area">
                            <h3>{{ $page_name }}</h3>
                        </div>
                        <div class="entry-content">
                            {!! $isi!!}
                        </div><!--entry content-->  
                        <div class="entry-footer mt-60">
                           <p style="color: black;"> Terakhir diperbaharui {{ $updated_at }} </p>
                        </div><!--/.entry-footer-->
                    </div>
                </main>
                </div>
                
                <!--~~~~~ Start sidebar ~~~~~-->
                @include('frontend.include.sidebar-profil')
            </div>
        </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection

@push('js')

@endpush