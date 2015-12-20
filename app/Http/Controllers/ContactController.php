<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;
use Mail;
use DB;
use App\Message;

class ContactController extends Controller
{
	public function showForm()
	{
		return view('ecomm.shop.contact.index');
	}
	public function sendContactInfo(Request $request)
	{
		// Users Must Login To Send Message
		if(!Sentinel::check())
		{
			return redirect()->route('customer_login')->with('error_message', 'You Need To Login');
		}
		// Validate Message
		$this->validate ($request, [											
			'message' => 'required',
			]);
		// Define Input Message				
		$message = [
		'user_id' => Sentinel::getUser()->id,
		'email' => Sentinel::getUser()->email,
		'message' => $request->input('message'),
		];		
		// Save Message To Database
		$save_messages = new Message;
		$save_messages->fill($message)->save();


		// Define Email And Message For Email-Send
		$data['email'] = Sentinel::getUser()->email;
		$data['messageLines'] = explode("\n", $request->get('message'));	
	
		//User Email Form And Send Email To Admin
		Mail::queue('ecomm.shop.contact.email', $data, function ($message) use ($data) {
			$message->subject('Advice Laravel Shop From: '.$data['email'])
			->to(env('MAIL_FROM'))
			->replyTo($data['email']);
		});

		//return view('emails.contact', compact('data'));
		return redirect()->back()->with('flash_message', "Thank you for your message. It has been sent.");

	}
}
