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
        <li class="header">Data Dinas </li>
        <li class="@if($category_name == "Bidang") active @endif">
            <a href="{{ url('/dashboard/bidang') }}">
                <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                <span>Data Bidang</span>
            </a>
        </li>

        <li class="@if($category_name == "Sub Bidang") active @endif">
            <a href="{{ url('/dashboard/sub-bidang') }}">
                <i class="fa fa-window-restore" aria-hidden="true"></i>
                <span>Data Sub Bidang</span>
            </a>
        </li>
        
        <li class="@if($category_name == "Link Terkait") active @endif">
          <a href="{{ url('/dashboard/link-terkait') }}">
              <i class="fa fa-window-restore" aria-hidden="true"></i>
              <span>Data Link Terkait</span>
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