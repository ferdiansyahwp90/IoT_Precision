@extends('layouts.app')

@section('content-app')
<div class="container mt-4">


    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="ps-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt="" src="../../assets/img/faces/6.jpg"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{$data->email}}</h5>
                                    <p class="main-profile-name-text">{{$data->role}}</p>
                                </div>
                            </div>
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success mg-b-0" role="alert">
                            <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form role="form" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="FullName">Usernmae</label>
                            <input type="text" value="{{$data->username}}" id="FullName" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" value="{{$data->email}}" id="Email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" placeholder="Min 6 Characters" id="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="RePassword">Password Konfirmasi</label>
                            <input type="password" name="password_confirmation" placeholder="Min 6 Characters" id="RePassword" class="form-control">
                        </div>
                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
</div>
@endsection
