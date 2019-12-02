<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MyEventClass;
use Mail;

class MixinsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try{

            event(new MyEventClass());
/*
            $data = [];
            Mail::send('emails.contact',$data, function ($message) {
                $message->from('nbawari@cimet.com.au','CIMET Name');
                $message->to('naval.bawari@debutinfotech.com');
                $message->subject('Contact form submitted on domainname.com ');
            });*/

            return view('mixins');
        }catch(\Exception $e){

            $result = [
                'exception_message' => $e->getMessage()
            ];
            return view("errors.error", compact('result'));

        }
       
    }
}
