<?php

namespace App\Console;

use App\Models\Estimacion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\ContactanosMailable;
use DateTime;
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
            /* Obtengo el día de hoy en formato date*/
            $today = new DateTime('NOW');
            
            $estimaciones = Estimacion::where([
                ["MAIL_ENVIADO",0],
                ["FECHA_ESTIMADA_AVISO","<=",$today->format("Y-m-d G:i:s")]
            ])->get();
           
            /*foreach ($estimaciones as $estimacion) {
                $nombre_persona = $estimacion->vehiculo->persona->NOMBRE;
                
                $email_persona = $estimacion->vehiculo->persona->EMAIL;
                $correo = new ContactanosMailable($nombre_persona);

                Mail::to($email_persona)->send($correo);

                
                $estimacion->MAIL_ENVIADO = 1;
                $estimacion->save();

                $correo->build(); 
            }*/
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
