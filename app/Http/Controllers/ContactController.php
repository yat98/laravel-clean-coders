<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request) 
    {
        $request->storeContactFormDetails();

        dispatch(function () {
            Mail::to('mail@laravel.co.id')->send(
                new ContactFormSubmission()
            );
        })->afterResponse();

        return response()->json(['success' => true]);
    }
}
