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
                        <input type="text" class="form-control" placeholder="Нэр" value="{{Auth::user()->name}}" name="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Цахим хаяг</label>
                        <input type="email" class="form-control" placeholder="Цахим хаяг" value="{{Auth::user()->email}}" name="email">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Регистрийн дугаар</label>
                        <input type="text" class="form-control" placeholder="Регистрийн дугаар" value="{{Auth::user()->registration_number}}" name="registration_number">
                      </div>
                    </div>
                    <div class="col-md-4">
                     <!-- just spacing -->
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Одоогийн нууц үг</label>
                        <input type="email" class="form-control" placeholder="Нууц үг" name="old_password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Шинэ нууц үг</label>
                        <input type="password" class="form-control" placeholder="Шинэ нууц үг" name="new_password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Хаяг</label>
                        <input type="text" class="form-control" placeholder="Хаяг" value="{{Auth::user()->address}}">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary float-right">Хадгалах</button>
                </form>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Updated {{Auth::user()->updated_at->diffForHumans()}}
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection