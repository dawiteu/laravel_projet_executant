<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterSender;
use App\Models\EmailNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request){ 
        //dd($request->email); 
        $request->validate(["email" => "unique:newsletter"]);

        $emnw = new EmailNewsletter(); 

        $emnw->email = $request->email; 

        if($emnw->save()){
            Mail::to($request->email)->send(new NewsletterSender($request));
        }

        return redirect()->route('home')->with('success', 'Email enregistrer'); 
    }

    public function destroy(EmailNewsletter $email){ 
        $email->delete();
        return redirect()->route('home')->with('success', 'Email supprimer du newsletter!'); 
    }
}
