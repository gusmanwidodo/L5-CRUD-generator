<?php

namespace Gusman\L5Generator\Commands;

use Illuminate\Console\Command;

class CrudMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate CRUD resources';

    protected $name;

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
     * @return mixed
     */
    public function handle()
    {
        $this->name = $this->argument('name');

        $this->makeModule();
    }

    private function makeModule()
    {
        $this->call('make:model',[
            'name' => $this->name,
            '--migration' => 1,
            '--resource' => 1,
        ]);
    }
}
