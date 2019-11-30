@extends('layouts.dashboard') @section('title', 'Гэрээнүүд') @section('content')
<div class="col-md-9 mr-auto ml-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title pl-3">Маягтууд</h4>
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
        </div>
    </div>
</div>
@endsection