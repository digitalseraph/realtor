<?php

namespace DigitalSeraph\Pages;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use DigitalSeraph\Pages\Console\Command\ScanViewsForPagesCommand;

class PagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish config
        $this->publishes([
            __DIR__.'/../config/digitalseraph-pages.php' => config_path('digitalseraph-pages.php'),
        ], 'ds.pages.config');

        // load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'digitalseraph-pages');
        // publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/digitalseraph-pages'),
        ], 'ds.pages.views');

        // publish public assets
        // $this->publishes([
        //     __DIR__.'/path/to/assets' => public_path('vendor/courier'),
        // ], 'ds.pages.public');

        // register commands
        // $this->registerConsoleCommand();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // merge application config with package config
        $this->mergeConfigFrom(
            __DIR__.'/../config/digitalseraph-pages.php', 'digitalseraph-pages'
        );

        $config = $this->app->make('config');

        $this->publishMigrations();
        $this->publishModelFactories();
        $this->publishSeeders();
        $this->publishDb();

        $this->registerBladeDirective();

    }

    /**
     * Publish the package's migrations.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        if (class_exists('CreatePagesTables')) {
            return;
        }
        $timestamp = date('Y_m_d_His', time());
        $stub = __DIR__.'/../database/migrations/create_pages_tables.php';
        $target = $this->app->databasePath().'/migrations/'.$timestamp.'_create_pages_tables.php';
        $this->publishes([$stub => $target], 'ds.pages.migrations');
    }

    /**
     * Publish the package's model factories.
     *
     * @return void
     */
    protected function publishModelFactories()
    {
        $stub = __DIR__.'/../database/factories/PageFactory.php';
        $target = $this->app->databasePath().'/factories/PageFactory.php';
        $this->publishes([$stub => $target], 'ds.pages.factories');
    }

    /**
     * Publish the package's database seeders.
     *
     * @return void
     */
    protected function publishSeeders()
    {
        $stub = __DIR__.'/../database/seeds/PagesTableSeeder.php';
        $target = $this->app->databasePath().'/seeds/PagesTableSeeder.php';
        $this->publishes([$stub => $target], 'ds.pages.seeders');
    }

    /**
     * Publish the package's migrations, model factories, and seeders
     *
     * @return void
     */
    protected function publishDb()
    {
        $timestamp = date('Y_m_d_His', time());
        $migrationStub = __DIR__.'/../database/migrations/create_pages_tables.php';
        $migrationTarget = $this->app->databasePath().'/migrations/'.$timestamp.'_create_pages_tables.php';

        $modelFactoryStub = __DIR__.'/../database/factories/PageFactory.php';
        $modelFactoryTarget = $this->app->databasePath().'/factories/PageFactory.php';

        $seederStub = __DIR__.'/../database/seeds/PagesTableSeeder.php';
        $seederTarget = $this->app->databasePath().'/seeds/PagesTableSeeder.php';

        $this->publishes([
            $migrationStub => $migrationTarget,
            $modelFactoryStub => $modelFactoryTarget,
            $seederStub => $seederTarget,
        ], 'ds.pages.db');
    }



    private function registerConsoleCommand()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ScanViewsForPagesCommand::class
            ]);
        }
    }
    

    private function registerBladeDirective()
    {
        Blade::directive('page', function ($pageTitle) {
            return "<?php if (app('DigitalSeraph\\Pages\\Domain\\FeatureManager')->isActive($pageTitle)): ?>";
        });

        Blade::directive('endpage', function () {
            return '<?php endif; ?>';
        });
    }
}
