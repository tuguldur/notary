@extends('layouts.dashboard') @section('title', 'Гэрээнүүд') @section('content')
<div class="col-md-9 mr-auto ml-auto">
    <div class="row row justify-content-md-center">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title pl-3">Маягтууд</h4>
            @if(Auth::user()->type == 2 && Auth::user()->confirmed == 0)
            <p class="text-center">Та бүртэлээ баталгаажуулсан байх шаардлагатай</p>
            @else
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
            @if(!$accreditations->isEmpty())
            <h4 class="card-title pl-3">Хийгдсэн Итгэмжлэлүүд</h4>
            <div class="row p-3">
            @foreach ($accreditations as $accreditation)
                    <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-2">Итгэмжлэл #{{$accreditation->id}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Итгэмжлэлийн маягт (ерөнхий)</h6>
                            <p class="card-text">
                                {!! $accreditation->status == 1 
                                   ? '<span class="badge text-warning" data-toggle="tooltip" data-placement="bottom" title="" style="font-size:12px;" data-original-title="Төлөх дүн:'.$accreditation->price.'">Төлбөр төлөх шаардлагатай</span>'
                                   : "<span class='badge text-success'>Баталгаажсан</span>"
                                !!}
                            </p>
                            <p class="card-text tex-muted">
                            Үүсгэсэн: {{$accreditation->created_at->diffForHumans()}}
						    </p>
                            <a href="/view/accreditation/{{$accreditation->id}}" class="card-link">Үзэх</a>
                            <a href="/delete/accreditation/{{$accreditation->id}}" class="card-link float-right text-warning">Устгах</a>
                            @if($accreditation->status==1)
                            <a href="/status/accreditation/{{$accreditation->id}}" class="card-link float-right text-success">Батлах</a>
                            @else
                            <a href="/status/accreditation/{{$accreditation->id}}" class="card-link float-right text-warning">Цуцлах</a>
                            @endif
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
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-2">Зээлийн гэрээ #{{$loan->id}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Зээл өгөгчийн гэрээний маягт</h6>
                            <p class="card-text">
                                {!! $loan->status == 1 
                                   ? '<span class="badge text-warning" data-toggle="tooltip" data-placement="bottom" title="" style="font-size:12px;" data-original-title="Төлөх дүн:'.$loan->price.'">Төлбөр төлөх шаардлагатай</span>'
                                   : "<span class='badge text-success'>Баталгаажсан</span>"
                                !!}
                            </p>
                            <p class="card-text tex-muted">
                              Үүсгэсэн: {{$loan->created_at->diffForHumans()}}
						    </p>
                            <a href="/view/loan/{{$loan->id}}" class="card-link">Үзэх</a>

                            <a href="/delete/loan/{{$loan->id}}" class="card-link float-right text-warning">Устгах</a>
                            @if($loan->status==1)
                            <a href="/status/loan/{{$loan->id}}" class="card-link float-right text-success">Батлах</a>
                            @else
                            <a href="/status/loan/{{$loan->id}}" class="card-link float-right text-warning">Цуцлах</a>
                            @endif
                        </div>
                    </div>
                    </div>
            @endforeach
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection