@extends('layouts.main')

@section('title', 'Anggota')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                            <div class="bg-pattern-div"></div>
                            <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">{{ $event->nama }} <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">{{ $event->deskripsi }}</span></h2>
                            @can('agenda create')
                                <a href="/agenda/create?event={{ $event->uuid }}" class="position-absolute bottom-15 mb-3 right-15"><i class="btn-round-sm bg-mini-gradiant text-white font-sm feather-plus"></i></a>
                            @endcan
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="row ps-2 pe-2">
                            @foreach ($event->agenda as $agenda)
                                <div class="col-md-12 col-sm-4 pe-2 ps-2">
                                    <div class="card d-block w-100 border-0 mb-3 shadow-xss bg-white rounded-3 p-4" style="padding-left: 120px !important;">
                                        <img src="images/bg-2.png" alt="images" class="position-absolute p-2 bg-lightblue2 w65 ms-4 left-0">
                                        <i class="feather-bookmark font-md text-danger position-absolute right-0 me-3"></i>
                                        <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">{{ $agenda->nama }} <span class="font-xssss fw-500 text-grey-500 ms-4"></span> </h4>
                                        <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Keterangan : </span> {{ $agenda->keterangan }}</h5>
                                        <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Jam Mulai : </span> {{ $agenda->jam_mulai }}</h5>
                                        <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss">Jam Berakhir : </span> {{ $agenda->jam_berakhir }}</h5>
                                        <h6 class="d-inline-block p-2 text-success alert-success fw-600 font-xssss rounded-3 me-2">0 Materi</h6>
                                        <h6 class="d-inline-block p-2 text-warning alert-warning fw-600 font-xssss rounded-3 me-2">0 Dokumentasi</h6>
                                        <h6 class="d-inline-block p-2 text-secondary alert-secondary fw-600 font-xssss rounded-3 me-2">0 Peserta Hadir</h6>
                                        <a href="/agenda?agenda={{ $agenda->uuid }}" class="position-absolute bottom-15 mb-3 right-15"><i class="btn-round-sm bg-primary-gradiant text-white font-sm feather-eye"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
