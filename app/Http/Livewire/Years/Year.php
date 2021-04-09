<?php

namespace App\Http\Livewire\Years;


use Livewire\Component;

class Year extends Component
{
    public $year;
    public $year2;
    public $upadteData;
    public $upadteDataBool = false;


    protected $listeners = [
        'data-update' => '$refresh',
        'refresh' => 'refreshData',
        'getUpdateData' => 'getUpdateData',
    ];

    protected $rules = [
        'year' => 'required|min:4|max:4',
        'year2' => 'max:4'
    ];

public function refreshData(){
    $this->reset();
}
    public function getUpdateData(\App\Models\Year $data)
    {
        $this->upadteData = $data;
        $yearData = explode('-', $data->year);
        $this->year = $yearData[0] ?? '';
        $this->year2 = $yearData[1] ?? '';
        $this->upadteDataBool = true;
    }

    public function save()
    {
        $data = $this->validate();

        if (!empty($data['year2']))
            $data['year'] = $data['year'] . '-' . $data['year2'];

        if ($this->upadteDataBool && $this->upadteData != null) {
            $year = $this->upadteData->update($data);
        } else {
            $year = \App\Models\Year::create($data);
        }

        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');

    }

    public function render()
    {
        return view('livewire.years.year');
    }
}
