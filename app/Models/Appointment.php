<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $primaryKey = 'appointment_id';

    protected $fillable = [
        'fio', 'phone', 'message'
    ];

    /**
     * Mark Appointment as viewed
     */
    public function markAsViewed() : void
    {
        if (!$this->is_viewed) {
            $this->is_viewed = true;
            $this->save();
        }
    }

    public static function getNewAppointmentsCount()
    {
        $newAppointments = self::where('is_viewed', false)->get();
        return $newAppointments->count();
    }

    /**
     * Get Appointment date/time
     *
     * @return string
     */
    public function getAppointmentDate()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y H:i:s');
    }
}
