<?php

namespace Modules\Email\Http\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Email\Entities\Email;
class LeaveRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $email;


    public function __construct(Email $email)
    {
        $this->email = $email;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'),config('app.name'))
                ->view('email::leave.index');
    }
}
