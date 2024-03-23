<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProductRecommendation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    /**
     * The console command description.
     *
     * @var string
     */


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
     * @return int
     */

    protected $signature = 'recommendation:products';

    protected $description = 'Get recommended products for users';

    public function handle()
    {


        // Python script path
        $pythonScript = storage_path('app/recommendation.py');

        // Execute the Python script
        exec("python $pythonScript 2>&1", $output);

        // Output the results
        $this->info(implode(PHP_EOL, $output));
    }
}
