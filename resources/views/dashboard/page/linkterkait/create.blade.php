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
                <form class="form" method="POST" action="{{ action('Backend\LinkTerkaitController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama') error @enderror">
                              <label>Nama Website <span class="text-danger">*</span></label>
                              <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" placeholder="Masukan Nama Lengkap Bidang">
                              @error('nama')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('link') error @enderror">
                              <label>URL Link Website <span class="text-danger">*</span></label>
                              <input type="url" name="link" value="{{ old('link') }}" class="form-control" placeholder="Masukan Nama Lengkap Bidang">
                              @error('link')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('gambar') error @enderror">
                              <label>Pilih Gambar <span class="text-danger">*</label>
                              <input type="file" name="gambar" value="{{ old('gambar') }}" accept="image/gif, image/jpeg, image/png" />
                              @error('gambar')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
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