
# CzProject\Events

Events manager.


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
