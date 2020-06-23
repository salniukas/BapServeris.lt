<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Order;
use Carbon\Carbon;
use Thedudeguy\Rcon;
use App\Service;
use Illuminate\Support\Facades\Log;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\CallRoute'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $orders = order::where('approved', 'pending')->get();
            foreach ($orders as $order) {
                $order->approved = 'cancelled';
                $order->save();
            }
        })->daily();

        $schedule->call(function(){
            $orders = Order::whereNotNull('until')->get();
            foreach ($orders as $order) {
                $service = Service::where('cost', $order->amount)->first();
                $username = $order->username;
                if (Carbon::parse(now())->diffInDays($order->until, false) <= 0) {
                	if (is_null($order->until)) {
						$until = "NULL";
					}else{
						$until = $order->until;
						$order->until = null;
						$order->save();
						Log::debug('Neteko Paslaugos: ' . $username . '---'. $service->name);
					}

					$host = env('Server_IP');
	                $port = env('Server_PORT');
	                $password = env('Server_PASS');
	                $timeout = 3;
	                $rcon = new Rcon($host, $port, $password, $timeout);

	                if ($rcon->connect()){

                    	$rcon->sendCommand('pex user '.$username. 'group set lavonas'); 
                    	$rcon->sendCommand('broadcast '.$username. ' Neteko paslaugos, nes jos galiojimas pasibaigė');
                    	
                	}
				}
			}})->daily();

        $schedule->call(function(){
            $orders = Order::where('approved', 'done')->whereNull('until')->where('service_name', '!=', 'atleiskit')->delete();
            $orders2 = Order::where('approved', 'cancelled')->delete();
        })->weeklyOn(1, '7:00');;

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
