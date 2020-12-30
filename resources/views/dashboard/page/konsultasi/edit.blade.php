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
                              <input type="text" readonly name="nama_kategori" value="{{ $edit->nope }}" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_kategori') error @enderror">
                              <label>Pertanyaan <span class="text-danger">*</span></label>
                              <input type="text" readonly name="nama_kategori" value="{{ $edit->pertanyaan }}" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Isi Pertanyaan</label>
                          <textarea rows="5" name="jawaban" readonly class="form-control" placeholder="Masukan jawaban dari pertanyaan tersebut">{{ $edit->keterangan }}</textarea>
                        </div>

                        @if($edit->status == 1 && Auth::user()->bidang_id == Null)
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_bidang') error @enderror">
                              <label>Teruskan <span class="text-danger">*</span></label>
                              <select name="nama_bidang"  id="bidang" class="form-control select" style="width: 100%;">
                                <option selected="selected" value="">Pilih Nama Bidang</option>
                                @foreach($bidang as $bid)
                                    <option @if(old('nama_bidang') == $bid->id) selected="" @endif value="{{ $bid->id }}">{{ $bid->nama }}</option>
                                @endforeach
                              </select>
                              @error('nama_bidang')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        @endif

                        @if($edit->status != 1)
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('status') error @enderror">
                              <label>Ubah Status <span class="text-danger">*</span></label>
                              <select name="status"  id="bidang" class="form-control select" style="width: 100%;">
                                <option selected="selected" value="">Pilih Status</option>
                                <option @if($edit->status == 1) selected="selected" @endif value="1">Diusulkan</option>
                                <option @if($edit->status == 2) selected="selected" @endif value="2">Proses</option>
                                <option @if($edit->status == 3) selected="selected" @endif value="3">Selesai</option>
                                <option @if($edit->status == 4) selected="selected" @endif value="4">Ditolak</option>
                              </select>
                              @error('status')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        @endif
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