@extends('layouts.main')

@section('title', 'Anggota Organisasi')

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
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Keuangan <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">Rincian Keuangan</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if (request('id'))
                                @can('keuangan create')
                                    <div class="col-xl-12">
                                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                                <form action="/keuangan" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-3">
                                                            <label class="mont-font fw-600 font-xsss">Transaksi</label>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="form-check text-left mb-2">
                                                                    <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="Check1">Pemasukan</label>
                                                                    <input type="radio" class="form-check-input mt-2" id="Check1" name="jenis_transaksi" value="Pemasukan" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="form-check text-left mb-2">
                                                                    <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="Check2">Pengeluaran</label>
                                                                    <input type="radio" class="form-check-input mt-2" id="Check2" name="jenis_transaksi" value="Pengeluaran" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <div class="form-group">
                                                                <label class="mont-font fw-600 font-xsss">Keterangan</label>
                                                                <input type="text" name="keterangan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <div class="form-group">
                                                                <label class="mont-font fw-600 font-xsss">Jumlah</label>
                                                                <input type="number" name="jumlah" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <input type="hidden" name="event_id" value="{{ decrypt(request('id')) }}">
                                                        <div class="col-lg-12 mt-3">
                                                            <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-current border-0 p-0 ">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            @endif
                            <div class="col-lg-4">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e2f6e9;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-success feather-arrow-right-circle font-md text-white"></i>
                                        <h4 class="text-success font-xl fw-700">{{ $keuangans->where('jenis_transaksi', 'Pemasukan')->sum('jumlah') }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Pemasukan</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #fff3f3;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-danger feather-arrow-left-circle font-md text-white"></i>
                                        <h4 class="text-danger font-xl fw-700">{{ $keuangans->where('jenis_transaksi', 'Pengeluaran')->sum('jumlah') }} <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Pengeluaran</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3" style="background-color: #e5f6ff;">
                                    <div class="card-body d-flex p-0">
                                        <i class="btn-round-lg d-inline-block me-3 bg-primary-gradiant feather-users font-md text-white"></i>
                                        <h4 class="text-primary font-xl fw-700">{{ $keuangans->where('jenis_transaksi', 'Pemasukan')->sum('jumlah') - $keuangans->where('jenis_transaksi', 'Pengeluaran')->sum('jumlah') }}<span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Saldo</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead class="bg-greyblue rounded-3">
                                            <tr>
                                                <th class="border-0 p-4">&nbsp;</th>
                                                <th class="border-0 p-4">Jenis Transaksi</th>
                                                <th class="border-0 p-4">Event</th>
                                                <th class="border-0 p-4">Keterangan</th>
                                                <th class="border-0 p-4">Jumlah</th>
                                                <th class="border-0 p-4">Saldo</th>
                                                <th class="border-0 p-4">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($keuangans as $keuangan)
                                                <tr>
                                                    <td style="text-align: center">
                                                        @if ($keuangan->jenis_transaksi == 'Pemasukan')
                                                            <i class="feather-arrow-right-circle font-xs text-success"></i>
                                                        @else
                                                            <i class="feather-arrow-left-circle font-xs text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $keuangan->jenis_transaksi }}</a>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $keuangan->event->nama }}</a>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $keuangan->keterangan }}</a>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $keuangan->jumlah }}</a>
                                                        </h3>
                                                    </td>
                                                    @if ($keuangan->jenis_transaksi == 'Pemasukan')
                                                        @php
                                                            $total += $keuangan->jumlah;
                                                        @endphp
                                                    @else
                                                        @php
                                                            $total -= $keuangan->jumlah;
                                                        @endphp
                                                    @endif
                                                    <td>
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">{{ $total }}</a>
                                                        </h3>
                                                    </td>
                                                    <td>
                                                        {{-- @can('keuangan update')
                                                            <a href="/keuangan/{{ encrypt($keuangan->id) }}/edit"><i class="feather-eye font-xs text-primary"></i></a>
                                                        @endcan --}}
                                                        @can('keuangan delete')
                                                            <form action="/keuangan/{{ encrypt($keuangan->id) }}" method="post" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                {{-- <a href="#" class="bg-danger theme-white-bg btn-round-lg ms-2 rounded-3 text-grey-700" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});"><i class="feather-trash-2 font-md text-white"></i></a> --}}
                                                                <a href="#" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});"><i class="feather-trash-2 font-xs text-danger"></i></a>
                                                            </form>
                                                        @endcan
                                                    </td>
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
