<?php

namespace App\Http\Livewire\levels;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class levelsTableView extends TableView
{
    protected $paginate =5;
    protected $listeners = [
        'data-update' => '$refresh',
    ];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
         return \App\Models\Level::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('إسم المستوي')->sortBy('level'),

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
           $model->level

        ];
    }
}
