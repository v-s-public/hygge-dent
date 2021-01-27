<?php

namespace App\Traits;

use Carbon\Carbon;

trait Notifications
{
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

    /**
     * New notifications count
     *
     * @return mixed
     */
    public static function getNewNotificationsCount()
    {
        $newNotifications = self::where('is_viewed', false)->get();
        return $newNotifications->count();
    }

    /**
     * Get Notification date/time
     *
     * @return string
     */
    public function getNotificationDate()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y H:i:s');
    }
}
