<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('assets') }}/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">@php
                echo env('APP_NAME');
            @endphp</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('obat*') ? 'active' : '' }}" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Obat</span>
                </a>
                <ul class="dropdown-menu mx-4 my-0" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="{{ route('obat') }}">
                            Daftar Obat
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('obat.kadaluarsa') }}">
                            Obat Kadaluarsa
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('obat*') ? 'active' : '' }}" data-bs-toggle="collapse"
                    data-bs-target="#sidenav-collapse-main">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Obat</span>
                </a>
                <ul style="list-style: none;" class="collapse mx-4 my-2 show" id="sidenav-collapse-main">
                    <li class="rounded border p-1 mb-1">
                        <a href="{{ route('obat') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32" id="Drug"><g stroke="#493534" stroke-linecap="round" stroke-linejoin="round" class="colorStroke373449 svgStroke"><g transform="rotate(-30 -1902.645 519.405)" fill="#26d7fe" class="color000000 svgShape"><circle cx="7.5" cy="16.5" r="4.5" fill="#9ae45f" transform="translate(.5 1015.862)" class="colora0e06e svgShape"></circle><path fill="none" d="M4 1032.362h8"></path></g><g transform="translate(-.5 -1022.046)" fill="#26d7fe" class="color000000 svgShape"><rect width="6" height="15" x="743.536" y="709.338" fill="#d45985" rx="3" ry="3" transform="rotate(45)" class="colorffdc7b svgShape"></rect><path fill="none" d="m18.808 1032.711 4.242 4.243"></path></g><g transform="rotate(135 228.923 535.343)" fill="#26d7fe" class="color000000 svgShape"><circle cx="7.5" cy="16.5" r="4.5" fill="#d5e0cd" stroke-width="1.286" transform="translate(4.167 1030.529) scale(.77778)" class="colorcdd7e0 svgShape"></circle><path fill="none" d="M7 1043.362h6"></path></g><g fill="#d85b53" transform="rotate(-90 -490.787 533.789)" class="colorff5855 svgShape"><rect width="6" height="15" x="743.536" y="709.338" rx="3" ry="3" transform="rotate(45)" fill="#26d7fe" class="color000000 svgShape"></rect><path d="m18.808 1032.711 4.242 4.243" fill="#26d7fe" class="color000000 svgShape"></path></g></g></svg>
                            Daftar Obat
                        </a>
                    </li>
                    <li class="rounded border p-1">
                        <a href="{{ route('obat.kadaluarsa') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" id="drug"><g stroke="#373449" stroke-linecap="round" stroke-linejoin="round" transform="rotate(-45 -1210.761 531.007)"><circle cx="25" cy="22" r="2" fill="#ffdc7b" transform="translate(.5 1019.862)"></circle><path fill="none" d="M24 1041.862h3"></path></g><g stroke="#373449" transform="rotate(-60 -859.348 539.935)"><rect width="3" height="6" x="27.5" y="1045.362" fill="#2e7dd0" stroke-linecap="round" stroke-linejoin="round" rx="1.5" ry="1.5"></rect><path fill="none" d="M27.5 1048.362h3"></path></g><g fill="#cdd7e0" stroke="#373449" stroke-linecap="round" stroke-linejoin="round" transform="rotate(59.264 931.766 528.83)"><circle cx="25" cy="22" r="2" transform="translate(.5 1019.862)"></circle><path d="M24 1041.862h3"></path></g><path fill="#cdd7e0" d="M5.404 4.505h10.974v3.016H5.404z"></path><path fill="#a0e06e" d="M7.431 7.505v2c0 1.864-5.03-.453-5.03 3.5v14.489h17.03V13.022c0-4.055-4.972-1.817-4.972-3.517v-2z"></path><path fill="#ff5855" stroke="#373449" stroke-linecap="round" stroke-linejoin="round" d="M9.4 16.553v2.469H6.9v3.03h2.5v2.47h3.032v-2.47H14.9v-3.03h-2.47v-2.47h-3.03z"></path><path fill="#b6e887" d="M7.425 7.505v2c0 1.863-5.031-.454-5.031 3.5v14.5h1.531v-14.5c0-2.66 5.031-.876 5.031-3.5v-2z"></path><path fill="#8ac45f" d="M14.4 7.505v2c0 1.864 5.032-.453 5.032 3.5v14.5H17.9v-14.5c0-2.66-5.032-.876-5.032-3.5v-2z"></path><path fill="none" stroke="#373449" stroke-linecap="round" stroke-linejoin="round" d="M7.431 7.505v2c0 1.864-5.03-.453-5.03 3.5v14.489h17.03V13.022c0-4.055-4.972-1.817-4.972-3.517v-2zm-5.044 6h17.028"></path><path fill="#f4f4f4" d="M5.394 4.505v3.031h1.531V4.505H5.394zM7.946 4.505v3.032h.979V4.505z"></path><path fill="none" stroke="#373449" stroke-linecap="round" stroke-linejoin="round" d="M5.425 4.505h10.974v3.016H5.425z"></path></svg>
                            Obat Kadaluarsa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('transaksi*') ? 'active' : '' }}" href="{{ route('transaksi') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}" href="{{ route('laporan') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/profile.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/sign-in.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/sign-up.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('assets') }}/img/illustrations/icon-documentation.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to
            pro</a>
    </div>
</aside>
