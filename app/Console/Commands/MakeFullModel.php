<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeFullModel extends Command
{
    protected $signature = 'make:f-model {name}';
    protected $description = 'Generate model with resource and associated classes';

    public function handle()
    {
        $name = $this->argument('name');

        // Generate model with -a flag
        $this->call('make:model', ['name' => $name, '-m' => true, '-c' => true, '-r' => true, '-s' => true, '--policy' => true]);

        // Generate API resource
        $this->call('make:resource', ['name' => $name . 'Resource']);
        
        $this->call('make:request', [
            'name' => $name . "Requests/Index{$name}Request",
        ]);

        $this->call('make:request', [
            'name' => $name . "Requests/Store{$name}Request",
        ]);

        $this->call('make:request', [
            'name' => $name . "Requests/Update{$name}Request",
        ]);

        $this->info("Model, related classes, and API Resource generated successfully!");
    }
}
