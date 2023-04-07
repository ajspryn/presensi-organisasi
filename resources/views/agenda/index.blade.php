@extends('layouts.main')

@section('title', 'Anggota')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom ps-0 pe-0">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12 col-xxl-9 col-lg-8">
                        <div class="card d-block mt-4 border-0 shadow-xss bg-white p-lg-5 p-4">
                            <span class="font-xsssss fw-700 ps-3 pe-3 lh-32 text-uppercase rounded-3 ls-2 bg-primary-gradiant d-inline-block text-white ">{{ $agenda->event->nama }}</span>
                            <h2 class="fw-700 font-lg mt-3 mb-2">{{ $agenda->nama }}</h2>
                            <p class="font-xsss fw-500 text-grey-500 lh-30 pe-5 mt-3 me-5">{{ $agenda->keterangan }}</p>
                            <p class="review-link font-xssss fw-600 text-grey-500 lh-3 mb-0">{{ $agenda->jam_mulai }} WIB - {{ $agenda->jam_berakhir }} WIB</p>
                            <div class="clearfix"></div>
                            <h5 class="mt-4 mb-4 d-inline-block font-xssss fw-600 text-grey-500 me-2"><i class="btn-round-sm bg-greylight ti-user text-grey-500 me-1"></i> {{ $agenda->presensi->count() }}</h5>
                            <h5 class="mt-4 mb-4 d-inline-block font-xssss fw-600 text-grey-500 me-2"><i class="btn-round-sm bg-greylight ti-book text-grey-500 me-1"></i> {{ $agenda->materi->count() }}</h5>
                            <div class="clearfix"></div>
                            @can('dokumentasi create')
                                <a href="#" class="btn-round-lg ms-2 d-inline-block rounded-3 bg-danger"><i class="feather-camera font-sm text-white"></i> </a>
                            @endcan
                            @can('agenda create')
                                <a href="/printqr?agenda={{ $agenda->uuid }}" class="btn-round-lg ms-2 d-inline-block rounded-3 bg-greylight"><i class="feather-printer font-sm text-grey-700"></i></a>
                            @endcan
                            @can('rekap presensi read')
                                <a href="/materi/create?agenda={{ $agenda->uuid }}" class="bg-primary-gradiant border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-inline-block mt-0 p-2 lh-34 text-center ls-3 w200 ms-2">Tambah Materi</a>
                            @endcan
                            @can('materi create')
                                <a href="/rekap/{{ $agenda->uuid }}" class="bg-warning border-0 text-white fw-600 text-uppercase font-xssss float-left rounded-3 d-inline-block mt-0 p-2 lh-34 text-center ls-3 w200 ms-2">Rekap Presensi</a>
                            @endcan
                        </div>
                        @can('materi read')
                            <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4">
                                <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 mb-3">Materi</h2>
                                @foreach ($agenda->materi as $materi)
                                    <div class="card-body bg-transparent-card d-flex p-3 bg-greylight ms-3 me-3 rounded-3 mb-3">
                                        <figure class="avatar me-2 mb-0"><i class="font-xl text-current feather-paperclip "></i></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-2">{{ $materi->keterangan }} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $materi->created_at->diffForHumans() }}</span></h4>
                                        <a href="{{ asset('storage/' . $materi->file) }}" target="blank" class="btn-round-sm bg-white text-grey-900 feather-download font-xss ms-auto mt-2"></a>
                                    </div>
                                @endforeach
                            </div>
                        @endcan
                        @can('dokumentasi read')
                            <div class="card d-block border-0 rounded-3 overflow-hidden p-4 shadow-xss mt-4">
                                <h2 class="fw-700 font-sm mb-3 mt-1 ps-1 mb-3">Dokumentasi</h2>
                                <div class="row ps-3 pe-3">
                                    <div class="col-sm-4 col-xss-4 pe-1 ps-1 mb-2"><a href="images/p-1.jpg" data-lightbox="roadtrip"><img src="images/p-1.jpg" alt="image" class="img-fluid w-100 rounded-3"></a></div>
                                    <div class="col-sm-4 col-xss-4 pe-1 ps-1 mb-2"><a href="images/p-2.jpg" data-lightbox="roadtrip"><img src="images/p-2.jpg" alt="image" class="img-fluid w-100 rounded-3"></a></div>
                                    <div class="col-sm-4 col-xss-4 pe-1 ps-1 mb-2"><a href="images/p-3.jpg" data-lightbox="roadtrip"><img src="images/p-3.jpg" alt="image" class="img-fluid w-100 rounded-3"></a></div>
                                    <div class="col-sm-4 col-xss-4 pe-1 ps-1 mb-2"><a href="images/p-4.jpg" data-lightbox="roadtrip"><img src="images/p-4.jpg" alt="image" class="img-fluid w-100 rounded-3"></a></div>
                                    <div class="col-sm-4 col-xss-4 pe-1 ps-1 mb-2"><a href="images/p-5.jpg" data-lightbox="roadtrip"><img src="images/p-5.jpg" alt="image" class="img-fluid w-100 rounded-3"></a></div>
                                    <div class="col-sm-4 col-xss-4 pe-1 ps-1 mb-2"><a href="images/p-6.jpg" data-lightbox="roadtrip"><img src="images/p-6.jpg" alt="image" class="img-fluid w-100 rounded-3"></a></div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->

@endsection
