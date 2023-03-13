<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Employee extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
       'id',
       'firstName',
       'lastName',
       'telephoneNumber',
       'email',
       'IDNumber',
       'positionID',
       'password'
    ];
     protected $dates = ['deleted_at'];


}
