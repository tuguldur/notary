@extends('layouts.dashboard') 
@section('title', 'Бүртгэл')
@section('content')
<div class="container">
<div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Хувийн мэдээллээ солих</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="/profile">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Нэр</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Нэр" value="{{Auth::user()->name}}" name="name">
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Цахим хаяг</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Цахим хаяг" value="{{Auth::user()->email}}" name="email">
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Утасны дугаар</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Утасны дугаар" value="{{Auth::user()->phone}}" name="phone">
                        @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Регистрийн дугаар</label>
                        <input type="text" class="form-control @error('registration_number') is-invalid @enderror" placeholder="Регистрийн дугаар" value="{{Auth::user()->registration_number}}" name="registration_number">
                        @error('registration_number')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Одоогийн нууц үг</label>
                        <input type="password" class="form-control @error('old_password')  @enderror @if (session('error')) is-invalid @endif" placeholder="Нууц үг" name="old_password">
                        @error('old_password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        @if (session('error'))
                        <small class="form-text text-danger">{{ session('error') }}</small>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Шинэ нууц үг</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Шинэ нууц үг" name="new_password" id="password">
                        <small class="form-text text-info" id="help_password">Солих шаардлагагүй бол хоосон үлдээнэ үү.</small>
                        @error('new_password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Хаяг</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Хаяг" value="{{Auth::user()->address}}" name="address">
                        @error('address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                  </div>
                  @csrf
                  <button type="submit" class="btn btn-primary float-right" id="submit">Хадгалах</button>
                </form>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Сүүлд шинэчилсэн {{Auth::user()->updated_at->diffForHumans()}}
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
<script>
  $('#password').keyup(function(){
    var password = $(this).val();
    if(password.length < 8 && password.length > 0) {
      $('#help_password').html('Нууц үг доод тал нь 8 н оронтой байна.')
      $("#submit").prop("disabled", true);
    }
    else{
      $('#help_password').html('Солих шаардлагагүй бол хоосон үлдээнэ үү.')
      $("#submit").prop("disabled", false);
    }
  });
</script>
@endsection