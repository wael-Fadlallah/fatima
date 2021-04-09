<div>


    <div>

        <p>

            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" wire:click="$emit('clearData')")>
                أضف طالبة
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
                <input class="form-control m-2 col-3" placeholder="بحث ..." type="text" wire:model="searchTerm" />
                @if($editing==true)
                    <span class="text-danger">يجب ان يكون طول رقم الهويه عشر خانات </span>
                @endif
                <table class="table" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> اسم الطالبة</th>
                        <th> رقم الهويه</th>
                        <th> رقم الجوال</th>
                        <th> المستوي</th>
                        <th> الحلقة</th>
                        <th> الدوام</th>
                        <th> تاريخ الميلاد</th>
                        <th>التحكم</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td> {{ $student->name }} </td>
                            <td> {{ $student->idendtaty }} </td>
                            <td> {{ $student->phone }} </td>
                            <td> {{ $student->levels->name??'' }} </td>
                            <td> {{ $student->classes->name??'' }} </td>
                            <td> {{ $student->ShiftName }} </td>
                            <td> {{ $student->birthday->format('Y-m-d')??'' }} </td>
                            <td>
                                <button class="btn btn-outline-dark"
                                        wire:click="upadteteacherModel({{$student->id}},'update')">تعديل
                                </button>

                                <button class="btn btn-outline-danger"
                                        wire:click="upadteteacherModel({{$student->id}},'delete')"><span
                                        class="fa fa-trash"></span></button>
                            </td>
                        </tr>

                    @endforeach
                    <tr>
                        <td colspan="5">{{$students->onEachSide(1)->links()}}</td>
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
                        <h5 class="modal-title" id="exampleModalLongTitle"> أضف طالبة </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @livewire('admin.studens.form')

                    </div>
                </div>
            </div>

        </div>
    </div>


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
</div>
