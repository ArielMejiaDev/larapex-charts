# Laravel Package Boilerplate
Boilerplate for Laravel packages

## Install dependencies

```php
cd packagesfolder
cd packagefoldername
composer install
```

## Create a Laravel project tester

Add on Laravel tester project on composer.json at the end of the object:

```json
    "repositories": [
        {
            "type": "path",
            "url": "../packages/package-dir-name"
        }
    ]
```

the url is a relative path from tester project to package in packages folder, then add your package with:

```
composer require theNameOfYourPackageFromComposerJsonFileOfYourPackage
```

* The composer package names are compound by vendor/package-name, usually vendor is a company or the developer that creates the package, another good recomendation is to handle the package-name exactly as the folder of the package, and in PSR-4 and extra properties in composer.json file add the same name but with namespace standard, example:

```
name: 'arielmejiadev/cool-package'
namespace: ArielMejiaDev\\CoolPackage

```

* any doubt go to composer.json of this repo

And run 

```php
composer require package-name-with-namespace
```

everytime "the package" update the composer.json file It will be necesary to update the tester project

```php
composer update
```

If the package need to run or re-run a publish vendor files, you can force the vendor publish:

```php
php artisan vendor:publish --force
```

## Re use the boilerplate

- Go to all files and change the namespace for vendor\package-name
- Copy route service provider and package service provider and change as you need
- Go to composer.json file and change the psr-4 autoload property, the test property, and extra property with new namespace.
- Go to Facades folder and change the name of the facade by the class or classes you will use, (if you need more than one class add as facades as you need)
- Go to src/ and copy Hello.php and rename all the classes you will need.
- If you will need routes, views, migrations, or config file, go to this files and change the files as your need.
- remember to publish all routes, views, migrations or config files in the new package service provider.
- go to console and type:

```
composer dump
```
- add your package to a test laravel project, go project composer.json file and add the repositories property as a last item inside the object, go to your relative path to your package, in this case you will go one level out to "projects folder" then go inside packages folder and lastly inside package-name folder

```json
    "repositories": [
        {
            "type": "path",
            "url": "../packages/package-dir-name"
        }
    ]
```

- start to use your package inside you Laravel test project.

## testing 

To test any class directly, it works a little bit different from a laravel project, you need to add the file path as a flag

```
vendor/bin/phpunit tests/Feature/ClassName
vendor/bin/phpunit test/Unit/ClassName
```

This option is deprecated but still runs, another way is by adding testsuite flag to test a complete testsuite directly

```
vendor/bin/phpunit --testsuite Feature Tests
vendor/bin/phpunit --testsuite Unit Tests
```

Or run all tests directly

```
vendor/bin/phpunit Tests
```

## Deploy the package

Just add a github repo, add changes then go to packagist and submit the package then go to the laravel project to test the package,
to test the package on production is necessary to remove the local package from composer:

  - Delete the repositories property of the object from composer.json file
  - run composer remove command
  
 ```php
 composer remove arielmejiadev/package-name
 ```
