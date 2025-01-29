<x-mail::message>
# Контакт

Сообщение получено через форму "Контакты"

__Имя:__ {{$validated['name']}}<br>
__Телефон:__ {{$validated['phone']}}<br>
__E-mail:__ {{$validated['email']}}<br>

<x-mail::panel>
__Сообщение:__<br>
    @if($validated['comment'])
        {{$validated['comment']}}
    @endif
</x-mail::panel>



С уважением, <br>
{{ config('app.name') }} - магазин напольных покрытий
</x-mail::message>
