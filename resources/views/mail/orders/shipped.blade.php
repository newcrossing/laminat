<x-mail::message>
# Оформлен заказ на сайте

__Номер заказа:__ {{$arrayOrder['numder']}}<br>
__Имя:__ {{$validated['name']}}<br>
__Телефон:__ {{$validated['tel']}}<br>
__E-mail:__ {{$validated['email']}}<br>
__Адрес доставки:__ {{$validated['delivery_address']}}<br>

@if($validated['comment'])
<x-mail::panel>
__Комментарий:__<br>
     {{$validated['comment']}}
</x-mail::panel>
@endif

@component('mail::table')
        | Товар           |  Количество  | Сумма       |
        | ----------------| :-----------:|------------:|
        @foreach($array as $arr)
              | {{$arr['name']}} | {{$arr['count']}} | {{Number::format($arr['summa'])}} |
        @endforeach
        |    |   __итог__  | __{{Number::format($arrayOrder['price_total'])}}__ |
@endcomponent

С уважением,<br>
{{ config('app.name') }}
</x-mail::message>
