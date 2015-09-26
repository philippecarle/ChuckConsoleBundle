# ChuckConsoleBundle
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0f9a6eb3-4979-4768-bf41-3e5389c3a60d/big.png)](https://insight.sensiolabs.com/projects/0f9a6eb3-4979-4768-bf41-3e5389c3a60d)

[![Latest Stable Version](https://poser.pugx.org/kk/chuck-command/v/stable)](https://packagist.org/packages/kk/chuck-command) [![Total Downloads](https://poser.pugx.org/kk/chuck-command/downloads)](https://packagist.org/packages/kk/chuck-command) [![Latest Unstable Version](https://poser.pugx.org/kk/chuck-command/v/unstable)](https://packagist.org/packages/kk/chuck-command) [![License](https://poser.pugx.org/kk/chuck-command/license)](https://packagist.org/packages/kk/chuck-command)

[![knpbundles.com](http://knpbundles.com/KodingKittens/ChuckConsoleBundle/badge-short)](http://knpbundles.com/KodingKittens/ChuckConsoleBundle)

Simple and stupid Symfony2 Bundle displaying a random Chuck Norris fact after every console command.

<img src="http://4.bp.blogspot.com/-3frZS2Q5h94/VQg-0h2ALBI/AAAAAAAAEfc/i6vyhIUH_mo/s1600/chuck-norris.jpg" alt="Chuck Norris Rules" border="0">

##NEW

version 0.2 :

* Guzzle 6 implementation
* chuck:fact console command to get a fact whenever you need one

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

In case of emergency, can also get a fact when you really need one :

```bash
app/console chuck:fact
#output : Fact: Chuck Norris doesn't consider it sex if the woman survives.
app/console chuck:fact Your boss
#output : Fact: Your boss doesn't consider it sex if the woman survives.
```

##Customization in config.yml file :
```yml
kk_labs_chuck_console:
    who:
        #your first name or anyone's first name
        first_name: "Your first name"
        #your last name or anyone's last name
        last_name: "Your last name"
    #after n seconds, don't wait for response from Chuck API
    timeout: 5
```

##API Credit
API Credit goes to [The Internet Chuck Norris Database](http://www.icndb.com/api/)
