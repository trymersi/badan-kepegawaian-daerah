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
                       {{ $data_bidang->keterangan }}
                    </p>    
                    <div aria-multiselectable="true" class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-info">
                            <div class="panel-heading" id="headingSekre" role="tab">
                                <h3 class="panel-title">
                                    <a aria-controls="collapseSekre" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseSekre" role="button">
                                        <span aria-hidden="true" class="fas fa-bar-chart">&nbsp;</span> Tugas Pokok dan Fungsi Bidang {{ $data_bidang->nama }}
                                    </a>
                                </h3>
                            </div>
                    
                            <div aria-labelledby="headingSekre" class="panel-collapse out collapse" id="collapseSekre" role="tabpanel" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <table class="table table-striped" style="font-size: 14px;">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="2%">No</th>
                                                <th scope="col" >Tugas Pokok dan Fungsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            @foreach($tupoksi_bidang as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->nama }}</td>
                                            </tr>
                                            <?php $i++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            

                        </div>
                    </div> 
                    <p style="text-align:justify;font-size:14px;">Dalam menjalankan tugas pokok dan fungsinya, Bidang {{ $data_bidang->nama }} memiliki {{ nomorIndo(count($sub_bidang)) }} Subbidang yang masing-masing dipimpin oleh Kepala Subbidang yaitu:</p>                   
                    
                    <div aria-multiselectable="true" class="panel-group" id="accordionSubBidang" role="tablist">
                        @foreach($sub_bidang as $item)
                        <div class="panel panel-info">
                            <div class="panel-heading" id="headingSekre" role="tab">
                                <h3 class="panel-title">
                                    <a aria-controls="collapse{{ $item->id }}" href="#collapse{{ $item->id }}" aria-expanded="false" class="collapsed" data-parent="#accordionSubBidang" data-toggle="collapse"  role="button">
                                        <span aria-hidden="true" class="fas fa-bar-chart">&nbsp;</span> Tugas Pokok dan Fungsi Sub Bidang {{ $item->nama }}
                                    </a>
                                </h3>
                            </div>
                            
                    
                            <div aria-labelledby="headingSekre" class="panel-collapse out collapse" id="collapse{{ $item->id }}" role="tabpanel" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p style="text-align:justify;font-size:14px;">{{ $item->keterangan }}</p>
                                    <table class="table table-striped" style="font-size: 14px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col" width="98%">Tugas Pokok dan Fungsi</th>
        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;?>
                                            @foreach(getTupoksiSub($item->id) as $data)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td width="98%">{{ $data->nama }}</td>
                                            </tr>
                                            <?php $i++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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