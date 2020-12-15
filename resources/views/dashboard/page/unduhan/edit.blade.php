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
                <form class="form" method="POST" action="{{ url('dashboard/unduhan/update/'.$edit->id)}}">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                         <div class="col-md-6">
                           <div class="form-group @error('nama_file') error @enderror">
                             <label>Nama File <span class="text-danger">*</span></label>
                             <input type="text" name="nama_file" value="{{ old('nama_file') }}" class="form-control" placeholder="Masukan Nama Lengkap File">
                             @error('nama_file')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>
                       </div>
                       
                       <div class="row">
                         <div class="col-md-6">
                           <div class="form-group @error('file') error @enderror">
                             <label>File <span class="text-danger">*</span></label>
                             <input type="file" name="file" class="form-control" accept="application/pdf">
                             @error('file')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>
                       </div>
                       
                       <div class="form-group">
                         <label>Keterangan</label>
                         <textarea rows="5" name="keterangan" class="form-control" placeholder="Masukan Keterangan File">{{ old('keterangan') }}</textarea>
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

  </div>
  <!-- /.row -->

</section>
@endsection