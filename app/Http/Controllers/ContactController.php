<?php

namespace App\Http\Controllers;

use App\Enums\UslugiEnum;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreUslugiRequest;
use App\Mail\Contact;
use App\Mail\Uslugi;
use App\Models\User;
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

        Mail::to(User::adminUsers()->get())->send(new Contact($validated));
        Log::info("Сообщение отправлено", $validated);

        return redirect()->route('contact.index')->with('success', 'Сообщение отправлено. Спасибо за обращение.');
    }

    public function uslugi()
    {
        $breadcrumbs = [
            ['link' => route('home'), 'name' => "Главная"],
            ['name' => 'Услуги']
        ];

       // dd(UslugiEnum::from('1')->name());

        return view('front.pages.uslugi.index', compact('breadcrumbs'));
    }
    public function uslugi_send(StoreUslugiRequest $request)
    {
        $validated = $request->validated();


        Mail::to(User::adminUsers()->get())->send(new Uslugi($validated));
        Log::info("Форма УСЛУГИ. Сообщение отправлено", $validated);

        return redirect()->route('uslugi.index')->with('success', 'Сообщение отправлено. Спасибо за обращение.');
    }
}
