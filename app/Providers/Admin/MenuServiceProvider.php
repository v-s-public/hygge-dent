<?php

namespace App\Providers\Admin;

use App\Models\Appointment;
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
                'text' => 'Записи на приём',
                'route' => 'admin.notifications.appointments.index',
                'icon' => 'fas fa-fw fa-book-medical',
                'active' => ['notifications/appointments/*'],
                'label'       => Appointment::getNewAppointmentsCount(),
                'label_color' => 'danger'
            ]);
        });
    }
}
