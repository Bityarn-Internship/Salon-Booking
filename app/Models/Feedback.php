<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Feedback extends Model implements Auditable
{
    use HasFactory, Notifiable, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'email',
        'message',
        'status'
    ];
    protected $dates = ['deleted_at'];
}
