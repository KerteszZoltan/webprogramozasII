<link rel='stylesheet' type='text/css' href='css/szorzo.css' />
<?php
include_once "top_nav.php";
$szam = null;
$i = null;
if (isset($_REQUEST['melyiket']))
{
$szam = (int)$_REQUEST['melyiket'];
}
if (isset($_REQUEST['i']))
{
$i = (int)$_REQUEST['i'];
}
?>
<div class="main_page">
    <div class="part">
        <form method='post' action='szorzo.php'>
            Melyik számot szorozzuk be?
        <input type='text' name='melyiket' placeholder="<?php echo $szam ?>"><br>
            Hányszor szorozzuk be?
        <input type='text' name='i' value="<?php if($i == 0)$i=10?>" placeholder="<?php echo $i ?>"><br>
        <input type='submit' value='Szorzás!'>
        </form>
    </div>
    <div class="part">
        
        <?php 
        
        if($szam == null){
            echo "Kérlek adj meg két számot, hogy tudjak számolni!";
        }
        else{
            echo "Számolok<br>";
            for ($j=0; $j < $i+1; $j++) { 
                echo (int)$szam."*". $j. "=" .(int)($szam*$j)."<br>";
            }
        }
        ?>
    </div>
</div>
<div class='footer'>
<?php include_once "footer.php"?>
</div>