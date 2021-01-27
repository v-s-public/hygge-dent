<?php

namespace App\Providers\Admin;

use App\Models\Notifications\Appointment;
use App\Models\Notifications\Message;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Dispatcher $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->addAfter('notifications', [
                'key' => 'notifications_appointments',
                'text' => 'Записи на приём',
                'route' => 'admin.notifications.appointments.index',
                'icon' => 'fas fa-fw fa-book-medical',
                'active' => ['notifications/appointments/*'],
                'label' => self::showNotificationCount(Appointment::class),
                'label_color' => self::setNotificationLabelColor(Appointment::class)
            ]);

            $event->menu->addAfter('notifications_appointments', [
                'key' => 'notifications_messages',
                'text' => 'Сообщения',
                'route' => 'admin.notifications.messages.index',
                'icon' => 'fas fa-fw fa-envelope',
                'active' => ['notifications/messages/*'],
                'label' => self::showNotificationCount(Message::class),
                'label_color' => self::setNotificationLabelColor(Message::class)
            ]);
        });
    }

    private static function showNotificationCount($class)
    {
        return ($class::getNewNotificationsCount() > 0) ? $class::getNewNotificationsCount() : '';
    }

    private static function setNotificationLabelColor($class)
    {
        return $class::getNewNotificationsCount() > 0 ? 'danger' : '';
    }
}
