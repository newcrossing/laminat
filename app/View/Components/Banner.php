<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner extends Component
{
    /**
     * Создать экземпляр компонента.
     */
    public function __construct(
        public string $block,
        public string $urlCurrent,
    ) {}

    public function render(): View
    {
        $banners = \App\Models\Banner::withWhereHas('fotos')
            ->where('block',$this->block)
            ->where('target_url',$this->urlCurrent)
            ->public()
            ->get();

        return view('components.banner', compact('banners'));
    }
}
