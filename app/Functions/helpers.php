<?php


/**
 * 把字符串变成固定长度
 *
 * @param     $str
 * @param     $length
 * @param     $padString
 * @param int $padType
 * @return bool|string
 */
function fixStrLength($str, $length, $padString = '0', $padType = STR_PAD_LEFT)
{
    if (strlen($str) > $length) {
        return substr($str, strlen($str) - $length);
    } elseif (strlen($str) < $length) {
        return str_pad($str, $length, $padString, $padType);
    }

    return $str;
}