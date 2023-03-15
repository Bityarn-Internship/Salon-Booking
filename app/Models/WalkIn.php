<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class WalkIn extends Authenticatable implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
       'id',
       'firstName',
       'lastName',
       'telephoneNumber',
       'email',
       'date',
       'time',
       'cost',
       'status'
    ];
    
    protected $dates = ['deleted_at'];

}
