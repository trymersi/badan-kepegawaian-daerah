@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-10 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">{{ strtoupper($page_name) }}</h4>
                  <hr class="my-15">
                  <div class="help-block"><i class="fa fa-info-circle" aria-hidden="true"></i> Kosongkan pilihan bidang dan sub bidang jika ingin menambahkan kepala dinas atau sekretaris</div>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ action('Backend\PegawaiController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group @error('nama_pegawai') error @enderror">
                            <label>Nama Pegawai <span class="text-danger">*</span></label>
                            <input type="text" name="nama_pegawai" value="{{ old('nama_pegawai') }}" class="form-control" placeholder="Masukan Nama pegawai">
                            @error('nama_pegawai')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group @error('jabatan') error @enderror">
                            <label>Jabatan <span class="text-danger">*</span></label>
                            <select name="jabatan"  class="form-control select" style="width: 100%;">
                              <option selected="selected" value="">Pilih Jabatan</option>
                              <option @if(old('jabatan') == 1) selected @endif value="1">Kepala Dinas</option>
                              <option @if(old('jabatan') == 2) selected @endif value="2">Sekretaris</option>
                              <option @if(old('jabatan') == 3) selected @endif value="3">Kepala Bidang</option>
                              <option @if(old('jabatan') == 4) selected @endif value="4">Kepala Sub Bidang</option>
                            </select>
                            @error('jabatan')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('nama_bidang') error @enderror">
                            <label>Nama Bidang <span class="text-danger">*</span></label>
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

                        <div class="col-md-6">
                          <div class="form-group @error('nama_sub_bidang') error @enderror">
                            <label>Nama Sub Bidang</label>
                            <select name="nama_sub_bidang"  id="sub_bidang" class="form-control" style="width: 100%;">
                              <option selected="selected" value="">Pilih Nama Sub Bidang</option>
                            </select>
                            <div class="help-block"><i class="fa fa-info-circle" aria-hidden="true"></i> Jangan pilih sub bidang, jika ingin mengisi kepala bidang</div>
                            @error('nama_sub_bidang')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                        
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group @error('pendidikan') error @enderror">
                            <label>Pendidikan <span class="text-danger">*</span></label>
                            <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="form-control" placeholder="Masukan pendidikan terakhir">
                            @error('pendidikan')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                      </div>
                        
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('foto') error @enderror">
                            <label>Pilih Foto <span class="text-danger">*</label>
                            <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" accept="image/gif, image/jpeg, image/png" />
                            @error('foto')
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


@push('css')
   
@endpush

@push('js')
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();
      @if(old('bidang'))
        $('#sub_bidang').select2({
          placeholder: "Pilih Sub Bidang",
            ajax: {
                url:"{{url('dashboard/sub-bidang/list-sub-bidang')}}/" + {{ old('bidang') }},
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
      @endif
      
      $('#bidang').on('change',function()
      {
          var id_bidang = $(this).val();

          $('#sub_bidang').select2({
              
              placeholder: "Pilih Sub Bidang",
              ajax: {
                  url:"{{url('dashboard/sub-bidang/list-sub-bidang')}}/" + id_bidang,
                  processResults: function (data) {
                      return {
                          results: data
                      };
                  }
              }
          });
      })
    });
  </script> 
@endpush