@extends('layouts.main')

@section('title', 'Dahboard')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <a href="{{ url()->previous() }}" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Edit Event</h4>
                            </div>
                            <div class="ard-body h250 p-0 rounded-xxl overflow-hidden m-3">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl" style="background-color: #e5f6ff;">
                                    <div class="card-body d-flex p-0">
                                        {{-- <i class="btn-round-lg d-inline-block me-3 bg-primary-gradiant feather-home font-md text-white"></i> --}}
                                        <h4 class="text-primary font-xl fw-700">{{ $event->organisasi->nama }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss"></span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <form action="/event/{{ $event->id }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Nama Event</label>
                                                <input type="text" name="nama" class="form-control" value="{{ $event->nama }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Tanggal Event</label>
                                                <input type="date" name="tgl_event" class="form-control" value="{{ $event->tgl_event }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" value="{{ $event->keterangan }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="{{ $event->alamat }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Flayer</label>
                                                <input type="file" name="flayer" class="form-control">
                                                <input type="hidden" value="{{ $event->file }}" name="flayer_lama" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" name="organisasi_id" value="{{ $event->organisasi->id }}">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-current border-0 p-0 ">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
