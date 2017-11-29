<?php
// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

$image = Image::make('img/content/burger.png')->rotate(45)->resize('200', '200');

$image->save('images-new/new-burger.png');
