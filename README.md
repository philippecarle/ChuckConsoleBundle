# ChuckConsoleBundle
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0f9a6eb3-4979-4768-bf41-3e5389c3a60d/big.png)](https://insight.sensiolabs.com/projects/0f9a6eb3-4979-4768-bf41-3e5389c3a60d)

[![Latest Stable Version](https://poser.pugx.org/kk/chuck-command/v/stable)](https://packagist.org/packages/kk/chuck-command) [![Total Downloads](https://poser.pugx.org/kk/chuck-command/downloads)](https://packagist.org/packages/kk/chuck-command) [![Latest Unstable Version](https://poser.pugx.org/kk/chuck-command/v/unstable)](https://packagist.org/packages/kk/chuck-command) [![License](https://poser.pugx.org/kk/chuck-command/license)](https://packagist.org/packages/kk/chuck-command)

[![knpbundles.com](http://knpbundles.com/KodingKittens/ChuckConsoleBundle/badge-short)](http://knpbundles.com/KodingKittens/ChuckConsoleBundle)

Simple and stupid Symfony2 Bundle displaying a random Chuck Norris fact after every console command.

<img src="http://4.bp.blogspot.com/-3frZS2Q5h94/VQg-0h2ALBI/AAAAAAAAEfc/i6vyhIUH_mo/s1600/chuck-norris.jpg" alt="Chuck Norris Rules" border="0">

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

##Usage
As simple as using any app/console command.
![Screenshot of ChuckConsoleBundle](https://pbs.twimg.com/media/CC-t99KWAAEH5Gy.png:large)

##Customization in config.yml file :
```yml
kk_labs_chuck_console:
    who:
        first_name: "Your first name"
        last_name: "Your last name"
```

##API Credit
API Credit goes to [The Internet Chuck Norris Database](http://www.icndb.com/api/)
