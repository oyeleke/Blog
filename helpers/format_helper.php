<?php
/*
 * Formart the Date
 */

function formatDate($date){
    return date('F j , Y, g:i a', strtotime($date));
}

/*
 * function to shorten text
 */

function shortenText($text, $chars = 450){
    $text = $text." ";
    $text = substr($text, 0 , $chars);
    $text = substr($text, 0, strrpos($text, ' '));//looks for the first occurrence of a space since we don not want words to be cut of at the middle
    $text = $text."...";
    return $text;
}