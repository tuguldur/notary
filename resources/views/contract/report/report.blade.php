@extends('layouts.dashboard') @section('title', 'Тайлан') @section('content')
<div class="col-md-12">
    <div class="card" style="z-index:1">
        <div class="container">
        <h4 class="card-title pl-3">Итгэмжлэлийн гэрээ</h4>
        <div class="form-group mt-3" style="max-width:150px; padding:0 20px;">  
            <label for="type" class="text-dark">Шүүх төрөл</label>
                <select class="form-control" id="type" onchange="location = this.value;">

                <option {!! $type == 'd' ? 'selected' : '' !!} value="/report?type=d">Өдөр </option>
                <option {!! $type == 'm' ? 'selected' : '' !!} value="/report?type=m">Сар</option>
                <option {!! $type == 'y' ? 'selected' : '' !!}  value="/report?type=y">Жил</option>
                </select>
        </div>
            <div class="reports-listing reports-listing-padded">
            @if(Auth::user()->type == 2)
            @foreach($accreditations as $item)
            <div class="report-group-title">
                    <svg class="octicon octicon-git-commit" viewBox="0 0 14 16" version="1.1" width="14" height="16"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.86 7c-.45-1.72-2-3-3.86-3-1.86 0-3.41 1.28-3.86 3H0v2h3.14c.45 1.72 2 3 3.86 3 1.86 0 3.41-1.28 3.86-3H14V7h-3.14zM7 10.2c-1.22 0-2.2-.98-2.2-2.2 0-1.22.98-2.2 2.2-2.2 1.22 0 2.2.98 2.2 2.2 0 1.22-.98 2.2-2.2 2.2z">
                        </path>
                    </svg>
                    Тайлан 
                    @if($type == 'd')
                    {{ $item->first()->created_at->format('Y-m-d') }}
                    @elseif($type == 'm')
                    {{ $item->first()->created_at->format('Y-m') }}
                    @else
                    {{ $item->first()->created_at->format('Y') }}
                    @endif
                </div>
            @foreach($item as $accreditation)
            <ol class="commit-group table-list table-list-bordered pl-1">
                    <li class="commit commits-list-item d-flex">
                        <div class="table-list-cell">
                            <p class="commit-title h5 mb-1 text-gray-dark">
                                <a href="/view/accreditation/{{$accreditation->id}}">Итгэмжлэл #{{$accreditation->id}} 
                                    @if ($accreditation->status == 1)
                                    <span class="badge text-warning" data-toggle="tooltip" data-placement="top" title="" style="font-size:12px;" data-original-title="Төлөх дүн:{{$accreditation->price}} ₮">Төлбөр төлөх шаардлагатай</span>
                                    @elseif($accreditation->status == 2)
                                    <span class='badge text-success'>Баталгаажсан</span>
                                    @else
                                    <span class='badge text-danger'>Хүчингүй болсон</span>
                                    @endif
                                </a>
                            </p>
                            <a class="commit-author text-dark">{{$accreditation->name ? $accreditation->name : 'Үйлчлүүлэгч сонгоогүй'}}</a> илгээсэн:
                            <relative-time  class="no-wrap"
                            data-placement="bottom" data-toggle="tooltip" data-original-title="{{$accreditation->created_at}}">{{$accreditation->created_at->diffForHumans()}}
                            </relative-time>
                        </div>
                        <div class="spacer"></div>
                        <div class="commit-links-cell table-list-cell d-none d-md-block">
                            
                                <a href="/view/accreditation/{{$accreditation->id}}" class="btn btn-outline-info BtnGroup-item">
                                    Үзэх
                                </a>
                                <a href="#" class="btn btn-outline-success BtnGroup-item ml-2 dropdown-toggle" style="padding: 7px 9px;font-size: 14px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="now-ui-icons loader_gear"></i>     
                                </a>
                                <div class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(90px, 43px, 0px);">
                                    @if($accreditation->status==1)
                                     <a href="/status/accreditation/{{$accreditation->id}}" class="dropdown-item">Батлах</a>
                                     <div class="dropdown-divider"></div>
                                    @elseif($accreditation->status==2)
                                     <a href="/status/accreditation/{{$accreditation->id}}" class="dropdown-item">Цуцлах</a>
                                     <div class="dropdown-divider"></div>
                                    @endif
                                     <a href="/delete/accreditation/{{$accreditation->id}}" class="dropdown-item text-danger">Устгах</a>
                              
                            </div>
                        </div>
                    </li>
                </ol>
                @endforeach
            @endforeach
            </div>
        </div>
    </div>
     <div class="card" style="z-index:1">
        <div class="container">
        <h4 class="card-title pl-3">Зээлийн гэрээ</h4>
            <div class="reports-listing reports-listing-padded">
            @foreach($loans as $item)
            <div class="report-group-title">
                    <svg class="octicon octicon-git-commit" viewBox="0 0 14 16" version="1.1" width="14" height="16"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.86 7c-.45-1.72-2-3-3.86-3-1.86 0-3.41 1.28-3.86 3H0v2h3.14c.45 1.72 2 3 3.86 3 1.86 0 3.41-1.28 3.86-3H14V7h-3.14zM7 10.2c-1.22 0-2.2-.98-2.2-2.2 0-1.22.98-2.2 2.2-2.2 1.22 0 2.2.98 2.2 2.2 0 1.22-.98 2.2-2.2 2.2z">
                        </path>
                    </svg>
                    Тайлан 
                    @if($type == 'd')
                    {{ $item->first()->created_at->format('Y-m-d') }}
                    @elseif($type == 'm')
                    {{ $item->first()->created_at->format('Y-m') }}
                    @else
                    {{ $item->first()->created_at->format('Y') }}
                    @endif
                </div>
            @foreach($item as $loan)
            <ol class="commit-group table-list table-list-bordered pl-1">
                    <li class="commit commits-list-item d-flex">
                        <div class="table-list-cell">
                            <p class="commit-title h5 mb-1 text-gray-dark">
                                <a href="/view/loan/{{$loan->id}}">Зээлийн гэрээ #{{$loan->id}} 
                                    @if ($loan->status == 1)
                                    <span class="badge text-warning" data-toggle="tooltip" data-placement="top" title="" style="font-size:12px;" data-original-title="Төлөх дүн:{{$loan->price}} ₮">Төлбөр төлөх шаардлагатай</span>
                                    @elseif($loan->status == 2)
                                    <span class='badge text-success'>Баталгаажсан</span>
                                    @else
                                    <span class='badge text-danger'>Хүчингүй болсон</span>
                                    @endif
                                </a>
                            </p>
                            <a class="commit-author text-dark">{{$loan->name ? $loan->name : 'Үйлчлүүлэгч сонгоогүй'}}</a> илгээсэн:
                            <relative-time  class="no-wrap"
                            data-placement="bottom" data-toggle="tooltip" data-original-title="{{$loan->created_at}}">{{$loan->created_at->diffForHumans()}}
                            </relative-time>
                        </div>
                        <div class="spacer"></div>
                        <div class="commit-links-cell table-list-cell d-none d-md-block">
                            
                                <a href="/view/loan/{{$loan->id}}" class="btn btn-outline-info BtnGroup-item">
                                    Үзэх
                                </a>
                                <a href="#" class="btn btn-outline-success BtnGroup-item ml-2 dropdown-toggle" style="padding: 7px 9px;font-size: 14px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="now-ui-icons loader_gear"></i>     
                                </a>
                                <div class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(90px, 43px, 0px);">
                                    @if($loan->status==1)
                                     <a href="/status/loan/{{$loan->id}}" class="dropdown-item">Батлах</a>
                                     <div class="dropdown-divider"></div>
                                    @elseif($loan->status==2)
                                     <a href="/status/loan/{{$loan->id}}" class="dropdown-item">Цуцлах</a>
                                     <div class="dropdown-divider"></div>
                                    @endif
                                     <a href="/delete/loan/{{$loan->id}}" class="dropdown-item text-danger">Устгах</a>
                              
                            </div>
                        </div>
                    </li>
                </ol>
                @endforeach
            @endforeach
            @elseif(Auth::user()->type == 3)
            @foreach($accreditations as $item)
            <div class="report-group-title">
                    <svg class="octicon octicon-git-commit" viewBox="0 0 14 16" version="1.1" width="14" height="16"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.86 7c-.45-1.72-2-3-3.86-3-1.86 0-3.41 1.28-3.86 3H0v2h3.14c.45 1.72 2 3 3.86 3 1.86 0 3.41-1.28 3.86-3H14V7h-3.14zM7 10.2c-1.22 0-2.2-.98-2.2-2.2 0-1.22.98-2.2 2.2-2.2 1.22 0 2.2.98 2.2 2.2 0 1.22-.98 2.2-2.2 2.2z">
                        </path>
                    </svg>
                    Тайлан 
                    @if($type == 'd')
                    {{ $item->first()->created_at->format('Y-m-d') }}
                    @elseif($type == 'm')
                    {{ $item->first()->created_at->format('Y-m') }}
                    @else
                    {{ $item->first()->created_at->format('Y') }}
                    @endif
                </div>
            @foreach($item as $accreditation)
            <ol class="commit-group table-list table-list-bordered pl-1">
                    <li class="commit commits-list-item d-flex">
                        <div class="table-list-cell">
                            <p class="commit-title h5 mb-1 text-gray-dark">
                                <a href="/view/accreditation/{{$accreditation->id}}">Итгэмжлэл #{{$accreditation->id}} 
                                    @if ($accreditation->status == 1)
                                    <span class="badge text-warning" data-toggle="tooltip" data-placement="top" title="" style="font-size:12px;" data-original-title="Төлөх дүн:{{$accreditation->price}} ₮">Төлбөр төлөх шаардлагатай</span>
                                    @elseif($accreditation->status == 2)
                                    <span class='badge text-success'>Баталгаажсан</span>
                                    @else
                                    <span class='badge text-danger'>Хүчингүй болсон</span>
                                    @endif
                                </a>
                            </p>
                            <a class="commit-author text-dark">{{$accreditation->client_name ? $accreditation->client_name : 'Үйлчлүүлэгч сонгоогүй'}}</a> илгээсэн:
                            <relative-time  class="no-wrap"
                            data-placement="bottom" data-toggle="tooltip" data-original-title="{{$accreditation->created_at}}">{{$accreditation->created_at->diffForHumans()}}
                            </relative-time>
                            </br>
                            <a class="commit-author text-dark">Нотариат: {{$accreditation->notary_name}}</a>
                        </div>
                        <div class="spacer"></div>
                        <div class="commit-links-cell table-list-cell d-none d-md-block">
                            
                                <a href="/view/accreditation/{{$accreditation->id}}" class="btn btn-outline-info BtnGroup-item">
                                    Үзэх
                                </a>
                                <a href="#" class="btn btn-outline-success BtnGroup-item ml-2 dropdown-toggle" style="padding: 7px 9px;font-size: 14px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="now-ui-icons loader_gear"></i>     
                                </a>
                                <div class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(90px, 43px, 0px);">
                                    @if($accreditation->status==1)
                                     <a href="/status/accreditation/{{$accreditation->id}}" class="dropdown-item">Батлах</a>
                                     <div class="dropdown-divider"></div>
                                    @elseif($accreditation->status==2)
                                     <a href="/status/accreditation/{{$accreditation->id}}" class="dropdown-item">Цуцлах</a>
                                     <div class="dropdown-divider"></div>
                                    @endif
                                     <a href="/delete/accreditation/{{$accreditation->id}}" class="dropdown-item text-danger">Устгах</a>
                              
                            </div>
                        </div>
                    </li>
                </ol>
                @endforeach
            @endforeach
            </div>
        </div>
    </div>
     <div class="card" style="z-index:1">
        <div class="container">
        <h4 class="card-title pl-3">Зээлийн гэрээ</h4>
            <div class="reports-listing reports-listing-padded">
            @foreach($loans as $item)
            <div class="report-group-title">
                    <svg class="octicon octicon-git-commit" viewBox="0 0 14 16" version="1.1" width="14" height="16"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.86 7c-.45-1.72-2-3-3.86-3-1.86 0-3.41 1.28-3.86 3H0v2h3.14c.45 1.72 2 3 3.86 3 1.86 0 3.41-1.28 3.86-3H14V7h-3.14zM7 10.2c-1.22 0-2.2-.98-2.2-2.2 0-1.22.98-2.2 2.2-2.2 1.22 0 2.2.98 2.2 2.2 0 1.22-.98 2.2-2.2 2.2z">
                        </path>
                    </svg>
                    Тайлан 
                    @if($type == 'd')
                    {{ $item->first()->created_at->format('Y-m-d') }}
                    @elseif($type == 'm')
                    {{ $item->first()->created_at->format('Y-m') }}
                    @else
                    {{ $item->first()->created_at->format('Y') }}
                    @endif
                </div>
            @foreach($item as $loan)
            <ol class="commit-group table-list table-list-bordered pl-1">
                    <li class="commit commits-list-item d-flex">
                        <div class="table-list-cell">
                            <p class="commit-title h5 mb-1 text-gray-dark">
                                <a href="/view/loan/{{$loan->id}}">Зээлийн гэрээ #{{$loan->id}} 
                                    @if ($loan->status == 1)
                                    <span class="badge text-warning" data-toggle="tooltip" data-placement="top" title="" style="font-size:12px;" data-original-title="Төлөх дүн:{{$loan->price}} ₮">Төлбөр төлөх шаардлагатай</span>
                                    @elseif($loan->status == 2)
                                    <span class='badge text-success'>Баталгаажсан</span>
                                    @else
                                    <span class='badge text-danger'>Хүчингүй болсон</span>
                                    @endif
                                </a>
                            </p>
                            <a class="commit-author text-dark">{{$loan->client_name ? $loan->client_name : 'Үйлчлүүлэгч сонгоогүй'}}</a> илгээсэн:
                            <relative-time  class="no-wrap"
                            data-placement="bottom" data-toggle="tooltip" data-original-title="{{$loan->created_at}}">{{$loan->created_at->diffForHumans()}}
                            </relative-time>
                            </br>
                            <a class="commit-author text-dark">Нотариат: {{$loan->notary_name}}</a>
                        </div>
                        <div class="spacer"></div>
                        <div class="commit-links-cell table-list-cell d-none d-md-block">
                            
                                <a href="/view/loan/{{$loan->id}}" class="btn btn-outline-info BtnGroup-item">
                                    Үзэх
                                </a>
                                <a href="#" class="btn btn-outline-success BtnGroup-item ml-2 dropdown-toggle" style="padding: 7px 9px;font-size: 14px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="now-ui-icons loader_gear"></i>     
                                </a>
                                <div class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(90px, 43px, 0px);">
                                    @if($loan->status==1)
                                     <a href="/status/loan/{{$loan->id}}" class="dropdown-item">Батлах</a>
                                     <div class="dropdown-divider"></div>
                                    @elseif($loan->status==2)
                                     <a href="/status/loan/{{$loan->id}}" class="dropdown-item">Цуцлах</a>
                                     <div class="dropdown-divider"></div>
                                    @endif
                                     <a href="/delete/loan/{{$loan->id}}" class="dropdown-item text-danger">Устгах</a>
                              
                            </div>
                        </div>
                    </li>
                </ol>
                @endforeach
            @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection