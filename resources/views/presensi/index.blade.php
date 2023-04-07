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
                        <div class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                            <div class="bg-pattern-div"></div>
                            <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Presensi {{ carbon\carbon::now()->format('H:i') }} <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">Scan QR Code Yang Telah Di Sediakan</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                            <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                                <div id="qr-reader"></div>
                            </div>
                            <div class="card-body p-0 me-lg-5">
                                <p class="fw-500 lh-26 font-xssss w-100 mb-1">- Klik Start Scanning / Inpukan Gambar QR Code</p>
                                <p class="fw-500 lh-26 font-xssss w-100 mb-1">- Setujui Browser Untuk Menggunakan Camera Perangkat Anda</p>
                                <p class="fw-500 lh-26 font-xssss w-100 mb-1">- Arahkan Camera Ke QR Code Yang Telah Di Sediakan</p>
                                <p class="fw-500 lh-26 font-xssss w-100 mb-1">- Tunggu Sampai Ada Pemberitahuan Berhasil Presensi</p>
                                <p class="fw-500 lh-26 font-xssss w-100 mb-1">- Lalu Anda Akan Diarahkan Kehalaman Kegiatan Untuk Mengakses Materi dll</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/presensi" id="scan-form" method="POST">
                    @csrf
                    <input type="hidden" id="scan-result" name="scan_result">
                </form>
                {{-- <div id="qr-reader" style="width:500px"></div>
                <div id="qr-reader-results"></div> --}}
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
