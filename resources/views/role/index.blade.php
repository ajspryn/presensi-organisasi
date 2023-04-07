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
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Role</h2>
                                <div class="search-form-2 ms-auto">
                                    <i class="ti-search font-xss"></i>
                                    <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                                </div>
                                <a href="/role/create" class="text-center p-2 lh-24 w100 ms-1 ls-4 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white"><i class="feather-plus"></i>Tambah Role</a>
                            </div>
                        </div>

                        <div class="row ps-2 pe-1">

                            @foreach ($roles as $role)
                                <div class="col-md-6 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center" style="background-image: url(https://source.unsplash.com/1024x576/?islamic,mosque{{ $loop->iteration }});"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4 pb-4 pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="images/role.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">{{ $role->name }}</h4>
                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">support@gmail.com</p>
                                            <span class="position-absolute right-15 top-0 d-flex align-items-center">
                                                <form action="/role/{{ $role->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" class="d-md-block d-none style2-input fw-600 border-0 p-0" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});"><i class="feather-trash-2 btn-round-md font-md bg-mini-gradiant text-white"></i></a>
                                                </form>
                                                <a href="/role/{{ $role->id }}/edit" class="text-center p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xssss fw-700 ls-lg text-white"><i class="feather-edit"></i> Edit</a>
                                            </span>
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
