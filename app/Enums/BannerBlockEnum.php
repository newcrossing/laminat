<?php


namespace App\Enums;


enum BannerBlockEnum: string
{
    case MAIN_CENTER = 'main-center';
    case MAIN_LEFT = 'main-left';
    case MAIN_RIGHT = 'main-right';
    case TYPE = 'type';

    public function name(): string
    {
        return match ($this) {
            BannerBlockEnum::MAIN_CENTER => 'На главной в центре',
            BannerBlockEnum::MAIN_LEFT => 'На главной слева',
            BannerBlockEnum::MAIN_RIGHT => 'На главной справа',
            BannerBlockEnum::TYPE => 'В типе продукции',
        };
    }

}