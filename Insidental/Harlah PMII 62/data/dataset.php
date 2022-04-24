<?php

$datajson = file_get_contents('pembaca.json');
$pairkeyjson = file_get_contents('data/pairkey.json');
$settingjson = file_get_contents('data/settingan.json');

$data = [
    'pembaca' => json_decode($datajson, true),
    'pairkey' => json_decode($pairkeyjson, true),
];

$setting = json_decode($settingjson, true);

// var_dump($data['setting']);
function genKey($length = 16)
{
    $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

    $key = "";
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[mt_Rand(0, count($keys) - 1)];
    }
    return $key;
}

function baseUrl()
{
    global $setting;
    return $setting['utility']['baseurl'];
}