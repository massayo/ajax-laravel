<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'id';
    public    $timestamps = true;
    protected $fillable   = ['name','username','email','department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
