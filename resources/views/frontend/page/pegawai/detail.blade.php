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
                <div class="col-lg-12">
                    <!--~~~~~ Start Site Main ~~~~~-->
                    <main class="site-main">
                        <div class="container">
                            <h2 class="title-underblock custom mb50 text-center">{{ $pegawai->nama }}</h2>
                            <div class="row text-center justify-content-md-center" align="center">
                                <div class="col-md-3 col-xs-6 team-member-container col-centered">
                                    <div class="team-member team-member-box custom text-center">
                                        <div class="col-md-12">
                                            <figure>
                                                <a href="{{ url('pegawai/'.$pegawai->id) }}">
                                                    <img src="{{ asset('/uploads/images/foto-pegawai/'.$pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="img-responsive" />
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-md-12">
                                            <div style="color: white; text-transform: uppercase; font-size: 11pt; font-weight: bold;">{{ $pegawai->nama }}</div>
                                            <div style="border-bottom: solid 1px white; margin-bottom: 10px; margin-top: 5px;"></div>
                                            <div><h5 style="color: #ecf0f1; text-transform: uppercase;">{{ jabatan($pegawai->jabatan) }}</h5></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- End .team-member -->
                                </div>
                                <!-- End .member-container -->
                            </div>

                        </div>
                        
                    </main>
                    <!--~./ end site main ~-->
                </div>
                <div class="table-responsive">
                    <table id="tabel" class="styled-table" style="width:100%">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">INFORMASI DARI {{ strtoupper($pegawai->nama) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th width="30%">Nama</th>
                                <td>{{ $pegawai->nama }}</td>
                            </tr>
                            <tr>
                                <th width="30%">jabatan</th>
                                <td>{{ jabatan($pegawai->jabatan) }}</td>
                            </tr>
                            <tr>
                                <th width="30%">Pendidikan Terakhir</th>
                                <td>{{ $pegawai->pendidikan }}</td>
                            </tr>
                        </tbody>
                        
                    </table>
                   
        </div>
    </div><!--~./ end main wrapper ~-->
</div>
@endsection

@push('css')
<style>
.justify-content-md-center {
    text-align: center;
}
.title-underblock {
    position: relative;
    padding-bottom: 0.6em;
    margin-top:30px;
    margin-bottom:2px;
  
}

blockquote:after, .highlight.first-color, .bg-custom, .dropcap-bg.first-color, .btn-custom, .btn-custom2:hover, .btn-custom2:focus, .btn-custom2.focus, .btn-custom2:active, .btn-custom2.active, .open > .dropdown-toggle.btn-custom2, .btn.btn-border.btn-custom:hover, .btn.btn-border.btn-custom:focus, .btn.btn-border.btn-white:hover, .btn.btn-border.btn-white:focus, .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus, .nav-pills.nav-tabs-border .lavalamp-object, .progress-bar-custom, .progress-bar-custom .progress-tooltip, .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus, .panel-custom > .panel-heading, .tooltip-inner, .popover-title, .carousel-control:hover, .carousel-control:focus, .service-hover-bg:hover, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .bg-custom .divider > span, .team-member-box.custom, .label-custom, .callout:after, .callout.custom, .navbar-top.navbar-color, .cart-dropdown .navbar-btn .badge, .overlay-container .overlay.custom, .page-header.custom, .bg-custom .title-border > span, .title-border.title-bg.custom, .title-bg-line.custom:after, .title-underblock.custom:after, .carousel-tab .carousel-indicators li.active, .carousel-tab.gray .carousel-indicators li.active, .rect-dots .owl-dot.active, .info-line-section.custom, .landing-features-section.section, .pricing-table .price.custom, .pricing-table.custom, .entry-format, .timeline-date, .product-box.new-box, .product-action-container .btn.btn-dark:hover, .product-action-container .btn.btn-dark:focus, .filter-row .btn-layout.active, .filter-row .btn-layout.active:hover, .filter-row .btn-layout.active:focus, .category-widget-btn:hover, .open .category-widget-btn, .filter-size-box.active, .filter-size-box.active:hover, .filter-size-box.active:focus, .noUi-connect, .noUi-handle, #portfolio-item-container.custombg .portfolio-item.push, .portfolio-meta.custom, #footer .widget h4:after, #footer .tagcloud a:hover, .tagcloud a:hover, #footer.footer-inverse .tagcloud a:hover, #footer.footer-default .tagcloud a:hover, #footer.footer-custom, .custom-nav .owl-prev, .custom-nav .owl-next, .nav-border.custom-nav .owl-prev:hover, .nav-border.custom-nav .owl-next:hover, .nav-border.white-nav .owl-prev:hover, .nav-border.white-nav .owl-next:hover, #scroll-top:hover, #scroll-top.white:hover, .sbOptions a:hover, .sbOptions a:focus, .sbOptions a.sbFocus {
    background-color: #138a23;
}
.mb50 {
    margin-bottom: 50px!important;
}
.justify-content-md-center {
    text-align: center;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.col-centered {
    display: inline-block;
    float: none;
    text-align: left;
    margin-right: -4px;
}
.team-member figure {
    margin-bottom: 25px;
    position: relative;
}
.text-center {
    text-align: center;
}
.team-member-box {
    padding: 15px 15px 10px;
    background: #f6f6f6;
    transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
}
.team-member-box {
    min-height: 380px;
}
.team-member {
    position: relative;
    margin-bottom: 50px;
}
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #145A32;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #145A32;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #F4D03F;
}
</style>
@endpush

