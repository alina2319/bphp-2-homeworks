<?php

function mb_ucfirst($string) {
      return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
}

///////////////////////////////////////////////////////

$userSurname = mb_ucfirst(readline('Введите фамилию: '));

$userName = mb_ucfirst(readline('Введите имя: '));

$userSecondName = mb_ucfirst(readline('Введите отчество: '));

///////////////////////////////////////////////////////

$fullName = "$userSurname $userName $userSecondName";

$surnameAndInitials = $userSurname.' '
                      .mb_substr($userName, 0, 1).'.'
                      .mb_substr($userSecondName, 0, 1).'.';

$fio = mb_substr($userSurname, 0, 1)
      .mb_substr($userName, 0, 1)
      .mb_substr($userSecondName, 0, 1);

fwrite(STDOUT, "Полное имя: $fullName".PHP_EOL);
fwrite(STDOUT, "Фамилия и инициалы: $surnameAndInitials".PHP_EOL);
fwrite(STDOUT, "Аббревиатура: $fio".PHP_EOL);