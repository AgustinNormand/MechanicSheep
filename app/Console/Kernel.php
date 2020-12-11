<?php

namespace App\Console;

use App\Models\Estimacion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\ContactanosMailable;
use App\Models\Configuration;
use App\Models\Persona;
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
            $todayFormated = $today->format("Y-m-d G:i:s");
            
            $estimaciones = Estimacion::where([
                ["ACTIVADA", 1],
                ["MAIL_ENVIADO", 0],
                ["FECHA_ESTIMADA_AVISO","<=", $todayFormated],
            ])->get();

            $moderatedEmails = Configuration::where('NAME', 'MODERATED_EMAILS')->first()->VALUE;
            if($moderatedEmails == 'true')
                $this->marcarMailsParaEnviar($estimaciones);
            else
                $this->enviarMails($estimaciones);
            
        })->everyMinute();
    }

    private function enviarMails($estimaciones)
    {
        foreach ($estimaciones as $estimacion) {
            $nombre = ucfirst(strtolower($estimacion->vehiculo->persona->NOMBRE));
            Mail::to($estimacion->vehiculo->persona->EMAIL)->send(new ContactanosMailable($nombre, $estimacion->vehiculo, $estimacion->PROMEDIO != 0));
            $estimacion->MAIL_ENVIADO = 1;
            $estimacion->save();
        }
    }

    private function marcarMailsParaEnviar($estimaciones)
    {
        foreach ($estimaciones as $estimacion) {
            $estimacion->PENDIENTE_ENVIO = 1;
            $estimacion->save();
        }
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
