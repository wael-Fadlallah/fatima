<div>
    <div class="row">
{{--        <div class="col-3">--}}
{{--            <div class="form-group">--}}
{{--                <lable>إختر العام الدراسي</lable>--}}
{{--                <select name="year_id" wire:model="year_id" id="" class="form-control">--}}
{{--                    <option value="0">إختر العام الدراسي</option>--}}
{{--                    @foreach($years as $year)--}}
{{--                        <option value="{{$year->id}}"> {{ 'العام : '.$year->year .'هـ'}} </option>--}}
{{--                    @endforeach--}}

{{--                </select>--}}
{{--                @error('year_id') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}
        {{--  <div class="col-3">
            <div class="form-group">
                <lable>إختر المستوي</lable>
                <select name="lavel_id" id="" wire:model="lavel_id" class="form-control">
                    <option value="0">إختر المستوي</option>
                    @foreach($levels as $level)
                        <option value="{{$level->id}}"> {{$level->name}} </option>
                    @endforeach

                </select>
                @error('lavel_id') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror

            </div>
        </div>  --}}
{{--        @if(auth()->user()->hasRole('admin'))--}}
{{--        <div class="col-3">--}}
{{--            <div class="form-group">--}}
{{--                <lable>إختر الدوام</lable>--}}
{{--                <select name="shift" wire:model="shift" id="" class="form-control">--}}
{{--                    <option value="0">إختر الدوام</option>--}}
{{--                    <option value="1">صباحي</option>--}}
{{--                    <option value="2">مسائي</option>--}}
{{--                </select>--}}
{{--                @error('shift') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        @endif--}}
{{--        <div class="col-3">--}}
{{--            <div class="form-group">--}}
{{--                <lable>الفصل الدراسي</lable>--}}
{{--                <select name="semester" wire:model="semester" id="" class="form-control">--}}
{{--                    <option value="0">إختر الفصل الدراسي</option>--}}
{{--                    <option value="1">الأول</option>--}}
{{--                    <option value="2">الثاني</option>--}}
{{--                </select>--}}
{{--                @error('semester') <p class="col-12"><span class="error text-danger">{{ $message }}</span></p> @enderror--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-12 text-center">--}}
{{--            <button class="btn btn-outline-light" wire:click="showResult"> عرض الشهادات</button>--}}
{{--        </div>--}}
    </div>

    @if($students)
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
          <div class="col-6">
      <table class="table">
         <tr>
             <th>
                 إسم الطالبه
             </th>
         </tr>

              @foreach($students as $student)
                 <tr>
                     <td>
                         {{$student->name}}
                     </td>
                     <td>

                    <button wire:click="showCertificate({{$student->id}})"  class="btn btn-primary "> عرض الشهاده </button>


{{--                           <button wire:click="showPassCertificate({{$student->id}})"  class="btn btn-info"> عرض شهاده إجتياز مستوي </button>--}}

                     </td>
                 </tr>
              @endforeach


      </table>
              @error('student') <span
                  class="error text-danger">{{ $message }}</span> @enderror
          </div>
      </div>
        <div class="col-12 text-center">

        </div>
        @endif
{{--    @if($certificate)--}}
{{--       @include('certificates.level')--}}
{{--    @endif--}}
</div>
