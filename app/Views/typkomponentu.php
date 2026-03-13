<?php

use App\Models\Komponenty;

?>
<?=$this->extend("layout/template");?>


<?=$this->section("content");?>


<h1>Informace o komponentu</h1>
<p><b>Název: </b> <?= $komponenty->nazev ?></p>
<p><b>Výrobce: </b> <?= $komponenty->vyrobce ?></p>
<p><b>Typ komponentu: </b> <?= $komponenty->typKomponent ?></p>
<p><b>Odkaz na eshop: </b> <?= anchor($komponenty->odkaz.$komponenty->id) ?></p>
<?php
 $obrazek= [
    "src" => base_url("komponenty/".$komponenty->pic),
    "height" => "150",
    //"width" => "200"
];
?>
<p><b>Fotka: </b> <?= img($obrazek) ?></p>


<?php $table = new \CodeIgniter\View\Table(); 

$table->setHeading("Název vlastnosti","Hodnota"); 

foreach ($parametr as  $row){
    
    $table->addRow($row->nazev,$row->hodnota );
}

$template = array(
'table_open'=> '<table class="table table-bordered">',
'thead_open'=> '<thead>',
'thead_close'=> '</thead>',
'heading_row_start'=> '<tr>',
'heading_row_end'=>' </tr>',
'heading_cell_start'=> '<th>',
'heading_cell_end' => '</th>',
'tbody_open' => '<tbody>',
'tbody_close' => '</tbody>',
'row_start' => '<tr>',
'row_end'  => '</tr>',
'cell_start' => '<td>',
'cell_end' => '</td>',
'row_alt_start' => '<tr>',
'row_alt_end' => '</tr>',
'cell_alt_start' => '<td>',
'cell_alt_end' => '</td>',
'table_close' => '</table>'
);

$table->setTemplate($template);



echo $table->generate();

?>




<?=$this->endSection();?>