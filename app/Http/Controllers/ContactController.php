<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => 'Контакты']
        ];

        return view('front.pages.contact.index', compact('breadcrumbs'));
    }

    public function send_mail(StoreContactRequest $request)
    {
        $validated = $request->validated();

        Mail::to('newcrossing@gmail.com')->send(new Contact($validated));
        Log::info("Сообщение отправлено ");

        return redirect()->route('contact.index')->with('success', 'Сообщение отправлено. Спасибо за обращение.');
    }
}
