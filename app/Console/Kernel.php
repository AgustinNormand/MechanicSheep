<?php

namespace App\Console;

use App\Models\Estimacion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\ContactanosMailable;
use App\Models\Configuration;
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
            $today = new DateTime('NOW');
            
            $estimaciones = Estimacion::where([
                ["ACTIVADA", 1],
                ["MAIL_ENVIADO", 0],
                ["FECHA_ESTIMADA_AVISO","<=",$today->format("Y-m-d G:i:s")]
            ])->get();


            $moderatedEmails = Configuration::where('NAME', 'MODERATED_EMAILS')->first()->VALUE;

            /*
            if($moderatedEmails == 'true')
                $this->enviarMails($estimaciones);
            else
                $this->marcarMailsParaEnviar();
            */
            foreach ($estimaciones as $estimacion) {
                $nombre = ucfirst(strtolower($estimacion->vehiculo->persona->NOMBRE));
                $email = $estimacion->vehiculo->persona->EMAIL;
                $vehiculo = $estimacion->vehiculo;
                $correo = new ContactanosMailable($nombre, $vehiculo, $estimacion->PROMEDIO != 0);

                Mail::to($email)->send($correo);

                $estimacion->MAIL_ENVIADO = 1;
                $estimacion->save();

                $correo->build(); 
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
