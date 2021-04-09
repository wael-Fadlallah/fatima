<?php

namespace App\Http\Livewire\Classes;

use App\Models\Teacher;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $shift;
    public $teacher_id;
    public $teachers;
    public $upadteData;
    public $upadteDataBool = false;
    protected $listeners = [
        'data-update' => '$refresh',
        'getUpdateData' => 'upadteteacherModel',
    ];


    public function upadteteacherModel(\App\Models\ClassModel $data)
    {
        $this->upadteData = $data;
        $this->name = $data->name;
        $this->teacher_id = $data->teacher_id;
        $this->shift = $data->shift;
        $this->upadteDataBool = true;
    }

    protected $rules = [
        'name' => 'required|min:4|max:191',

        'teacher_id' => 'required|not_in:0',
    ];


    public function save()
    {

        $data = $this->validate();


        if(auth()->user()->hasRole('admin')){
            $data['shift']=$this->shift;
        }else{
            $data['shift']=auth()->user()->shift;
        }

        if ($this->upadteDataBool && $this->upadteData != null) {
            $this->upadteData->update($data);
        } else {
            \App\Models\ClassModel::create($data);
        }


        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');
    }


    public function render()
    {
        $this->teachers = Teacher::all();
        return view('livewire.classes.form');
    }
}
