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
                <form class="form" method="POST" action="{{ url('dashboard/profil/update/'.$edit->id)}}">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                         <div class="col-md-6">
                           <div class="form-group @error('nama_profil') error @enderror">
                             <label>Nama Profil <span class="text-danger">*</span></label>
                             <input type="text" name="nama_profil" value="{{ old('nama_profil',$edit->nama) }}" class="form-control" placeholder="Masukan Nama Lengkap Bidang">
                             @error('nama_profil')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>
                       </div>
                       
                       <div class="form-group">
                         <label>Isi Profil</label>
                         <textarea rows="5"  id="summernote" name="isi_profil" class="form-control">{!! old('isi_profil',$edit->isi) !!}</textarea>
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

@push('css')
  <link href="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.css') }}" rel="stylesheet" />
@endpush

@push('js')
  <script src="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.min.js') }}"></script>
  <script>  
    $(document).ready(function() {
      $('#summernote').summernote({
          placeholder: 'Masukan berita disini, anda juga dapat memasukan gambar pada bagian text',
          height: 350
      });
    });
  </script> 
@endpush