<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
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
    public function upadteteacherModel(\App\Models\User $data,$action)
    {

        $this->upadteData = $data;

        $this->emit('getUpdateData',$data->id);

        if($action=='update')
        $this->dispatchBrowserEvent('open-updat');
       else
       $this->dispatchBrowserEvent('open-delete');
    }

    public function confirmDelete(User $user){
        if($this->upadteData){
            if($this->upadteData->id==auth()->id()){
                $this->emit('data-deleted');
                session()->flash('error', ' لا يمكن حذف المستخدم الحالي !');

                return ;
            }
            $this->upadteData->delete();
            $this->emit('data-deleted');
            $this->upadteData = null;
            session()->flash('message', 'تم الحذف بنجاح !');
        }
    }


    public function render()
    {
        return view('livewire.users.index',['users'=>User::orderBy('created_at','DESC')->paginate(5)]);
    }
}
