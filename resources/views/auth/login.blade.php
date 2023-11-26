@extends('auth.template')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Blog</b>App</a>
        </div>
        <!-- /.login-logo -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Log In</p>

                <form action="{{ route('login.proces') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <a href="/">Kembali</a>
                        </div>
                        <div class="col-md-6 mt-3 text-right">
                            <a href="{{route('register')}}">Daftar Disini</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
