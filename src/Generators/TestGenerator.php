<?php

namespace Gusman\L5Generator\Generators;

use Illuminate\Filesystem\Filesystem;

class TestGenerator
{
    protected $files;
    protected $name;
    protected $className;

    public function __construct($name)
    {
        $this->files = new Filesystem();
        $this->name = $name;
        $this->className = ucwords(camel_case($this->name));
    }

    public function make()
    {
        $createPath = base_path() . '/tests/Feature/Create' . $this->className . 'Test.php';
        $readPath = base_path() . '/tests/Feature/Read' . $this->className . 'Test.php';
        $updatePath = base_path() . '/tests/Feature/Update' . $this->className . 'Test.php';
        $deletePath = base_path() . '/tests/Feature/Delete' . $this->className . 'Test.php';

        $this->makeDirectory($createPath);
        $this->makeDirectory($readPath);
        $this->makeDirectory($updatePath);
        $this->makeDirectory($deletePath);

        $this->files->put($createPath, $this->compileTemplate('Create' . $this->className . 'Test', 'create'));
        $this->files->put($readPath, $this->compileTemplate('Read' . $this->className . 'Test', 'read'));
        $this->files->put($updatePath, $this->compileTemplate('Update' . $this->className . 'Test', 'update'));
        $this->files->put($deletePath, $this->compileTemplate('Delete' . $this->className . 'Test', 'delete'));
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }

    protected function compileTemplate($name, $type)
    {
        $template = $this->files->get(__DIR__ . '/../templates/test-'. $type .'.tpl');

        $template = str_replace('{{class}}', $name, $template);

        return $template;
    }

}