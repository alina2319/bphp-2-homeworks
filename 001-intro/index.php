<?php
    $testedVariable = 5;
    if (is_null($testedVariable)) {
        echo "$testedVariable is NULL.";
        echo '<br>Значение переменной не задано.';
    } elseif (is_bool($testedVariable)) {
        echo "$testedVariable is boolean.";
        echo '<br>Данная переменная относится к переменным логического типа.';
    } elseif (is_float($testedVariable)) {
        echo "$testedVariable is float.";
        echo '<br>Данная переменная является числом с плавающей точкой.';
    } elseif (is_int($testedVariable)) {
        echo "$testedVariable is integer.";
        echo '<br>Данная переменная является целым числом.';
    } elseif (is_string($testedVariable)) {
        echo "$testedVariable is string.";
        echo '<br>Данная переменная имеет строчный тип.';
    };