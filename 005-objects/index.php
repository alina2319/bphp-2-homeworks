<?php

declare(strict_types=1);

$w = 2;

function printDay(string $currentDay, bool $holiday) {
  if ($holiday) {
    echo "\033[31m $currentDay \033[0m".PHP_EOL;
    return;
  };

  echo "\033[32m $currentDay \033[0m".PHP_EOL;
}

function calculateSchedule() {
  global $w;
  $year = intval(readline('Введите год, полностью: '));
  $month = intval(readline('Номер месяца расчета: '));
  $period = intval(readline('На сколько месяцев вперед сделать расчет: '));
  $daysQuantity = 0;

  for ($i = 0; $i < $period; $i++) {
    $daysQuantity += cal_days_in_month(CAL_GREGORIAN, $month + $i, $year);
  };

  $date = DateTime::createFromFormat('Y-m-d', "$year-"."$month-".'01');
 
  for ($i = 1; $i < $daysQuantity + 1; $i++) {
    $currentDay = $date->format('d l');
    if ($date->format('d') === '01') {
      echo PHP_EOL.$date->format('F Y').PHP_EOL;
      echo '--------------------'.PHP_EOL;
    };

    if ($date->format('l') === 'Saturday' || $date->format('l') === 'Sunday') {
      printDay($currentDay, true);
      $w = 2;
    } else {
      if ($w === 2) {
        printDay($currentDay, false);
        $w = 0;
      } else {
        printDay($currentDay, true);
        $w++;
      }
    };

    $date->modify('+1 day');
  };

};

calculateSchedule();