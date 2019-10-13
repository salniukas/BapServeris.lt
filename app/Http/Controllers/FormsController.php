<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\FormAccept;
use App\Mail\FormReject;
use Auth;
use App\Player;
use Session;
use App\Form;
use App\Forms_vote;
use Illuminate\Support\Facades\Mail;


class FormsController extends Controller
{
   public function index()
   {
      return view('form.before');
   }

   public function create()
   {
   	  if (!Auth::check()) {
   	  	Session::flash('message', 'Norint Pildyti anketą reikia prisijungti.');
   	  	return Redirect('/login');
   	  }else{
   	  	return view('form.create');
        }
   }


   public function store(Request $request)
   {
   		//validate
   		$this->validate(request(), [
   			'name' => 'required',
   			'age' => 'required',
   			'discord_id' => 'required',
   			'email' => 'email|required',
   			'roleplay' => 'required',
   			'kapl' => 'required',
   			'kokia' => 'required',
   			'kodel' => 'required|',
            'kaip' => 'required',
            'mic' => 'required',
            'darbai' => 'required',
            'serv' => 'required',
            'content' => 'required',
            'subs' => 'required',
   			'username' => 'required'
   		]);

   		//Store
   		 Form::create(request(['name', 'age', 'discord_id', 'email', 'roleplay', 'kapl', 'kokia', 'kodel', 'kaip', 'mic', 'darbai', 'serv', 'content', 'subs', 'username']));

   		 $request->session()->flash('success', 'Anketa gauta');

   		 return redirect('manoanketos');

   }
   public function Mano()
   {
      $user = Auth::user();

      $forms = Form::all()->where('discord_id', $user->discord_id)->all();

      return view('form.manol', ['forms' => $forms]);
   }

   public function Manoa($id)
   {

      $user = Auth::user();

      $forms = Form::find($id);
      if ($user->discord_id == $forms->discord_id) {
      	return view('form.mano', ['forms' => $forms]);
      }else{
      	abort(404);
      }
   }

   public function lists()
   {
      if (Auth::user()->isSupport || Auth::user()->isAdmin || Auth::user()->isAleradas) {

         $forms = Form::get()->where('sent', 0);

         return view('form.list ',['forms' => $forms]);
      }
   }

   public function Elists()
   {
      if (Auth::user()->isSupport || Auth::user()->isAdmin) {

         $forms = Form::get()->where('sent', 1);

         return view('form.list ',['forms' => $forms]);
      }
   }

   public function Alists()
   {
      if (Auth::user()->isSupport || Auth::user()->isAdmin || Auth::user()->isAleradas ) {

         $forms = Form::get()->where('accepted', 1);

         return view('form.list ',['forms' => $forms]);
      }
   }

   public function show($id)
   {
      if (Auth::user()->isSupport || Auth::user()->isAdmin || Auth::user()->isAleradas) {
            $forms = Form::find($id);
            // $fafa = Forms_vote::where('voted_for', $id)->all();
            $voted = Forms_vote::where('voter_discord', Auth::user()->discord_id)->where('voted_for', $id)->first();
            $balsaiu = Forms_vote::where('voted_for', $id)->where('reason', 'Už')->count();
            $balsaip = Forms_vote::where('voted_for', $id)->where('reason', 'Prieš')->count();

            return view('form.show', ['forms' => $forms, 'voted' => $voted, 'balsaiu' => $balsaiu, 'balsaip' => $balsaip]);
      }else{
      	abort(403);
      }
   }
   public function trash($id)
   {
   	 if (Auth::user()->isSupport || Auth::user()->isAdmin) {
   	 	$player = Form::find($id);

   	 	$player->operator = Auth::user()->username;

   	 	if ($player->accepted == 1) {
   	 		$player->accepted = 0;
   	 		$player->rejected = 1;
   	 	}else{
   	 		$player->rejected = 1;
   	 	}
   	 	$player->save();
   	 	Session::flash('message', 'Anketa Atmesta');
		return redirect("/anketos");
   	 }
   }

   public function etapas($id)
   {
   	 if (Auth::user()->isSupport || Auth::user()->isAdmin) {
   	 	$player = Form::find($id);

   	 	$player->operator = Auth::user()->username;
   	 	$player->accepted = 1;
   	 	$player->save();

   	 	if ($player->rejected == 1) {
   	 		$player->rejected = 0;
   	 		$player->accepted = 1;
   	 		$player->save();
   	 	}
   	 	Session::flash('message', 'Anketa Permesta Į antrą etapą');
   	 	return redirect("/anketos");

   	 }else{
   	 	abort(404);
   	 }
   }
   public function alerade($id)
   {
       if (Auth::user()->isSupport || Auth::user()->isAdmin) {
         $player = Form::where('id', $id)->first();

         $player->operator = Auth::user()->username;
         $player->accepted = 0;
         $player->rejected = 0;
         $player->aleradas = 1;
         $player->save();
         $user = User::where('discord_id', $player->discord_id)->first();
         $user->isAleradas = 1;
         $user->save();

         Session::flash('message', 'Žaidėjas pridėtas į Aleradą');
         return redirect("/anketos");

       }else{
         abort(404);
       }
   }

   public function response()
   {
   		$users = Form::where('sent', 0)->where('accepted', 1)->get();
   		foreach ($users as $u) {
    		$u->sent = 1;
    		$u->save();
    	}
   		$user = Form::where('sent', 0)->where('rejected', 1)->get();

   		foreach ($user as $us) {
    		$us->sent = 1;
    		$us->save();
    	}
   		Mail::to($users)->send(new FormAccept);
   		Mail::to($user)->send(new FormReject);
   		Session::flash('message', 'Laiškai Išsiūsti');
   		return redirect("/anketos");
   }

   public function vote($id)
   {
      if(Auth::user()->isAleradas){
         $form = Forms_vote::where('voted_for', $id)->first();

         if ($form['voter_discord'] != Auth::user()->discord_id) {
            $voter = Auth::user()->discord_id;
            $voter_name = Auth::user()->username;
            $reason = "Už";

            Forms_vote::create(['voted_for' => $id, 'voter_discord' => $voter, 'voter_name' => $voter_name, 'reason' => $reason]);
         }
      return redirect("/anketos");
   }
}

   public function vote2($id)
   {
      if(Auth::user()->isAleradas){
         $form = Forms_vote::where('voted_for', $id)->first();

         if ($form['voter_discord'] != Auth::user()->discord_id) {
            $voter = Auth::user()->discord_id;
            $voter_name = Auth::user()->username;
            $reason = "Prieš";

            Forms_vote::create(['voted_for' => $id, 'voter_discord' => $voter, 'voter_name' => $voter_name, 'reason' => $reason]);
         }
      return redirect("/anketos");
   }
}

}