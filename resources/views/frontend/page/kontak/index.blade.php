@push('css')

@endpush

@extends('frontend.main-1')

@section('content')

@include('frontend.include.breadcrumb')
<div class="site-content">
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Main Wrapper
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="main-wrapper ptb-80 style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!--~~~~~ Start Site Main ~~~~~-->
                    <main class="site-main">
                        <div class="col-sm-12 alert alert-success">
                            <div class="media addressContent">
                              <span class="media-left bg-color-1" href="#">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                              </span>
                              <div class="media-body">
                                <h3 class="media-heading"> Alamat :</h3>
                                <p>{{ $pengaturan_website->alamat }}</p>
                              </div>
                            </div>
                        
                            <div class="media addressContent">
                              <span class="media-left bg-color-2" href="#">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                              </span>
                              <div class="media-body">
                                <h3 class="media-heading"> Telepon/HP :</h3>
                                <p><i class="fa fa-phone"></i>{{ $pengaturan_website->telpon }}</i></p>
                              </div>
                            </div>
                        
                            <div class="media addressContent">
                              <span class="media-left bg-color-3" href="#">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                              </span>
                              <div class="media-body">
                                <h3 class="media-heading"> Email :</h3>
                                <p><a href="mailto:{{ $pengaturan_website->telpon }}"><i class="fa fa-envelope"></i> {{ $pengaturan_website->email }}</a>
                                </p>
                              </div>
                            </div>
                            
                          </div>
                          <hr>
                                <div id="map">
                                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.620697572557!2d106.82673854241668!3d-6.181494096835563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42e09439117%3A0x57202985a884ff41!2sBadan+Kepegawaian+Daerah+Provinsi+DKI+Jakarta!5e0!3m2!1sid!2sid!4v1504863906805" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe> --}}
                                    {!! $pengaturan_website->embed_maps !!}
                                </div> 
                    </main>
                    <!--~./ end site main ~-->
                </div>

                <div class="col-lg-6">
                    <div class="sidebar">
                        <div class="sidebar-inner">
                            <!--~~~~~ Start Widget Advertisement ~~~~~-->
                            <aside class="widget widget-text">           
                                <div class="widget-content">
                                   <!--~~~~~ Start Comments Area ~~~~~-->
                        <div class="comments-area" id="comments">
                            <div class="comment-respond" id="respond">
                                <h3 class="comment-reply-title headline"><span>Mengubungi Kami</span></h3>
                                <p style="color: black">Anda dapat menghubungi kami melalui formulir di bawah ini</p>
                                <div id="message"></div>
                                @if(session()->has('message'))
                                    <div class="reviews-comments-item-text fl-wrap" style="margin-bottom:10px;">
                                        <p>" {{ session()->get('message') }} "</p>
                                    </div>
                                    <br>
                                @endif
                                <form  class="custom-form" method="post" action="{{ action('Frontend\HomeCrontoller@contactSave') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='text' name='nama' id='nama' class="form-controllar"  aria-required="true" placeholder="Nama Anda*">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='text' name='email' id='email-comments' class="form-controllar"  aria-required="true" placeholder="Email Anda*">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='text' name='telpon' id='telpon' class="form-controllar"  aria-required="true" placeholder="Telepon/HP Anda">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <input type='text' name='judul' id='judul' class="form-controllar"  aria-required="true" placeholder="Judul Anda">
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p>
                                                <textarea name='pesan' id='pesan' class="form-controllar" aria-required="true" rows="8" cols="45" placeholder="Pesan Anda...."></textarea>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="form-submit">
                                                <input type="submit" value="Kirim Pesan" id="submit" name="submit">
                                            </p>
                                        </div>
                                    </div>
                                </form> 
                            </div><!-- #respond -->      
                        </div> <!--~./ end comments area ~-->
                                </div>
                            </aside><!--~./ end widget advertisement ~-->
                            
                        </div>
                    </div>
                </div><!--~./ end sidebar ~-->
        </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor_components/datatable/datatables.css')}}">
@endpush

@push('js')
<script src="{{asset('assets/backend/vendor_components/datatable/datatables.js')}}"></script>
<script>
    $(document).ready(function(){
        
           var tabel = $('.tabel').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 ,
           processing: true,
           serverSide: true,
           ajax: {
           url: "{{ url('unduhan/table/') }}/seluruh",
           },
           columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'keterangan',
                name: 'keterangan'
            },
            {
                data: 'option',
                name: 'option'
            },
           ],
           "initComplete": function(settings, json) {
               deleteData();
               
           }
           });

           function deleteData()
           {
                $('#ModalHapus').on('show.bs.modal', function(e) {
                    var id = $(e.relatedTarget).attr('data-id');
                    var nama = $(e.relatedTarget).attr('data-nama');
                    console.log(id);
                    $('.NamaUserHapus').html('');
                    $('.AksiHapus').html('');
                    $('.NamaUserHapus').html(nama);
                    $('.AksiHapus').html('<button type="button" class="btn btn-default btn-cons no-margin float-left inline" data-dismiss="modal">Batal</button><button type="button" class="btn btn-danger btn-cons  float-right inline TombolHapus" data-id="'+id+'" data-token="{{ csrf_token() }}" >Hapus</button>');
                    $('.TombolHapus').on('click',function(e)
                    {
                        var idDelete = $(this).attr('data-id');
                        var token = $(this).attr('data-token');
                        $.ajax({
                            url:"{{url('dashboard/link-terkait/delete')}}/" + idDelete,
                            type: 'POST',
                            data: {_method: 'delete', _token :token},
                            success:function(get){
                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                }
                            if(get == 1)
                            {
                                toastr["success"]("Data  Berhasil Dihapus", "Sukses !!")
                            }
                            else
                            {
                                toastr["error"]("Terjadi Kesalahan Saat Menghapus Data", "Gagal !!")
                            }
                            $('#ModalHapus').modal('hide');
                            tabel.ajax.reload();
                            }

                        });
                    });
                });
           }

          
           
       });
    </script>
@endpush