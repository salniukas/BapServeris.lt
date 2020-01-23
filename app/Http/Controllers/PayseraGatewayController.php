<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use \DiscordWebhooks\Client;
use \DiscordWebhooks\Embed;
use Thedudeguy\Rcon;
use App\User;
use Carbon\Carbon;
use App\WebToPay;
use App\Service;


class PayseraGatewayController extends Controller
{
	public function Start()
	{
		$services = Service::all();
		return view('pages.icons', ['services' => $services]);

	}

    public function redirect (Request $request)
	{
		Order::create(request(['username', 'email', 'amount']));
		$order = Order::orderBy('created_at', 'DESC')->firstOrFail();

		$config = config('services.paysera');
		// Nustatome pagal nuožiūrą
		$orderId = $order->id;
		$params = [
		'projectid' => $config['projectid'],
		'orderid' => $orderId,
		'accepturl' => $config['accepturl'],
		'cancelurl' => $config['cancelurl'],
		'callbackurl' => 'http://bapserveris.lt/paysera/callback',
		'version' => $config['version'],
		'test' => $config['test'],
		'p_email' => $request->email,
		'amount' => $request->amount,
		];

		// Užkoduojame parametrus ir paruošiame parašą.

		$params = http_build_query($params);
		$params = base64_encode($params);
		$data = str_replace('/', '_', str_replace('+', '-', $params));
		$sign = md5($data . $config['password']);

		// Nukreipiame vartotoją į Payseros puslapį.
		return redirect('https://www.paysera.com/pay/' . '?data=' . $data . '&sign=' . $sign);
	}

	public function callback (Request $request)
	{
		$sign = $config = config('services.paysera.password');
		$data = $request->data;
		$ss1 = $request->ss1;
		// Sutikriname parašus
		if (md5($data . $sign) === $ss1) {
		// Iškoduojame parametrus
		$params = array();
		parse_str(base64_decode(strtr($request->data, array('-' => '+', '_' => '/'))), $params);
		$status = $params['status'];
		$p_email = $params['p_email'];
		$amount = $params['amount'] / 100;
		$orderid = $params['orderid'];
		

		$order = Order::where('id', $orderid)->first();
		$service = Service::where('cost', $params['amount'])->first();

		$order->service_name = $service->name;
		$order->approved = "done";
		$order->until = Carbon::now()->addMonths(1);
		$order->save();

		$cmd = $service->cmd;

		$nick = $order['username'];
		
		$cmds = str_replace('[nick]', $nick, $cmd);
		
		
        $host = env('Server_IP');
        $port = env('Server_PORT');
        $password = env('Server_PASS');
	    $timeout = 3;
	    $rcon = new Rcon($host, $port, $password, $timeout);

	    if ($rcon->connect()){

	          $rcon->sendCommand('broadcast Sveikinimai '.ucfirst($nick). '! Nusipirko '.ucfirst($service->name).' paslaugą!');
	          $rcon->sendCommand($cmds);
	        }
		return response('OK', 200);
		return view('info.accept');
		}
	}

	public function callback2(Request $request)
	{
		$config = config('services.paysera');
		$project = $config['projectid'];
		$projectpass = $config['password'];
		try {
			$response = WebToPay::checkResponse($request->all(), array(
				'projectid' => "$project",
				'sign_password' => "$projectpass",
			));

			$sms = strtolower ($response['key']);
			$info = explode(" ", $response['sms']);
			$username = $info[1];

			$service = Service::where('name', strtolower($info[0]))->first();
			$amount = $service->cost;

			Order::create(['username' => $username, 'amount' => $amount]);

			$order = Order::orderBy('created_at', 'DESC')->firstOrFail();

			$order->approved = "done";
			$order->until = Carbon::now()->addMonths(1);
			$order->service_name = $service->name;
			$order->save();

			$cmd = $service->cmd;
			$cmds = str_replace('[nick]', $username, $cmd);



			$host = env('Server_IP');
        	$port = env('Server_PORT');
        	$password = env('Server_PASS');
	    	$timeout = 3;
	    	$rcon = new Rcon($host, $port, $password, $timeout);

		    if ($rcon->connect()){
		    	
		    	$rcon->sendCommand('whitelist add Salniukas');
		    	$rcon->sendCommand('broadcast Sveikinimai '.ucfirst($username) . '! Nusipirko '.ucfirst($service->name).' paslaugą!');

		    	$rcon->sendCommand($cmds);
		    	
		    }
			return response('Ok. Dėkojame '. ucfirst($username). ' Paslauga: '. ucfirst($service->name) .' bus aktyvuota per 15min.');///// Atsakomoji zinute	
		}
		catch (Exception $e) {
			echo get_class($e).': '.$e->getMessage();
		}

	}
}
