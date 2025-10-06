<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Language directive
        Blade::directive('lang', function ($expression) {
            return "<?php echo App\Helpers\LanguageHelper::getText($expression); ?>";
        });

        // Direction directive
        Blade::directive('dir', function () {
            return "<?php echo App\Helpers\LanguageHelper::getDirection(); ?>";
        });

        // Text alignment directive
        Blade::directive('textalign', function () {
            return "<?php echo App\Helpers\LanguageHelper::getTextAlign(); ?>";
        });

        // Language check directive
        Blade::directive('iflang', function ($expression) {
            return "<?php if(App\Helpers\LanguageHelper::getCurrentLanguage() === $expression): ?>";
        });

        Blade::directive('endlang', function () {
            return "<?php endif; ?>";
        });
    }
}
