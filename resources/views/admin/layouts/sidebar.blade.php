<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{url('admin/dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Menu
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{asset('admin.layanan.index')}}">Layanan </a>
                            <a class="nav-link" href="{{asset('admin.transaksi.index')}}">Transaksi </a>
                            <a class="nav-link" href="{{asset('admin/pengguna')}}">Users </a>
                            <a class="nav-link" href="{{asset('admin.pemesanan.index')}}">Pemesanan </a>
                        </nav>
                    </div>
                    @if(Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{url('admin/user')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i> </div>
                    Management User
                    </a>
                    @endif
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>