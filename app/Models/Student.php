<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student.
 *
 * @version February 8, 2021, 12:07 am UTC
 *
 * @property string $name
 * @property string $lavel_id
 * @property bool   $shift
 * @property string $phone
 * @property string $birthday
 */
class Student extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'students';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'lavel_id',
        'class_id',
        'shift',
        'idendtaty',
        'phone',
        'birthday',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'lavel_id' => 'string',
        'shift' => 'int',
        'phone' => 'string',
        'birthday' => 'date',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'lavel_id' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',

        'phone' => 'required|string|max:255',
        'birthday' => 'required',
    ];

    public function levels()
    {
        return $this->belongsTo(Level::class, 'lavel_id');
    }

    public function classes()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function getShiftNameAttribute()
    {
        return $this->shift == 1 ? 'صباحي' : 'مسائي';
    }

    public function resultDegree(){
        return $this->hasMany(ResultDegree::class,'student_id');
    }
}
