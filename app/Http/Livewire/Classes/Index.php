<?php

namespace App\Http\Livewire\Classes;

use App\Models\Result;
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

    public function upadteteacherModel(\App\Models\ClassModel $data,$action)
    {

        $this->upadteData = $data;
        $this->emit('getUpdateData',$data->id);
        if($action=='update')
        $this->dispatchBrowserEvent('open-updat');
       else
       $this->dispatchBrowserEvent('open-delete');
    }

    public function confirmDelete(\App\Models\ClassModel $data,$action)
    {
        $this->upadteData = $data;
        
        if($this->upadteData->students()->exists()){
            $this->emit('data-deleted');
            $this->upadteData = null;
            session()->flash('error', '  لايمكن الحذف يحتوي بيانات  !');
            return;
        }

        $this->upadteData->delete();
        $this->emit('data-deleted');
        $this->upadteData = null;
        session()->flash('message', 'تم الحذف بنجاح !');
    }

    public function render()
    {
        if(auth()->user()->hasRole('admin')){
            $classes= \App\Models\ClassModel::orderBy('created_at','DESC')->paginate(5);
        }else{
            $classes= \App\Models\ClassModel::orderBy('created_at','DESC')->where('shift',auth()->user()->shift)->paginate(5);
        }
        return view('livewire.classes.index',['classes'=>$classes]);
    }
}
