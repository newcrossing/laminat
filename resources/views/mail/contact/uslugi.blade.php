<x-mail::message>
# Услуги

Сообщение получено через форму "Услуги"

__Имя:__ {{$validated['name']}}<br>
__Телефон:__ {{$validated['phone']}}<br>
__E-mail:__ {{$validated['email']}}<br>
__Услуги:__<br>
@foreach($validated['uslugi'] as $uslugi)
[x] {{ App\Enums\UslugiEnum::from($uslugi)->name()}}<br>
@endforeach

<x-mail::panel>
__Сообщение:__<br>
    @if($validated['comment'])
        {{$validated['comment']}}
    @endif
</x-mail::panel>



С уважением, <br>
{{ config('app.name') }} - магазин напольных покрытий
</x-mail::message>
