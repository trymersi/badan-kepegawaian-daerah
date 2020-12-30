<style>
 .tabel, td, th {
  border: 1px solid black;
}

.tabel {
  width: 100%;
  border-collapse: collapse;
}
    </style>
<title>{{ $title }} </title>
<link rel="stylesheet" href="{{ asset('assets/backend/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
<table width="100%" class="tabel table table-striped display table-bordered">
    <tr>
        <th colspan="2"  class="text-center" valign="center" style="height: 50px; "><span style="vertical-align:inherit;margin-top:50px">Cetak Data Konsultasi</span></th>
    </tr>
    <tr>
        <th width="25%">Tanggal Diterima</th>
        <td>{{ tgl_indo($konsultasi->created_at) }}</td>
    </tr>
   
    <tr>
        <th width="25%">Nama</th>
        <td>{{ $konsultasi->nama }}</td>
    </tr>
    <tr>
        <th width="25%">Nomor Kontak</th>
        <td>{{ $konsultasi->nope }}</td>
    </tr>
    <tr>
        <th width="25%">Email</th>
        <td>{{ $konsultasi->email }}</td>
    </tr>
    <tr>
        <th width="25%">Pertanyaan</th>
        <td>{{ $konsultasi->pertanyaan }}</td>
    </tr>
    <tr>
        <th width="25%">Isi Pertanyaan</th>
        <td>{{ $konsultasi->keterangan }}</td>
    </tr>
</table>