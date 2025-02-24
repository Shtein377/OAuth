<?php

namespace App\Http\Controllers;

use App\Enums\Email\EmailStatusEnum;
use App\Models\Email;
use App\Models\User;
use App\Notifications\Email\ConfirmEmailNotification;
use Closure;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(Request $request )
    {

        /** @var User */

        $user = $request->user();

        $email = Email::query()
            ->where('user_id', $user->id)
            ->where('status', EmailStatusEnum::pending)
            ->firstOrFail();

        if ($user->isEmailConfirmed()) {
            return redirect()->intended('/user');
        }
        return view('email.confirmation',compact('email'));
    }

    public function confirm(Request $request, Email $email)
    {
     

        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);
         
        // $validate = $request->validate([
        //     'code'=> 'required|string',
        //   ]);

          $validator = validator($request->only('code'),[
            'code'=>'required|string',
          ]);

          if ($validator->fails()) {

            return to_route('email.confirmation')
            ->withErrors(['code'=> $validator->errors()->first()])
            ->withInput();

          }



          if($email->code != $request->input('code')){
            return to_route('email.confirmation')
            ->withErrors(['code'=> 'Не верный код'])
            ->withInput();
          }

        $email->user->confirmEmail();
        $email->updateStatus(EmailStatusEnum::completed);


        return redirect()->intended('/user');
    }

    // public function code(Request $request, Email $email){
    //     abort_if($email->user->isEmailConfirmed(), 404);
    //     abort_unless($email->status->is(EmailStatusEnum::pending), 404);
    //      //check code

    //       $validate = $request->validate([
    //         'code'=> 'required|string',
    //       ]);

    //       if($email->code != $validate['code']){
    //         return to_route('email.confirmation')
    //         ->withErrors(['code'=> 'Не верный код'])
    //         ->withInput();
    //       }

          


    //     $email->user->confirmEmail();
    //     $email->updateStatus(EmailStatusEnum::completed);
    //     return redirect()->intended('/user');
    // }

    public function send(Email $email)
    {
        if (session('email-confirmation-sent')) {
            return back();
        }
        



        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

      

        $notification = new ConfirmEmailNotification($email);

        $email->user->notify($notification);

        session(['email-confirmation-sent' => now()]);

        return back();
    }
}
