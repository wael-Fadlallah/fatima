<div>
    <div class="row m-3">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 mb-2"><h2 class="text-center">أدخل إسم الحلقة الدراسه </h2></div>
        <div class="col-12">
            <lable>إسم الحلقة</lable>
            <div class="input-group col-12"><input type="text" name="name" wire:model="name" class="form-control"
                                                   placeholder="مثلا أول أمهات ">

                @error('name') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
            @if(auth()->user()->hasRole('admin'))
                <div class="col-12">
                    <div class="input-group ">
                        <lable class="col-12"> الدوام</lable>
                        <select type="text" name="shift" wire:model="shift" class="form-control col-12"
                                placeholder="مثلا أول أمهات ">
                            <option value="0">إختر الدوام</option>
                            <option value="1">صباحي</option>
                            <option value="2">مسائي</option>
                        </select>

                        @error('shift') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

                    </div>
                </div>
                @else
{{--                <input type="hidden" name="shift" value="{{auth()->user()->shift}}" wire:model="shift" >--}}
                @endif
            <div class="col-12">
                <div class="input-group ">
                    <lable class="col-12"> المعلمه</lable>
                    <select type="text" name="teacher_id" wire:model="teacher_id" class="form-control col-12"
                         >
                        <option value="0">إختر المعلمة</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>

                    @error('teacher_id') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

                </div>
            </div>


            <div class="col-12 m-1 text-center">
                <button wire:click="save" class=" btn btn-outline-info">
                    حفظ
                </button>

            </div>
        </div>
    </div>
