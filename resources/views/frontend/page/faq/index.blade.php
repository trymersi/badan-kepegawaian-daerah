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
                    <p style="text-align:justify;font-size:14px;">
                       FAQ
                    </p>    
                    
                    <p style="text-align:justify;font-size:14px;">Pertanyaan - pertanyaan yang berulangkali ditanyakan</p>                   
                    
                    <div aria-multiselectable="true" class="panel-group" id="accordionFaq" role="tablist">
                        <?php $i = 1;?>
                        @foreach($faq as $item)
                        <div class="panel panel-info">
                            <div class="panel-heading" id="headingSekre" role="tab">
                                <h3 class="panel-title">
                                    <a aria-controls="collapse{{ $item->id }}" href="#collapse{{ $item->id }}" aria-expanded="false" class="collapsed" data-parent="#accordionFaq" data-toggle="collapse"  role="button">
                                        <span aria-hidden="true" >{{ $i }})&nbsp;</span>  {{ $item->pertanyaan }}
                                    </a>
                                </h3>
                            </div>
                            
                    
                            <div aria-labelledby="headingSekre" class="panel-collapse out collapse" id="collapse{{ $item->id }}" role="tabpanel" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p style="text-align:justify;font-size:14px;">Jawaban : {{ $item->jawaban }}</p>
                                    
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                        @endforeach
                        
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