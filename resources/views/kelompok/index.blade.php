@extends('layouts.main')

@section('title', 'Role')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12">
                        {{-- <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <div class="card-body d-flex align-items-center p-0">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Group</h2>
                                <div class="search-form-2 ms-auto">
                                    <i class="ti-search font-xss"></i>
                                    <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                                </div>
                                <a href="#" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i class="feather-filter font-xss text-grey-500"></i></a>
                            </div>
                        </div> --}}
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <div class="card-body d-flex align-items-center p-0">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Kelompok</h2>
                                <div class="search-form-2 ms-auto">
                                    <i class="ti-search font-xss"></i>
                                    <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                                </div>
                                <a href="/kelompok/create?kode={{ $organisasi->uuid }}" class="text-center p-2 lh-24 w100 ms-1 ls-4 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white"><i class="feather-plus"></i>Tambah</a>
                            </div>
                        </div>

                        <div class="row ps-2 pe-1">
                            @if ($organisasi->kelompok)
                                @foreach ($organisasi->kelompok as $kelompok)
                                    <div class="col-lg-4 col-md-4 col-sm-4 mb-3 pe-2 ps-2">
                                        <div class="card w-100 p-0 hover-card shadow-xss border-0 rounded-3 overflow-hidden me-1">
                                            <span class="font-xsssss fw-700 ps-3 pe-3 lh-32 text-uppercase rounded-3 ls-2 bg-primary-gradiant d-inline-block text-white position-absolute mt-3 ms-3 z-index-1">{{ $kelompok->organisasi->nama }}</span>
                                            <div class="card-image w-100 mb-3">
                                                @if ($kelompok->logo)
                                                    <a href="default-hotel-details.html" class="position-relative d-block"><img src="{{ asset('storage/' . $kelompok->logo) }}" alt="image" class="w-100"></a>
                                                @else
                                                    <a href="default-hotel-details.html" class="position-relative d-block"><img src="https://source.unsplash.com/1024x576/?mosque,islam{{ $loop->iteration }}" alt="image" class="w-100"></a>
                                                @endif
                                            </div>
                                            <div class="card-body pt-0">
                                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                                <h4 class="fw-700 font-xss mt-0 lh-28 mb-0"><a href="default-hotel-details.html" class="text-dark text-grey-900">{{ $kelompok->nama }}</a></h4>
                                                <h6 class="font-xsssss text-grey-500 fw-600 mt-0 mb-2"> {{ $kelompok->deskripsi }}</h6>
                                                {{-- <h6 class="font-xsssss text-grey-500 fw-600 mt-0 mb-2"> {{ url('/') }}/login?kode={{ $organisasi->uuid }}</h6> --}}
                                                <div class="clearfix"></div>
                                                <h5 class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2"><i class="btn-round-sm bg-greylight feather-user text-grey-500 me-1"></i> {{ $kelompok->anggota->count() }}</h5>
                                                <h5 class="mt-3 d-inline-block font-xssss fw-600 text-grey-500 me-2"><i class="btn-round-sm bg-greylight feather-clipboard text-grey-500 me-1"></i> 0</h5>
                                                {{-- <h5 class="mt-3 d-inline-block font-xssss fw-600 text-grey-500"><i class="btn-round-sm bg-greylight ti-credit-card text-grey-500 me-1"></i> Card</h5> --}}
                                                <div class="clearfix"></div>
                                                {{-- <span class="font-lg fw-700 mt-0 pe-3 ls-2 lh-32 d-inline-block text-success float-left"><span class="font-xsssss">$</span> 320 <span class="font-xsssss text-grey-500">/ mo</span> </span> --}}
                                                <a href="#" onclick="copyToClipboard('{{ url('/') }}/login?kode={{ $organisasi->uuid }}&&id={{ $kelompok->uuid }}')" class="position-absolute bottom-15 mb-2 right-15"><i class="btn-round-sm bg-primary-gradiant text-white font-sm feather-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
