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
                <form class="form" method="POST" action="{{ action('Backend\PertanyaanIkmController@store') }}">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-12">
                            <div class="form-group @error('pertanyaan') error @enderror">
                              <label>Pertanyaan <span class="text-danger">*</span></label>
                              <textarea rows="5" name="pertanyaan" class="form-control" placeholder="Masukan Pertanyaan">{{ old('pertanyaan') }}</textarea>
                              @error('nama_bidang')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group @error('urutan') error @enderror">
                              <label>Urutan <span class="text-danger">*</span></label>
                              <input type="number" name="urutan" value="{{ old('urutan',$urutan) }}" class="form-control" placeholder="Urutan Pertanyaan">
                              @error('urutan')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group @error('status') error @enderror">
                              <label>Status <span class="text-danger">*</span></label>
                              <select name="status"  class="form-control select" style="width: 100%;">
                                <option selected="selected" value="">Pilih Status</option>
                                <option  value="1">Aktif</option>
                                <option  value="0">Tidak Aktif</option>
                                
                              </select>
                              @error('status')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('jawaban1') error @enderror">
                              <label>Jawaban 1 <span class="text-danger">*</span></label>
                              <input type="text" name="jawaban1" value="{{ old('jawaban1') }}" class="form-control" placeholder="contoh : Memuaskan">
                              @error('jawaban1')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('jawaban2') error @enderror">
                              <label>Jawaban 2 <span class="text-danger">*</span></label>
                              <input type="text" name="jawaban2" value="{{ old('jawaban2') }}" class="form-control" placeholder="contoh : Cukup Memuaskan">
                              @error('jawaban2')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('jawaban3') error @enderror">
                              <label>Jawaban 3 <span class="text-danger">*</span></label>
                              <input type="text" name="jawaban3" value="{{ old('jawaban3') }}" class="form-control" placeholder="contoh : Tidak Memuaskan">
                              @error('jawaban3')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('jawaban4') error @enderror">
                              <label>Jawaban 4 <span class="text-danger">*</span></label>
                              <input type="text" name="jawaban4" value="{{ old('jawaban4') }}" class="form-control" placeholder="contoh : Sangat Tidak Memuaskan">
                              @error('jawaban4')
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