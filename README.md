# Datastar PHP

A set of PHP helper classes for working with [Datastar](https://data-star.dev/), with zero package dependencies.

## License

This plugin is licensed for free under the MIT License.

## Requirements

This plugin requires Datastar 0.19.0 or later and PHP 8.0.0 or later.

## Installation

Install using composer or download and require the classes manually.

```shell
composer require putyourlightson/datastar-php
```

## Usage

### Datastar Event Class

```php
use putyourlightson\datastar\events\FragmentEvent;
use putyourlightson\datastar\events\SignalEvent;
use putyourlightson\datastar\events\DeleteEvent;
use putyourlightson\datastar\events\RedirectEvent;
use putyourlightson\datastar\events\ConsoleEvent;

$event = new FragmentEvent([
    'type' => 'fragment',
    'content' => '<div id="primary">New content</div>',
    // Optional
    'id' => 1,
    'selector' => '#secondary',
    'merge' => 'morph',
    'settle' => '100',
    'vt' => 'false',
]);

$event = new SignalEvent([
    'store' => '{foo: "bar"}',
    // Optional
    'id' => 1,
    'ifmissing' => 'true',
]);

$event = new DeleteEvent([
    'selector' => '#primary',
    // Optional
    'id' => 1,
]);

$event = new RedirectEvent([
    'content' => '/new-url',
    // Optional
    'id' => 1,
]);

$event = new ConsoleEvent([
    
    'content' => 'log Hello world',
    // Optional
    'id' => 1,
]);

// Returns the output of the Datastar event.
$output = $event->getOutput();
```

### Datastar Response Class

```php
use putyourlightson\datastar\DatastarResponse;

$response = new DatastarResponse();

// Sends Datastar events to the browser.
$response->sendEvent($event1);
$response->sendEvent($event2);
$response->sendEvent($event3);

// Ends the response and closes the connection.
$response->end();
```

---

Created by [PutYourLightsOn](https://putyourlightson.com/).
