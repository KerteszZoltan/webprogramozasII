<link rel='stylesheet' type='text/css' href='css/lottozo.css' />
<?php
include_once "top_nav.php";
?>
<?php
if (!empty($_POST['submit'])) {
    $nyszamok= array("1" => $_POST['egy'],"2"=>$_POST['ketto'],
    "3"=>$_POST['harom'],"4"=>$_POST['negy'],"5"=>$_POST['ot'],);
        if ($nyszamok['1'] == null) {
            unset($nyszamok);
        }
}


$a = array(1,2,3,4,5,6,7,8,9,
10,11,12,13,14,15,16,17,18,19,
20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,37,38,39,
40,41,42,43,44,45,46,47,48,49,
50,51,52,53,54,55,56,57,58,59,
60,61,62,63,64,65,66,67,68,69,
70,71,72,73,74,75,76,77,78,79,
80,81,82,83,84,85,86,87,88,89,90);

$random_keys=array_rand($a,5);
?>
<div class="main_head"> 
    Kérlek add meg a számokat amivel jászani szeretnél
    <form name="teszt" action="lottozo.php" method="post" required >
    <input type="number" name="egy" id="egy_v" min="1"  max="90" required/>
    <input type="number" name="ketto" id="ketto_v" min="1" max="90" required/>
    <input type="number" name="harom" id="harom_v" min="1" max="90" required/>
    <input type="number" name="negy" id="negy_v" min="1" max="90" required/>
    <input type="number" name="ot" id="ot_v" min="1" max="90" required/>
    <input type="submit" name="submit" value="Nyerőszámok beküldése"/>
</form>
</div>
<div class="main_page">
    <div class="part">
<?php
if (empty($nyszamok)) {
    
}else{
    echo "A nyerőszámok a következők: ";
echo $e = $a[$random_keys[0]]." | ";
echo $k = $a[$random_keys[1]]." | ";
echo $h = $a[$random_keys[2]]." | ";
echo $n = $a[$random_keys[3]]." | ";
echo $o = $a[$random_keys[4]];
}
?>
</div>
<div class="part">
<?php
if(!empty($nyszamok)){
    echo "Az ön számai a következők: ";
echo $nyszamok['1']." | ";
echo $nyszamok['2']." | ";
echo $nyszamok['3']." | ";
echo $nyszamok['4']." | ";
echo $nyszamok['5']."";
}
?>
</div>
</div>
<div class="footer">
<?php include_once "footer.php"?>
</div>