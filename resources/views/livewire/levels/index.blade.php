<div>

    <p>

        <button class="btn btn-primary"  wire:click="$emit('refresh')"  data-toggle="modal" data-target="#exampleModalCenter">
            أضف مستوي
        </button>
    </p>


    <!-- image  Field -->
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12">

            <table class="table" width="100%">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">إسم المستوي</th>
                    <th colspan="3">الحفظ ( القران )</th>
                    <th colspan="4">التجويد</th>
                    <th class="text-center">المراجعة( القران )</th>
                    <th class="text-center">السلوك والمواظبة</th>
                    <th class="text-center">المجموع الكلي</th>
                    <th class="text-center">النسبة</th>
                    <th class="text-center">التحكم</th>
                </tr>

                <tr>
                    <th class="text-center" style="background-color: #768399"></th>
                    <th class="text-center" style="background-color: #768399"></th>
                    <th style="background-color: #cccccc">أعمال السنة</th>
                    <th style="background-color: #cccccc">النهائي</th>
                    <th style="background-color: #cccccc">المجموع للحفظ</th>

                    <th style="background-color: #0B5661;color:#fff">أعمال السنة</th>
                    <th style="background-color: #0B5661;color:#fff">النهائي</th>
                    <th style="background-color: #0B5661;color:#fff">المشاركة</th>
                    <th style="background-color: #0B5661;color:#fff">المجموع للتجويد</th>
                    <th style="background-color: #768399"></th>
                    <th style="background-color: #768399"></th>
                    <th style="background-color: #768399"></th>
                    <th style="background-color: #768399"></th>
                    <th style="background-color: #768399"></th>
                </tr>

                </thead>
                <tbody>
                @foreach($levels as $level)
                    <tr>
                        <td class="text-center">#{{$level->id}}</td>
                        <td class="text-center"> {{ $level->name }} </td>
                        <td class="text-center"> {{ json_decode($level->memorizing)->AnnualEvaluation??0 }} </td>
                        <td class="text-center"> {{ json_decode($level->memorizing)->Final??0 }} </td>
                        <td class="text-center"> {{ json_decode($level->memorizing)->Total??0 }} </td>

                        <td class="text-center"> {{ json_decode($level->intonation)->AnnualEvaluation??0 }} </td>
                        <td class="text-center"> {{ json_decode($level->intonation)->Participation??0 }} </td>
                        <td class="text-center"> {{ json_decode($level->intonation)->Final??0 }} </td>
                        <td class="text-center"> {{ json_decode($level->intonation)->Total??0 }} </td>


                        <td class="text-center"> {{ json_decode($level->review)->review??0 }} </td>
                        <td class="text-center"> {{ $level->attitude_and_attendance }} </td>
                        <td class="text-center"> {{ $level->attitude_and_attendance + (int)json_decode($level->intonation)->Total+(int)json_decode($level->memorizing)->Total +(int)json_decode($level->review)->review }} </td>
                        <td class="text-center"> {{ '100%' }} </td>

                        <td class="text-center">
                            <button class="btn btn-outline-dark" wire:click="upadteteacherModel({{$level->id}},'update')"
                                  >تعديل
                            </button>

                            <button class="btn btn-outline-danger" wire:click="upadteteacherModel({{$level->id}},'delete')"
                                   ><span class="fa fa-trash"></span>
                            </button>
                        </td>
                    </tr>

                @endforeach
                <tr>
                    <td colspan="3"> {{$levels->links()}} </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade ModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> أضف مستوي </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @livewire('levels.level')

                </div>
            </div>
        </div>
    </div>


{{--    <!-- Modal -->--}}
{{--    <div class="modal fade ModalCenterEdit" id="editeModel" tabindex="-1" role="dialog"--}}
{{--         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLongTitle">{{$upadteData->name??''}}</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body text-center">--}}

{{--                    @livewire('levels.level')--}}


{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <!-- Modal -->
    <div class="modal fade DeleteModalCenter" id="deleteData" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">هل تريد حذف {{$upadteData->name??''}} ؟ </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    <div class="btn btn-danger" wire:click="confirmDelete">
                        تأكيد
                    </div>


                </div>

            </div>
        </div>
    </div>
