<?php

echo 'Введите первое число: ';
$firstNum = fgets(STDIN);

if ($firstNum != intval($firstNum)) {
  fwrite(STDERR, 'Ошибка! Оба числа должны быть целыми');
  exit;
}

echo 'Введите второе число: ';
$secondNum = fgets(STDIN);

if ($secondNum == '0') {
  fwrite(STDERR, 'Второе число не должно быть 0');
  exit;
};

if ($secondNum != intval($secondNum)) {
  fwrite(STDERR, 'Ошибка! Оба числа должны быть целыми');
  exit;
}

fwrite(STDOUT, 'Результат деления: '.$firstNum/$secondNum);
