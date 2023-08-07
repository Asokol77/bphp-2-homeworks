#!/usr/bin/php
<?php

fscanf(STDIN, "%s", $number1);
fscanf(STDIN, "%s", $number2);


if ((is_numeric($number1)) && (is_numeric($number2)))  {
    fwrite(STDERR, "Это число" . PHP_EOL);
    settype($number2, "integer");
    if ($number2 === 0) {
        fwrite(STDERR, " На 0  делить нельзя" . PHP_EOL);
    }
    else {
        fwrite(STDOUT, $number1 / $number2);
    }
}
else {
    fwrite(STDERR, "Это не число" . PHP_EOL);
}
