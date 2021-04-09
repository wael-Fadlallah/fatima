<div>
    <div class="row">
{{--        <div class="col-3">--}}
{{--            <div class="form-group">--}}
{{--                <lable>إختر العام الدراسي</lable>--}}
{{--                <select name="year_id" wire:model="year_id" id="" class="form-control">--}}
{{--                    <option value="0">إختر العام الدراسي</option>--}}
{{--                    @foreach($years as $year)--}}
{{--                        <option value="{{$year->id}}"> {{ 'العام : '.$year->year .'هـ'}} </option>--}}
{{--                    @endforeach--}}

{{--                </select>--}}
{{--                @error('year_id') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}
        {{--  <div class="col-3">
            <div class="form-group">
                <lable>إختر المستوي</lable>
                <select name="lavel_id" id="" wire:model="lavel_id" class="form-control">
                    <option value="0">إختر المستوي</option>
                    @foreach($levels as $level)
                        <option value="{{$level->id}}"> {{$level->name}} </option>
                    @endforeach

                </select>
                @error('lavel_id') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>  --}}
{{--        @if(auth()->user()->hasRole('admin'))--}}
{{--        <div class="col-3">--}}
{{--            <div class="form-group">--}}
{{--                <lable>إختر الدوام</lable>--}}
{{--                <select name="shift" wire:model="shift" id="" class="form-control">--}}
{{--                    <option value="0">إختر الدوام</option>--}}
{{--                    <option value="1">صباحي</option>--}}
{{--                    <option value="2">مسائي</option>--}}
{{--                </select>--}}
{{--                @error('shift') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        @endif--}}
{{--        <div class="col-3">--}}
{{--            <div class="form-group">--}}
{{--                <lable>الفصل الدراسي</lable>--}}
{{--                <select name="semester" wire:model="semester" id="" class="form-control">--}}
{{--                    <option value="0">إختر الفصل الدراسي</option>--}}
{{--                    <option value="1">الأول</option>--}}
{{--                    <option value="2">الثاني</option>--}}
{{--                </select>--}}
{{--                @error('semester') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-12 text-center">--}}
{{--            <button class="btn btn-outline-light" wire:click="showResult"> عرض الدرجات</button>--}}
{{--        </div>--}}
    </div>

    @if($students)
        <hr class="mt-1">
        <h1 class="mt-2 text-center m-2">إسم الحلقة : {{$ClassModel->name??''}}</h1>
        <h1 class="mt-2 text-center m-2">نتيجه الطلاب</h1>
        {{--        <th colspan="6">{!! print_r($intonation) !!}</th>--}}
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>إسم الطالب</th>
                <th style="background-color: #768399;color:#fff"> الحفظ ( القران )</th>
                <th style="background-color: #cccccc;">التجويد</th>
                <th style="background-color: #768399;color:#ffffff">المراجعة( القران )</th>
                <th style="background-color: #cccccc"> السلوك والمواظبة</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
@php $lavel=$student->levels; @endphp
                <tr>

                    <th> {{$student->name??''}} </th>

                    <th style="background-color: #768399;color:#fff">
                        <div class="row m-1">
                            <div class="col-6 ">
                                <lable>أعمال السنة</lable>
                                <input type="text" class="form-control"
                                       wire:model="memorizing.{{$student->id}}.AnnualEvaluation"
                                       placeholder="أعمال السنة " {{json_decode($lavel->memorizing)->AnnualEvaluation<=0?'disabled':''}} >
                                @error('memorizing.'.$student->id.'.AnnualEvaluation') <span
                                    class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="col-6 ">
                                <lable>النهائي</lable>
                                <input type="text" class="form-control" wire:model="memorizing.{{$student->id}}.Final"
                                       placeholder="النهائي " {{json_decode($lavel->memorizing)->Final<=0?'disabled':''}}>
                                @error('memorizing.'.$student->id.'.Final') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>


                            <div class="col-12 ">
                                <lable>مجموع الفصل الأول</lable>
                                <input type="text" class="form-control" wire:model="memorizing.{{$student->id}}.TotalFirst"
                                       placeholder="مجموع الفصل الأول " >
                                @error('memorizing.'.$student->id.'.TotalFirst') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>



                        </div>
                    </th>
                    <th style="background-color: #cccccc">
                        <div class="row m-1">
                            <div class="col-6 ">
                                <lable>أعمال السنة</lable>
                                <input type="text" class="form-control"
                                       wire:model="intonation.{{$student->id}}.AnnualEvaluation"
                                       placeholder="أعمال السنة " {{json_decode($lavel->intonation)->AnnualEvaluation<=0?'disabled':''}}>
                                @error('intonation.'.$student->id.'.AnnualEvaluation') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6 ">
                                <lable>المشاركة</lable>
                                <input type="text" class="form-control"
                                       wire:model="intonation.{{$student->id}}.Participation"
                                       placeholder="المشاركة  "  {{json_decode($lavel->intonation)->Participation<=0?'disabled':''}}>
                                @error('intonation.'.$student->id.'.Participation') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6 ">
                                <lable>النهائي</lable>
                                <input type="text" class="form-control" wire:model="intonation.{{$student->id}}.Final"
                                       placeholder=" النهائي " {{json_decode($lavel->intonation)->Final<=0?'disabled':''}}>
                                @error('intonation.'.$student->id.'.Final') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-6">
                                <lable>مجموع الفصل الأول</lable>
                                <input type="text" class="form-control" wire:model="intonation.{{$student->id}}.TotalFirst"
                                       placeholder="مجموع الفصل الأول " >
                                @error('intonation.'.$student->id.'.TotalFirst') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>


                        </div>
                    </th>
                    <th style="background-color: #768399;color:#ffffff">
                        <div class="row m-1">
                            <div class="col-12 ">
                                <lable>المراجعة( القران )</lable>
                                <input type="text" class="form-control" wire:model="review.{{$student->id}}.review"
                                       placeholder="المراجعة( القران ) " {{json_decode($lavel->review)->review<=0?'disabled':''}}>
                            </div>

                            <div class="col-12">
                                <lable>مجموع الفصل الأول</lable>
                                <input type="text" class="form-control" wire:model="review.{{$student->id}}.TotalFirst"
                                       placeholder="مجموع الفصل الأول " >
                                @error('review.'.$student->id.'.TotalFirst') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </th>
                    <th style="background-color: #cccccc">
                        <div class="row  ">
                            <div class="col-12 ">
                                <label class="form-check-label" for="exampleCheck1">السلوك والمواظبة </label>
                                <input type="text" class="form-control"
                                       wire:model="attitude_and_attendance.{{$student->id}}.attitude"
                                       placeholder="السلوك والمواظبة   " {{$lavel->attitude_and_attendance<=0?'disabled':''}}>
                            </div>


                        <div class="col-12">
                            <lable>مجموع الفصل الأول</lable>
                            <input type="text" class="form-control" wire:model="attitude_and_attendance.{{$student->id}}.TotalFirst"
                                   placeholder="مجموع الفصل الأول " >
                            @error('review.'.$student->id.'.TotalFirst') <span
                                class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        </div>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-12 text-center">
            <button wire:click="saveData" class="btn btn-primary"> حفظ</button>
        </div>
    @endif
</div>
