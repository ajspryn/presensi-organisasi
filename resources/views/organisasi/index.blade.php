@extends('layouts.main')

@section('title', 'Organisasi')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <div class="card-body d-flex align-items-center p-0">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Organisasi</h2>
                                <div class="search-form-2 ms-auto">
                                    <i class="ti-search font-xss"></i>
                                    <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                                </div>
                                <a href="/organisasi/create" class="bg-success p-3 z-index-1 rounded-3 text-white font-xsssss text-uppercase fw-700 ls-3 ms-2"><i class="feather-plus text-white"></i> Tambah Organisasi</a>
                                {{-- <a href="#" class="btn-round-md ms-2 bg-success theme-dark-bg rounded-3"><i class="feather-plus text-white"></i>Tambah Organisasi</a> --}}

                            </div>
                        </div>

                        <div class="row ps-2 pe-1">
                            @foreach ($organisasis as $organisasi)
                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card w-100 shadow-xss rounded-xxl overflow-hidden border-0 mb-3 pb-3">
                                        <div class="card-body position-relative h150 bg-image-cover bg-image-center" style="background-image: url(https://source.unsplash.com/1024x576/?mosque,islam{{ $loop->iteration }});"></div>
                                        <div class="card-body d-block pt-4 text-center">
                                            <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 ms-auto me-auto"><img src="{{ asset('storage/' . $organisasi->logo) }}" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>
                                            <h4 class="font-xs ls-1 fw-700 text-grey-900">{{ $organisasi->nama }} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $organisasi->deskripsi }}</span></h4>
                                        </div>
                                        <div class="card-body d-flex align-items-center justify-content-center ps-4 pe-4 pt-0">
                                            <h4 class="font-xsssss text-center text-grey-500 fw-600 ms-3 me-3"><b class="text-grey-900 mb-1 font-xss fw-700 d-inline-block ls-3 text-dark">{{ $organisasi->anggota->count() }} </b> Anggota</h4>
                                            <h4 class="font-xsssss text-center text-grey-500 fw-600 ms-3 me-3"><b class="text-grey-900 mb-1 font-xss fw-700 d-inline-block ls-3 text-dark">{{ $organisasi->event->count() }} </b> Event</h4>
                                            {{-- <h4 class="font-xsssss text-center text-grey-500 fw-600 ms-2 me-2"><b class="text-grey-900 mb-1 font-xss fw-700 d-inline-block ls-3 text-dark">32k </b> Follow</h4> --}}
                                        </div>
                                        <div class="card-body d-flex align-items-center justify-content-center ps-4 pe-4 pt-0">
                                            <a href="/organisasi/{{ $organisasi->uuid }}" class="bg-current btn-round-lg ms-2 rounded-3 text-grey-700"><i class="feather-eye font-md text-white"></i></a>
                                            <a href="#" onclick="copyToClipboard('{{ url('/') }}/login?kode={{ $organisasi->uuid }}')" class="bg-grey btn-round-lg ms-2 rounded-3"><i class="feather-link font-md text-white"></i></a>
                                            {{-- <form>
                                                <a id="copy-button"class="bg-current btn-round-lg ms-2 rounded-3 text-grey-700"><i class="feather-link font-md text-white"></i></a>
                                                <input type="hidden" id="copy-link" value="{{ url('/') }}/login?kode={{ $organisasi->uuid }}">
                                            </form> --}}
                                            @can('organisasi update')
                                                <a href="/organisasi/{{ $organisasi->uuid }}/edit" class="bg-warning btn-round-lg ms-2 rounded-3 text-grey-700"><i class="feather-edit font-md text-white"></i></a>
                                            @endcan
                                            @can('organisasi delete')
                                                <form action="/organisasi/{{ $organisasi->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" class="bg-danger theme-white-bg btn-round-lg ms-2 rounded-3 text-grey-700" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});"><i class="feather-trash-2 font-md text-white"></i></a>
                                                </form>
                                            @endcan
                                        </div>
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
