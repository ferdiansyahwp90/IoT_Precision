@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">Ubah Data User</h4>
                @if (session('failed'))
                    <div class="alert alert-danger mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('failed') }}
                    </div>
                @endif

            </div>
            <div class="card-body">

                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ url('user/'.$data->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username <span class="tx-danger">*</span></label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') parsley-error @enderror"
                                        placeholder="Username" value="{{ $data->username }}">
                                    @error('username')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">email <span class="tx-danger">*</span></label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') parsley-error @enderror"
                                        placeholder="email" value="{{ $data->email }}">
                                    @error('email')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password <span class="tx-danger">*</span></label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') parsley-error @enderror" id="inputPassword3"
                                        placeholder="Password">
                                    @error('password')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Role <span class="tx-danger">*</span></label>
                                    <select name="role" class="form-control @error('role') parsley-error @enderror">
                                        <option value="">Pilih Role</option>
                                        <option {{ $data->role == 'Super Admin' ? 'selected' : '' }} value="Super Admin">
                                            Super Admin</option>
                                        <option {{ $data->role == 'Owner' ? 'selected' : '' }} value="Owner">Owner</option>
                                        <option {{ $data->role == 'Pegawai' ? 'selected' : '' }} value="Pegawai">Pegawai
                                        </option>
                                    </select>

                                    @error('role')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status <span class="tx-danger">*</span></label>
                                    <select name="status" class="form-control @error('status') parsley-error @enderror">
                                        <option value="">Pilih status</option>
                                        <option {{ $data->status == 'Aktif' ? 'selected' : ''}} value="Aktif">Aktif</option>
                                        <option {{ $data->status == 'Nonaktif' ? 'selected' : ''}} value="Nonaktif">Nonaktif</option>
                                    </select>
                                    @error('status')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('user/') }}" class="btn btn-info">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
