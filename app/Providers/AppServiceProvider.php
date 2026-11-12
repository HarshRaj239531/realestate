<?php

namespace App\Providers;

use App\Models\SiteImage;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('site_settings')) {
                    $settings = SiteSetting::query()->pluck('value', 'key')->toArray();
                    $view->with('siteSettings', $settings);
                } else {
                    $view->with('siteSettings', []);
                }

                if (Schema::hasTable('site_images')) {
                    $images = SiteImage::query()->get()->keyBy('section_key');
                    $view->with('siteImages', $images);
                } else {
                    $view->with('siteImages', collect());
                }
            } catch (\Throwable $e) {
                $view->with('siteSettings', []);
                $view->with('siteImages', collect());
            }
        });
    }
}
