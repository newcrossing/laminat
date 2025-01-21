<?php


namespace App\Enums;


enum OrderStatusEnum: string
{

    case NEW_1 = '1';
    case PROCESSED_2 = '2';
    case ASSEMBLED_3 = '3';
    case SHIPPED_4 = '4';
    case DONE_5 = '5';
    case CANCEL_6 = '6';
    case RETURN_7 = '7';


    public function name(): string
    {
        return match ($this) {
            OrderStatusEnum::NEW_1 => 'Новый',
            OrderStatusEnum::PROCESSED_2 => 'Обработка',
            OrderStatusEnum::ASSEMBLED_3 => 'Собран',
            OrderStatusEnum::SHIPPED_4 => 'Отправлен',
            OrderStatusEnum::DONE_5 => 'Выполнен',
            OrderStatusEnum::CANCEL_6 => 'Отменен',
            OrderStatusEnum::RETURN_7 => 'Возврат',
        };
    }
    public function color(): string
    {
        return match ($this) {
            OrderStatusEnum::NEW_1 => 'badge-light-success',
            OrderStatusEnum::PROCESSED_2 => 'badge-light-primary',
            OrderStatusEnum::ASSEMBLED_3 => 'badge-light-secondary',
            OrderStatusEnum::SHIPPED_4 => 'badge-light-info',
            OrderStatusEnum::DONE_5 => 'badge-light-success',
            OrderStatusEnum::CANCEL_6 => 'badge-light-warning',
            OrderStatusEnum::RETURN_7 => 'badge-light-danger',
        };
    }

}