<?php
use App\DQL\Numeric\Rand;


$container->loadFromExtension('doctrine', array(
  'orm' => array(
    'dql' => array(
      'numeric_functions' => array(
        'rand' => Rand::class,
      )
    ),
  ),
));