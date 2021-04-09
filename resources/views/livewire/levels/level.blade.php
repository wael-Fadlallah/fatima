<div>
    <div class="row m-3">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 mb-2"><h2 class="text-center">أدخل إسم المستوي</h2></div>
        <div class="col-12">
            <lable>إسم المستوي</lable>
            <div class="input-group col-12"><input type="text" name="name" wire:model="name" class="form-control"
                                                   placeholder="مثلا الأول ">

                @error('name') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>


            <div class="input-group mt-2 col-12">
                <h3>المواد الأساسية</h3>
            </div>


            {{--        {!! print_r($memorizing) !!}--}}

            <div class="form-check">

                <label class="form-check-label" for="exampleCheck1"> القرأن الكريم (حفظ) </label>
                <div class="row m-1">
                    <div class="col-4 ">
                        <lable>أعمال السنة</lable>
                        <input type="text" class="form-control" wire:model="memorizing.AnnualEvaluation"
                               wire:keyup="calculateTotal()" placeholder="أعمال السنة ">
                        @error('memorizing.AnnualEvaluation') <span
                            class="error text-danger">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-4 ">
                        <lable>النهائي</lable>
                        <input type="text" class="form-control" wire:model="memorizing.Final"
                               wire:keyup="calculateTotal()" placeholder="النهائي ">
                        @error('memorizing.Final') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4 ">
                        <lable>المجموع للحفظ</lable>
                        <input type="text" class="form-control" wire:model="memorizing.Total"
                               placeholder="المجموع للحفظ   " disabled>
                    </div>

                </div>
            </div>

            <div class="form-check">

                <label class="form-check-label" for="exampleCheck1"> القرأن الكريم (مراجعة) </label>
                <div class="row m-1">
                    <div class="col-3 ">
                        <lable>المراجعة( القران )</lable>
                        <input type="text" class="form-control" wire:model="review.review"
                               placeholder="المراجعة( القران ) ">
                    </div>


                </div>
            </div>
            <div class="form-check">

                <label class="form-check-label" for="exampleCheck1">التجويد </label>
                <div class="row m-1">
                    <div class="col-3 ">
                        <lable>أعمال السنة</lable>
                        <input type="text" class="form-control" wire:model="intonation.AnnualEvaluation"
                               wire:keyup="calculateTotal2()" placeholder="أعمال السنة ">
                        @error('intonation.AnnualEvaluation') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-3 ">
                        <lable>المشاركة</lable>
                        <input type="text" class="form-control" wire:model="intonation.Participation"
                               wire:keyup="calculateTotal2()" placeholder="المشاركة  ">
                        @error('intonation.Participation') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-3 ">
                        <lable>النهائي</lable>
                        <input type="text" class="form-control" wire:model="intonation.Final"
                               wire:keyup="calculateTotal2()" placeholder=" النهائي ">
                        @error('intonation.Final') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-3 ">
                        <lable>المجموع للتجويد</lable>
                        <input type="text" class="form-control" wire:model="intonation.Total" placeholder="المجموع للتجويد " disabled>
                    </div>

                </div>
            </div>
            <div class="form-check">


                <div class="row m-1">

                    <div class="col-3 ">
                        <label class="form-check-label" for="exampleCheck1">السلوك والمواظبة </label>
                        <input type="text" class="form-control" wire:model="attitude_and_attendance" placeholder="السلوك والمواظبة   ">
                    </div>


                </div>
            </div>


        </div>


        <div class="col-12 m-1 text-center">
            <button wire:click="save" class=" btn btn-outline-info">
                حفظ
            </button>

        </div>
    </div>
</div>
