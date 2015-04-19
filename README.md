# ChuckConsoleBundle
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0f9a6eb3-4979-4768-bf41-3e5389c3a60d/big.png)](https://insight.sensiolabs.com/projects/0f9a6eb3-4979-4768-bf41-3e5389c3a60d)
[![Latest Stable Version](https://poser.pugx.org/kk/chuck-command/v/stable.svg)](https://packagist.org/packages/kk/chuck-command) [![Total Downloads](https://poser.pugx.org/kk/chuck-command/downloads.svg)](https://packagist.org/packages/kk/chuck-command) [![Latest Unstable Version](https://poser.pugx.org/kk/chuck-command/v/unstable.svg)](https://packagist.org/packages/kk/chuck-command) [![License](https://poser.pugx.org/kk/chuck-command/license.svg)](https://packagist.org/packages/kk/chuck-command)

Simple and stupid Symfony2 Bundle displaying a random Chuck Norris fact for every console command.

##Installation

just run :
```bash
composer require kk/chuck-command
composer update
```

and register the bundle in your app/AppKernel.php :

```php
// app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new KK\Labs\ChuckConsoleBundle\KKLabsChuckConsoleBundle(),
        );

        // ...
    }
}
```


##Customization in config.yml file :
```yml
kk_labs_chuck_console:
    who:
        first_name: "Your first name"
        last_name: "Your last name"
```

##API Credit
API Credit goes to [The Internet Chuck Norris Database](http://www.icndb.com/api/)
