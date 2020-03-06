<?php

function validPart($str)
{
    $str = strtolower(trim($str));
    $category = substr($str, 0, 3);

    switch ($str) {
        case "hw-":
        case "sg-":
        case "ap-":
            break;
        default:
            return false;
    }

    $warehouse = substr($str, 3, 2);
    if (!is_numeric($str)) {
        return false;
    }

    $dash = substr($str, 5, 1);

    if ($dash != '-') {
        return false;
    }

    $partNum = substr($str, 6, 4);

    if (!ctype_alpha($partNum)) {
        return false;
    }
}