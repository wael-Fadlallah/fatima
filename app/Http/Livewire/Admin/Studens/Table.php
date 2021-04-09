<?php

namespace App\Http\Livewire\Admin\Studens;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $upadteData;
    public $searchTerm;
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
        $this->dispatchBrowserEvent('data-deleted');

        session()->flash('message', 'تم الحذف بنجاح !');

    }

    public function render()
    {

        if (strlen($this->searchTerm) > 0) {
            $students = Student::where('idendtaty', 'like', '%' . $this->searchTerm . '%')->orWhere('name', 'like', '%' . $this->searchTerm . '%')->orWhere('phone', 'like', '%' . $this->searchTerm . '%')->paginate(5);
        } else {
            $students = Student::paginate(5);
        }

        return view('livewire.admin.studens.table', ['students' => $students]);
    }
}
