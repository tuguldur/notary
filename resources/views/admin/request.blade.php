@extends('layouts.dashboard') @section('title', 'Баталгаажуулах хүсэлтүүд') @section('content')
<div class="col-md-8 mr-auto ml-auto">
    <div class="card">
        <div class="card-header">
            <div class="data-header">
                <h4 class="card-title">Бүх хүсэлтүүд</h4>
                <div class="spacer"></div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                        <th>
                            #
                        </th>
                        <th>
                            Нэр
                        </th>
                        <th>
                            Регистрийн дугаар
                        </th>
                        <th>
                            Утасны дугаар
                        </th>
                        <th>
                            Илгээсэн
                        </th>
                        <th>
                            төлөв
                        </th>
                    </thead>
                    <tbody id="request-table">
                        @foreach ($confirmation as $confirmation)
                        <tr data-key={{$confirmation->conf_id}} class="request-data">
                            <td>{{$confirmation->id}}</td>
                            <td>{{$confirmation->name}}</td>
                            <td>{{$confirmation->registration_number}}</td>
                            <td>{{$confirmation->phone}}</td>
                            <td>{{$confirmation->created_at->diffForHumans()}}</td>
                            <td>
                                <span class="badge badge-secondary">{{$confirmation->status ==1 ? 'Хүлээгдэж буй' : ''}}</span>
                                <span class="badge badge-success">{{$confirmation->status ==0 ? 'Баталгаажсан' : ''}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
 <!-- modal -->
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="request">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-body">
              <div class="loader text-center" id="request-loader">Уншиж байна...</div>
              <div class="d-none" id="request-main">
            <form action="/request" method="POST">
              <div class="form-group">
                <label for="name">Нэр</label>
                <input type="text" class="form-control" id="name" placeholder="Нэр" readonly>
              </div>
              <div class="form-group">
                <label for="email">Цахим хаяг</label>
                <input type="email" class="form-control" id="email" placeholder="Цахим хаяг" readonly>
              </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="phone">Утасны дугаар</label>
                <input type="number" class="form-control" id="phone" placeholder="Утасны дугаар" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="registration_number">Регистрийн дугаар</label>
                <input type="text" class="form-control" id="registration_number" placeholder="Регистрийн дугаар" readonly>
              </div>
                </div>
                <div style="padding: 10px 0px; display: flex;">Төлөв:&nbsp&nbsp <div id="status" style="font-size:15px;"></div></div>
              @csrf
              <div class="row">
                  <div class="col-md-12">
                  <label for="registration_number">Баримтын хавсралт</label>
                   <a href="" id="download" download>
                      <img src="" id="picture">
                   </a>
                  </div>
              </div>
              <input type="hidden" name="user_id" id="user_id"/>
              <input type="hidden" name="id" id="request_id"/>
              <input type="hidden" name="status" id="status_input"/>
              <div class="mt-3 d-flex" style="justify-content: space-between;">
              <a href="#" class="btn btn-secondary" id="delete">Устгах</a>
              <button type="submit" class="btn btn-primary float-right" id="save">Батлах</button>
            </div>
            </div>
            </form>
            </div>
         </div>
        </div>
       </div>
      </div>
@endsection