@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">{{$title}}</h4>
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
                    <form class="form-horizontal" action="{{ route('user.store') }}" method="POST"
                        enctype="multipart/form-data" data-parsley-validate="">

                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username <span class="tx-danger">*</span></label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') parsley-error @enderror"
                                        placeholder="Username">
                                    @error('username')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email <span class="tx-danger">*</span></label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') parsley-error @enderror"
                                        placeholder="email">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status <span class="tx-danger">*</span></label>
                                    <select name="status" class="form-control @error('status') parsley-error @enderror">
                                        <option value="" >Pilih status</option>
                                        <option value="Aktif" selected>Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                    @error('status')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-3 justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Batal</button>
                                    <a href="{{ url('user/') }}" class="btn btn-info">Kembali</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
