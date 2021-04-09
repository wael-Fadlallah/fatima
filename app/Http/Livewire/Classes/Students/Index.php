<?php

namespace App\Http\Livewire\Classes\Students;

use App\Models\ClassModel;
use Livewire\Component;

class Index extends Component
{
    public $ClassModel;
    public $upadteData;
    public $editing;
    protected $listeners = [
        'data-update' => '$refresh',
    ];

    public function upadteteacherModel(\App\Models\Student $data,$action)
    {
        $this->upadteData = $data;

        $this->emit('getUpdateData', $data->id);
        if($action=='update')
        $this->dispatchBrowserEvent('open-updat');
       else
       $this->dispatchBrowserEvent('open-delete');
    }
    public function confirmDelete(){
        $this->upadteData->forceDelete();
            $this->emit('data-update');

            session()->flash('message', 'تم الحذف بنجاح !');
            redirect('/students/' . $this->class_id);
    }

    public function mount(ClassModel $data)
    {
        $this->ClassModel = $data;
    }

    public function render()
    {
        return view('livewire.classes.students.index', ['students' => $this->ClassModel->students]);
    }
}
