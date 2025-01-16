<?php


namespace App\Enums;


enum OrderStatusEnum: string
{

    case SAMOVIVOZ = '1';
    case MOSCOW = '2';
    case MOSCOW_OBL = '4';
    case MOSCOW_OBL_VOSTOK = '3';


    public function label(): array
    {
        return match ($this) {
            OrderDeliveryEnum::SAMOVIVOZ => [
                'name' => 'Самовывоз',
                'price' => 'Бесплатно',
                'description' => 'Самовывоз производится по адресу: 141100, Московская область, г.Щёлково, Пролетарский пр-т, д.10, ТД «Щелково», 5 этаж',
            ],
            OrderDeliveryEnum::MOSCOW => [
                'name' => 'Доставка в г. Москва (в пределах МКАД)',
                'price' => '2 500 руб.',
                'description' => 'Доставка осуществляется в пределах МКАД',
            ],
            OrderDeliveryEnum::MOSCOW_OBL_VOSTOK => [
                'name' =>'Доставка в Московскую область (восток)',
                'price' => '2 000 руб.',
                'description' => 'Доставка в го Щелково, го Балашиха, го Королев, г. Фрязино, г. Ивантеевка',
            ],
            OrderDeliveryEnum::MOSCOW_OBL => [
                'name' =>'Доставка в Московскую область',
                'price' => '2 000 руб.+ 100 руб. за километр.',
                'description' => 'Доставка осуществляется в пределах Московской области. Каждый километр от МКАД оплачиватся отдельно',
            ],
        };
    }

}