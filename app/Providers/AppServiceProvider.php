<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use Blade;
use Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Log::useFiles('php://stdout', 'info');

        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money); ?>";
        });

        Blade::directive('avatarIfExist', function ($id) {
           
            return "<?php if(isset(".$id.')) { echo e(url("/lbmediacenter/"))."/".'.$id.';} else { echo e(asset("/uploads/avatar/default.png"));} ?>';
            
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if ($this->app->environment() !== 'production') {
        // }
        // echo base_path();exit();
        // app()->useEnvironmentPath(base_path());
        // $this->app->useEnvironmentPath(base_path() . '/public_html/');
        // Artisan::call('config:cache');
        // echo "1";exit();
    }
}
