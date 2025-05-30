<?php

namespace App\View\Components\Front\Sliders;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeMain2 extends Component
{
    public function render(): View
    {
        $sliders = \App\Models\Slider::with('fotos')->where('public', true)->get();
        return view('components.front.sliders.home-main2', compact('sliders'));
    }
}
