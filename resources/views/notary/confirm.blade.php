@extends('layouts.dashboard')
@section('title', 'Мэдээлэлээ баталгаажуулах')

@section('content')
<!-- 0: баталгаажсан, 1:хүлээгдэж буй -->
<div class="container">
<div class="col-md-10 mr-auto ml-auto">
    <div class="card">
      <div class="card-header">
         <h5>Мэдээллээ баталгаажуулах хэсэг</h5> 
      </div>

      <div class="card-body">
      @if($confirmation=='false')
      <p>Нотариатын үйл ажиллагааг /цахимаар/ эрхлэх зөвшөөрлийг хуульд заасан журмын дагуу зохион байгуулсан мэргэшлийн шалгалтад тэнцсэн баримтаа 
        баталгаажуулсны дараа олгоно.</p>
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <img src="{{ asset('assets/img/cert.png') }}" alt="баримт" id="cert">
            </div>
        </div>
            <form action="/confirm" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-4 mr-auto ml-auto mt-3 mb-3">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="picture" required accept="image/png, image/jpeg" name="file">
                        <label class="custom-file-label" for="picture">Зөвшөөрлийн файл сонгох.</label>
                    </div>
                    </div>
                  
                </div>
                <input type="hidden" name="user" value="{{Auth::user()->id}}">
            <p><b>Анхааруулга</b>:</br> -Та өөрийнхөө баримтын зургийг овог, нэр, баримтын дугаараа бүрэн, тод харагдахаар нүүрэн хэсгийг дарж илгээнэ үү. Таны мэдээллийг бид 24 цагийн дотор баталгаажуулан хариуг <a href="/confirm">энэ</a> хуудсаар илгээх болно.</p>
            <p>-Таны баримтын овог нэр цахим бүртгэлийн мэдээллээс зөрсөн тохиолдолд бүртгэл баталгаажих боломжгүйг анхаарна уу. Та цахим бүртгэлдээ засвар оруулахыг хүсвэл хүсвэл <a href="/profile">бүртгэл</a> хуудсаар зочилно уу.</p>   
            <p>-Та баримтаа явуулсны дараа хариу гартал баримтаа дахин илгээх боломжгүй юм.</p>   
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right mb-3">Илгээх</button>
        </div>
        </form>

      @elseif($confirmation->status==1)
      <h4 class="text-center mb-3">Таний мэдээлэл шалгагдаж байна түр хүлээнэ үү.</h4>
      <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <img src="{{ asset($confirmation->picture) }}" alt="баримт" id="cert">
            </div>
        </div>
      @elseif($confirmation->status==0)
      <p class="text-center mb-3">Таний баримт баталгаажсан байна.</p>
      <script>window.location = "/dashboard";</script>
      @endif

        </div> 
</div>
</div>
<script>
$('#picture').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "png" || ext == "jpeg"))
     {
        var reader = new FileReader();
        reader.onload = function (e) {
           $('#cert').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#img').attr('src', '{{ asset('assets/img/cert.png') }}');
    }
  });
</script>
@endsection
