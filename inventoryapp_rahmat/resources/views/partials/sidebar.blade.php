<aside class="left-sidebar">
  <div>

    <!-- HEADER USER -->
    <div class="brand-logo px-3 py-3 border-bottom">
      @auth
        <h5 class="mb-0 fw-bold text-primary">
            {{ auth()->user()->name }}
        </h5>
      @else
        <h5 class="mb-0 fw-bold text-secondary">
            Guest
        </h5>
      @endauth
    </div>

    <!-- NAVBAR -->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">

        <!-- HOME -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
          <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="/">
            <span>
              <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <!-- MASTER -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
          <span class="hide-menu">Master</span>
        </li>

        @auth
        @if(auth()->user()->role == 'admin')
        <li class="sidebar-item">
          <a class="sidebar-link" href="/category">
            <span>
              <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
            </span>
            <span class="hide-menu">Category</span>
          </a>
        </li>
        @endif
        @endauth

        <li class="sidebar-item">
          <a class="sidebar-link" href="/product">
            <span>
              <iconify-icon icon="solar:box-bold-duotone" class="fs-6"></iconify-icon>
            </span>
            <span class="hide-menu">Product</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="/transaction">
            <span>
              <iconify-icon icon="solar:card-transfer-bold-duotone" class="fs-6"></iconify-icon>
            </span>
            <span class="hide-menu">Transaction</span>
          </a>
        </li>

      </ul>
    </nav>

  </div>
</aside>