<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link {{ ($title == "Dashboard") ? "" : "collapsed" ; }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ ($title == "Halaman 2") ? "" : "collapsed" ; }}" href="/halaman2">
          <i class="bi bi-person"></i>
          <span>Halaman 2</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link {{ ($title == "_Dashboard") ? "" : "collapsed" ; }}" href="/dev/BANDUNG">
          <i class="bi bi-person"></i>
          <span>_Dashboard (on work)</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}

    </ul>

</aside><!-- End Sidebar-->