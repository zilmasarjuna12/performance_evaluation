<?php 

class Recomendation extends Controller {
  public function index() {
    $jumK1 = $this->model('Dataset_model')->getOut('Yes');
    $jumK2 = $this->model('Dataset_model')->getOut('No');
    $totK = $jumK1 + $jumK2;

    $jumG1A=$this->model('Dataset_model')->getKK('delivery_time',2,"Yes");
    $jumG1B=$this->model('Dataset_model')->getKK('delivery_time', 2,"No");

    $jumG2A=$this->model('Dataset_model')->getKK('execution', 2,"Yes");
    $jumG2B=$this->model('Dataset_model')->getKK('execution', 2,"No");

    $jumG3A=$this->model('Dataset_model')->getKK('team_work', 2,"Yes");
    $jumG3B=$this->model('Dataset_model')->getKK('team_work', 2,"No");

    $jumG4A=$this->model('Dataset_model')->getKK('innovation', 2,"Yes");
    $jumG4B=$this->model('Dataset_model')->getKK('innovation', 2,"No");

    if($jumG1A==0 || $jumG2A==0 || $jumG3A==0 || $jumG4A==0){
      $jumK1+=1;
      $totK+=1;
      $jumG1A+=1;$jumG2A+=1;$jumG3A+=1;$jumG4A+=1;
    }

    if($jumG1B==0 || $jumG2B==0 || $jumG3B==0 || $jumG4B==0 ){
      $jumK1+=1;
      $totK+=1;
      $jumG1B+=1;$jumG2B+=1;$jumG3B+=1;$jumG4B+=1;
    }

    $HA=($jumK1/$totK)*($jumG1A/$jumK1)*($jumG2A/$jumK1)*($jumG3A/$jumK1)*($jumG4A/$jumK1);
    $HB=($jumK2/$totK)*($jumG1B/$jumK2)*($jumG2B/$jumK2)*($jumG3B/$jumK2)*($jumG4B/$jumK2);

    $SHA="($jumK1/$totK) x ($jumG1A/$jumK1) x ($jumG2A/$jumK1) x ($jumG3A/$jumK1) x ($jumG4A/$jumK1)";
    $SHB="($jumK2/$totK) x ($jumG1B/$jumK2) x ($jumG2B/$jumK2) x ($jumG3B/$jumK2) x ($jumG4B/$jumK2)";

    $nk1="Yes";
    $nk2="No";

    if($HA>=$HB){
      $max=$HA;
      $index=$nk1;
    } else if ($HB>=$HA) {
      $max=$HB;
      $index=$nk2;
    }

    $gab="<h3>Hasil Analisa</h3>";
    $gab.= "<strong>$nk1 => $SHA =$HA</strong><br>";
    $gab.= "<strong>$nk2 => $SHB =$HB</strong><br>";
    
    $gab2= "<b>Rekomendasi Bus Anda : $index ($max)<br>";
   
    echo $gab;
    echo $gab2;
  }

  public function svm() {

    $dataset = $this->model('Dataset_model')->getAll();

    $crit = array();
    $target = array();

    foreach($dataset as $usr => $val) {
      $itemCrit = array(intval($dataset[$usr]['delivery_time']), intval($dataset[$usr]['execution']), intval($dataset[$usr]['team_work']), intval($dataset[$usr]['innovation']));
      $itemTarget = -1;

      if ($dataset[$usr]['naik_gaji'] == "Yes") {
        $itemTarget = 1;
      }

      array_push($crit, $itemCrit);
      array_push($target, $itemTarget);
    }

    $svm = new Svm();
    $svm->train($crit, $target);

    $predictions = $svm->predict([[3, 3, 2, 2]]);
  }
}