@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-10 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">{{ strtoupper($page_name) }}</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ action('Backend\GaleriVideoController@store') }}">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_video') error @enderror">
                              <label>Nama Video <span class="text-danger">*</span></label>
                              <input type="text" name="nama_video" value="{{ old('nama_video') }}" class="form-control" placeholder="Masukan Nama video">
                              @error('nama_video')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('url_video') error @enderror">
                              <label>Url Video <span class="text-danger">*</span></label>
                              <input type="text" name="url_video" value="{{ old('url_video') }}" class="form-control" placeholder="Masukan url video">
                              <div class="help-block"><i class="fa fa-info-circle" aria-hidden="true"></i> Masukan url video dari situs youtube</div>
                              @error('url_video')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea rows="5" name="keterangan" class="form-control" placeholder="Masukan Keterangan Video">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('dashboard/'.$main_url) }}" type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                          <i class="ti-trash"></i> Batalkan
                        </a>
                        <button type="submit" id="button-simpan" class="btn btn-rounded btn-primary btn-outline">
                          <i id="icon-simpan" class="ti-save-alt"></i> <i id="loading-simpan" class="fa fa-spin fa-refresh d-none"></i> Simpan
                        </button>
                    </div>  
                </form>
              </div>
              <!-- /.box -->			
        </div>  

        

    </div>

  </div>
  <!-- /.row -->

</section>
@endsection