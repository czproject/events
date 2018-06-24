
# CzProject\Events

[![Build Status](https://travis-ci.org/czproject/events.svg?branch=master)](https://travis-ci.org/czproject/events)

Events manager.

<a href="https://www.patreon.com/bePatron?u=9680759"><img src="https://c5.patreon.com/external/logo/become_a_patron_button.png" alt="Become a Patron!" height="35"></a>
<a href="https://www.paypal.me/janpecha/1eur"><img src="https://buymecoffee.intm.org/img/button-paypal-white.png" alt="Buy me a coffee" height="35"></a>


## Installation

[Download a latest package](https://github.com/czproject/events/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/events
```

CzProject\Events requires PHP 5.4.0 or later.


## Usage

``` php
<?php
$events = new CzProject\Events\Events(array(
	'click',
	'before-delete',
));

$events->addHandler('click', function () {
	// ...
});

$events->addHandler('before-delete', function (Entity\Post $post) {
	// ...
});

$events->fireEvent('click');
$events->fireEvent('before-delete', $post);
```

------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/
