<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Ticket;
use App\Mail\TicketReply;
use App\Mail\TicketCreate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\TicketResource;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\Request as FRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = FRequest::get('count');
        return Inertia::render('Ticket/index',[
            'items' => TicketResource::collection(Ticket::filter(FRequest::all())->paginate($count)),
            'form_filters' => FRequest::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $value = FRequest::get('search');

        $ticket = Ticket::where('ref_number',$value)->first();

        if($ticket){
            return Inertia::render('Home/ShowTicket',[
                "item" => $ticket,
                "replies" => $ticket->replies
            ]);
        }else{
            return redirect()->route('home')->withErrors('Ticket Not Found!', $key="search");
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $referenceNumber = time() . Str::random(10);;

        $ticket = Ticket::create([
            ...$request->validated(),
            "ref_number" => $referenceNumber
        ]);

        //Send Mail
        $email = new TicketCreate([
            "name" => $ticket->customer_name,
            "ref_number" => $referenceNumber,
        ]);

        Mail::to($ticket->email)
            ->send($email);

        return redirect()->route('tickets.feedback',$ticket->id)->with('success', 'Successfully Add Ticket');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket->update([ "is_opened" => true]);

        return Inertia::render('Ticket/TicketView',[
            "item" => $ticket,
            "replies" => $ticket->replies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $message = $request->message;

        // Update Ticket State
        $ticket->update([
            "status" => "checked"
        ]);

        // Save Reply
        $ticket->replies()->create([
            "message" => $message,
            "user_id" => auth()->id()
        ]);

        //Send Mail
        $email = new TicketReply([
            "message" => $message,
            "name" => $ticket->customer_name,
            "ref_number" => $ticket->ref_number,
        ]);

        Mail::to($ticket->email)
            ->send($email);

        return redirect()->route('dashboard')->with('success', 'Successfully Updated Ticket');
    }


    public function feedback(Ticket $ticket)
    {
        return Inertia::render('Home/FeedBack',[
            "item" => $ticket,
        ]);
    }
}
