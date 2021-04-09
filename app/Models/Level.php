<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Level
 * @package App\Models
 * @version February 7, 2021, 2:36 pm UTC
 *
 * @property string $name
 * @property boolean $status
 * @property string $review
 * @property string $memorizing
 * @property string $intonation
 * @property string $attitude_and_attendance
 */
class Level extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'levels';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',
        'review',
        'memorizing',
        'intonation',
        'attitude_and_attendance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'status' => 'boolean',
        'review' => 'string',
        'memorizing' => 'string',
        'intonation' => 'string',
        'attitude_and_attendance' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'status' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'review' => 'nullable|string',
        'memorizing' => 'nullable|string',
        'intonation' => 'nullable|string',
        'attitude_and_attendance' => 'nullable|string'
    ];


}
