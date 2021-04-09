@extends('layouts.main')

@section('title','إشعار')

@section('content')
    @php


        $level=$result->student->levels;

            $levelResultMemorizing=json_decode($level->memorizing);
            $levelResultIntonation= json_decode($level->intonation);
            $levelReview=json_decode($level->review);

$resultDegree=null;
$totalMemorizing=0;
$totalIntonation=0;
$totalReview=0;
$totalAttitudeAndAttendance=0;


            if($result)
            $resultDegree2=json_decode($result->degree);

            if($result2){
            $resultDegree=json_decode($result2->degree);

            }
    @endphp

    <style>
        body {
            color: black;
        }

        .editable {
            color: #0a508e;
        }

        table {
            text-align: center;
        }

        table td {
            padding-right: 7px;
        }

        table:first-child th {
            padding: 10px;
        }

        table:last-child td {
            width: 20%;
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

        input[type='date'] {
            border: none;
            background: none;
        }

        input[type="time"] {
            width: 120px;
            border: none;
            clip-path: inset(0 17px 0 0);
            outline: none;
            outline: 0;
        }

        /* @media print { */
        #cer {
            height: 21cm;
            width: 29.7cm;
            background-image: url("/images/background.png");
            background-size: contain;
            margin-top: 70px;
            /* change the margins as you want them to be. */
        }

        /* } */

    </style>
    <div class="container" dir="rtl" style="" id="cer" style="">

        <img src="{{ asset('images/top.png') }}" style="width:29.7cm">
        {{-- <div class="row logos" style="margin-top: 7cm;"> --}}
        {{-- <div class="col-md-4">
            <img src="{{ asset('images/school_logo.png') }}" alt="">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4 text-left">
            <img src="{{ asset('images/agency_logo.png') }}" alt="">
        </div> --}}
        {{-- </div> --}}

        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">
                    شهادة اجتياز مستوى
                    <label  > {{$level->name??''}} </label>
                    لعام
                    {{$result->result->year->year??''}}
                    هـ
                </h2>
            </div>

            <div class="col-12">
                <h4 class="text-center">
                    الحمد لله رب العالمين والصلاة و السلام على أشرف الأنبياء و المرسلين نبينا محمد وعلى آله وصحبه أجمعين
                </h4>

                <h4 class="text-center">
                    تشهد ادارة مركز فاطمة بنت محمد صلى اللًه عليه وسلم
                    @if($result->result->shift==1)
                        <span value="morning">الصباحية</span>
                    @else
                        <span value="evening">المسائية</span>
                    @endif
                    بأن
                    <span style="margin-right: 5px;"> : </span>

                </h4>

                <h4 class="text-center font-weight-bold">
                    الدارسة
                    <span style="margin-right: 5px;"> : </span>
                    <label> {{$result->student->name??''}} </label>
                    قد اجتازت المستوى
                    <span style="margin-right: 5px;"> : </span>
                    <label> {{ $level->name??''}} </label>

                </h4>

                <h4 class="text-center">
                    سائلين المولى أن يوفقها للعلم النافع و العمل الصالح و أن يرزقها الدرجات العلى في الجنة
                    <span style="margin-right: 5px;"> .. </span>
                </h4>
            </div>
        </div>


        <div class="row" style="margin-top: 10px;">
            {{-- table --}}
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table width='100%' style="margin: auto;" border="1" id="cer_table">
                    <tr>
                        <th> المادة</th>
                        <th> المجموع للفصل الدراسي الأول</th>
                        <th colspan="5"> الفصل الدراسي الثاني</th>
                    </tr>
                    <tr>
                        <th style="background-color:#cccccc "></th>
                        <th style="background-color:#cccccc "></th>
                        <th> الدرجة
                            الكلية
                        </th>

                        <th> اعمال السنة</th>
                        <th> الاختبار النهائي</th>
                        <th> المشاركة</th>
                        <th> المجموع</th>
                    </tr>
                    <tr>
                        <td> القرأن الكريم (الحفظ)</td>
                        <th class="text-center"> {{$totalMemorizing}}</th>
                        <td class="cell r_1_c_0"> {{$levelResultMemorizing->Total}}</td>
                        <td class="cell r_1_c_1">{{$resultDegree->memorizing->AnnualEvaluation??''}}</td>
                        <td class="cell r_1_c_2">{{$resultDegree->memorizing->Final??''}}</td>
                        <td style="background-color:#cccccc "></td>
                        <td class="cell r_1_c_3"></td>
                    </tr>

                    <tr>
                        <td> مرأجعة القرأن (مراجعة)</td>
                        <th class="text-center">  {{$totalReview}}</th>

                        <td class="cell r_2_c_0"> {{$levelReview->review}}</td>
                        <td style="background-color:#cccccc "></td>
                        <td class="cell r_2_c_1">{{$resultDegree->review->review??''}}</td>
                        <td style="background-color:#cccccc "></td>
                        <td class="cell r_2_c_3"></td>
                    </tr>

                    <tr>
                        <td>التجويد</td>
                        <th class="text-center">  {{$totalIntonation}}</th>
                        <td class="cell r_3_c_0"> {{$levelResultIntonation->Total}}</td>
                        <td class="cell r_3_c_1">{{$resultDegree->intonation->AnnualEvaluation??''}}</td>
                        <td class="cell r_3_c_2">{{$resultDegree->intonation->Participation??''}}</td>
                        <td class="cell r_3_c_4">{{$resultDegree->intonation->Final??''}}</td>
                        <td class="cell r_3_c_3"></td>
                    </tr>

                    <tr>
                        <td> السلوك و المواظبة</td>
                        <th class="text-center">  {{$totalAttitudeAndAttendance}}</th>
                        <td class="cell r_4_c_0">  {{$level->attitude_and_attendance}}</td>

                        <td class="cell r_4_c_1">{{$resultDegree->attitude_and_attendance??''}}</td>
                        <td style="background-color:#cccccc "></td>
                        <td style="background-color:#cccccc "></td>
                        <td class="cell r_4_c_3"></td>
                    </tr>

                </table>

                <table width='90%' style="margin: auto;" border="1" style="text-align:right;">
                    <tr>
                        <td>
                            المجموع الكلي

                        </td>

                        <td><span id="totalResult" width='100%' style="display: block;"></span></td>

                        <td>
                            النسبة

                        </td>
                        <td><span id="pt" width='100%' style="display: block;"></span></td>

                        <td>
                            التقدير
                        </td>
                        <td><span id="ratting" width='100%' style="display: block;"></span></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row text-center" style="margin-top: 10px;">
            <div class="col-md-4">
                <h5>
                    اسم المعلمة
                    <span style="margin-right: 5px;"> : </span>

                    <br>
                    @if($result->result->classModel->teacher)
                        <label contenteditable="true" style="margin-top: 10px;">
                            {{$result->result->classModel->teacher->name??''}}
                        </label>


                        <img src="{{ getFirstMediaUrl($result->result->classModel->teacher,'stamp') }}" width="100px"
                             style="display: block;margin:auto;margin-top:10px;" id="teacher_sign">

                    @endif

                </h5>

            </div>

            <div class="col-md-4"
                {{-- style="background-image: url({{asset('images/stamp.png')}});background-size:cover;" --}}
            >
                <h5 class="font-weight-bold">
                    <label style="z-index: 100000000"> الختم </label>
                    <br>
                    @if($result->result->shift==1)
                        <input type="text" id="morning_shift" value="{{ asset('images/morning_shift.png') }}" hidden>
                        <img src="{{ asset('images/morning_shift.png') }}" id="shift_stamp" width="25%" alt=""
                             style="
                    position: absolute;
                    top: -10px;
                    right: 35%;
                    z-index: 10000;
                    "
                        >
                    @else
                        <input type="text" id="eveing_shift" value="{{ asset('images/evening_shift.png') }}" hidden>
                        <img src="{{ asset('images/evening_shift.png') }}" id="shift_stamp" width="25%" alt=""
                             style="
                    position: absolute;
                    top: -10px;
                    right: 35%;
                    z-index: 10000;
                    "
                        >
                    @endif
                </h5>
            </div>

            <div class="col-md-4">
                <h5>
                    مديرة المركز
                    <br>
                    <span contenteditable="true" style="margin-top: 10px;display:block;" class="editable">سماح بنت عبد المحسن البريك</span>
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

        {{-- <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="transform:translate(0px,-20px); ">

            </div>
        </div> --}}

    </div>

    <div class="row text-center" style="margin-top: 10%">
        {{-- <div class="col-md-12">
            <button onclick="reload()" style="display: none;" id="reload"> انشاء شهادة اخرى </button>
        </div> --}}
        <div class="col-md-12">
            <button onclick="capture()"> تصدير صورة</button>
            <button onclick="CreatePDFfromHTML()"> تصدير pdf</button>
        </div>
    </div>

    <a href="" id="imageplaceholder"></a>
@endsection
@section('scripts')
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script>
        function reload() {
            location.reload();
        }

        function disableEdit() {

            $(".editable").each(function (index, element) {
                $(element).removeAttr("contenteditable");
            });

            $("#reload").show();


        }

        const capture = () => {

//   disableEdit();

            //scale up your element
            // var ELEMENT = jQuery("#cer");
            // ELEMENT.css({
            // 'transform': 'scale(3)',
            // '-ms-transform': 'scale(3)',
            // '-webkit-transform': 'scale(3)' });
            const name = document.querySelector('#studentName').innerHTML;

            html2canvas(document.querySelector("#cer"), {scrollY: -window.scrollY}).then(canvas => {
                var old = document.querySelector('canvas');
                if (old != null) {
                    old.remove();
                }
                document.body.appendChild(canvas);
            }).then(() => {
                var canvas = document.querySelector('canvas');
                canvas.style.display = 'none';
                var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                //scale back your element
                // ELEMENT.css({
                // 'transform': '',
                // '-ms-transform': '',
                // '-webkit-transform': '' });
                var a = document.getElementById("imageplaceholder");
                a.setAttribute('download', name + '.png');
                a.setAttribute('href', image);
                a.click();

            });
        };

        // const btn = document.getElementById('btn');
        // btn.addEventListener('click', capture)


        //Create PDf from HTML...
        function CreatePDFfromHTML() {

            // disableEdit();
            // name
            var name = $("#studentName").html();
            //scale up your element
            var ELEMENT = jQuery("#cer");
            // ELEMENT.css({
            // 'transform': 'scale(3)',
            // '-ms-transform': 'scale(3)',
            // '-webkit-transform': 'scale(3)' });
            html2canvas(
                document.querySelector("#cer"), {scrollY: -window.scrollY}
            ).then(function (canvas) {
                var wid = 0;
                var hgt = 0;
                var img = canvas.toDataURL("image/png", wid = canvas.width, hgt = canvas.height);
                var hratio = hgt / wid
                var doc = new jsPDF('L', 'pt', 'a4');

                //scale back your element
                // ELEMENT.css({
                //     'transform': '',
                //     '-ms-transform': '',
                //     '-webkit-transform': '' });

                let width = doc.internal.pageSize.getWidth()
                let height = doc.internal.pageSize.getHeight()

                let widthRatio = width / canvas.width
                let heightRatio = height / canvas.height

                let ratio = widthRatio > heightRatio ? heightRatio : widthRatio
                // var width = doc.internal.pageSize.width;
                // var height = width * hratio

                doc.addImage(img, 'JPEG', -7, 0, (canvas.width * ratio) + 7, canvas.height * ratio - 30);
                doc.save(name + '.pdf');
            });
        }

        //     var today = new Date();
        // document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
    </script>


    <script defer>
        $(document).ready(function () {
            $("#shift").on('change', function () {

                if ($(this).val() == "morning") {
                    // console.log( $("#shift_stamp").attr("src") );
                    $("#shift_stamp").attr("src", $("#morning_shift").val());
                } else if ($(this).val() == "evening") {
                    $("#shift_stamp").attr("src", $("#eveing_shift").val());
                }
            });

            $("#teachers").on('change', function () {

                var path = $("#techer_images_path").val();
                var selected = path + "/" + $(this).val() + ".png"
                $("#teacher_sign").attr("src", selected)
            });


            $('.cell').on("keypress keyup blur", function (event) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {

                    if (event.which != 46) {
                        event.preventDefault();
                    }

                }

                calc();
            });

        });

        calc();

        function calc() {

            var total = 280.0;

            var r_cell_1 = parseFloat(($(".r_2_c_0").html().replace("<br>", '')))
            var r_cell_2 = parseFloat(($(".r_1_c_0").html().replace("<br>", '')))
            var r_cell_3 = parseFloat(($(".r_3_c_0").html().replace("<br>", '')))
            if (isNaN(r_cell_2) || isNaN(r_cell_1) || isNaN(r_cell_3)) {

            } else {
                total = r_cell_2 + r_cell_1 + r_cell_3
            }

            var cell_1 = parseFloat(($(".r_1_c_1").html().replace("<br>", '')));
            var cell_2 = parseFloat(($(".r_1_c_2").html().replace("<br>", '')));
            var cell_3 = $(".r_1_c_3");
            if (isNaN(cell_1) || isNaN(cell_2)) {
                // console.log("pass");
                // return false ;
            } else {
                cell_3.html((cell_1 + cell_2).toFixed(2));
            }

            var cell_1 = parseFloat(($(".r_2_c_1").html().replace("<br>", '')));
            var cell_2 = parseFloat(($(".r_2_c_2").html().replace("<br>", '')));
            var cell_6 = $(".r_2_c_3");
            if (isNaN(cell_1) || isNaN(cell_2)) {
                // console.log("pass");
                // return false ;
            } else {
                cell_6.html((cell_1 + cell_2).toFixed(2));
            }

            var cell_1 = parseFloat(($(".r_3_c_1").html().replace("<br>", '')));
            var cell_2 = parseFloat(($(".r_3_c_2").html().replace("<br>", '')));
            var cell_9 = $(".r_3_c_3");
            if (isNaN(cell_1) || isNaN(cell_2)) {
                // console.log("pass");
                // return false ;
            } else {
                cell_9.html((cell_1 + cell_2).toFixed(2));
            }

            var cell_3 = parseFloat(($(".r_1_c_3").html().replace("<br>", '')));
            var cell_6 = parseFloat(($(".r_2_c_3").html().replace("<br>", '')));
            var cell_9 = parseFloat(($(".r_3_c_3").html().replace("<br>", '')));
            if (isNaN(cell_3) || isNaN(cell_6) || isNaN(cell_9)) {

            } else {
                var result = cell_9 + cell_6 + cell_3;
                $("#totalResult").html(result);

                var pt = (result / total) * 100.0;
                $("#pt").html(pt.toFixed(2));

                if (parseInt(pt) >= 90 && parseInt(pt) <= 100) {
                    $("#ratting").html(" ممتاز ");
                } else if (parseInt(pt) >= 80 && parseInt(pt) < 90) {
                    $("#ratting").html(" جيد جدا ");
                } else if (parseInt(pt) >= 70 && parseInt(pt) < 80) {
                    $("#ratting").html(" جيد ");
                } else if (parseInt(pt) >= 60 && parseInt(pt) < 70) {
                    $("#ratting").html(" مقبول ");
                } else {
                    $("#ratting").html(" رسوب ");
                }
                // console.log(  );
            }

        }
    </script>


@endsection
