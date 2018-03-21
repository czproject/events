<?php

use CzProject\Events\Events;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {
	$output = array();

	$events = new Events(array(
		'before-upload',
		'after-upload',
	));

	$events->addHandler('before-upload', function () use (&$output) {
		$output[] = 'before-upload1';
	});

	$events->addHandler('before-upload', function () use (&$output) {
		$output[] = 'before-upload2';
	});

	$events->addHandler('after-upload', function () use (&$output) {
		$output[] = 'after-upload';
	});

	$events->fireEvent('before-upload');
	$events->fireEvent('after-upload');

	Assert::same(array(
		'before-upload1',
		'before-upload2',
		'after-upload',
	), $output);
});


test(function () {
	$events = new Events(array(
		'before-upload',
		'after-upload',
	));

	Assert::exception(function () use ($events) {
		$events->addHandler('unknow-event', function () {});
	}, 'CzProject\Events\InvalidArgumentException', "Unknow event 'unknow-event'.");

	Assert::exception(function () use ($events) {
		$events->fireEvent('unknow-event', function () {});
	}, 'CzProject\Events\InvalidArgumentException', "Unknow event 'unknow-event'.");
});


test(function () {
	$events = new Events(array(
		'before-upload',
		'after-upload',
	));

	$events->addHandler('before-upload', function ($arg1, $arg2) {
		Assert::same('arg1', $arg1);
		Assert::same('arg2', $arg2);
	});

	$events->fireEvent('before-upload', 'arg1', 'arg2');
});
