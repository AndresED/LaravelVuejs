<?php

namespace App\Events;

use App\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FireComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	/**
	 * @var Comment
	 */
	public $comment;

	/**
	 * @var \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public $user;

	/**
	 * FireComment constructor.
	 *
	 * @param Comment $comment
	 */
    public function __construct(Comment $comment)
    {
	    $this->comment = $comment;
	    $this->user = auth()->user();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('comments.'.$this->comment->post_id);
    }
}
