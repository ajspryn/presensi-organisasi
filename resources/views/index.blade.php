@extends('layouts.main')

@section('title', 'Dahboard')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl mb-3">
                            <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3"><img src="https://source.unsplash.com/1024x250/?mosque,islam" alt="image"></div>
                            <div class="card-body p-0 position-relative">
                                <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                <h4 class="fw-700 font-sm mt-2 mb-lg-5 mb-1 pl-15">{{ Auth::user()->name }}
                                    <span class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block">{{ Auth::user()->email }}</span>
                                </h4>
                            </div>
                            @if (Auth::user()->anggota && Auth::user()->anggota->organisasi)
                                <div class="ard-body h250 p-0 rounded-xxl overflow-hidden m-3">
                                    <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e5f6ff;">
                                        <div class="card-body d-flex p-0">
                                            {{-- <i class="btn-round-lg d-inline-block me-3 bg-primary-gradiant feather-home font-md text-white"></i> --}}
                                            <h4 class="text-primary font-xl fw-700">{{ Auth::user()->anggota->organisasi->nama }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Anda Terdaftar Sejak {{ Auth::user()->anggota->created_at->diffForHumans() }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-12 ">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="images/bg-2.png" alt="image" class="w-100">
                                        </div>
                                        <div class="col-lg-6 ps-lg-5">
                                            <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">
                                                <span class="font-xssss fw-600 text-grey-500 d-block mb-2 ms-1">Hallo ...</span>
                                                Anda Bisa Melakukan Presensi Event Organisasi Anda Disini
                                            </h2>
                                            <p class="font-xssss fw-500 text-grey-500 lh-26">Silahkan download aplikasi ini untuk kemudahaan presensi di setiap event nya</p>

                                            <a href="/presensi" class="btn w200 border-0 bg-primary-gradiant p-3 text-white fw-600 rounded-3 d-inline-block font-xssss">Mulai Presensi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                {{-- {{ Auth::user()->presensi[0]->agenda }} --}}
                                <div class="banner-wrapper bg-greylight overflow-hidden rounded-3">
                                    <div class="banner-slider owl-carousel owl-theme dot-style2 owl-nav-link link-style3 overflow-hidden">
                                        @foreach (Auth::user()->presensi as $presensi)
                                            <div class="owl-items style1 d-flex align-items-center bg-lightblue">
                                                <div class="row">
                                                    <div class="col-lg-6 p-lg-5 ps-5 pe-5 pt-4" style="padding-right: 20px !important;">
                                                        <div class="card w-100 border-0 ps-lg-5 ps-0 bg-transparent bg-transparent-card">
                                                            <h4 class="font-xssss text-danger ls-3 fw-700 ms-0 mt-4 mb-3">{{ $presensi->agenda->event->nama }}</h4>
                                                            <h2 class="fw-300 display2-size display2-md-size lh-2 text-grey-900">{{ $presensi->agenda->tanggal }} <br> <b class="fw-700">{{ $presensi->agenda->nama }}</b></h2>
                                                            <p class="fw-500 text-grey-500 lh-26 font-xssss pe-lg-5">{{ $presensi->agenda->keterangan }}</p>
                                                            <a href="/agenda?agenda={{ $presensi->agenda->uuid }}" class="fw-700 text-white rounded-xl bg-primary-gradiant font-xsssss text-uppercase ls-3 lh-30 mt-0 text-center d-inline-block p-2 w150">Lihat Detail</a>
                                                        </div>
                                                    </div>
                                                    @if ($presensi->agenda->event->flayer)
                                                        <div class="col-lg-6"><img src="{{ asset('storage/' . $presensi->agenda->event->flayer) }}" alt="image" class="img-fluid p-md-5 p-4"></div>
                                                    @else
                                                        <div class="col-lg-6"><img src="{{ asset('images/bg-43.png') }}" alt="image" class="img-fluid p-md-5 p-4"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="owl-items style1 d-flex align-items-center bg-cyan">
                                            <div class="row">
                                                <div class="col-lg-6 p-lg-5 ps-5 pe-5 pt-4" style="padding-right: 20px !important;">
                                                    <div class="card w-100 border-0 ps-lg-5 ps-0 bg-transparent bg-transparent-card">
                                                        <h4 class="font-xssss text-white ls-3 fw-700 ms-0 mt-4 mb-3">TRENDING</h4>
                                                        <h2 class="fw-300 display2-size display2-md-size lh-2 text-white">New Arrival Buds <br> <b class="fw-700">Collection</b></h2>
                                                        <p class="fw-500 text-grey-100 lh-26 font-xssss pe-lg-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra.</p>
                                                        <a href="#" class="fw-700 text-grey-900 rounded-xl bg-white font-xsssss text-uppercase ls-3 lh-30 mt-0 text-center d-inline-block p-2 w150">Shop Now</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"><img src="images/pl-23.png" alt="image" class="img-fluid p-md-5 p-4"></div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-3 pe-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e5f6ff;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-primary-gradiant feather-home font-md text-white"></i>
                                        <h4 class="text-primary font-xl fw-700">2.3M <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">day visiter</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pe-2 ps-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #f6f3ff;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-secondary feather-lock font-md text-white"></i>
                                        <h4 class="text-secondary font-xl fw-700">44.6K <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">total user</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pe-2 ps-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e2f6e9;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-success feather-command font-md text-white"></i>
                                        <h4 class="text-success font-xl fw-700">603 <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">monthly sale</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 ps-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #fff0e9;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-warning feather-shopping-bag font-md text-white"></i>
                                        <h4 class="text-warning font-xl fw-700">3M <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">day visiter</span></h4>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
