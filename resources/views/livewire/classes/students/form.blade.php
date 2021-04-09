
<div>
    <link href="/css/bootstrap-datetimepicker.css?v2" rel="stylesheet"/>

    <div class="row m-3">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="col-12 mb-2"><h2 class="text-center">أدخل بيانات الطالبة </h2></div>

        <div class="col-12">
            <lable>إسم الطالبه</lable>
            <div class="input-group col-12"><input type="text" name="name" wire:model="name" class="form-control"
                                                   placeholder="إسم الطالبه ">

                @error('name') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>

        <div class="col-12">
            <lable>رقم الهويه </lable>
            <div class="input-group col-12"><input type="text" name="idendtaty" wire:model="idendtaty" class="form-control"
                                                   placeholder="رقم الهويه  ">

                @error('idendtaty') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>

        <div class="col-12">
            <lable>رقم الجوال</lable>


            <div class="input-group col-12"><input type="text" name="phone" wire:model="phone" class="form-control"
                                                   placeholder="رقم الجوال  ">

                @error('phone') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>
        <div class="col-12">
            <lable>تاريخ الميلاد </lable>
            <div class="input-group col-12">


                <input type="text" name="birthday"   class="form-control hijri-date-input"/>


                @error('birthday') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>
{{--        <div class="col-12">--}}
{{--            <lable class="col-12"> الدوام</lable>--}}
{{--            <div class="input-group ">--}}

{{--                <select type="text" name="shift" wire:model="shift" class="form-control col-12"--}}
{{--                        placeholder="مثلا أول أمهات ">--}}
{{--                    <option value="0">إختر الدوام</option>--}}
{{--                    <option value="1">صباحي</option>--}}
{{--                    <option value="2">مسائي</option>--}}
{{--                </select>--}}

{{--                @error('shift') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}
        <div class="col-12">
            <lable class="col-12"> المستوي</lable>
            <div class="input-group ">

                <select type="text" name="lavel_id" wire:model="lavel_id" class="form-control col-12"
                >
                    <option value="0">إختر المستوي</option>

                    @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->name}} </option>
                    @endforeach

                </select>

                @error('lavel_id') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>


        <div class="col-12 m-1 text-center">
            <button  wire:click="save" class=" btn btn-outline-info">
                حفظ
            </button>

        </div>
    </div>
</div>


@push('jsw')


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
    <script src="/js/bootstrap-hijri-datetimepicker.js?v2"></script>

    <script type="text/javascript">


        $(function () {

            initHijrDatePicker();

            initHijrDatePickerDefault();

            $('.disable-date').hijriDatePicker({

                minDate: "2020-01-01",
                maxDate: "2021-01-01",
                viewMode: "years",
                hijri: true,
                debug: true
            });

        });

        function initHijrDatePicker() {

            $(".hijri-date-input").hijriDatePicker({
                locale: "ar-sa",
                format: "DD-MM-YYYY",
                hijriFormat: "iYYYY-iMM-iDD",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
                showSwitcher: true,
                allowInputToggle: true,
                showTodayButton: false,
                useCurrent: true,
                isRTL: true,
                viewMode: 'months',
                keepOpen: false,
                hijri: true,
                debug: true,
                showClear: true,
                showTodayButton: true,
                showClose: true
            });
        }


        function initHijrDatePickerDefault() {

            $(".hijri-date-default").hijriDatePicker();
        }
        window.livewire.on('form-With-Date', () => {
             window.livewire.emit('DateUpdate',$(".hijri-date-input").val());
        })

    </script>


@endpush
