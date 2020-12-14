@extends('dashboard.main')


@section('content')
<section class="content">
    <div class="row">
        
      <div class="col-12">
          <div class="box">
              <div class="box-header">						
                  <h4 class="box-title">Complex headers (rowspan and colspan)</h4>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tabel" class="tabel table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Thumbnail</th>
                                <th>Kategori</th>
                                <th>Label</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>

<div class="modal fade stick-up" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data {{ $page_name }}</h5>
            </div>
            <div class="modal-body">
              <p class="no-margin">Apakah Anda Yakin Akan Menghapus {{ $page_name }} <mark class="text-danger NamaUserHapus">highlight</mark> ?</p>
            </div>
            <div class="modal-footer AksiHapus">
              
            </div>
          </div>
    </div>
</div>

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor_components/datatable/datatables.css')}}">
@endpush

@push('js')
<script src="{{asset('backend/vendor_components/datatable/datatables.js')}}"></script>
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
           url: "{{ url('dashboard/berita/table') }}",
           },
           columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'gambar',
                name: 'gambar'
            },
            {
                data: 'nama_kategori',
                name: 'nama_kategori'
            },
            {
                data: 'label',
                name: 'label'
            },
            @if(Auth::user()->level != 7)
            {
                data: 'nama_kabupaten',
                name: 'nama_kabupaten'
            },
            @endif
            {
                data: 'tanggal',
                name: 'tanggal'
            },
           {
               data: 'option',
               name: 'option'
            }
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
                    $('.AksiHapus').html('<button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button><button type="button" class="btn btn-danger btn-cons  pull-left inline TombolHapus" data-id="'+id+'" data-token="{{ csrf_token() }}" >Hapus</button>');
                    $('.TombolHapus').on('click',function(e)
                    {
                        var idDelete = $(this).attr('data-id');
                        var token = $(this).attr('data-token');
                        $.ajax({
                            url:"{{url('dashboard/berita/delete')}}/" + idDelete,
                            type: 'POST',
                            data: {_method: 'delete', _token :token},
                            success:function(get){
                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                }
                            if(get.status == '1')
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