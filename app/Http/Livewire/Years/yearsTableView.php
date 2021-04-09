<?php

namespace App\Http\Livewire\years;

use App\Actions\years\YearsStatus;
use App\Filters\YearsFilter;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\LaravelViews;
use LaravelViews\Views\TableView;

class yearsTableView extends TableView
{

    protected $paginate =5;
    protected $listeners = [
        'data-update' => '$refresh',
    ];
    public $searchBy = ['year'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
         return \App\Models\Year::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('العام الدراسي')->sortBy('year'),

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
            'العام : '.$model->year .'هـ',

        ];
    }
    protected function actionsByRow()
    {
        return [
            new YearsStatus,

        ];
    }


}
