<!-- navigation left -->
<nav class="navigation scroll-bar">
    <div class="container ps-0 pe-0">
        <div class="nav-content">
            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                <div class="nav-caption fw-600 font-xssss text-grey-500">Menu Utama</div>
                <ul class="mb-1 top-content">
                    <li class="logo d-none d-xl-block d-lg-block"></li>
                    <li><a href="/" class="nav-content-bttn open-font"><i class="feather-home btn-round-md bg-blue-gradiant me-3"></i><span>Home</span></a></li>
                    <li><a href="/presensi" class="nav-content-bttn open-font"><i class="feather-user-check btn-round-md bg-red-gradiant me-3"></i><span>Presensi</span></a></li>
                    @if (Auth::user()->anggota)
                        @can('organisasi read')
                            <li>
                                <a href="/organisasi/{{ Auth::user()->anggota->organisasi->uuid }}" class="nav-content-bttn open-font"><i class="feather-globe btn-round-md bg-mini-gradiant me-3"></i><span>Organisasi</span></a>
                            </li>
                        @endcan
                        @can('keuangan read')
                            <li>
                                <a href="/keuangan" class="nav-content-bttn open-font"><i class="feather-dollar-sign btn-round-md bg-gold-gradiant me-3"></i><span>Keuangan</span></a>
                            </li>
                        @endcan
                    @endif
                    {{-- <li><a href="user-page.html" class="nav-content-bttn open-font"><i class="feather-user btn-round-md bg-primary-gradiant me-3"></i><span>Author Profile </span></a></li> --}}
                </ul>
            </div>

            @if (auth()->user()->can('user read') ||
                    auth()->user()->can('role read'))
                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2">
                    <div class="nav-caption fw-600 font-xssss text-grey-500">Administration</div>
                    <ul class="mb-3">
                        @can('user create')
                            <li><a href="/user" class="nav-content-bttn open-font"><i class="font-xl text-current feather-user me-3"></i><span>User</span></a></li>
                        @endcan
                        @can('role create')
                            <li><a href="/role" class="nav-content-bttn open-font"><i class="font-xl text-current feather-award me-3"></i><span>Role</span></a></li>
                        @endcan
                        @can('organisasi create')
                            <li><a href="/organisasi" class="nav-content-bttn open-font"><i class="font-xl text-current feather-globe me-3"></i><span>Semua Organisasi</span></a></li>
                        @endcan
                    </ul>
                </div>
            @endif
            <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                <ul class="mb-1">
                    <li class="logo d-none d-xl-block d-lg-block"></li>
                    <li><a href="/user/{{ encrypt(Auth::user()->id) }}" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-settings me-3 text-grey-500"></i><span>Settings</span></a></li>
                    {{-- <li><a href="default-analytics.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-pie-chart me-3 text-grey-500"></i><span>Analytics</span></a></li> --}}
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-log-out me-3 text-grey-500"></i><span>Log Out</span></a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- navigation left -->
