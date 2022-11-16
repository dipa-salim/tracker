<aside class="main-sidebar bg-white elevation-4">

  <a href="{{ asset('adminlte') }}/index3.html" class="brand-link">
    <img src="{{ asset('adminlte') }}/img/motra2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-bold">TRA-CER</span>
  </a>

  <div class="sidebar">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if (auth()->user()->role == 'Admin')
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master Data
              </p>
            </a>
          </li>
        @endif

        @if (auth()->user()->role == 'Kurir')
          <li class="nav-item">
            <a href="{{ url('/log-kurir') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Log Activity
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link {{ request()->is('logout') ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-box"></i>
              <p>Logout</p>
            </a>
          </li>
        @endif
      </ul>
    </nav>

  </div>

</aside>
