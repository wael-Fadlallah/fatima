<?php

namespace App\Http\Livewire\Classes\Students;

use App\Models\ClassModel;
use App\Models\Level;
use App\Models\Student;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $phone;
    public $birthday;
    public $shift;
    public $lavel_id;
    public $class_id;
    public $idendtaty;
    public $ClassModel;
    public $upadteData;
    public $upadteDataBool = false;
    protected $listeners = [
        'DateUpdate' => 'DateUpdate',
        'getUpdateData' => 'getUpdateData',
    ];
    protected $rules = [
        'name' => 'required|min:4|max:191',
        'phone' => 'required|min:4|max:191',
        'birthday' => 'required|max:191',
        'idendtaty' => 'required|digits:10|numeric|unique:students,idendtaty',
        'lavel_id' => 'required|not_in:0',
    ];

    public function mount(ClassModel $data)
    {
        $this->ClassModel = $data;
        $this->class_id = $data->id;
    }

    public function getUpdateData(Student $data)
    {
        $this->upadteData = $data;
        $this->name = $data->name;
        $this->birthday = $data->birthday->format('Y-m-d') ?? '';
        $this->phone = $data->phone;
        $this->class_id = $data->class_id;
        $this->lavel_id = $data->lavel_id;
        $this->shift = $data->shift;
        $this->upadteDataBool = true;


    }

    public function save()
    {
        if (!$this->upadteDataBool)
            $this->emit('form-With-Date');
        else {
            $data = $this->validate();
            $data['class_id'] = $this->class_id;
            $data['shift'] = auth()->user()->shift;


            $this->upadteData->update($data);
            $this->emit('data-update', $this->class_id);
            $this->reset('name', 'phone', 'birthday', 'shift');
            session()->flash('message', 'تم الحفظ بنجاح !');
            redirect('/students/' . $this->class_id);
        }

    }


    public function DateUpdate($date)
    {

        $this->birthday = $date;
        $data = $this->validate();
        $data['class_id'] = $this->class_id;
        $data['shift'] = auth()->user()->shift;

//        $this->upadteData->update($data);


        $student = Student::create($data);


        $this->emit('data-update', $this->class_id);
        $this->reset('name', 'phone', 'birthday', 'shift');
        session()->flash('message', 'تم الحفظ بنجاح !');
        redirect('/students/' . $this->class_id);
    }


    public function render()
    {
        return view('livewire.classes.students.form', ['levels' => Level::all()]);
    }
}
