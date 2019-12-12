@extends('layouts.dashboard') @section('title', 'Итгэмжлэл') @section('content')
<div class="col-md-12">
    <page class="a4">
        <div class="row">
                <div id="printer" class="preview">
                    <p class="font-weight-bold text-uppercase text-center">ИТГЭМЖЛЭЛ</p>
                    <span class="print">{{ $accreditation->created_at->format('Y-m-d h:m') }}</span>
                    <span class='pull-right float-right'>{{ $accreditation->location }}</span>
                    <p class='text-center'>Дугаар: {{$accreditation->id}}</p>
                    <br>
                    <p  style="font-size: 16px;line-height: 36px;">Монгол Улсын Иргэний хуулийн 62 дугаар зүйлийн 62.3-д заасныг үндэслэн
                    {{ $accreditation->province }} мужийн
                    {{ $accreditation->city }} хотын
                    {{ $accreditation->street }} / гудамж, өргөн чөлөө, цэцэгт гудамж/-ны
                    {{ $accreditation->house_number }} дугаар байрны
                    {{ $accreditation->number }} тоотод оршин суух
                    {{ $accreditation->lastname }} овогтой
                    {{ $accreditation->firstname }} (РД:
                    {{ $accreditation->userreg_number }} би энэхүү итгэмжлэлээр
                    {{ $accreditation->value }} үйлдэл хийх эрхийг Монгол Улсын
                    {{ $accreditation->city2 }} /Хот, аймаг/-ын
                    {{ $accreditation->district }} /дүүрэг, сум/-ын
                    {{ $accreditation->khoroo }}. /хороо, баг/,
                    {{ $accreditation->street2 }} (хороолол, хотхон, гудамж)-ын
                    {{ $accreditation->house_number2 }} (байр, гудамжийн дугаар )-ын
                    {{ $accreditation->number2 }} тоотод оршин суух
                    {{ $accreditation->replastname }} овогтой
                    {{ $accreditation->repfirstname }} -д итгэмжлэн олгож байна.</p>
                    <br>
                    <p style="font-size: 16px;line-height: 36px;">Энэхүү итгэмжлэл нь олгосон өдрөөс эхлэн
                    {{ $accreditation->timedate }} /сар, жил/-ын хугацаанд хүчинтэй болно.</p>
                    <div class="row">
                        <div class="col">
                            <p >ИТГЭМЖЛЭГЧ :
                            {{ $accreditation->repname }}
                            </p>
                            <p >............................................. /гарын үсэг/</p>
                            <p >Иргэний үнэмлэхний №
                            {{ $accreditation->rep_pass_number }}
                            </p>
                            <p >Регистрийн №
                            {{ $accreditation->reg_number }}
                            </p>
                        </div>
                        <div class="col">
                            <p >ИТГЭМЖЛЭГДЭГЧ :
                            {{ $accreditation->trusteename }}
                            </p>
                            <p >............................................. /гарын үсэг/</p>
                            <p >Иргэний үнэмлэхний №
                            {{ $accreditation->trusteepassnumber }}
                            </p>
                            <p >Регистрийн №
                            {{ $accreditation->trusteeregnumber }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-100">
                <button id="print_button" class="btn btn-default float-left">Хэвлэх</button>
                <div class="float-right" style="line-height: 58px;">
                <p>Дуусах хугацаа: {{$accreditation->end}} | Төлөв: 
                                @if ($accreditation->status == 1)
                                <span class="badge text-warning" data-toggle="tooltip" data-placement="bottom" title="" style="font-size:12px;" data-original-title="Төлөх дүн:{{$accreditation->price}} ₮">Төлбөр төлөх шаардлагатай</span>
                                @elseif($accreditation->status == 2)
                                <span class='badge text-success'>Баталгаажсан</span>
                                @else
                                <span class='badge text-danger'>Хүчингүй болсон</span>
                                @endif
                                </p>
                <div>
                </div>
        </div>
    </page>
</div>
<script>
$('#print_button').click(function(){
		$( '#printer' ).print( {
			mediaPrint: false,
			title: 'Итгэмжлэл #{{$accreditation->id}}',
		});
});
</script>
@endsection