@push('css')

@endpush

@extends('frontend.main-2')

@section('content')

@include('frontend.include.breadcrumb')
<div class="site-content">
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Main Wrapper
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="main-wrapper ptb-80 style-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-success">Berikut adalah seluruh berkas digital yang dapat Anda unduh</p>
                    <!--~~~~~ Start Site Main ~~~~~-->
                    <main class="site-main">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="tabel" class="tabel table table-striped display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA DOKUMEN</th>
                                            <th>KETERANGAN / TENTANG</th>
                                            <th width="15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                              </div>
                        </div>
                    </main>
            </div>
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