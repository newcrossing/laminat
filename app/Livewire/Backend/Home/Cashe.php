<?php

namespace App\Livewire\Backend\Home;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Cashe extends Component
{
    public $clear = null;

    public function clearAll()
    {
        try {
            Cache::flush();
            Log::info('Кеш очищен');
            $this->clear = true;
        } catch (Exception  $e) {
            Log::error('Ошибка очистки кеша', [$e]);
            $this->clear = false;
        }

    }

    public function render()
    {
        return view('livewire.backend.home.cashe');
    }
}
