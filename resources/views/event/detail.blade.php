@extends('layouts.main')

@section('title', 'Anggota')

@section('content')
    <!-- main content -->
    <div class="main-content right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                            <div class="card-body d-flex align-items-center p-0">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Anggota</h2>
                                <div class="search-form-2 ms-auto">
                                    <i class="ti-search font-xss"></i>
                                    <input type="text" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here.">
                                </div>
                                <a href="#" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i class="feather-filter font-xss text-grey-500"></i></a>
                            </div>
                        </div>

                        <div class="row ps-2 pe-2">
                            <div class="card d-block w-100 border-0 mb-3 shadow-xss bg-white rounded-3 p-4" style="padding-left: 120px !important;">
                                <img src="images/download7.png" alt="images" class="position-absolute p-2 bg-lightblue2 w65 ms-4 left-0">
                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">Python Developer <span class="font-xssss fw-500 text-grey-500 ms-4">(3 days ago)</span> </h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Location : </span> London, United Kingdom</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Employment : </span> Part Time</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss">Salary : </span> 12000 -45000</h5>
                                <h6 class="d-inline-block p-2 text-success alert-success fw-600 font-xssss rounded-3 me-2">UX Design</h6>
                                <h6 class="d-inline-block p-2 text-warning alert-warning fw-600 font-xssss rounded-3 me-2">Andriod</h6>
                                <h6 class="d-inline-block p-2 text-secondary alert-secondary fw-600 font-xssss rounded-3 me-2">Developer</h6>
                                <a href="#" class="position-absolute bottom-15 mb-3 right-15"><i class="btn-round-sm bg-primary-gradiant text-white font-sm feather-chevron-right"></i></a>
                            </div>

                            <div class="card d-block w-100 border-0 mb-3 shadow-xss bg-white rounded-3 p-4" style="padding-left: 120px !important;">
                                <img src="images/download4.png" alt="images" class="position-absolute p-2 bg-lightblue2 w65 ms-4 left-0">
                                <i class="feather-bookmark font-md text-danger position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">Sass Developer <span class="font-xssss fw-500 text-grey-500 ms-4">(3 days ago)</span> </h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Location : </span> London, United Kingdom</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Employment : </span> Part Time</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss">Salary : </span> 12000 -45000</h5>
                                <h6 class="d-inline-block p-2 text-success alert-success fw-600 font-xssss rounded-3 me-2">UX Design</h6>
                                <h6 class="d-inline-block p-2 text-warning alert-warning fw-600 font-xssss rounded-3 me-2">Andriod</h6>
                                <h6 class="d-inline-block p-2 text-secondary alert-secondary fw-600 font-xssss rounded-3 me-2">Developer</h6>
                                <a href="#" class="position-absolute bottom-15 mb-3 right-15"><i class="btn-round-sm bg-primary-gradiant text-white font-sm feather-chevron-right"></i></a>
                            </div>

                            <div class="card d-block w-100 border-0 mb-3 shadow-xss bg-white rounded-3 p-4" style="padding-left: 120px !important;">
                                <img src="images/download6.png" alt="images" class="position-absolute p-2 bg-lightblue2 w65 ms-4 left-0">
                                <i class="feather-bookmark font-md text-danger position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">Java Developer <span class="font-xssss fw-500 text-grey-500 ms-4">(3 days ago)</span> </h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Location : </span> London, United Kingdom</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Employment : </span> Part Time</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss">Salary : </span> 12000 -45000</h5>
                                <h6 class="d-inline-block p-2 text-success alert-success fw-600 font-xssss rounded-3 me-2">UX Design</h6>
                                <h6 class="d-inline-block p-2 text-warning alert-warning fw-600 font-xssss rounded-3 me-2">Andriod</h6>
                                <h6 class="d-inline-block p-2 text-secondary alert-secondary fw-600 font-xssss rounded-3 me-2">Developer</h6>
                                <a href="#" class="position-absolute bottom-15 mb-3 right-15"><i class="btn-round-sm bg-primary-gradiant text-white font-sm feather-chevron-right"></i></a>
                            </div>

                            <div class="card d-block w-100 border-0 mb-3 shadow-xss bg-white rounded-3 p-4" style="padding-left: 120px !important;">
                                <img src="images/download5.png" alt="images" class="position-absolute p-2 bg-lightblue2 w65 ms-4 left-0">
                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">React Developer <span class="font-xssss fw-500 text-grey-500 ms-4">(3 days ago)</span> </h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Location : </span> London, United Kingdom</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss">Employment : </span> Part Time</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss">Salary : </span> 12000 -45000</h5>
                                <h6 class="d-inline-block p-2 text-success alert-success fw-600 font-xssss rounded-3 me-2">UX Design</h6>
                                <h6 class="d-inline-block p-2 text-warning alert-warning fw-600 font-xssss rounded-3 me-2">Andriod</h6>
                                <h6 class="d-inline-block p-2 text-secondary alert-secondary fw-600 font-xssss rounded-3 me-2">Developer</h6>
                                <a href="#" class="position-absolute bottom-15 mb-3 right-15"><i class="btn-round-sm bg-primary-gradiant text-white font-sm feather-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
