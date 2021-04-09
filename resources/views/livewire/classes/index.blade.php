<div>

    <p>

        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            أضف  حلقة دراسه
        </button>
    </p>



    <!-- image  Field -->
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success m-2 p-1">
                    {{ session('message') }}
                </div>
            @endif
                @if (session()->has('error'))
                    <div class="alert col-12 alert-danger m-1">
                        {{ session('error') }}
                    </div>
                @endif
        </div>
        <div class="col-12">

            <table class="table" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th> اسم الحلقة </th>
                    <th> الدوام </th>
                    <th> المعلمه </th>
                    <th>تحكم الحلقة</th>
                    <th>التحكم</th>
                </tr>

                </thead>
                <tbody>
                @foreach($classes as $classe)
                    <tr>
                        <td>#{{$classe->id}}</td>
                        <td> {{ $classe->name }} </td>
                        <td> {{ $classe->ShiftName }} </td>
                        <td> {{ $classe->teacher->name??'' }} </td>

                        <td><a href="/students/{{ $classe->id }}" class="btn btn-outline-info" >إضافة طالبات </a>
                        <a class="btn btn-outline-info" href="/result/{{ $classe->id }}">إضافة نتائج الإختبارات </a>
                       <a class="btn btn-outline-primary" href="/certificate/{{$classe->id}}"> طباعة الشهادات </a> </td>
                        <td><button class="btn btn-outline-dark" wire:click="upadteteacherModel({{$classe->id}},'update')" >تعديل </button>

                            <button class="btn btn-outline-danger" wire:click="confirmDelete({{$classe->id}},'delete')" ><span class="fa fa-trash"></span></button>
                        </td>
                    </tr>

                @endforeach
                <tr><td colspan="3"> {{$classes->links()}} </td></tr>
                </tbody>
            </table>

        </div>
        </div>
        </div>






    <!-- Modal -->
    <div class="modal fade ModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> أضف  حلقة دراسه </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @livewire('classes.form')

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
                <h5 class="modal-title" id="exampleModalLongTitle">هل تريد حذف  ؟ </h5>
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