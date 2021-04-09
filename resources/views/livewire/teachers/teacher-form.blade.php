


<div>
    <div class="row m-3">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 mb-2"><h2 class="text-center">أدخل بيانات المعلمة   </h2></div>

        <div class="col-12 ">
            <div class="input-groupe">
                <lable>الإسم رباعي</lable>
                <input type="text" name="year2" class="form-control" wire:model="name" placeholder="">
                @error('name') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror
            </div>
        </div>

        <div class="col-12 mt-1">
            @if ($stamp)
               إستعراض التوقيع :
                <img src="{{ $stamp->temporaryUrl() }}" width="100%" height="200">
            @endif
            <div class="input-groupe">
                <lable>توقيع المعلمه</lable>
                <input type="file" name="stamp" class="form-control" wire:model="stamp" >
                @error('stamp') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror
            </div>
        </div>

        <div class="col-12 m-1 text-center"><button wire:click="save" class=" btn btn-outline-info">
                حفظ
            </button>

        </div>
    </div>
</div>

