<?php

$variable = null;

switch (true) {
  case (is_bool($variable)):
    echo 'bool';
    break;
  case (is_float($variable)):
    echo 'float';
    break;
  case (is_int($variable)):
    echo 'int';
    break;
  case (is_string($variable)):
    echo 'string';
    break;
  case (is_null($variable)):
    echo 'null';
    break;
  default:
    echo 'other';
}