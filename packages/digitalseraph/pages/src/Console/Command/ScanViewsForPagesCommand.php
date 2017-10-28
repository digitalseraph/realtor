<?php

namespace DigitalSeraph\Pages\Console\Command;

use Illuminate\Console\Command;

class ScanViewsForPagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pages:scan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan project views to find new pages.';


    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $areEnabledByDefault = config('pages.scanned_default_enabled');

        $this->getOutput()->writeln('');

        if (count($pages) === 0) {
            $this->error('No pages were found in the project views!');
            $this->getOutput()->writeln('');
            return;
        }

        $this->info(count($pages) . ' pages found in views:');
        $this->getOutput()->writeln('');

        foreach ($pages as $page) {
            $this->getOutput()->writeln('- ' . $page);
        }

        $this->getOutput()->writeln('');
        $this->info('All the new pages were added to the database with the '
            . ($areEnabledByDefault ? 'ENABLED' : 'disabled') .
            ' status by default. Nothing changed for the already present ones.');

        $this->getOutput()->writeln('');
    }
}
