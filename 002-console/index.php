#!/usr/bin/php
<?php

// fscanf(STDIN, "%d/n", $number1);
// fscanf(STDIN, "%d/n", $number2);

// if ($number2 === 0){
// fwrite(STDERR, "На ноль дельить нельзя!" . PHP_EOL);
// }
// else {
// fwrite(STDOUT, $number1 / $number2);
// }

fscanf(STDIN, $number1);
fscanf(STDIN, $number2);
fwrite(STDOUT, $number1 . PHP_EOL . $number2);

if (is_numeric($number1)) {
    fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);
}
else {
    if ($number2 === 0){
        fwrite(STDERR, "На ноль дельить нельзя!" . PHP_EOL);
    }
    else {
        fwrite(STDOUT, $number1 / $number2);
    }

}
