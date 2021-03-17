@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-10 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">{{ strtoupper($page_name) }} [{{ strtoupper($update_name) }}]</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ url('dashboard/kategori-unduhan/update/'.$edit->id)}}">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                         <div class="col-md-6">
                           <div class="form-group @error('nama_kategori') error @enderror">
                             <label>Nama Kategori <span class="text-danger">*</span></label>
                             <input type="text" name="nama_kategori" value="{{ old('nama_kategori',$edit->nama) }}" class="form-control" placeholder="Masukan Nama Lengkap Bidang">
                             @error('nama_kategori')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('jenis') error @enderror">
                            <label>Jenis Kategori <span class="text-danger">*</span></label>
                            <select name="jenis"  id="jenis" class="form-control select" style="width: 100%;">
                              <option selected="selected" value="">Pilih Jenis Kategori</option>
                              <option @if(old('jenis',$edit->jenis) == 1) selected="" @endif value="1">Kategori Umum</option>
                              <option @if(old('jenis',$edit->jenis) == 2) selected="" @endif value="2">Informasi Public</option>
                            </select>
                            @error('level')
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
@push('js')
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();
    });
  </script> 
@endpush