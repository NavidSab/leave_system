
  <nav class="header-navbar navbar navbar-expand-lg align-items-center  navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
 
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block">
                  <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="sun"></i>
                  </a>
                  </li>
                  <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style text-primary" href="{{ config('app.url') }}">
                      {{ config('app.name') }}
                    </a>
                    </li>
            </ul>

        </div>

    </div>
</nav>
