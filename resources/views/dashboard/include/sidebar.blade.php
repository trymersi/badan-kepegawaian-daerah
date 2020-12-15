<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
      <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">		
		    <li class="treeview">
          <a href="{{ url('/dashboard') }}">
                <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                <span>Dashboard</span>
          </a>
        </li>
        <li class="header">Pengaturan Aplikasi</li>
            <li class="treeview">
              <a href="#">
                <i class="icon-Chat-check"><span class="path1"></span><span class="path2"></span></i>
                <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li class="@if($category_name == "Pengaturan") active @endif">
                  <a href="{{ url('/dashboard/pengaturan') }}">
                      <i class="fa fa-cog" aria-hidden="true"></i>
                      <span>Pengaturan</span>
                  </a>
                </li>

                <li class="@if($category_name == "Level User") active @endif">
                  <a href="{{ url('/dashboard/leveluser') }}">
                      <i class="fa fa-user-plus" aria-hidden="true"></i>
                      <span>Level User</span>
                  </a>
                </li>
        
                <li class="@if($category_name == "User") active @endif">
                  <a href="{{ url('/dashboard/user') }}">
                      <i class="fa fa-users" aria-hidden="true"></i>
                      <span>User</span>
                  </a>
                </li>


              </ul>
            </li>

            <li class="header">Data Dinas</li>
            <li class="treeview">
              <a href="#">
                <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                <span>Data Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              
              <li class="@if($category_name == "Profil") active @endif">
                <a href="{{ url('/dashboard/profil') }}">
                    <i class="fa fa-shield" aria-hidden="true"></i>
                    <span>Profil</span>
                </a>
              </li>

              <li class="@if($category_name == "Pegawai") active @endif">
                <a href="{{ url('/dashboard/pegawai') }}">
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    <span>Pegawai</span>
                </a>
              </li>

              <li class="@if($category_name == "Kategori Berita") active @endif">
                <a href="{{ url('/dashboard/kategori-berita') }}">
                    <i class="fa fa-server" aria-hidden="true"></i>
                    <span>Kategori Berita</span>
                </a>
              </li>

              <li class="@if($category_name == "Berita") active @endif">
                  <a href="{{ url('/dashboard/berita') }}">
                      <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                      <span>Berita</span>
                  </a>
              </li>

              <li class="@if($category_name == "Bidang") active @endif">
                  <a href="{{ url('/dashboard/bidang') }}">
                      <i class="fa fa-folder"><span class="path1"></span><span class="path2"></span></i>
                      <span>Bidang</span>
                  </a>
              </li>

              <li class="@if($category_name == "Sub Bidang") active @endif">
                  <a href="{{ url('/dashboard/sub-bidang') }}">
                      <i class="fa fa-id-card" aria-hidden="true"></i>
                      <span>Sub Bidang</span>
                  </a>
              </li>

              <li class="@if($category_name == "Tupoksi") active @endif">
                <a href="{{ url('/dashboard/tupoksi') }}">
                    <i class="fa fa-pied-piper-alt" aria-hidden="true"></i>
                    <span>Tupoksi</span>
                </a>
              </li>

              <li class="@if($category_name == "Galeri Gambar") active @endif">
                <a href="{{ url('/dashboard/galeri-gambar') }}">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    <span>Galeri Gambar</span>
                </a>
              </li>
      
              <li class="@if($category_name == "Galeri Video") active @endif">
                <a href="{{ url('/dashboard/galeri-video') }}">
                    <i class="fa fa-file-video-o" aria-hidden="true"></i>
                    <span>Galeri Video</span>
                </a>
              </li>

              <li class="@if($category_name == "Kontak") active @endif">
                <a href="{{ url('/dashboard/kontak') }}">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span>Kontak</span>
                </a>
              </li>
      
              <li class="@if($category_name == "Pertanyaan") active @endif">
                <a href="{{ url('/dashboard/pertanyaan') }}">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <span>Pertanyaan</span>
                </a>
              </li>

              </ul>
            </li>

            <li class="header">Terkait</li>
            <li class="treeview">
              <a href="#">
                <i class="icon-File"><span class="path1"></span><span class="path2"></span></i>
                <span>Data Terkait</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li class="@if($category_name == "Link Terkait") active @endif">
                  <a href="{{ url('/dashboard/link-terkait') }}">
                      <i class="fa fa-external-link" aria-hidden="true"></i>
                      <span>Data Link Terkait</span>
                  </a>
                </li>
        
                <li class="@if($category_name == "Aplikasi Terkait") active @endif">
                  <a href="{{ url('/dashboard/aplikasi-terkait') }}">
                      <i class="fa fa-desktop" aria-hidden="true"></i>
                      <span>Aplikasi Terkait</span>
                  </a>
                </li>

              </ul>
            </li>
        <li class="header">Data Konsultasi</li>
            
            <li class="@if($category_name == "Konsultasi") active @endif">
              <a href="{{ url('/dashboard/konsultasi') }}">
                  <i class="fa fa-commenting-o" aria-hidden="true"></i>
                  <span>Konsultasi</span>
              </a>
            </li>

        <li class="header">File Unduhan</li>
        <li class="@if($category_name == "Unduhan") active @endif">
          <a href="{{ url('/dashboard/unduhan') }}">
              <i class="fa fa-download" aria-hidden="true"></i>
              <span>Unduhan</span>
          </a>
        </li>
        <li class="header">FAQ</li>
        <li class="@if($category_name == "FAQ") active @endif">
          <a href="{{ url('/dashboard/faq') }}">
              <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <span>FAQ</span>
          </a>
        </li>
      </ul>
    </section>
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><span class="icon-Settings-2"></span></a>
		<!-- item-->
		<a href="mailbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><span class="icon-Mail"></span></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>