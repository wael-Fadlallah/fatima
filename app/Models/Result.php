<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Result
 * @package App\Models
 * @version February 11, 2021, 10:10 pm UTC
 *
 * @property integer $shift
 * @property integer $lavel_id
 * @property integer $year_id
 * @property integer $semester
 */
class Result extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'result';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'shift',
        'lavel_id',
        'year_id',
        'class_id',
        'semester'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'shift' => 'integer',
        'lavel_id' => 'integer',
        'year_id' => 'integer',
        'semester' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'shift' => 'required',
        'lavel_id' => 'required',
        'year_id' => 'required',
        'semester' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function students()
    {
        return $this->hasManyThrough(Student::class, ResultDegree::class, 'student_id', 'id');
    }

    public function year(){
        return $this->belongsTo(Year::class,'year_id');
    }
    public function level(){
        return $this->belongsTo(Level::class,'lavel_id');
    }    public function classModel(){
        return $this->belongsTo(ClassModel::class,'class_id');
    }
}
