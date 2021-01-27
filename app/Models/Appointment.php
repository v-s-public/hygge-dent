<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Notifications;

class Appointment extends Model
{
    use Notifications;

    public $primaryKey = 'appointment_id';

    protected $fillable = [
        'fio', 'phone', 'message'
    ];
}
