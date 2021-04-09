<?php

namespace App\Http\Livewire\Teachers;

use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherForm extends Component
{
    use WithFileUploads;

//    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $stamp;
    public $name;
    protected $rules = [
        'stamp' => 'image|max:1024',
        'name' => 'required'// 1MB Max
    ];

    public function save()
    {
        $this->validate();
        $teacher = \App\Models\Teacher::create([
            "name" => $this->name
        ]);


        $teacher->clearMediaCollection('stamp');

        $teacher->
        addMedia($this->stamp->getRealPath())
            ->usingName($this->stamp->getClientOriginalName())
            ->toMediaCollection('stamp');
        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');
    }

    public function render()
    {
        return view('livewire.teachers.teacher-form');
    }
}
