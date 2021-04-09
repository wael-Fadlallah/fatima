<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ClassModel
 * @package App\Models
 * @version February 7, 2021, 8:51 pm UTC
 *
 * @property string $name
 * @property boolean $status
 * @property boolean $shift
 * @property integer $teacher_id
 */
class ClassModel extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'class';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',
        'shift',
        'class_id',
        'teacher_id'
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
        'shift' => 'integer',
        'teacher_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'status' => 'required|boolean',
        'shift' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'teacher_id' => 'required'
    ];

    public function getShiftNameAttribute(){
        return $this->shift==1?"صباحي":"مسائي";
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function students(){
        return $this->hasMany(Student::class,'class_id')->orderBy('created_at','DESC');
    }

}
