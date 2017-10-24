<?php

namespace Gusman\L5Generator\Generators;

use Illuminate\Filesystem\Filesystem;

class ControllerGenerator
{
    protected $files;
    protected $name;
    protected $className;

    public function __construct($name)
    {
        $this->files = new Filesystem();
        $this->name = $name;
        $this->className = ucwords(camel_case($this->name . 'Controller'));
    }

    public function make()
    {
        $path = $this->getPath($this->name);

        $this->makeDirectory($path);

        $this->files->put($path, $this->compileTemplate());
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }

    protected function getPath()
    {
        return base_path() . '/app/Http/Controllers/' . $this->className . '.php';
    }

    protected function compileTemplate()
    {
        $template = $this->files->get(__DIR__ . '/../templates/controller.tpl');

        $template = str_replace('{{class}}', $this->className, $template);

        $template = str_replace('{{list}}', str_plural(camel_case($this->name)), $template);

        $template = str_replace('{{single}}', camel_case($this->name), $template);

        $template = str_replace('{{model}}', ucwords(camel_case($this->name)), $template);

        $template = str_replace('{{view}}', snake_case($this->name, '-'), $template);

        return $template;
    }

}