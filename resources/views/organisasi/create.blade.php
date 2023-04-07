@extends('layouts.main')

@section('title', 'Create Organisasi')

@section('content')
    <!-- main content -->
    <div class="main-content bg-lightblue theme-dark-bg right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="middle-wrap">
                    <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                        <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                            <a href="{{ url()->previous() }}" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                            <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Create Organisasi</h4>
                        </div>
                        <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                            <form action="/organisasi" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Nama</label>
                                            <input type="text" name="nama" class="form-control" required autofocus>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label class="mont-font fw-600 font-xsss">Alamat</label>
                                        <textarea class="form-control mb-0 p-3 h100 lh-16" rows="5" spellcheck="true" name="alamat"></textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label class="mont-font fw-600 font-xsss">Deskripsi</label>
                                        <textarea class="form-control mb-0 p-3 h100 lh-16" rows="5" spellcheck="true" name="deskripsi"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Logo</label>
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-current border-0 p-0 ">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- <div class="card w-100 border-0 p-2"></div> -->
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
