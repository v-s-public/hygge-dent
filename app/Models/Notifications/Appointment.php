<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Notifications as NotificationTrait;

class Appointment extends Model
{
    use NotificationTrait;

    public $primaryKey = 'appointment_id';

    protected $fillable = [
        'fio', 'phone', 'message'
    ];
}
