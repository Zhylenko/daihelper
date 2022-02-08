<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\DaiService;

class ExamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Exam', function () {
            return new DaiService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
