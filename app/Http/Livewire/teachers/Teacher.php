<?php

namespace App\Http\Livewire\Teachers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Teacher extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $upadteteacher;
    public $stamp;

    protected $rules = [
        'stamp' => 'image|max:1024',
    ];


    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'data-update' => '$refresh',
    ];

    public function upadteteacherModel(\App\Models\Teacher $teacher)
    {

        $this->upadteteacher = $teacher;

           $this->emit('imageID',$teacher->id);

    }

    public function deleteModel(\App\Models\Teacher $teacher)
    {

        $this->upadteteacher = $teacher;

    }

    public function confirmDelete()
    {
        $this->upadteteacher->delete();
        $this->emit('data-deleted');
        $this->upadteteacher = null;
        session()->flash('message', 'تم الحذف بنجاح !');
    }

    public function render()
    {
        return view('livewire.teachers.teacher', ['teachers' => \App\Models\Teacher::orderBy('created_at','DESC')->paginate(5)]);
    }
}
