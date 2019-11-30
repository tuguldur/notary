@extends('layouts.dashboard') 
@section('title', 'Бүх хэрэглэгч') 
@section('content')
<div class="col-md-8 mr-auto ml-auto">
            <div class="card">
              <div class="card-header">
                <div class="data-header">
                  <h4 class="card-title">Бүх хэрэглэгч</h4>
                  <div class="spacer"></div>
                  <a href="#" id="add_user">Хэрэглэгч нэмэх</a>
               </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                      <th>
                        Нэр
                      </th>
                      <th>
                      Регистрийн дугаар
                      </th>
                      <th>
                        Эрх
                      </th>
                      <th>
                       Бүртгэл үүсгэсэн
                      </th>
                    </thead>
                    <tbody id="user-table">
                      @foreach ($users as $user)
                          <tr data-key={{$user->id}} class="user-data">
                           <td>{{$user->name}} <span class="badge badge-success">{{(Auth::user()->id==$user->id) ? 'you' :'' }}</span></td>
                           <td>{{$user->registration_number}}</td>
                           <td>
                             <span class="badge badge-secondary">{{$user->type ==1 ? 'Хэрэглэгч' : ''}}</span>
                             <span class="badge badge-primary">{{$user->type ==2 ? 'Нотират' : ''}}</span>
                             <span class="badge badge-success">{{$user->type ==3 ? 'Админ' : ''}}</span>
                            </td>
                           <td>{{$user->created_at->diffForHumans()}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- modal -->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="users">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-body">
              <div class="loader text-center" id="user-loader">Уншиж байна...</div>
              <div class="d-none" id="user-main">
            <form action="/user/add" method="POST" id="user_">
              <div class="form-group">
                <label for="username">Нэр</label>
                <input type="text" class="form-control" id="username" placeholder="Нэр" name="name" required>
                <small id="add_username" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="email">Цахим хаяг</label>
                <input type="email" class="form-control" id="email" placeholder="Цахим хаяг" name="email" required>
                <small id="add_email" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="phone">Утасны дугаар</label>
                <input type="number" class="form-control" id="phone" placeholder="Утасны дугаар" name="phone" required>
                <small id="add_phone" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="registration_number">Регистрийн дугаар</label>
                <input type="text" class="form-control" id="registration_number" placeholder="Регистрийн дугаар" name="registration_number" required>
                <small id="add_registration_number" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="password">Нууц үг</label>
                <input type="password" class="form-control" id="password" placeholder="Нууц үг" name="password" required>
                <small id="add_password" class="form-text text-danger"></small>
              </div>
              <div class="form-group">
                <label for="password_next">Нууц үг давтах</label>
                <input type="password" class="form-control" id="password_next" placeholder="Нууц үг давтах" name="password_next" required>
                <small id="add_password_next" class="form-text text-danger"></small>
              </div>
              <div id="role-select-container">
              <span>Үүрэг сонгоно уу</span><br/>
              <div class="form-check form-check-inline">
              <select class="custom-select custom-select-sm" id="role_select" name="type">
                <option value="1">Хэрэглэгч</option>
                <option value="2">Нотират</option>
                <option value="3">Админ</option>
              </select>
              </div>
              </div>
              @csrf
              <input type="hidden" value="0" name="id" id="user_id"/>
              <div class="d-flex mt-3">
              <button type="submit" class="btn btn-primary" id="save-user">Хадгалах</button>
                <div class="spacer"></div>
              <a class="btn btn-alert" id="delete-user" style="color:white;" user-key="{{Auth::user()->id}}">Устгах</a>
            </div>
            </div>
            </form>
            </div>
         </div>
        </div>
       </div>
      </div>
@endsection