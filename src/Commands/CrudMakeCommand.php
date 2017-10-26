<?php

namespace Gusman\L5Generator\Commands;

use Gusman\L5Generator\Generators\ControllerGenerator;
use Gusman\L5Generator\Generators\ModelGenerator;
use Gusman\L5Generator\Generators\TestGenerator;
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
        (new ControllerGenerator($this->name))->make();
        $this->info('Controller created successfully.');

        (new ModelGenerator($this->name))->make();
        $this->info('Model created successfully.');

        (new TestGenerator($this->name))->make();
        $this->info('Test created successfully.');

        $this->call('make:migration',[
            'name' => snake_case('create '. str_plural($this->name) . ' table')
        ]);
    }
}
