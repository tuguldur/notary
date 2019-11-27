@extends('layouts.main')

@section('content')
@section('title', 'Хэрэглэгч нэвтрэх')
<div class="row">
            <div class="col-md-4 ml-auto mr-auto">
              <div class="card">
                <div class="card-header">
                  <h5 class="title text-center">Нэвтрэх</h5>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                  @csrf
                    <div class="row">
                      <div class="col-md-8 ml-auto mr-auto">
                        <div class="form-group">
                          <label>Цахим хаяг</label>
                          <input id="email" type="email" placeholder="Цахим хаяг" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8 ml-auto mr-auto">
                        <div class="form-group">
                          <label>Нууц үг</label>
                          <input id="password" type="password" placeholder="Нууц үг" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-4 offset-md-2">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember">
                            <span class="form-check-sign"></span>
                          </label>
                          <div class="d-flex remember-me-label">
                            <span>Сануулах</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8 ml-auto mr-auto">
                        <a href="/register" class="btn btn-round btn-default">Бүртгүүлэх</a>
                        <button type="submit" class="btn btn-round btn-info float-right">
                          Нэвтрэх
                        </button>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-8 ml-auto mr-auto">
                      @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Нууц үгээ мартсан уу?') }}
                                    </a>
                                @endif
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
