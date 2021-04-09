<?php

namespace App\Http\Livewire\Years;

use App\Models\Result;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $upadteData;
    protected $listeners = [
        'data-update' => '$refresh'
    ];
    public function upadteteacherModel(\App\Models\Year $data,$action)
    {

        $this->upadteData = $data;
        $this->emit('getUpdateData',$data->id);
        if($action=='update')
        $this->dispatchBrowserEvent('open-updat');
       else
       $this->dispatchBrowserEvent('open-delete');
    }
    public function confirmDelete()
    {

        if (Result::where('year_id',$this->upadteData->id)->count()>0) {
            $this->emit('data-deleted');
            $this->upadteData = null;
            session()->flash('error', '  لايمكن الحذف العام يحتوي بيانات  !');
            return;
        }

        $this->upadteData->delete();
        $this->emit('data-deleted');
        $this->upadteData = null;
        session()->flash('message', 'تم الحذف بنجاح !');
    }

    public function render()
    {
        return view('livewire.years.index',['years'=>\App\Models\Year::orderBy('created_at','DESC')->paginate(5)]);
    }
}
