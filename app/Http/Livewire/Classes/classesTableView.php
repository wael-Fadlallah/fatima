<?php

namespace App\Http\Livewire\classes;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class classesTableView extends TableView
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
         return ClassModel::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return ['إسم الفصل '];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [$model->name];
    }
}
