<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item ">
            <a class="nav-link {{ $title == 'Dashboard' ? '' : 'collapsed' }}" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $title == 'olt' ? '' : 'collapsed' }}" href="/olt">
                <i class="bi bi-person"></i>
                <span>OLT Hostname</span>
            </a>
        </li>

        @auth
            @if (in_array(auth()->user()->role, ['Administrator']))
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Admin' ? '' : 'collapsed' }}" href="/admin">
                        <i class="bi bi-people"></i>
                        <span>Administrator</span>
                    </a>
                </li>
            @endif
        @endauth

        <li class="nav-item m-3">
            <a href="/logout">
                <button class="btn btn-secondary {{ $title == 'Admin' ? '' : 'collapsed' }}" type="button">
                    <i class="bi bi-box-arrow-down-right"></i>
                    <span>Logout</span>
                </button>
            </a>
        </li>

        <!-- End Profile Page Nav -->

        {{-- <li class="nav-item">
        <a class="nav-link {{ ($title == "_Dashboard") ? "" : "collapsed" ; }}" href="/dev/BANDUNG">
          <i class="bi bi-person"></i>
          <span>_Dashboard (on work)</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}

    </ul>

</aside><!-- End Sidebar-->
