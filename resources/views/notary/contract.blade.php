@extends('layouts.dashboard') @section('title', 'Гэрээнүүд') @section('content')
<div class="col-md-9 mr-auto ml-auto">
    <div class="row row justify-content-md-center">
    <div class="card">
        <div class="card-body">
        <div class="d-flex mt-3 mb-1">
            <h4 class="card-title pl-3 m-0">Маягтууд</h4>
            <div class="spacer"></div>
            <div class="custom-control custom-switch" style="margin-top:8px;">
                <input type="checkbox" class="custom-control-input" id="filter">
                <label class="custom-control-label" for="filter">Зөвхөн баталгаажсан маягтууд</label>
            </div>
            </div>
            @if(Auth::user()->type == 2 && Auth::user()->confirmed == 0)
            <p class="text-center">Та бүртэлээ баталгаажуулсан байх шаардлагатай</p>
            @elseif(Auth::user()->type != 1 && !isset($search))
            <div class="row p-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-2">Итгэмжлэл</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Итгэмжлэлийн маягт (ерөнхий)</h6>
                            <p class="card-text">10,000 ₮</p>
                            <a href="/create/accreditation" class="card-link">Засах</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-2">Зээлийн гэрээ</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Зээл өгөгчийн гэрээний маягт</h6>
                            <p class="card-text">үнийн дүнгийн 0.5%</p>
                            <a href="/create/loan" class="card-link">Засах</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(!$accreditations->isEmpty())
            <h4 class="card-title pl-3">Хийгдсэн Итгэмжлэлүүд</h4>
            <div class="row p-3">
            @foreach ($accreditations as $accreditation)
                    <div class="col-md-3">
                    <div class="card {{$accreditation->status != 2 ? 'status': ''}}">
                        <div class="card-body">
                        @if(Auth::user()->type != 1)
                        <div style="position: absolute;right: 12px;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu">
                            <a href="#" class="dropdown-item add_user" data-id='{{$accreditation->id}}' data-type="accreditation" data-user="{{$accreditation->user_id}}">Үйлчлүүлэгч нэмэх</a>
                            @if($accreditation->status==1)
                            <a href="/status/accreditation/{{$accreditation->id}}" class="dropdown-item">Батлах</a>
                            @elseif($accreditation->status==2)
                            <a href="/status/accreditation/{{$accreditation->id}}" class="dropdown-item">Цуцлах</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="/delete/accreditation/{{$accreditation->id}}" class="dropdown-item text-danger">Устгах</a>
                            </div>
                            </div>
                            @endif
                            <h4 class="card-title mt-2">Итгэмжлэл #{{$accreditation->id}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $accreditation->name }}</h6>
                            <p class="card-text">
                                @if ($accreditation->status == 1)
                                <span class="badge text-warning" data-toggle="tooltip" data-placement="bottom" title="" style="font-size:12px;" data-original-title="Төлөх дүн:{{$accreditation->price}} ₮">Төлбөр төлөх шаардлагатай</span>
                                @elseif($accreditation->status == 2)
                                <span class='badge text-success'>Баталгаажсан</span>
                                @else
                                <span class='badge text-danger'>Хүчингүй болсон</span>
                                @endif
                            </p>
                            <p class="card-text tex-muted">
                            Үүсгэсэн: {{$accreditation->created_at->diffForHumans()}}
						    </p>
                            <p class="card-text tex-muted">
                            Дуусах: {{ $accreditation->end }}
						    </p>
                            <a href="/view/accreditation/{{$accreditation->id}}" class="card-link">Үзэх</a>
                        </div>
                        
                    </div>
                    </div>
            @endforeach
            </div>
        @endif
        @if(!$loans->isEmpty())
            <h4 class="card-title pl-3">Хийгдсэн Зээлийн гэрээнүүд</h4>
            <div class="row p-3">
            @foreach ($loans as $loan)
                    <div class="col-md-3">
                    <div class="card {{$loan->status != 2 ? 'status': ''}}">
                        <div class="card-body">
                        @if(Auth::user()->type != 1)
                        <div style="position: absolute;right: 12px;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu">
                            <a href="#" class="dropdown-item add_user" data-id='{{$loan->id}}' data-type="loan" data-user="{{$loan->user_id}}">Үйлчлүүлэгч нэмэх</a>
                            @if($loan->status==1)
                            <a href="/status/loan/{{$loan->id}}" class="dropdown-item">Батлах</a>
                            @elseif($loan->status==2)
                            <a href="/status/loan/{{$loan->id}}" class="dropdown-item">Цуцлах</a>
                            @else
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="/delete/loan/{{$loan->id}}" class="dropdown-item text-danger">Устгах</a>
                            </div>
                        </div>
                        @endif
                            <h4 class="card-title mt-2" style="font-size:1.5em;">Зээлийн гэрээ #{{$loan->id}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$loan->name}}</h6>
                            <p class="card-text">
                                @if($loan->status == 1) 
                                 <span class="badge text-warning" data-toggle="tooltip" data-placement="bottom" title="" style="font-size:12px;" data-original-title="Төлөх дүн: {{$loan->price}} ₮">Төлбөр төлөх шаардлагатай</span>'
                                @elseif($loan->status == 2) 
                                 <span class='badge text-success'>Баталгаажсан</span>
                                @else
                                <span class='badge text-danger'>Хүчингүй болсон</span>
                                @endif
                            </p>
                            <p class="card-text tex-muted">
                              Үүсгэсэн: {{$loan->created_at->diffForHumans()}}
						    </p>
                            <p class="card-text tex-muted">
                            Дуусах: {{ $loan->end }}
						    </p>
                            <a href="/view/loan/{{$loan->id}}" class="card-link">Үзэх</a>
                        </div>
                    </div>
                    </div>
            @endforeach
            </div>
            @endif
            @if(isset($search) && empty($accreditation))
                <p class="text-center p-3 text-danger">Маягт олдсонгүй!</p>
            @endif
        </div>
    </div>
</div>
<!-- Loan Add a User Dialog -->
<div class="modal fade" id="user_dialog" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" id="user_dialog_form">
                    <div class="form-group">
                        <label for="user_registration_number">Сонгох хэрэглэгчийхаа Регистрийн дугаарыг оруулна уу.</label>
                        <input class="form-control" list="users" name="user_registration_number" id="user_registration_number" placeholder="Регистрийн дугаар" required/>
                        <input type="hidden" name="id" id="type_id">
                        @csrf
                        <datalist id="users">
                            @foreach($users as $user)
                            <option value="{{$user}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary float-right">Хадгалах</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#filter').change(function(){
        var filter  = $(this).is(":checked");
        console.log(filter);
        if(filter) $('.status').hide();
        else  $('.status').show();
    });
</script>
@endsection