<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Twilio\Rest\Client;


class Notificaciones_transporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendsms()
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $sendernumer = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                        ->create("+591 65832613", // to
                                [
                                    "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
                                    "from" => $sendernumer
                                ]
                        );

                        dd("sucess");
    }
}


