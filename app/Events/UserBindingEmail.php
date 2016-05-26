<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserBindingEmail extends Event
{
    use SerializesModels;


    public $email;
    public $user_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email,$user_id)
    {
        $this->email = $email;
        $this->user_id = $user_id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
