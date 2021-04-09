<?php

namespace App\Http\Livewire\Levels;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $upadteData;

    protected $listeners = [
        'data-update' => '$refresh',
    ];

    public function upadteteacherModel(\App\Models\Level $data,$action)
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
        $this->upadteData->delete();
        $this->emit('data-deleted');
        $this->upadteData = null;
        session()->flash('message', 'تم الحذف بنجاح !');
    }

    public function render()
    {
        return view('livewire.levels.index',['levels'=>\App\Models\Level::orderBy('created_at','DESC')->paginate(5)]);
    }
}
