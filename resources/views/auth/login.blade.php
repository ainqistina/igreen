@extends('layouts.app')

@section('content')

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <img src="../img/mpk.png" width="70%" />
                  <h1 class="h4 text-gray-900 mb-4"><i><b>Sistem iGreen</b></i></h1>
                </div>
                <form class="user" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                      id="email" aria-describedby="emailHelp" name="name" value="{{ old('name') }}" required
                      autocomplete="name" autofocus placeholder="Name">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="password"
                      class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                      required autocomplete="current-password" id="password" placeholder="Kata Laluan">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember">Ingatkan Saya</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Login') }}
                  </button>
                </form>
                <hr>
                {{-- <div class="text-center">
                  <a class="small" href="{{ route('register') }}">Belum mendaftar? Daftar Sekarang!</a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection