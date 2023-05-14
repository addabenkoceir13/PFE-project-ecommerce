<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContectController extends Controller
{
    public function sendEmailSupplier(Request $request)
    {
        $request->validate([
            'fname'   => 'required',
            'lname'   => 'required',
            'phone'   => 'required',
            'email'   => 'required|email',
            'message' => 'required',
            'subject' => 'required'

        ]);

        if ($this->isInternetConnected())
        {
            $mail_data = [
                'recipient'  => 'addamohamed099@gmail.com',
                'fromEmail'  => $request->email,
                'fromName'   => $request->name,
                'subject'    => $request->subject,
                'body'       => $request->message,
            ];
            Mail::send('email-template', $mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['FromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('status', 'Email Send Successfull');
            // return redirect('suppliers')->with("status", "Connected ");
        }
        else
        {
            // return "No Connecteed";
            return redirect()->back()->withInput()->with("statuserroe", "Check your internet Connection ");
            // return redirect('suppliers')->with("statuserroe", "No Connecteed ");

        }

    }

    public  function isInternetConnected()
    {
        $connected = false;
        $headers = @get_headers("https://www.google.com");
        if ($headers && strpos($headers[0], '200') !== false) {
            $connected = true;
        }
        return $connected;
    }

    public function sendEmail()
    {
        // Inside your controller or other code
        $subject = 'Subject of email';
        $message = 'Body of email';
        $recipient = 'addamohamed67@gmail.com';

        $mail = new TestMail($subject, $message);
        Mail::to($recipient)->send($mail);
            }
}
