<?php
// $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
// echo substr(str_shuffle($permitted_chars), 0, 16);

$datajson = file_get_contents('pembaca.json');
$pairkeyjson = file_get_contents('data/pairkey.json');
$settingjson = file_get_contents('data/settingan.json');

$data = [
    'pembaca' => json_decode($datajson, true),
    'pairkey' => json_decode($pairkeyjson, true),
    'setting' => json_decode($settingjson, true)
];

// var_dump($data['setting']);
