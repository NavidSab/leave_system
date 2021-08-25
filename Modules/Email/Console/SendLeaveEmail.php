<?php
namespace Modules\Email\Console;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Mail;
use Modules\Email\Entities\Email;
use Modules\Leave\Entities\Leave;
use Modules\Email\Http\Mail\LeaveRequest;
use Modules\Email\Http\Mail\LeaveUserApprove;

class SendLeaveEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:leave';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check For Sending Leave Email To Department Head .';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $i=0;
        $email=Email::where('is_send',0)->get();
         foreach($email as $emails){
             if($emails->type =='head'){
                Mail::to($emails->email)->send(new LeaveRequest($emails));
                if (Mail::failures()) {die();};
                    $emails->is_send=1;
                    $emails->save();
                }            
                
                if($emails->type =='admin'){
                    $head_user=Email::where(['leave_id'=>$emails->leave_id,'type'=>'head'])->get();
                    foreach( $head_user as $user){
                        if($user->is_confirme =='1'){
                            $i++;
                        }
                    }
                    if($head_user->count() == $i){
                    Mail::to($emails->email)->send(new LeaveRequest($emails));
                    if (Mail::failures()) {die();};
                        $emails->is_send=1;
                        $emails->save();
                    
                    }
               }
            }
            $leave=Leave::where('admin_confirmed',0)->get();
            foreach($leave as $leaves){
                $email=Email::where(['leave_id'=>$leaves->id,'type'=>'admin','is_confirme'=>1])->get();
                if($email->count() > 0){
                    $leaves->admin_confirmed=1;
                    $leaves->save();
                    Mail::to($leaves->user->email)->send(new LeaveUserApprove($leaves));
                        if (Mail::failures()) {die();};
                    
                }
                $email=Email::where(['leave_id'=>$leaves->id,'type'=>'admin','is_confirme'=>2])->get();
                if($email->count() > 0){
                    if (Mail::failures()) {die();};
                    $leaves->admin_confirmed=2;
                    $leaves->save();
                    Mail::to($leaves->user->email)->send(new LeaveUserApprove($leaves));                    
                }
            }
    }
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}