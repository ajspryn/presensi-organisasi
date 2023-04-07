@extends('layouts.main')

@section('title', 'Create Role')

@section('content')
    <!-- main content -->
    <div class="main-content bg-white right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="card p-lg-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Role </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-12 col-lg-12">
                                <div class="page-title">
                                    <h4 class="mont-font fw-600 font-md mb-lg-5 mb-4">Form Create Role</h4>
                                    <form action="/role" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup">
                                                    <label class="mont-font fw-600 font-xssss">Nama Role</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <h4 class="mont-font fw-600 font-md mb-3">Permission</h4>
                                            @foreach ($permissions as $permission)
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-check text-left mb-2">
                                                        <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="Check{{ $loop->iteration }}">
                                                            <input type="checkbox" class="form-check-input mt-2" id="Check{{ $loop->iteration }}" name="permissions[]" value="{{ $permission->name }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group mb-1">
                                                    <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-current border-0 p-0 ">Save</button>
                                                </div>
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
    </div>
    <!-- main content -->
@endsection
