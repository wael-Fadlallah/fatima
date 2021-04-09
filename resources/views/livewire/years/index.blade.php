<div>

    <p>

        <button class="btn btn-primary" wire:click="$emit('refresh')" data-toggle="modal" data-target="#exampleModalCenter">
            أضف عام دراسي
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

                @if (session()->has('error'))
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
                    <th>العام الدراسي</th>
                    <th>التحكم</th>
                </tr>

                </thead>
                <tbody>
                @foreach($years as $year)
                    <tr>
                        <td>#{{$year->id}}</td>
                        <td> {{ 'العام : '.$year->year .'هـ'}} </td>

                        <td><button class="btn btn-outline-dark" wire:click="upadteteacherModel({{$year->id}},'update')" >تعديل </button>

                            <button class="btn btn-outline-danger" wire:click="upadteteacherModel({{$year->id}},'delete')" ><span class="fa fa-trash"></span></button>
                        </td>
                    </tr>

                @endforeach
                <tr><td colspan="3"> {{$years->links()}} </td></tr>
                </tbody>
            </table>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade ModalCenter" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> أضف عام دراسي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @livewire('years.year')

                </div>
            </div>
        </div>
</div>


    <!-- Modal -->
    <div class="modal fade ModalCenterEdit" id="imageUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$upadteData->year??''}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    @livewire('years.year')



                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade DeleteModalCenter" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">هل تريد حذف  {{$upadteData->year??''}} ؟ </h5>
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
