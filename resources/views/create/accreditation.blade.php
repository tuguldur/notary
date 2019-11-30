@extends('layouts.dashboard') @section('title', 'Итгэмжлэл') @section('content')
<div class="col-md-12">
    <page class="a4">
        <div class="row">
            <form action="/create/accreditation" method="post">
                <div id="print">
                    <p class="font-weight-bold text-uppercase text-center">ИТГЭМЖЛЭЛ</p>
                    <span class="print">
							2019/11/30<input name="ex1loc" placeholder="үйлдсэн газар" class="pull-right print float-right" type="text" size="0">
						</span>
                    <br>
                    <br>
                    <p class="print-main">Монгол Улсын Иргэний хуулийн 62 дугаар зүйлийн 62.3-д заасныг үндэслэн
                        <input name="ex1prov" placeholder="муж" type="text" size="0"> мужийн
                        <input name="ex1city" placeholder="хот" type="text" size="0"> хотын
                        <input name="ex1street" placeholder="гудамж, өргөн чөлөө" type="text" size="0"> / гудамж, өргөн чөлөө, цэцэгт гудамж/-ны
                        <input name="ex1numb" placeholder="байрны дугаар" type="text" size="0"> дугаар байрны
                        <input name="ex1no" placeholder="тоот" type="text" size="0"> тоотод оршин суух
                        <input name="ex1userlastname" placeholder="Овог" type="text" size="0"> овогтой
                        <input name="ex1userfirstname" placeholder="Нэр" type="text" size="0"> (РД:
                        <input name="ex1userreg_number" oninput="this.value = this.value.toUpperCase()" placeholder="Регистер дугаар" type="text" size="0">) би энэхүү итгэмжлэлээр
                        <input name="ex1text" placeholder="итгэмжлэлийн утга" type="text" size="0"> үйлдэл хийх эрхийг Монгол Улсын
                        <input name="ex1city1" placeholder="Хот, аймаг" type="text" size="0"> /Хот, аймаг/-ын
                        <input name="ex1stage" placeholder="дүүрэг, сум" type="text" size="0"> /дүүрэг, сум/-ын
                        <input name="exloc1" placeholder="хороо, баг" type="text" size="0">. /хороо, баг/,
                        <input name="ex1street1" placeholder="хороолол, гудамж" type="text" size="0"> (хороолол, хотхон, гудамж)-ын
                        <input name="ex1bnumber" placeholder="байр, гудамжийн дугаар" type="text" size="0"> (байр, гудамжийн дугаар )-ын
                        <input name="ex1no1" placeholder="тоот" type="text" size="0"> тоотод оршин суух
                        <input name="ex1representativelastname" placeholder="Овог" type="text" size="0"> овогтой
                        <input name="ex1representativefirstname" placeholder="Итгэмжлэх хүний нэр" type="text" size="0"> -д итгэмжлэн олгож байна.</p>
                    <br>
                    <p class="print-main">Энэхүү итгэмжлэл нь олгосон өдрөөс эхлэн
                        <input type="text" name="ex1timedate" placeholder="Он сар өдөр" size="0"> /сар, жил/-ын хугацаанд хүчинтэй болно.</p>
                    <div class="row">
                        <div class="col">
                            <p class="print-main">ИТГЭМЖЛЭГЧ :
                                <input name="ex1Representativename" placeholder="Итгэмжлэгчийн нэр" type="text" size="0">
                            </p>
                            <p class="print-main">............................................. /гарын үсэг/</p>
                            <p class="print-main">Иргэний үнэмлэхний №
                                <input placeholder="Итгэмжлэгчийн Иргэний үнэмлэхний №" name="ex1passwordnumber" type="text" size="0">
                            </p>
                            <p class="print-main">Регистрийн №
                                <input placeholder="Регистерийн дугаар" name="ex1registernumber" type="text" size="0">
                            </p>
                        </div>
                        <div class="col">
                            <p class="print">ИТГЭМЖЛЭГДЭГЧ :
                                <input class="print-main" placeholder="Итгэмжлэгдэгчийн нэр" name="ex1trusteename" type="text" size="0">
                            </p>
                            <p class="print-main">............................................. /гарын үсэг/</p>
                            <p class="print-main">Иргэний үнэмлэхний №
                                <input placeholder="Итгэмжлэгдэгчийн" name="ex1trusteepasswordnumber" type="text" size="0">
                            </p>
                            <p class="print-main">Регистрийн №
                                <input placeholder="Итгэмжлэгдэгчийн регистр" name="ex1trusteeregisternumber" type="text" size="0">
                            </p>
                        </div>
                    </div>
                </div>
                <input name="username" type="hidden" value="bymbuush">
                <button id="print_button" type="submit" name="ex1post" class="btn btn-default">Илгээх</button>
                <!--onclick="jQuery('#print').print()"-->
            </form>

        </div>
    </page>
</div>
<script>
    $(document).ready(function() {
        function resizeInput() {
            $(this).attr('size', $(this).val().length);
        }

        $('input[type="text"]')
            .each(resizeInput)
            .keyup(resizeInput);
        //date format
    });
</script>
@endsection