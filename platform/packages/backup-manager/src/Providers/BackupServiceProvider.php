<?php

namespace Tungnt\BackupManager\Providers;
use Illuminate\Support\ServiceProvider;
class BackupServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'backup-manager-view');
    }
    public function register()
    {
        //
    }
}
