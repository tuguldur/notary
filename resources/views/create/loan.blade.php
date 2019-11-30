@extends('layouts.dashboard') @section('title', 'Итгэмжлэл') @section('content')
<div class="col-md-12">
    <page class="a4">
        <div class="row">
            <form action="2.php" method="post">
                <div id="print">
                    <p class="font-weight-bold text-uppercase text-center">Зээлийн гэрээ</p>
                    <span class="print">
							2019-11-30<input name="ex2loc" placeholder="үйлдсэн газар" class="pull-right print float-right" type="text" size="0">
						</span>
                    <br>
                    <br>
                    <p class="print-main">Энэхүү гэрээг нэг талаас Зээл өгөгч
                        <input name="ex2city" placeholder="Хот, аймаг" type="text" size="0"> хотын (аймгийн)
                        <input name="ex2dist" placeholder="Дүүрэг, сум" type="text" size="0"> дүүргийн (сумын)
                        <input name="ex2khoroo" placeholder="хорооны (багийн)" type="text" size="0"> хорооны (багийн)
                        <input name="ex2user_regnumber" placeholder="Регистер №" type="text" size="0"> тоот иргэний үнэмлэхтэй
                        <input name="ex2lastname" placeholder="Овог" type="text" size="0">-ийн
                        <input name="ex2firstname" placeholder="Нэр" type="text" size="0"> , нөгөө талаас Зээл авагч
                        <input name="ex2city2" placeholder="Хот, аймаг" type="text" size="0">хотын (аймгийн)
                        <input name="ex2dist1" placeholder="Дүүрэг, сум" type="text" size="0"> дүүргийн (сумын)
                        <input name="ex2khoroo1" placeholder="хорооны (багийн)" type="text" size="0"> хорооны (багийн)
                        <input name="ex2user_regnumber1" placeholder="Регистрийн дугаар" type="text" size="0"> тоот иргэний үнэмлэхтэй
                        <input name="ex2lastname1" placeholder="Овог" type="text" size="0">-ийн
                        <input name="ex2firstname1" placeholder="Нэр" type="text" size="0"> нар харилцан тохиролцож, Монгол улсын Иргэний хуулийн 281-285 дугаар зүйлүүдийг үндэслэн дараахь нөхцөлтэйгээр байгуулав.</p>
                    <br>
                    <p class="print-main">
                        1.Зээл өгөгч нь
                        <input id="price" name="ex2price1" type="number"> (төгрөг, доллар, юань, рубль, евро) -г
                        <input name="ex2date" value="2019-11-30-ний өдөр" readonly=""> зээл авагчид
                        <input name="ex2date2" placeholder="YYYY/MM/DD" type="text" size="0"> хүртэл
                        <input name="ex2date3" placeholder="Нийт хоног" type="number"> хугацаатайгаар зээлдүүлж байна.</p>
                    <p class="print-main">2. Зээл авагч нь авсан зээл болох
                        <input id="price2" name="ex2price2" type="number" readonly=""> (төгрөг, доллар, юань, рубль, евро)-д
                        <input name="ex2date4" placeholder="YYYY/MM" type="text" size="0"> ( сар, жил ) бүр
                        <input name="ex2hv" placeholder="Хүү" type="number"> хувийн хүү төлнө.</p>
                    <p class="print-main">3. Энэхүү гэрээний үүргийн гүйцэтгэлийг хангахын тулд барьцааны зүйл болгон
                        <input name="ex2baritsaa" type="text" placeholder="барьцаа" size="0"> эд хөрөнгийг барьцаанд авав. ( барьцааны эд хөрөнгийн жагсаалтыг хавсаргав. Хавсралт нь энэ гэрээний салшгүй хэсэг болно) Жич: энэ хэсгийг зөвхөн барьцаатай зээлийн гэрээнд хэрэглэнэ.</p>
                    <p class="print-main">4. Зээл авагч тал энэ гэрээнд заасан хугацаанд авсан зээлээ, хүүгийн хамт төлөх үүрэгтэй.</p>
                    <p class="print-main">5. Гэрээнд заасан хугацаанд зээлийг хүүгийн хамт төлөөгүй тохиолдолд хугацаа хэтэрсэн хоног тутамд төлөөгүй үлдсэн мөнгөний үнийн дүнгийн
                        <input name="ex2perc" type="number"> хувиар бодож алдангийг зээл өгөгчид төлөх үүрэгтэй.</p>
                    <p class="print-main">6. Зээл авагч тал хугацаандаа авсан зээлээ буцаан төлөөгүй тохиолдолд гэрээний хугацаа дууссанаас хойш
                        <input type="number" name="ex2exday"> хоног өнгөрмөгц Зээл өгөгч нь барьцаанд авсан хөрөнгийг захиран зарцуулж, түүний үнийн дүнгээс үндсэн зээл, хүү, алданги, хохирлоо гаргаж авах эрхтэй.</p>
                    <p class="print-main">7. Барьцааны эд хөрөнгийг борлуулж энэ гэрээний 6-д заасан төлбөрийг барагдуулж дуусаад мөнгө үлдэх тохиолдолд зээл авагчид буцаан өгөх үүргийг зээл өгөгч хүлээнэ. Барьцааны эд хөрөнгийг худалдахад зээл өгөгч хамт байхыг шаардах эрхтэй. </p>
                    <p class="print-main">8. Энэ гэрээтэй холбоотой аливаа маргаантай асуудлыг Монголын Үндэсний Худалдаа Аж Үйлдвэрийн Танхимын дэргэдэх Монголын Олон Улсын ба Үндэсний Арбитрт түүний Арбитрын хэрэг хянан шийдвэрлэх дүрмийн дагуу Монгол Улсад эцэслэн шийдвэрлүүлнэ.</p>
                    <p class="print-main">9. Зээл өгөгч гэрээнд заасан мөнгийг зээл авагчид шилжүүлэн өгснөөр энэхүү гэрээг байгуулсанд тооцно.</p>
                    <p class="print-main">10. Гэрээг 2 хувь үйлдэж, талууд гарын үсэг зуран нэг нэг хувийг хадгална.</p>
                    <br>
                    <p class="text-center">Гэрээний тал:</p>
                    <p class="font-weight-bold">Зээл өгөгч:</p>
                    <p class="print-main">Эцэг/эх/-ийн нэр
                        <input name="ex2lastname2" placeholder="Овог" type="text" size="0"> нэр
                        <input name="ex2firstname2" placeholder="Нэр" type="text" size="0"> оршин суугаа хаяг
                        <input name="ex2location1" type="text" placeholder="Хаяг" size="0"> утас
                        <input type="number" name="ex2phone_numbers" placeholder="Утасны дугаар"> иргэний үнэмлэхийн дугаар
                        <input type="text" name="ex2passnumber" placeholder="үнэмлэхийн дугаар" size="0"> регистрийн дугаар
                        <input type="text" name="ex2reg_number2" placeholder="Регистер №" size="0"> Банкны харилцах данс
                        <input type="text" name="ex2bankaccount" placeholder="харилцах данс" size="0"> Гарын үсэг___________________</p>
                    <p class="font-weight-bold">Зээл авагч:</p>
                    <p class="print-main">Эцэг/эх/-ийн нэр
                        <input type="text" name="ex2lastname3" placeholder="овог" size="0"> нэр
                        <input type="text" name="ex2firstname3" placeholder="Нэр" size="0"> оршин суугаа хаяг
                        <input name="ex2location2" type="text" placeholder="Хаяг" size="0"> утас
                        <input type="number" name="ex2phone_numbers2" placeholder="Утасны дугаар"> иргэний үнэмлэхийн дугаар
                        <input type="text" name="ex2passnumber2" placeholder="үнэмлэхийн дугаар" size="0"> регистрийн дугаар
                        <input type="text" name="ex2reg_number3" placeholder="регистрийн дугаар" size="0"> Банкны харилцах данс
                        <input type="text" name="ex2bankaccount2" placeholder="харилцах данс" size="0"> Гарын үсэг___________________</p>

                </div>
                <input name="username" type="hidden" value="bymbuush">
                <input id="total" name="pay" type="hidden" value="">
                <span class="text-right" id="totalprice"></span>
                </br>
                <button id="print_button" type="submit" name="ex2post" class="btn btn-default">Хадгалах</button>
                <!--onclick="jQuery('#print').print()"-->
                <input id="total" name="pay" type="hidden" value="" />
                <span class="text-right" id="totalprice"></span>
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
        //price
        $("#price").change(function() {
            var price = $(this).val();
            var pay = (price * 0.5 / 100);
            $("#price2").val(price);
            $("#totalprice").html("Төлөх дүн: " + pay);
            $("#total").val(pay);

        });
    });
</script>
@endsection