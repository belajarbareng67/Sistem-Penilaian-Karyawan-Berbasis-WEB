<?php
//fungi untuk normalisasi matriks keputusan
function normalisasi($value,$arrayValue,$sifat){
    if ($sifat=='benefit'){
        $result=$value/max($arrayValue);
    }elseif ($sifat=='cost'){
        $result=min($arrayValue)/$value;
    }
    return round($result,3);
}