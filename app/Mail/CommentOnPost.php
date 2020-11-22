<?php

namespace App\Mail;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentOnPost extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Post $post)
    {
        $this -> comment = $comment;
        $this -> post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.commentAdded');
    }
}
