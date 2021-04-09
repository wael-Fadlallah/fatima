


<div>

    <div class="row m-3">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 mb-2"><h2 class="text-center">أدخل بيانات المستخدمه   </h2></div>

        <div class="col-12 ">
            <div class="input-groupe">
                <lable>الإسم رباعي</lable>
                <input type="text"  class="form-control" wire:model="name" placeholder="">
                @error('name') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror
            </div>
        </div>

        <div class="col-12 ">
            <div class="input-groupe">
                <lable>البريد الإلكتروني </lable>
                <input type="email"  class="form-control" wire:model="email" placeholder="">
                @error('email') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror
            </div>
        </div>

        <div class="col-12 ">
            <div class="input-groupe">
                <lable> كلمة المرور </lable>
                <input type="password" name="year2" class="form-control" wire:model="password" placeholder="">
                @error('password') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror
            </div>
        </div>

                <div class="col-12">
                    <lable class="col-12"> الدوام</lable>
                    <div class="input-group ">

                        <select type="text" name="shift" wire:model="shift" class="form-control col-12"
                                placeholder="مثلا أول أمهات ">
                            <option value="0">إختر الدوام</option>
                            <option value="1">صباحي</option>
                            <option value="2">مسائي</option>
                        </select>

                        @error('shift') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

                    </div>
                </div>
        <div class="col-12 m-1 text-center"><button wire:click="save" class=" btn btn-outline-info">
                حفظ
            </button>

        </div>
    </div>
</div>

