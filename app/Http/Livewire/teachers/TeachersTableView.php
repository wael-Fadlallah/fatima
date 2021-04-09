<?php

namespace App\Http\Livewire\teachers;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;
use Livewire\WithFileUploads;

class TeachersTableView extends TableView
{
    use WithFileUploads;
    public $photo;

    public function saveImage($id){
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $this->emit('change-image',$id);
    }
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
         return Teacher::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'إسم المعلمة',
            ' التوقيع ',

        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            getFirstMedia($model,'stamp')

        ];
    }

}
