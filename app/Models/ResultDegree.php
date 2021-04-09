<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ResultDegree
 * @package App\Models
 * @version February 11, 2021, 10:11 pm UTC
 *
 * @property integer $result_id
 * @property integer $student_id
 * @property integer $degree
 * @property integer $subjects
 */
class ResultDegree extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'result_degrees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'result_id',
        'student_id',
        'degree',
        'subjects'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'result_id' => 'integer',
        'student_id' => 'integer',


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'result_id' => 'required',
        'student_id' => 'required',
        'degree' => 'required',
        'subjects' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function result(){
      return  $this->belongsTo(Result::class,'result_id');
    }
    public function student(){
      return  $this->belongsTo(Student::class,'student_id');
    }


}
