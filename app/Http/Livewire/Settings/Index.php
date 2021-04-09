<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $photo;
    public $photo2;

    public function uploadStamp1()
    {
        $this->validate([
            'photo' => 'image|max:3024', // 3MB Max
        ]);
        $stamps = Setting::whereName('stamps')->first();
        $stamps->clearMediaCollection('stamps');
        $stamps->addMedia($this->photo->getRealPath())
            ->usingName($this->photo->getClientOriginalName())
            ->toMediaCollection('stamps');

        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');
    }

    public function uploadStamp2()
    {
        $this->validate([
            'photo2' => 'image|max:3024', // 3MB Max
        ]);
        $stamps = Setting::whereName('stamps')->first();
        $stamps->clearMediaCollection('stamps1');
        $stamps->addMedia($this->photo2->getRealPath())
            ->usingName($this->photo2->getClientOriginalName())
            ->toMediaCollection('stamps1');

        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');

    }

    public function render()
    {
        return view('livewire.settings.index', ['settings' => Setting::whereName('stamps')->first()]);
    }
}
