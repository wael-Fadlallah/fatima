<div>

    <p>

        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            أضف معلمة
        </button>
    </p>


    <!-- Modal -->
    <div class="modal fade ModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">   أضف معلمة  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @livewire('teachers.teacher-form')

                </div>
            </div>
        </div>
    </div>

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

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>إسم المعلمة</th>
                <th>التوقيع</th>
            </tr>

            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>#{{$teacher->id}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{!! getFirstMedia($teacher,'stamp') !!}</td>
                    <td><button class="btn btn-outline-dark" wire:click="upadteteacherModel({{$teacher->id}})" data-toggle="modal" data-target="#imageUpdate">تعديل </button>

                <button class="btn btn-outline-danger" wire:click="deleteModel({{$teacher->id}})" data-toggle="modal" data-target="#deleteData"><span class="fa fa-trash"></span></button>
            </td>
                </tr>

            @endforeach
            <tr><td colspan="3"> {{$teachers->links()}} </td></tr>
            </tbody>
        </table>

    </div>
</div>
</div>

    <!-- Modal -->
    <div class="modal fade ModalCenterEdit" id="imageUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$upadteteacher->name??''}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    @livewire('teachers.teacher-image')



                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade DeleteModalCenter" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">هل تريد حذف  {{$upadteteacher->name??''}} ؟ </h5>
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
