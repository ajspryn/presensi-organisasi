@extends('layouts.main')

@section('title', 'Organisasi')

@section('content')
    <!-- main content -->
    <div class="main-content bg-white right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row">
                    <div class="col-xl-12 cart-wrapper mb-4">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Rekap Presensi <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">Presensi {{ $agenda->nama }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead class="bg-greyblue rounded-3">
                                            <tr>
                                                <th class="border-0 p-4">&nbsp;</th>
                                                <th class="border-0 p-4">Nama</th>
                                                <th class="border-0 p-4">Email</th>
                                                <th class="border-0 p-4">Organisasi</th>
                                                <th class="border-0 p-4">Jam Presensi</th>
                                                {{-- <th class="border-0 p-4">&nbsp;</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agenda->presensi as $presensi)
                                                <tr>
                                                    <td style="text-align: center">
                                                        <a href="#">
                                                            <img src="{{ asset('storage/' . $presensi->user->avatar) }}" alt="image" width="50">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $presensi->user->name }}</a>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $presensi->user->email }}</a>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            @if ($presensi->user->anggota)
                                                                <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $presensi->user->anggota->organisasi->nama }}</a>
                                                            @endif
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $presensi->created_at->format('h:i') }}</a>
                                                        </h3>
                                                    </td>
                                                    {{-- <td>
                                                        @can('user update')
                                                            <a href="/user/{{ encrypt($presensi->user->id) }}"><i class="feather-eye font-xs text-primary"></i></a>
                                                        @endcan
                                                        @can('user delete')
                                                            <a href="#"><i class="feather-trash-2 font-xs text-danger"></i></a>
                                                        @endcan
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
