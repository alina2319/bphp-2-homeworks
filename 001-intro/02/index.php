<?php

$multiString = <<<STRING
\nHello
world!\n
STRING;

$fish = 'рыба';
$human = 'человек';

echo __FILE__."\n", __LINE__;
echo $multiString;
echo "$fish рыбою сыта, а $human человеком";
