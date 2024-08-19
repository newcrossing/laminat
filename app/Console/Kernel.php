<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // Log::info('Бекап сайта начинается');

        // бекап системы
        // $schedule->exec('/opt/php81/bin/php artisan backup:clean --disable-notifications')->dailyAt('21:03');
        $schedule->exec("cd  /var/www/localadmin/data/www/polrossii.ru/ && /opt/php81/bin/php artisan backup:run --only-files --disable-notifications")
            ->everyMinute()
            ->onFailure(function (Stringable $output) {
                Log::warning('Бекап сайта завершился с ошибкой'.$output);
            })
            ->onSuccess(function (Stringable $output) {
                Log::info('Бекап сайта завершился'.$output);
            });;

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
