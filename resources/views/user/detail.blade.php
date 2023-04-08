@extends('layouts.main')

@section('title', 'Organisasi')

@section('content')
    <!-- main content -->
    <div class="main-content bg-lightblue theme-dark-bg right-chat-active">

        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="middle-wrap">
                    <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                        <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                            <a href="{{ url()->previous() }}" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                            <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">User Details</h4>
                        </div>
                        <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 text-center" x-data="{ imagePreview: null }">
                                        <figure x-bind:class="{ 'avatar ms-auto me-auto mb-0 mt-2 w-100': imagePreview }">
                                            <img :src="imagePreview ? imagePreview : '{{ asset('storage/' . $user->avatar) }}'" alt="image" class="shadow-sm rounded-3 w-100" style="max-width: 100px;">
                                        </figure>
                                        <h2 class="fw-700 font-sm text-grey-900 mt-3">{{ $user->name }}</h2>
                                        <h4 class="text-grey-500 fw-500 font-xsss">{{ $user->email }}</h4>
                                        <input type="file" name="avatar" id="file" class="input-file" x-ref="avatarInput" @change="imagePreview = URL.createObjectURL($refs.avatarInput.files[0])">
                                        <input type="hidden" name="avatar_lama" value="{{ $user->avatar }}">
                                        <label for="file" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3 mb-3">
                                            Edit Photo
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name ? $user->name : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Username</label>
                                            <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    @if ($user->anggota)
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Phone</label>
                                                <input type="text" class="form-control" name="no_telp" value="{{ $user->anggota->no_telp }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Address</label>
                                                <textarea class="form-control mb-0 p-3 h100 lh-16" rows="5" spellcheck="true" name="alamat">{{ $user->anggota->alamat }}</textarea>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    @can('role update')
                                        <label class="mont-font fw-600 font-xsss">Role</label>
                                        @foreach ($roles as $role)
                                            <div class="col-lg-3 mb-2">
                                                <div class="form-check text-left mb-2">
                                                    <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="Check{{ $loop->iteration }}">{{ $role->name }}</label>
                                                    <input type="radio" class="form-check-input mt-2" id="Check{{ $loop->iteration }}" name="roles[]" value="{{ $role->name }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endcan
                                    <div class="col-lg-12 mt-3">
                                        <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-current border-0 p-0 ">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <!-- <div class="card w-100 border-0 p-2"></div> -->
                </div>
            </div>

        </div>
    </div>
    <!-- main content -->
@endsection
