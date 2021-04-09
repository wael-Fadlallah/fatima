<?php

namespace App\Http\Livewire\Levels;

use Livewire\Component;

class Level extends Component
{

    public $name;
    public $upadteData;
    public $upadteDataBool = false;
    public $review = ['review'=>0];
    public $memorizing = ['Total' => 0, 'Final' => 0, 'AnnualEvaluation' => 0];
    public $intonation = ['Total' => 0, 'Final' => 0, 'AnnualEvaluation' => 0,'Participation'=>0];
    public $attitude_and_attendance = 0;
    protected $listeners = [
        'data-update' => '$refresh',
        'refresh' => 'refreshData',
        'getUpdateData' => 'getUpdateData',
    ];


    protected $rules = [
        'memorizing.*' => 'numeric',
        'review.*' => 'numeric',
        'intonation.*' => 'numeric',
        'attitude_and_attendance' => 'numeric',
        'name' => 'required|min:4|max:191',
    ];


    public function refreshData(){
        $this->reset();
    }

    public function getUpdateData(\App\Models\Level $data)
    {
        $this->upadteData = $data;

        $this->name = $data->name??'';

        $this->attitude_and_attendance = $data->attitude_and_attendance??0;

        $this->review['review']=json_decode($data->review)->review??0;

        $this->memorizing['Total']=json_decode($data->memorizing)->Total??0;
        $this->memorizing['AnnualEvaluation']=json_decode($data->memorizing)->AnnualEvaluation??0;
        $this->memorizing['Final']=json_decode($data->memorizing)->Final??0;

        $this->intonation['Final']=json_decode($data->intonation)->Final??0;
        $this->intonation['AnnualEvaluation']=json_decode($data->intonation)->AnnualEvaluation??0;
        $this->intonation['Participation']=json_decode($data->intonation)->Participation??0;
        $this->intonation['Total']=json_decode($data->intonation)->Total??0;



        $this->upadteDataBool = true;
    }

    public function calculateTotal()
    {
        $this->validate([
            'memorizing.*' => 'numeric']);

        $this->memorizing['Total'] = round (floatval($this->memorizing['AnnualEvaluation']) + floatval($this->memorizing['Final']),2);
    }
    public function calculateTotal2()
    {
        $this->validate([
            'intonation.*' => 'numeric']);

        $this->intonation['Total'] = round(floatval($this->intonation['AnnualEvaluation']) + floatval($this->intonation['Participation'])+ floatval($this->intonation['Final']),2);
    }

    public function save()
    {
        $data = $this->validate();
        $data['memorizing']=json_encode($data['memorizing']);
        $data['review']=json_encode($data['review']);
        $data['intonation']=json_encode($data['intonation']);

        if($this->upadteDataBool)
            $this->upadteData->update($data);
        else
        \App\Models\Level::create($data);

        $this->emit('data-update');
        $this->reset();
        session()->flash('message', 'تم الحفظ بنجاح !');
    }

    public function render()
    {
        return view('livewire.levels.level');
    }
}
