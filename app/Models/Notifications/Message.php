<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Notifications as NotificationTrait;

class Message extends Model
{
    use NotificationTrait;

    public $primaryKey = 'message_id';

    protected $fillable = [
        'fio', 'email', 'theme', 'message'
    ];
}
