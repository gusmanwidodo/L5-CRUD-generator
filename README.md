#Laravel 5 CRUD Generator

##Usage
###Step 1: Install using composer
```
composer require gusman/l5-crud-generator --dev
```
###Step 2: Add service provider
```
public function register()
{
	if ($this->app->environment() == 'local') {
		$this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
	}
}
```
###Step 3: Run artisan command
```
php artisan make:crud {model name}
```
##Example
```
php artisan make:crud Sample
```