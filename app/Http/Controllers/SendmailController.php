<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class SendmailController extends Controller
{
    public function sendMail(){
        //dd("sendMail");
        $details = [
            'title' => 'senmail success',
            'body' => 'conguarations'
        ];
        
        $contacts = Contacts::all();
        foreach($contacts as $contact){
            \Mail::to($contact->email)->send(new \App\Mail\Mail($details));
        }
        return redirect('index'); // chuyển vê trang chủ.
    }

    public function address1(){
        return view('address.index');
    }
}