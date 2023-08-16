<?php

function addCommasToMoney($number) {
    $formattedNumber = number_format($number, 2, '.', ',');
    return $formattedNumber;
}