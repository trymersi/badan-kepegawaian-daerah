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
                <form class="form" method="POST" action="{{ action('Backend\GaleriGambarController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_galeri') error @enderror">
                              <label>Nama Galeri <span class="text-danger">*</span></label>
                              <input type="text" name="nama_galeri" value="{{ old('nama_galeri') }}" class="form-control" placeholder="Masukan Nama Galeri">
                              @error('nama_galeri')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('gambar') error @enderror">
                              <label>Pilih Gambar <span class="text-danger">*</label>
                              <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" accept="image/gif, image/jpeg, image/png" />
                              @error('gambar')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea rows="5" name="keterangan" class="form-control" placeholder="Masukan Keterangan galeri">{{ old('keterangan') }}</textarea>
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