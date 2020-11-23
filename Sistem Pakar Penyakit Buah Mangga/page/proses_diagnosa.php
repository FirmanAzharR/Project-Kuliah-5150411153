<?php
include_once('../config/koneksi.php');

$data_diagnosa = $_POST['data_diagnosa'];
$gejala = [];
$cfuser = [];
$selectedRule = [];
$tabelHipotesis = "<table class='table table-bordered table-striped'>";
$tableResult = "<table class='table table-bordered table-striped'>";

foreach($data_diagnosa as $val) {
    array_push($gejala, $val['gejala']);
    array_push($cfuser, $val['cfuser']);
}

$rule = mysqli_query(
    $koneksi, 
    "SELECT * FROM rule INNER JOIN penyakit ON rule.id_penyakit = penyakit.id_penyakit" 
); 
$idx = 0;

foreach ($rule as $key => $value) {
    $id_rule = $value['id_rule'];
    $detail_rule = mysqli_query($koneksi, "SELECT * FROM rule_detail WHERE id_rule=$id_rule");

    $tmpGejala = [];

    foreach($detail_rule as $keyDet => $valueDet) {
        array_push($tmpGejala, $valueDet['id_gejala']);
    }


    $containsSearch = count(array_intersect($tmpGejala, $gejala)) === count($tmpGejala);

    if($containsSearch) {
        $selectedRule[$idx]['id_rule'] = $value['id_rule'];
        $selectedRule[$idx]['penyakit'] = $value['nama_penyakit'];
        $selectedRule[$idx]['gejala'] = $tmpGejala;
        $selectedRule[$idx]['cf_pakar'] = $value['cf_pakar'];
        $idx++;
    }
}

$hipotesis = [];
foreach($selectedRule as $key => $tmpRule) {

    $no = $key + 1;
    $tabelHipotesis = $tabelHipotesis . "<tr> <td nowrap> Rule $no </td>";

    $tmpTDRule = "";
    $tmpMINData = "";
    
    $rawHipotesis = [];
    foreach($tmpRule['gejala'] as $tmpGejala) {
        $tmpCFUser = getCfUser($data_diagnosa, $tmpGejala);
        $tmpHipotesis = $tmpCFUser * $tmpRule['cf_pakar'];
        array_push($rawHipotesis, $tmpHipotesis);

        if($tmpTDRule === "") {
            $tmpTDRule = "<td> IF " . $tmpGejala . '(' . $tmpCFUser .')';
            
        }else {
            $tmpTDRule = $tmpTDRule . " AND " . $tmpGejala . '(' . $tmpCFUser .')';
        }

        $tmpMINData = $tmpMINData == "" ? $tmpCFUser  : $tmpMINData . ' ; ' . $tmpCFUser;
    }

    $tmpTDRule  = $tmpTDRule . '<div> THEN PENYAKIT = ' . $tmpRule['penyakit'] . " = " . $tmpRule['cf_pakar'] . "</div>";


    $hipotesis[$key]['penyakit'] =  $tmpRule['penyakit'];
    $hipotesis[$key]['hipotesis'] =  min($rawHipotesis);

    $tmpTDRule = $tmpTDRule . "<div> min(" . $tmpMINData . ") = " . min($rawHipotesis) . "</td>";

    $tabelHipotesis = $tabelHipotesis . $tmpTDRule . "</tr>";

}

$tabelHipotesis  = $tabelHipotesis  . "</table>";

$finalResult = [];
$processed = [];
$ruleIdx = 1;
foreach($hipotesis as $key => $hipo) {
    if(!in_array($hipo['penyakit'], $processed)) {
        $tableResult = $tableResult . "<tr> <td nowrap> $ruleIdx </td>";

        $cf = $hipo['hipotesis'];

        $tmpNo = $key + 1;
        $tmpTD = "(CF" . $tmpNo ;
        $tmpTDNum = "(" . $hipo['hipotesis'];

        foreach($hipotesis as $tmpKey => $tmpHipo) {
            if(($key !== $tmpKey) && ($hipo['penyakit'] == $tmpHipo['penyakit'])) {
                $cf += $tmpHipo['hipotesis'];
                $nestedNo = $tmpKey + 1;

                $tmpTD = $tmpTD  . " + CF" . $nestedNo;
                $tmpTDNum = $tmpTDNum  . " + " . $tmpHipo['hipotesis'];
            }
        }


        $tmpTD = $tmpTD . ") * (1 - CF" . $tmpNo . ")";
        $tmpTDNum = $tmpTDNum . ") * (1 - " . $hipo['hipotesis'] . ")";

        $result = $cf * (1 - $hipo['hipotesis']);

        $finalResult[$key]['penyakit'] =  $hipo['penyakit'];
        $finalResult[$key]['result'] = round($result, 2) * 100;

        array_push($processed, $hipo['penyakit']);

        $tmpTDNum = "<div> = $tmpTDNum </div>";
        $tmpTDRes = "<div> = " . round($result, 2) . " </div>";
        $tmpTDFinal = "<div> = <b>" . round($result, 2) * 100 . "% " . $hipo['penyakit'] . "</b>  </div>";
        
        $tmpTD = "<td>" . $tmpTD . $tmpTDNum . $tmpTDRes . $tmpTDFinal  . "</td>";

        $tableResult = $tableResult . $tmpTD . "</tr>";

        $ruleIdx++;
    }
}

$tableResult  = $tableResult  . "</table>";

$result = null;

foreach($finalResult as $final) {
    if($result === null) {
        $result = $final;
    }else {
        if($final['result'] >= $result['result'] ) {
            $result = $final;
        }
    }
}

if($result === null) {
    echo "<div> Hasil diagnosa tidak ditemukan !</div>";
}else {
    $nama_penyakit = $result['penyakit'];
    $penyakit = mysqli_query( $koneksi, "SELECT * FROM penyakit WHERE nama_penyakit = '$nama_penyakit'"); 

    echo "<h2 style='margin-top: 50px;' class='mb-5'> Hasil Diagnosa </h2>";
    echo $tabelHipotesis . $tableResult;
    echo "<div> Dari perhitungan diatas, hasil diagnosa penyakit adalah <b> " . $result['penyakit'] . " </b> dengan Hipotesis " . $result['result'] ."% </div>";
    echo "<div style='margin-top: 20px;'> Untuk penanganan, lakukan langkah-langkah berikut ini: </div>";

    foreach ($penyakit as $key => $value) { 
        echo "<div> " . $value['solusi'] . " </div>";
    }
}




function getCfUser($data_diagnosa, $gejala) {
    $cfuser = 0;

    foreach($data_diagnosa as $val) {
        if($val['gejala'] == $gejala) {
            return $val['cfuser'];
        }
    }

    return $cfuser;
}

?>