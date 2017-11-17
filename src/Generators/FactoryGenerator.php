<?php

namespace Gusman\L5Generator\Generators;

use Illuminate\Filesystem\Filesystem;

class FactoryGenerator
{
    protected $files;
    protected $name;
    protected $className;

    public function __construct($name)
    {
        $this->files = new Filesystem();
        $this->name = $name;
        $this->className = ucwords(camel_case($this->name . 'Factory'));
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
        return base_path() . '/database/factories/' . $this->className . '.php';
    }

    protected function compileTemplate()
    {
        $template = $this->files->get(__DIR__ . '/../templates/factory.tpl');

        $template = str_replace('{{class}}', ucwords(camel_case($this->name)), $template);

        return $template;
    }

}