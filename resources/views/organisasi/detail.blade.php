@extends('layouts.main')

@section('title', 'Organisasi')

@section('content')
    <!-- main content -->
    <div class="main-content bg-white right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row">
                    <div class="col-xl-12 ">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('storage/' . $organisasi->logo) }}" alt="image" class="w-100">
                                        </div>
                                        <div class="col-lg-6 ps-lg-5">
                                            <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">
                                                {{-- <span class="font-xssss fw-600 text-grey-500 d-block mb-2 ms-1">Organisasi</span> --}}
                                                {{ $organisasi->nama }}
                                            </h2>
                                            <p class="font-xssss fw-500 text-grey-500 lh-26">{{ $organisasi->deskripsi }}</p>
                                            <span class="font-xssss fw-600 text-grey-500 d-block mb-2 ms-1"><i class="feather-map-pin"></i> {{ $organisasi->alamat }}</span>
                                            @can('kelompok create')
                                                <a href="/kelompok?kode={{ $organisasi->uuid }}" class="btn w200 border-0 bg-mini-gradiant p-3 text-white fw-600 rounded-3 d-inline-block font-xssss">Tambah Kelompok</a>
                                            @endcan
                                            @can('event create')
                                                <a href="/event/{{ $organisasi->uuid }}" class="btn w200 border-0 bg-primary-gradiant p-3 text-white fw-600 rounded-3 d-inline-block font-xssss mt-2">Tambah Event</a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 pe-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e5f6ff;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-primary-gradiant feather-users font-md text-white"></i>
                                        <h4 class="text-primary font-xl fw-700">{{ $organisasi->anggota->count() }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Anggota</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 pe-2 ps-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #f6f3ff;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-secondary feather-calendar font-md text-white"></i>
                                        <h4 class="text-secondary font-xl fw-700">{{ $organisasi->event->count() }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Kegiatan</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 pe-2 ps-2">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e2f6e9;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-success feather-clipboard font-md text-white"></i>
                                        <h4 class="text-success font-xl fw-700">{{ $organisasi->agenda }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Agenda</span></h4>
                                    </div>
                                </div>
                            </div>
                            @can('event read')
                                @foreach ($organisasi->event as $event)
                                    <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                        <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                            <div class="card-image w-100">
                                                @if ($event->flayer)
                                                    <img src="{{ asset('storage/' . $event->flayer) }}" alt="event" class="w-100 rounded-3">
                                                @else
                                                    <img src="https://source.unsplash.com/1024x576/?islamic,mosque{{ $loop->iteration }}" alt="event" class="w-100 rounded-3">
                                                @endif
                                            </div>
                                            <div class="card-body d-flex ps-0 pe-0 pb-0">
                                                <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg">
                                                    <h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500"> {{ Carbon\Carbon::parse($event->tgl_event)->format('M') }} </span> {{ Carbon\Carbon::parse($event->tgl_event)->format('d') }}</h4>
                                                </div>
                                                <h2 class="fw-700 lh-3 font-xss">{{ $event->nama }}
                                                    <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> {{ $event->alamat }} </span>
                                                </h2>
                                            </div>
                                            <div class="card-body">
                                                @can('event delete')
                                                    <a href="/event?event={{ $event->uuid }}" class="font-xssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-danger d-inline-block text-white me-1"><i class="feather-trash-2"></i></a>
                                                @endcan
                                                @can('event update')
                                                    <a href="/event?event={{ $event->uuid }}" class="font-xssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-warning d-inline-block text-white me-1"><i class="feather-edit"></i></a>
                                                @endcan
                                                @can('agenda read')
                                                    <a href="/event?event={{ $event->uuid }}" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">Detail</a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->

@endsection
