--TEST--
Bug #77195 (Incorrect error handling of imagecreatefromjpeg())
--SKIPIF--
<?php
if (!extension_loaded('gd')) die('skip gd extension not available');
if (!gd_info()['JPEG Support']) die('skip JPEG support not available');
?>
--FILE--
<?php
$filename = __DIR__ . '/bug77195.jpeg';
@imagecreatefromjpeg($filename);
imagecreatefromjpeg($filename);
?>
===DONE===
--EXPECTF--
Warning: imagecreatefromjpeg(): gd-jpeg: JPEG library reports unrecoverable error: JPEG datastream contains no image in %s on line %d

Warning: imagecreatefromjpeg(): '%s' is not a valid JPEG file in %s on line %d
===DONE===
