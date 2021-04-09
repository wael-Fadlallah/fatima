<div>

    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert col-12 alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-5 text-center">
          <center>
              {!! getFirstMedia($settings,'stamps') !!}
            <h3 class="mt-1">    ختم الدوام الصباحي </h3>
              <input type="file" wire:model="photo" class="form-control col-4 mt-1">
             <p class=" mt-1"> @error('photo') <span class="error text-danger">{{ $message }}</span> @enderror</p>

              <button class="btn btn-outline-info mt-1" wire:click="uploadStamp1">تغيير الختم </button>
          </center>
        </div>

        <div class="col-5">
           <center>
               {!! getFirstMedia($settings,'stamps1') !!}
               <h3 class="mt-1">   ختم الدوام المسائي </h3>
               <input type="file" wire:model="photo2" class="form-control col-4 mt-1">
               <p class=" mt-1"> @error('photo2') <span class="error text-danger">{{ $message }}</span> @enderror</p>

               <button class="btn btn-outline-info mt-1" wire:click="uploadStamp2">تغيير الختم </button>
           </center>
        </div>
    </div>

</div>
