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
                <form class="form" method="POST" action="{{ url('dashboard/konsultasi/update/'.$edit->id)}}">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="box-body">
                        <div class="row">
                           <div class="col-md-6">
                             <div class="form-group @error('nama_kategori') error @enderror">
                               <label>Nama <span class="text-danger">*</span></label>
                               <input type="text" readonly name="nama_kategori" value="{{ $edit->nama }}" class="form-control">
                             </div>
                           </div>
                         </div>

                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_kategori') error @enderror">
                              <label>Email <span class="text-danger">*</span></label>
                              <input type="text" readonly name="nama_kategori" value="{{ $edit->email }}" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_kategori') error @enderror">
                              <label>Kontak <span class="text-danger">*</span></label>
                              <input type="text" readonly name="nama_kategori" value="{{ $edit->telpon }}" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_kategori') error @enderror">
                              <label>Pertanyaan <span class="text-danger">*</span></label>
                              <input type="text" readonly name="nama_kategori" value="{{ $edit->judul }}" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Isi Pertanyaan</label>
                          <textarea rows="5" name="jawaban" readonly class="form-control" placeholder="Masukan jawaban dari pertanyaan tersebut">{{ $edit->pesan }}</textarea>
                        </div>

                       
                     </div>
                       
                      
                   </div>
                   <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('dashboard/'.$main_url) }}" type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                          <i class="ti-trash"></i> Tutup
                        </a>
                      
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