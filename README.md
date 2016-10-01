# Lemming Giphy

A plugin command, to the [Lemming the Discord Bot](https://github.com/1337m/lemming).

## Installation

This plugin, can be simply installed with the `composer` package.

```
composer require 1337m/lemming-giphy
```

Once, plugin is one of our dependencies, 
you can register it by referencing our library, 
in the `config/commands.php` in your package.

Like so:

```php
<?php

return [

    // Register Giphy plugin.
    'gif' => [
        'action' => Lemming\Giphy\Command::class
    ],

];
```

In order for the plugin to work for you, 
go to the [GiphyAPI](https://github.com/Giphy/GiphyAPI#request-a-production-key) and request a new key; 
or use the public API key: `dc6zaTOxFJmzC`.

Once you obtain the key you'd like to use, make sure to add it to your `.env` file, 
so lemming can authorise the API.

```
GIPHY_API_KEY=dc6zaTOxFJmzC
```

## Licence

Lemming and it's official plugins are open-sourced software licensed under the 
[MIT license](http://opensource.org/licenses/MIT).
