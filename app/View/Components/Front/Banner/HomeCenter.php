<?php

namespace App\View\Components\Front\Banner;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeCenter extends Component
{

    public function __construct(
        public string $block,
        public string $urlCurrent,
    )
    {
    }

    public function render(): View
    {
        $banners = \App\Models\Banner::withWhereHas('fotos')
            ->where('block', $this->block)
            ->where('target_url', $this->urlCurrent)
            ->public()
            ->get();

        return view('components.front.banner.home-center', compact('banners'));
    }

}
