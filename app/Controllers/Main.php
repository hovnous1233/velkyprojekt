<?php

namespace App\Controllers;

use App\Models\Komponenty;
use App\Models\Parametr;
use App\Models\Vyrobci;

class Main extends BaseController
{
    public function index()
    {
        $vyrobce = new Vyrobci();
        $dataVyrobce = $vyrobce->paginate(20);

        $data = [
            "vyrobce" => $dataVyrobce,
            "pager" => $vyrobce->pager
        ];
        echo view("main_page", $data);
    }
    public function komponenty($vyrobce_id)
    {
        $dataKomp = new Komponenty();
        $komponenty= $dataKomp->find($vyrobce_id);

        $dataVyr = new Vyrobci();
        $dataVyrobci = $dataVyr->join("komponent","komponent.vyrobce_id=vyrobce.idVyrobce","inner")->join("typkomponent","typkomponent.idKomponent=komponent.typKomponent_id","inner")->where("vyrobce_id",$vyrobce_id)->orderBy("nazev","asc")->paginate(20);

        $data = [
               "vyrobci"=> $dataVyrobci,
               "komponenty"=> $komponenty,
               "pager" => $dataVyr->pager
               
        ];
        echo view("komponenty", $data);
    }


    public function typkomponentu()
    {
    
        $dataPar = new Parametr();
        $dataParametr =  $dataPar->join("nazevparametr","nazevparametr.id=parametr.nazevParametr_id", "inner")->paginate(20);
      

    
        $data = [
               "parametr"=>$dataParametr,
               "pager" => $dataPar->pager,
               
               
        ];
        echo view("typkomponentu", $data);
    }
}
