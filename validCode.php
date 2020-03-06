<?php


$parts = array("AP-12-3507", "   ap-99-X109   ", "SG-05-ab20", "ab-22-N250", "SG-xx-N250", "SG-22-250", "SG-22-250*");

foreach ($parts as $part) {
    if (validPart($part)){
        echo "<p>$part is valid</p>";
    } else {
        echo "<p>$part is not valid</p>";
    }
}




function validPart($str)
{
    $str = strtolower(trim($str));
    $category = substr($str, 0, 2);


    $validCategory = array ("ap", 'hw', 'sg');

    if (!in_array($category, $validCategory)){
        return false;

    }

    $warehouse = substr($str, 3, 2);
    if (!is_numeric($warehouse)) {
        return false;
    }

    $dash = substr($str, 5, 1);

    if ($dash != '-') {
        return false;
    }

    $dash = substr($str, 2, 1);

    if ($dash != '-') {
        return false;
    }

    $partNum = substr($str, 6, 4);

    if (!ctype_alnum($partNum) || strlen($partNum) != 4) {
        return false;
    }

    return true;
}