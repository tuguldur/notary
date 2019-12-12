@extends('layouts.dashboard') 
@section('title', 'Бүртгэл')
@section('content')
<div class="col-md-12">
        <div class="card card-stats">
            <div class="card-body">
                @if(Auth::user()->type == 3)
                <div class="row">
                    <div class="col-md-3">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="now-ui-icons education_paper"></i>
                                </div>
                                <h3 class="info-title"> {{$total_contracts}} </h3>
                                <h6 class="stats-title">Нийт маягтууд</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="now-ui-icons business_money-coins"></i>
                                </div>
                                <h3 class="info-title">{{ $salary }} <small>₮</small></h3>
                                <h6 class="stats-title">Нийт орлого</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="now-ui-icons users_single-02"></i>
                                </div>
                                <h3 class="info-title">{{ $user }}</h3>
                                <h6 class="stats-title">Систэм хэрэглэгч</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="now-ui-icons objects_support-17"></i>
                                </div>
                                <h3 class="info-title">{{ $confirmation }}</h3>
                                <h6 class="stats-title">Нотириат болох хүсэлт</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif(Auth::user()->type == 2)
                <div class="row">
                    <div class="col-md-6">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="now-ui-icons education_paper"></i>
                                </div>
                                <h3 class="info-title">{{ $total_contracts }}</h3>
                                <h6 class="stats-title">Нийт маягтууд</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="now-ui-icons business_money-coins"></i>
                                </div>
                                <h3 class="info-title">{{ $salary }} <small>₮</small></h3>
                                <h6 class="stats-title">Нийт орлого</h6>
                            </div>
                        </div>
                    </div>
                    @else
                      <div class="row">
                    <div class="col-md-6">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="now-ui-icons education_paper"></i>
                                </div>
                                <h3 class="info-title">{{ $total_contracts }}</h3>
                                <h6 class="stats-title">Нийт маягтууд</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="statistics">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="now-ui-icons business_money-coins"></i>
                                </div>
                                <h3 class="info-title">{{ $salary }} <small>₮</small></h3>
                                <h6 class="stats-title">Нийт зарлага</h6>
                            </div>
                        </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endsection
