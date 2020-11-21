<?php

namespace App\Console;

use App\Models\Estimacion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $estimaciones = Estimacion::all();
            /* Obtengo el día de hoy en formato date*/
            $today = strtotime('now');
            $newformatTODAY = date('Y-m-d',$today);

            foreach ($estimaciones as $estimacion) {
                /*Transformo el string que obtengo de la db a un formate date*/
                $time = strtotime($estimacion->FECHA_ESTIMADA_AVISO);
                $newformat = date('Y-m-d',$time);

                /*Lógica para el envío de emails*/
                if (($newformat == $newformatTODAY) && ($estimacion->MAIL_ENVIADO == 0)) {
                    $email_persona = $estimacion->vehiculo->persona->EMAIL;
                    $correo = new ContactanosMailable;

                    Mail::to($email_persona)->send($correo);
                    return view('web.sections.static.contact');
                    /*Tengo que setear el campo mail enviado de la bd a true*/
                }
            }
        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
