<?php

declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function checkItems(): array {
  global $items;
  global $operations;
  $currentOperations = $operations;
  if (count($items)) {
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode("\n", $items) . "\n";
    return $currentOperations;
  } else {
    echo 'Ваш список покупок пуст.' . PHP_EOL;
    $currentOperations = array_filter($operations, fn($i) => array_search($i, $operations) !== 2);
    return $currentOperations;
  }
};

function echoOperations(array $operations) {
  echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
};

function inputOperation(): int {
  $currentOperations = checkItems();
  echoOperations($currentOperations);
  echo 'Выберите операцию для выполнения: ' . PHP_EOL;
  $operationNumber = trim(fgets(STDIN));
  if (!array_key_exists($operationNumber, $currentOperations)) {
    // system('clear');
    system('cls'); // windows
    echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
    inputOperation();
  };
  return intval($operationNumber);
};

function addItem() {
  global $items;
  echo "Введение название товара для добавления в список: \n> ";
  $itemName = trim(fgets(STDIN));
  $items[] = $itemName;
}

function deleteItem() {
  global $items;
  checkItems();

  echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
  $itemName = trim(fgets(STDIN));

  if (in_array($itemName, $items, true) !== false) {
      while (($key = array_search($itemName, $items, true)) !== false) {
          unset($items[$key]);
      }
  }
}

function printItems() {
  global $items;
  checkItems();
  echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
  echo 'Нажмите enter для продолжения';
  fgets(STDIN);
}

do {
  // system('clear');
  system('cls'); // windows

  $operationNumber = inputOperation();

  echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

  switch ($operationNumber) {
      case OPERATION_ADD:
          addItem();
          break;

      case OPERATION_DELETE:
          deleteItem();
          break;

      case OPERATION_PRINT:
          printItems();
          break;
  }

  echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;
