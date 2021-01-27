<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Notifications;

class Message extends Model
{
    use Notifications;

    public $primaryKey = 'message_id';

    protected $fillable = [
        'fio', 'email', 'theme', 'message'
    ];
}
