<?php

namespace Modules\Email\Http\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Leave\Entities\Leave;
class LeaveUserApprove extends Mailable
{
    use Queueable, SerializesModels;

    public $leave;


    public function __construct(Leave $leave)
    {
        $this->leave = $leave;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'),config('app.name'))
                ->view('email::leave.approve');
    }
}
