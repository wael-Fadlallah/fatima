@extends('layouts.main')


@section('content')
<style>
    body{
        color: black;
    }
    .editable{
        color: #0a508e;
    }
    table{
        text-align: center;
    }
    table th{
        text-align: center;
    }
    table td {
        padding-right: 7px;
    }

    table:first-child th {
        padding: 10px;
    }
    table:last-child td {
        width: 15%;
    }

    select {
        background: none;
        border: none;
    }
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
    }

    .logos img {
        width: 30%;
    }
    input[type='date']{
        border: none;
        background:none;
    }
    input[type="time"]{
        width:120px;
        border: none;
        clip-path: inset(0 17px 0 0);
        outline:none;
        outline:0;
    }

    #cer{
        height: 21cm;
        width: 29.7cm;
        background-image: url("images/background.png");
        background-size: contain ;
        /* change the margins as you want them to be. */
    }
</style>
<div class="container" dir="rtl" id="cer" style="margin: 0px 50px;">
    <img src="{{ asset('images/top.png') }}" style="width:29.7cm">

    <div class="row" style="justify-content:center;margin-right: 20px;">
        <div class="text-center ">
            <h2 style=" margin-right:0px; "> إشعار </h2>
            الفصل الدراسي الأول لعام 1442 هـ
            <br>
            مدرسة فاطمة بنت محمد
            <select id="shift">
                <option value="morning">الصباحية</option>
                <option value="evening">المسائية</option>
            </select>
        </div>
    </div>

    <div class="row justify-content-center" style="">


        <div class="col-12">
            <h4 class="text-center">
                عن أبي هريرة رضي الله عنه قال : قال رسول الله صلى الله عليه وسلم : ( يجيء القرآن يوم القيامة فيقول : يا رب حلًه ، فيلبس تاج
                <br>
                الكرامة ، ثم يقول : يا رب زده ، فيلبس حلًة الكرامة ، ثم يقول : يا
                رب ارض عنه , فيقال : اقراء و ارق ويزداد بكل أية حسنة )
            </h4>
        </div>
        <div style="margin: 0px 0px;width:80%;margin:auto">

            <h4 class="text-center" style="margin:30px 0px;"> تشهد إدارة مدرسة فاطمة بنت محمد صلى الله عليه وسلم بأن : </h4>
            <div class="col-md-6 text-right font-weight-bold" style="font-size:18px;">
                الدارسة
                <span style="margin-right: 0px;" > : </span>
                <label contenteditable="true" id="studentName" class="editable" > -- </label>
            </div>
            <div class="col-md-6 text-center" style="font-size:18px;">
                المستوى
                <span style="margin-right: 0px;"> : </span>
                <label contenteditable="true" class="editable" > -- </label>
            </div>
            <h4 class="text-center" style="margin:30px 0px;"> قد حضرت لهذا الفصل سائلين المولى أن ينفعها بالقرآن العظيم ويرفع درجتها ونتمنى لها دوام الصحة والعافية  </h4>
        </div>
    </div>

    <div class="row text-center" style="margin-top: 30px;" >
        <div class="col-md-4">
            <h5>
                اسم المعلمة
                <span style="margin-right: 5px;"> : </span>

                <br>
                <label contenteditable="true" style="margin-top: 10px;" >

                </label>
                <select style="text-align: center;color:#0a508e;" id="teachers">
                    <option value="1" > عزيزة إبراهيم صالح الجوهر </option>
                    <option value="2" > بشاير بنت عبدالجليل بن عبدالله الحمد </option>
                    <option value="3" > شعاع عثمان عبدالله الحافظ </option>
                    <option value="4" > وفاء عبدالباري فرحات </option>
                    <option value="5" > إلهام بنت أمين بن محمد الحبيشي  </option>
                    <option value="6" > سعاد محمد علي عمر </option>
                    <option value="7" > صباح منيف ناصر العتيبي </option>
                    <option value="8" > عائشة محمد عيسى العجاج </option>
                    <option value="9" > لطيفة محمد عبدالله بوطويبه </option>
                    <option value="10"> آيات حمدي أبو طالب محمد عدوي </option>
                    <option value="11"> عائشة عثمان عبدالله الحافظ </option>
                    <option value="12"> هدى أحمد محمد الملحم </option>
                    <option value="13">انهار بنت عبدالعزيز بن حمد القعيمي </option>
                    <option value="14">حصه بنت صالح بن سعد المرشود </option>
                    <option value="15"> منيرة حمد فايز الفايز </option>
                    <option value="16"> حنان صالح كرامة السعدي </option>
                    <option value="17"> راوية علي خضر المعيدي </option>
                    <option value="18"> فوزية بنت ابراهيم بن صالح الملحم </option>

                </select>
                <input type="text" value="{{ asset('images/techers/') }}" hidden id="techer_images_path">
                <img src="{{asset('images/techers/1.png')}}" width="150px" style="display: block;margin:auto;" id="teacher_sign">


            </h5>

        </div>

        <div class="col-md-4"
        {{-- style="background-image: url({{asset('images/stamp.png')}});background-size:cover;" --}}
        >
            <h5 class="font-weight-bold" >
                <label style="z-index: 100000000" > الختم </label>
                <br>
                <input type="text" id="morning_shift" value="{{ asset('images/morning_shift.png') }}" hidden>
                <input type="text" id="eveing_shift"  value="{{ asset('images/evening_shift.png') }}" hidden>
                <img src="{{ asset('images/morning_shift.png') }}" id="shift_stamp" width="25%" alt=""
                style="
                    position: absolute;
                    top: -10px;
                    right: 35%;
                    z-index: 10000;
                    "
                >
            </h5>
        </div>

        <div class="col-md-4">
            <h5>
                قائدة المدرسة
                <br>
                <span contenteditable="true" style="margin-top: 10px;display:block;" class="editable" >سماح بنت عبد المحسن البريك</span>
                <img src="{{asset('images/signature.png')}}" width="150px" style="display: block;margin:auto;">
            </h5>
            <div style="text-align: right;margin:0px;">
                حرر في
                {{-- <input type="date" value="date()" onload="getDate()" class="" id="date" required > --}}
                <label contenteditable="true">--</label>
                هـ
            </div>
        </div>
    </div>
</div>

<div class="row text-center" style="margin-top: 10%">
    {{-- <div class="col-md-12">
        <button onclick="reload()" style="display: none;" id="reload"> انشاء شهادة اخرى </button>
    </div> --}}
    <div class="col-md-12">
        <button onclick="capture()"> تصدير صورة </button>
        <button onclick="CreatePDFfromHTML()"> تصدير pdf </button>
    </div>
</div>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>
function reload(){
    location.reload();
}

// function disableEdit(){
//     $(".editable").each(function(index,element){
//         $(element).removeAttr("contenteditable");
//     });
//     $("#reload").show();
// }

const capture = () => {
//   disableEdit();
//scale up your element
    // var ELEMENT = jQuery("#cer");
    // ELEMENT.css({
    // 'transform': 'scale(3)',
    // '-ms-transform': 'scale(3)',
    // '-webkit-transform': 'scale(3)' });

  const body = document.querySelector('body');
  const name = document.querySelector('#studentName').innerHTML ;
  body.id = 'capture';
  html2canvas(document.querySelector("#cer"),{scrollY: -window.scrollY}).then(canvas => {
    var old = document.querySelector('canvas');
    if(old != null){
        old.remove();
    }

    document.body.appendChild(canvas);
  }).then(() => {
    var canvas = document.querySelector('canvas');
    canvas.style.display = 'none';
    var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
        //scale back your element
    //     ELEMENT.css({
    // 'transform': '',
    // '-ms-transform': '',
    // '-webkit-transform': '' });
    var a = document.createElement("a");
    a.setAttribute('download', name+'.png');
    a.setAttribute('href', image);
    a.click();
  });
};

// const btn = document.getElementById('btn');
// btn.addEventListener('click', capture)


//Create PDf from HTML...
function CreatePDFfromHTML() {
    // disableEdit();

    var HTML_Width = $("#cer").width();
    var HTML_Height = $("#cer").height();


    // name
    var name = $("#studentName").html();
    //scale up your element
    var ELEMENT = jQuery("#cer");
        // ELEMENT.css({
        // 'transform': 'scale(3)',
        // '-ms-transform': 'scale(3)',
        // '-webkit-transform': 'scale(3)' });

    html2canvas(
        document.querySelector("#cer"),{scrollY: -window.scrollY}).then(function(canvas){
        var wid = 0 ;
        var hgt = 0 ;
        var img = canvas.toDataURL("image/png", wid = canvas.width, hgt = canvas.height);
            //scale back your element
            // ELEMENT.css({
            // 'transform': '',
            // '-ms-transform': '',
            // '-webkit-transform': '' });
            var a = document.createElement("a");
        var hratio = hgt/wid
        var doc = new jsPDF('L','pt','a4');


        let width = doc.internal.pageSize.getWidth()
        let height = doc.internal.pageSize.getHeight()

        let widthRatio = width / canvas.width
        let heightRatio = height / canvas.height

        let ratio = widthRatio > heightRatio ? heightRatio : widthRatio
        // var width = doc.internal.pageSize.width;
        // var height = width * hratio

        doc.addImage(img,'JPEG',-7,-40, ( canvas.width * ratio ) + 7 , ( canvas.height * ratio ) - 30 );
        doc.save(name+'.pdf');
    });
}

//     var today = new Date();
// document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
</script>


@endsection

@section('scripts')
<script defer>
    $(document).ready(function(){
        $("#shift").on('change',function(){

            if($(this).val() == "morning" ){
            // console.log( $("#shift_stamp").attr("src") );
                $("#shift_stamp").attr("src", $("#morning_shift").val());
            }else if($(this).val() == "evening" ){
                $("#shift_stamp").attr("src", $("#eveing_shift").val());
            }
        });


        $("#teachers").on('change',function(){

            var path = $("#techer_images_path").val();
            var selected = path + "/" + $(this).val() + ".png"
            $("#teacher_sign").attr("src",selected)
        });

    });

</script>
@endsection
