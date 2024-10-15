# Datastar PHP

A set of PHP helper classes for working with Datastar with zero dependencies.

## License

This plugin is licensed for free under the MIT License.

## Requirements

This plugin requires PHP 8.0.0 or later.

## Installation

Install using composer.

```shell
composer require putyourlightson/datastar-php
```

## Usage

### Datastar Event Class

```php
use putyourlightson\datastar\DatastarEvent;

$event = new DatastarEvent([
    'id' => 1,
    'type' => 'fragment',
    'content' => '<div id="primary">New content</div>',
]);

// Optional
$event->selector = '#secondary';
$event->merge = 'morph_element';
$event->settle = '100';
$event->vt = 'false';

// Returns the output of the Datastar event.
$output = $event->getOutput();
```

### Datastar Response Class

```php
use putyourlightson\datastar\DatastarResponse;

$response = new DatastarResponse();

// Sends the Datastar event output to the browser.
$response->sendEvent($event);
```

---

Created by [PutYourLightsOn](https://putyourlightson.com/).
