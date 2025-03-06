<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Reservation;
use Carbon\Carbon;




class ReservationController extends Controller
{

    public function dashboard()
    {
        $reservations=Reservation::with('user')->get();


        return view('dashboardReservations',compact('reservations'));
    }


    public function getAvailableDates($id)
    {
        $annonce = Annonce::findOrFail($id);
    
        $availableFrom = max(now()->format('Y-m-d'), $annonce->available_from);
        $availableTo = $annonce->available_to;
    
        $reservations = Reservation::where('annonce_id', $id)
            ->select('from', 'to')
            ->get();
    
        $reservedDates = [];
        foreach ($reservations as $reservation) {
            $period = new \DatePeriod(

                new \DateTime($reservation->from),
                new \DateInterval('P1D'),
                (new \DateTime($reservation->to))->modify('+1 day')

            );

    
            foreach ($period as $date) {
                $reservedDates[] = $date->format('Y-m-d');
            }
        }

    
        return response()->json([
            'available_from' => $availableFrom,
            'available_to' => $availableTo,
            'reserved_dates' => $reservedDates
        ]);
    }

    public function completeReservation(Request $request)    
    {
        $annonce = Annonce::findOrFail($request->annonceId);
        // dd($annonce->price);
        // dd($request->from , $request->to);
        // dd($request->to);

        $fdate=$request->from;
        $tdate=$request->to;
    
        $start = Carbon::parse($fdate);
        $end =  Carbon::parse($tdate);
    
        $days = $start->diffInDays($end);
        // $days=date_diff($start,$end);

        $amount = $days*$annonce->price;
        // dd($amount,"$");
        $stripe_key = "pk_test_51QygIvHXDjlnm4V7I5GjcjzfDZidwPTzIxN1kVxhUnORwzsvCGmq5uHYWSEceCgL7wGUlNp4Y7K2euhKt8ymE4qJ00W1sgvz8u";
        // $stripe_key = config('services.stripe.key');
        // dd($stripe_key);

        return view('stripe', compact('days', 'start', 'end' ,'annonce' , 'amount' , 'stripe_key'));


    }

}
