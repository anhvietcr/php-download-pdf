<?php
$rawstr = file_get_contents('readme_md.txt');
$re = '/http:.*.pdf/m';
preg_match_all($re, $rawstr, $matches, PREG_SET_ORDER, 0);

foreach ($matches as $match) {
    $url = $match[0];
    $filename = extraFileName($url);
    file_put_contents("download/" . $filename, file_get_contents($url));
    echo $filename . "<br/>";
}

function extraFileName($url) {
    $matches = explode('/', $url);
    $len = count($matches);
    return $matches[$len-1];
}