<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Annonce;
use App\Models\User;


use Illuminate\Support\Facades\Notification;
use App\Notifications\AnnonceReserved;

use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;


class PaymentController extends Controller
{
    public function store(Request $request)
    {

        // dd($request->stripeToken);

        $stripe = new \Stripe\StripeClient("sk_test_51QygIvHXDjlnm4V75ZzjEhKKVjrCynCvbLT6X7ymRrRfPzOfk0aODhRv9B3g2pGxDsk6pNfiQOm6sosZmXmYtngf00AHD8sb9V");


         $charge=$stripe->charges->create([
          'amount' => $request->amount* 100,
          'currency' => 'usd',
          'source' => $request->stripeToken,
          'description' => ' we are in the way to do it '
        ]);
       


         $reservation =Reservation::create([
            'to' => $request->end_date,
            'from' => $request->start_date,
            'annonce_id' => $request->annonce_id,
            'amount' => $request->amount,
            'user_id' => auth()->id()
        ]);

        // dd($dd);

        Mail::to(auth()->user()->email)->send(new PaymentConfirmation(
            $request->amount * 100, 
            $request->days,
            $request->start_date,
            $request->end_date
        ));

        $annonce = Annonce::findOrFail($request->annonce_id);
        $owner = User::find($annonce->owner->id);
        $owner->notify(new AnnonceReserved($reservation));
        auth()->user()->notify(new AnnonceReserved($reservation));

        return redirect(auth()->user()->redirectTo());

        // return redirect('/touriste');
        

    }
}
