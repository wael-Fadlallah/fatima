<?php

namespace App\Http\Livewire\Teachers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TeacherImage extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $upadteteacher;
    public $stamp;
    public $name;
    protected $rules = [
        'name' => 'required'
    ];

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'data-update' => '$refresh',
        'imageID' => 'upadteteacherModel',
    ];



    public function upadteteacherModel(\App\Models\Teacher $teacher){
        $this->upadteteacher=$teacher;
        $this->name=$teacher->name;
    }
    public function updateImage(){
        $this->validate();

        $this->upadteteacher->update([
            "name" => $this->name
        ]);

        if($this->stamp){
        $this->upadteteacher->clearMediaCollection('stamp');

        $this->upadteteacher->
        addMedia($this->stamp->getRealPath())
            ->usingName($this->stamp->getClientOriginalName())
            ->toMediaCollection('stamp');
        }
        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');
    }
    public function render()
    {
        return view('livewire.teachers.teacher-image');
    }
}
