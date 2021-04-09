<div>

    <p>

        <button class="btn btn-primary" wire:click="$emit('refresh')" data-toggle="modal" data-target="#exampleModalCenter">
            أضف  مستخدم جديد
        </button>
    </p>



    <!-- image  Field -->
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif @if (session()->has('error'))
                <div class="alert col-12 alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="col-12">

            <table class="table" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الإسم </th>
                    <th>البريد الإلكتروني</th>
                    <th>الصلاحيات</th>
                    <th>الدوام</th>
                    <th>التحكم</th>
                </tr>

                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>#{{$user->id}}</td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{  $user->getRoleNames()->first()=='admin'?'مديره':'مستخدمه' }} </td>
                        <td> {{ $user->getRoleNames()->first()=='admin'?'-':$user->ShiftName }} </td>

                        <td><button class="btn btn-outline-dark" wire:click="upadteteacherModel({{$user->id}},'update')" data-toggle="modal" data-target="#imageUpdate">تعديل </button>

                            <button class="btn btn-outline-danger" wire:click="upadteteacherModel({{$user->id}},'delete')" data-toggle="modal" data-target="#deleteData"><span class="fa fa-trash"></span></button>
                        </td>
                    </tr>

                @endforeach
                <tr><td colspan="3"> {{$users->links()}} </td></tr>
                </tbody>
            </table>



    <!-- Modal -->
    <div class="modal fade ModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> أضف  مستخدم جديد </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @livewire('users.form')

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade ModalCenterEdit" id="imageUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$upadteData->name??''}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    @if($upadteData!=null)
                    @livewire('users.form')
                    @endif


                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade DeleteModalCenter" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">هل تريد حذف  {{$upadteData->name??''}} ؟ </h5>
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
