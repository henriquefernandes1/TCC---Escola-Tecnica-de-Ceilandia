<?php
function formatoData($data) {
    $array = explode("-", $data);
    // $data = 2016-04-14
    // $array[0]= 2016, $array[1] = 04 e $array[2]= 14;
    $novaData = $array[2] . "/" . $array["1"] . "/" . $array[0];
    return $novaData;
}
