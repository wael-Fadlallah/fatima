


<div>
    <div class="row m-3">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 mb-2"><h2 class="text-center">أدخل بدايه ونهاية العام الدراسي</h2></div>
        <div class="col-6">
            <lable>بدايه</lable>
            <div class="input-group col-12"><input type="text" name="year" wire:model="year" class="form-control" placeholder="مثلا 1441 ">

                @error('year') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>

        </div>
        <div class="col-6 ">
            <div class="input-groupe">
                <lable>نهايه</lable>
                <input type="text" name="year2" class="form-control" wire:model="year2" placeholder="مثلا 1442 ">
                @error('year2') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror
            </div>
        </div>

        <div class="col-12 m-1 text-center"><button wire:click="save" class=" btn btn-outline-info">
                حفظ
            </button>

        </div>
    </div>
</div>
