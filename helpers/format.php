<?php

function addCommasToMoney($number) {
    $formattedNumber = number_format(floatval($number), 2, '.', ',');
    return $formattedNumber;
}