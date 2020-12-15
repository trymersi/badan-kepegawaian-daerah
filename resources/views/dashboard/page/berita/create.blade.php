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
                <form class="form" method="POST" action="{{ action('Backend\BeritaController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('judul_berita') error @enderror">
                              <label>Judul Berita <span class="text-danger">*</span></label>
                              <input type="text" name="judul_berita" value="{{ old('judul_berita') }}" class="form-control" placeholder="Masukan Nama Lengkap Bidang">
                              @error('judul_berita')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group @error('kategori_berita') error @enderror">
                              <label>Kategori Berita <span class="text-danger">*</span></label>
                              <select name="kategori_berita"  id="bidang" class="form-control select" style="width: 100%;">
                                <option selected="selected" value="">Pilih Kategori</option>
                                @foreach($kategori as $kat)
                                    <option @if(old('kategori_berita') == $kat->id) selected="" @endif value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                              </select>
                              @error('kategori_berita')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label>Isi Berita</label>
                          <textarea rows="5"  id="summernote" name="isi_berita" class="form-control">{!! old('isi_berita') !!}</textarea>
                        </div>
                        <hr class="my-15">
                        <h4 class="box-title text-info"><i class="fa fa-file-pdf-o"></i> File Download</h4>
                        <hr class="my-15">

                        <div class="row multi-field-wrapper">
                          <div class="col-md-12 multi-fields ">
                            <div class="row multi-field">
                              <div class="col-md-3">
                                <div class="form-group @error('nama_file') error @enderror">
                                  <label>Nama File <span class="text-danger">*</span></label>
                                  <input type="text" name="nama_file[]" value="{{ old('nama_file') }}" class="form-control" placeholder="Masukan Nama Lengkap File">
                                  @error('nama_file')
                                  <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                                  @enderror
                                </div>
                              </div>
                             
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Keterangan</label>
                                  <input type="text" name="keterangan[]" value="{{ old('keterangan') }}" class="form-control" placeholder="Masukan keterangan File">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group @error('file') error @enderror">
                                  <label>File <span class="text-danger">*</span></label>
                                  <input type="file" name="file[]" class="form-control" accept="application/pdf">
                                  @error('file')
                                  <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>&nbsp;</label><br>
                                  <a class="remove-field btn btn-sm btn-danger "><i class="fa fa-minus" aria-hidden="true"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <a class="btn btn-sm mb-2 mr-2 btn-success add-field"><i class="fa fa-plus" aria-hidden="true"></i> Tambah File</a>
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
<link href="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.min.js') }}"></script>
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();

      $('#summernote').summernote({
          placeholder: 'Masukan berita disini, anda juga dapat memasukan gambar pada bagian text',
          height: 350
      });

      $('.multi-field-wrapper').each(function() {
          var $wrapper = $('.multi-fields', this);
          $(".add-field", $(this)).click(function(e) {
              $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('');
          });
          $('.multi-field .remove-field', $wrapper).click(function() {
              if ($('.multi-field', $wrapper).length > 1)
                  $(this).parent().parent().parent().remove();
          });
      });
    });
  </script> 
@endpush