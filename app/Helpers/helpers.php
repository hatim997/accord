<?php

function shout($str)
{
    preg_match_all('/(?<=\b)\w/iu', $str, $matches);
    $result = mb_strtoupper( implode('', $matches[0]) );
    return $result;
}
