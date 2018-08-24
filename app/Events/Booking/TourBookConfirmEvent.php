<?php

namespace App\Events\Booking;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\TourPackageBooking;
use App\TourPackage;

class TourBookConfirmEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $booking,$tour;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TourPackageBooking $booking,TourPackage $tour)
    {
        $this->booking = $booking;
        $this->tour = $tour;
    }

    
}