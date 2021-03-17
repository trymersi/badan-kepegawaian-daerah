@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-7 col-8">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">{{ strtoupper($page_name) }} [{{ strtoupper($update_name) }}]</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ url('dashboard/peraturan/update/'.$edit->id)}}" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('tentang') error @enderror">
                            <label>Tentang <span class="text-danger">*</span></label>
                            <input type="text" name="tentang" value="{{ old('tentang',$edit->tentang) }}" class="form-control" placeholder="Masukan Judul Peraturan">
                            @error('tentang')
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
                                  <option @if(old('kategori_unduh',$edit->kategori_peraturan_id) == $kat->id) selected="" @endif value="{{ $kat->id }}">{{ $kat->nama }}</option>
                              @endforeach
                            </select>
                            @error('kategori_unduh')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('nomor') error @enderror">
                            <label>Nomor <span class="text-danger">*</span></label>
                            <input type="text" name="nomor" value="{{ old('nomor',$edit->nomor) }}" class="form-control" placeholder="Masukan Nomor Peraturan">
                            @error('nomor')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group @error('tahun') error @enderror">
                            <label>Tahun <span class="text-danger">*</span></label>
                            <input type="number" name="tahun" value="{{ old('tahun',$edit->tahun) }}" class="form-control" placeholder="Masukan Tahun Peraturan">
                            @error('tahun')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                       
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group @error('file') error @enderror">
                            <label>File <span class="text-danger">*</span></label>
                            <input type="file" name="file" class="form-control" accept="application/pdf">
                            @error('file')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                      </div>
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
    <div class="col-lg-5 col-4">
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Tampil File [{{ strtoupper($update_name) }}]</h4>
        </div>

        <div class="box-body">
          <object data="{{ asset('/uploads/peraturan/'.$edit->file) }}" type="application/pdf" width="100%" height="450px">
            <embed src="{{ asset('/uploads/peraturan/'.$edit->file) }}" type="application/pdf" />
          </object>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->

</section>
@endsection

@push('js')
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();
    });
  </script> 
@endpush