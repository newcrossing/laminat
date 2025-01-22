<x-mail::message>
# Контакт

Сообщение получено через форму "Контакты"

__Имя:__ {{$validated['name']}}<br>
__Телефон:__ {{$validated['tel']}}<br>
__E-mail:__ {{$validated['email']}}<br>

<x-mail::panel>
__Сообщение:__<br>
{{$validated['comment']}}
</x-mail::panel>



С уважением, <br>
{{ config('app.name') }} - магазин напольных покрытий
</x-mail::message>
