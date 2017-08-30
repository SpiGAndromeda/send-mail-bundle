SendMailBundle
=====

[![License](https://poser.pugx.org/spigandromeda/send-mail-bundle/license)](https://packagist.org/packages/spigandromeda/send-mail-bundle)
[![Total Downloads](https://poser.pugx.org/spigandromeda/send-mail-bundle/downloads)](https://packagist.org/packages/spigandromeda/send-mail-bundle)

Usage Example
-------------

``` php
$message = (new \Swift_Message('title'))
    ->setFrom(array('example@domain.de' => 'Full Name'))
    ->setTo('recipent@other-domain.de')
    ->setBody(
        $this->renderView('Mail/mail_template.html.twig'),
        'text/plain'
    );
                
$this->getContainer()->get('spigandromeda.send_mail_service')->sendMail($message);
```

Configuration config.yml example
-------------


``` yml
send_mail:
    host:               "imap.hoster.de"
    port:               "993"
    encryption:         "tls"
    sent_items_folder:  "Sent Items"
    login:              "example@domain.de"
    password:           "secret"
```

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