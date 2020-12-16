@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">
        
      <div class="col-12">
          <div class="box">
              <div class="box-header">						
                  <h4 class="box-title">{{ strtoupper($page_name) }}</h4>
               </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tabel" class="tabel table table-striped display table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Judul</th>
                                <th>Pesan</th>
                                <th>Kontak Masuk</th>
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


<div class="modal center-modal fade" id="ModalHapus" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data {{ $category_name }}</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p class="no-margin">Apakah Anda Yakin Akan Menghapus {{ $category_name }} <span class="badge badge-danger NamaUserHapus">Danger</span> ?</p>
        </div>
        <div class="modal-footer modal-footer-uniform modal-footer AksiHapus">
        </div>
      </div>
    </div>
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
           url: "{{ url('dashboard/kontak/table') }}",
           },
           columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'telpon',
                name: 'telpon'
            },
            {
                data: 'judul',
                name: 'judul'
            },
            {
                data: 'pesan',
                name: 'pesan'
            },
            {
                data: 'tanggal',
                name: 'tanggal'
            }
           ],
           "initComplete": function(settings, json) {

               
           }
           });

       

          
           
       });
    </script>
@endpush