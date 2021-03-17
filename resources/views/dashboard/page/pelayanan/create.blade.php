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
                <form class="form" method="POST" action="{{ action('Backend\PelayananController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama') error @enderror">
                              <label>Nama Pelayanan <span class="text-danger">*</span></label>
                              <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" placeholder="Masukan Nama Pelayanan">
                              @error('nama')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group @error('kategori_unduh') error @enderror">
                              <label>Kategori Peraturan <span class="text-danger">*</span></label>
                              <select name="kategori_unduh"  class="form-control select" style="width: 100%;">
                                <option selected="selected" value="">Pilih Kategori</option>
                                @foreach($kategori as $kat)
                                    <option @if(old('kategori_unduh') == $kat->id) selected="" @endif value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                              </select>
                              @error('kategori_unduh')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea rows="5"  id="summernote" name="keterangan" class="form-control">{!! old('keterangan') !!}</textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('dashboard/'.$main_url) }}" type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                          <i class="ti-trash"></i> Cancel
                        </a>
                        <button type="submit" id="button-simpan" class="btn btn-rounded btn-primary btn-outline">
                          <i id="icon-simpan" class="ti-save-alt"></i> <i id="loading-simpan" class="fa fa-spin fa-refresh d-none"></i> Save
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
@push('css')
<link href="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.css') }}" rel="stylesheet" />
@endpush
@push('js')
<script src="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.min.js') }}"></script>
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $('#summernote').summernote({
          placeholder: 'Masukan keterangan disini, anda juga dapat memasukan gambar pada bagian text',
          height: 350
      });
      $(".select").select2();
    });
  </script> 
@endpush