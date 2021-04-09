<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Form extends Component
{
    public $name, $email, $password, $shift, $upadteData;
    protected $listeners = [
        'getUpdateData' => 'getUpdateData'
    ];
    protected $rules = [
        'name' => 'required|string|min:4|max:255',
        'email' => 'required|string|email|min:4|max:255|unique:users',
        'password' => 'required|string|min:6|max:255',
        'shift' => 'required|not_in:0',
    ];

    public function getUpdateData(User $user)
    {

//        $role=Role::OrderBy('id','DESC')->first();

//        $role->givePermissionTo('years-controll');
//        $role->givePermissionTo('levels-controll');
//        $role->givePermissionTo('classes-controll');
//        $role->givePermissionTo('teachers-controll');
//        $role->givePermissionTo('users-controll');
//        $role->givePermissionTo('settings-controll');

        $this->reset();

        $this->upadteData = $user;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->shift=$user->shift;

    }

    public function save()
    {


        if($this->upadteData){
            $data = $this->validate([
                'name' => 'required|string|min:4|max:255',
                'email' => 'required|string|email|min:4|max:255',

                'shift' => 'required|not_in:0',
            ]);
            $data=[
                'name' => $data['name'],
                'email' => $data['email'],
                'shift' => $this->shift,
            ];
            if($this->password){
                $data['password'] = Hash::make($this->password);
            }
            $user = $this->upadteData->update($data);

       
        }else {
            $data = $this->validate();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'shift' => $this->shift,
                'password' => Hash::make($data['password']),
            ]);
         
            $user->assignRole('oprator');
        }

        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');
    }


    public function render()
    {
        return view('livewire.users.form');
    }
}
