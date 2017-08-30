ImapBundle
=====
[![License](https://poser.pugx.org/spigandromeda/send-mail-bundle/license.png)](https://packagist.org/packages/spigandromeda/send-mail-bundle)
[![Total Downloads](https://poser.pugx.org/webeith/send-mail-bundle/downloads.png)](https://packagist.org/packages/spigandromeda/send-mail-bundle)

Usage Example
-------------

Configuration config.yml example
-------------

## Installation

### Install via Composer

Add the following lines to your `composer.json` file and then run `php composer.phar install` or `php composer.phar update`:

```json
{
    "require": {
        "spigandromeda/send-mail-bundle": "dev-master"
    }
}
```

### Register the bundle

To start using the bundle, register it in `app/AppKernel.php`:

```php
public function registerBundles()
{
    $bundles = array(
        // Other bundles...
        new SpiGAndromeda\SendMailBundle\SendMailBundle(),
    );
}
```