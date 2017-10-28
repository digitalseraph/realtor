<?php

namespace DigitalSeraph\Pages\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command
     *
     * @var string
     */
    protected $signature = 'seraph:pages:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install pages migrations, models, seeders, etc.';

     /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // get the console argument if it exists
        $model = $this->argument('model');
        // namespace the views for blade templating
        $this->laravel->view->addNamespace('guardian', __DIR__.'/../../views');

        // Build an array of the requested models
        if (in_array($model, $this->availableModels)) {
            // $modelsArray[$model] = $this->{$model . 'Model'};
            $modelsArray[$model] = $this->modelsArray[$model];
        } elseif ($model == 'all') {
            foreach ($this->availableModels as $model) {
                $modelsArray[$model] = $this->modelsArray[$model];
            }
        } else {
            $this->error("Invalid model name: ${model}");
            return false;
        }

        // Print out a list of the models
        $this->info("\nThe following model(s) will be generated:");

        foreach ($modelsArray as $data) {
            $this->comment("  - ${data['namespace']}");
        }

        // Get verification from the user
        if ($this->confirm("Proceed with the model(s) creation?", "Yes")) {
            // Loop through the array and create the models
            foreach ($modelsArray as $data) {
                $this->info("Creating ${data['model']} models...");
                if ($this->createModel($model)) {
                    $this->info("${model} model was successfully created!");
                } else {
                    $this->error("Couldn't create the ${model}  model.\n " .
                        "Check the write permissions within the app/ directory.");
                }
            }

            $this->line('');
        }
    }
}
