<?php

$datajson = file_get_contents('pembaca.json');
$pairkeyjson = file_get_contents('data/pairkey.json');
$settingjson = file_get_contents('data/settingan.json');

$data = [
    'pembaca' => json_decode($datajson, true),
    'pairkey' => json_decode($pairkeyjson, true),
];

$setting = json_decode($settingjson, true);

function text2array($text)
{
    if ($text) {
        $array = explode("\n", str_replace("\r", "", $text));
        return $array;
    } else {
        throw new Exception("Harus memasukkan teks !");
    }
}

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

function cekAkses($key): bool
{
    global $setting;
    if ($key == $setting['key']['access']) {
        return true;
    } else {
        return false;
    }
}

function addPembaca($pembaca, $fromTextarea = false, $cekAkses = false, $key = '')
{
    global $data;
    if ($cekAkses) {
        if (!cekAkses($key)) {
            return false;
        }
    }
    if ($fromTextarea) {
        try {
            $pembaca = text2array($pembaca);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
    try {
        shuffle($pembaca);
        foreach ($pembaca as $darus) {
            array_push(
                $data['pembaca'],
                [
                    'id' => count($data['pembaca']) + 1,
                    'nama' => $darus,
                    'done' => false
                ]
            );
        }
        $datajson = json_encode($data['pembaca']);
        file_put_contents('pembaca.json', $datajson);
        return true;
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}