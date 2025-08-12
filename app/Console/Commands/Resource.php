<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Resource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:resource {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        mkdir("./resources/views/pages/".lcfirst($this->argument('module')));
        fopen("./resources/views/pages/".lcfirst($this->argument('module'))."/index.blade.php", "w");


        $sourceFile = './resources/views/indextemplate.txt';
        $destinationFile = "./resources/views/pages/".lcfirst($this->argument('module'))."/index.blade.php";
        if (copy($sourceFile, $destinationFile)) {
            echo "File copied successfully.";
        } else {
            echo "Failed to copy the file.";
        }

        fopen("./resources/views/pages/".lcfirst($this->argument('module'))."/create.blade.php", "w");
        fopen("./resources/views/pages/".lcfirst($this->argument('module'))."/show.blade.php", "w");
        fopen("./resources/views/pages/".lcfirst($this->argument('module'))."/edit.blade.php", "w");
    }
}
