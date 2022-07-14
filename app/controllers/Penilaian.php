<?php 

class Penilaian extends Controller {
    public function index() {
      Utils::PrivatePage();

      $data['judul'] = 'Form penilaian';
      $data['periode'] = $this->model('Periode_model')->getActive();
      $this->view('penilaian/index', $data);
    }

    public function add() {
      Utils::PrivatePage();
      $result = $this->model('Penilaian_model')->add($_POST);

      if ($result['count'] > 0) {
        Flasher::setFlash('berhasil', 'ditambah', 'success', 'Penilaian');
        header('Location: ' . BASEURL . '/penilaian/employee');
        exit;
      } else {
        Flasher::setFlash('gagal', 'ditambah', 'danger', 'Penilaian');
        header('Location: ' . BASEURL . '/penilaian/employee');
        exit;
      }
    }

    public function edit() {
      Utils::PrivatePage();
      $result = $this->model('Penilaian_model')->edit($_POST);

      if ($result['count'] > 0) {
        Flasher::setFlash('berhasil', 'diedit', 'success', 'Penilaian');
        header('Location: ' . BASEURL . '/penilaian/employee');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diedit', 'danger', 'Penilaian');
        header('Location: ' . BASEURL . '/penilaian/employee');
        exit;
      }
    }

    public function editWithApprove() {
      Utils::PrivatePage();
      $data = $_POST;

      $data['classification'] = $this->bayes($_POST);
      $data['naik_gaji'] = $this->svm($_POST);

      $result = $this->model('Penilaian_model')->editWithApprove($data);

      if ($result['count'] > 0) {
        Flasher::setFlash('berhasil', 'disetuji', 'success', 'Penilaian');
        header('Location: ' . BASEURL . '/employee/penilaian');
        exit;
      } else {
        Flasher::setFlash('gagal', 'disetuji', 'danger', 'Penilaian');
        header('Location: ' . BASEURL . '/employee/penilaian');
        exit;
      }
    }

    public function employee() {
      Utils::PrivatePage();
      $data['judul'] = 'Home';

      $data['periode'] = $this->model('Periode_model')->getActive();
      $data['users'] = $this->model('Penilaian_model')->getAllEmployeeAndPenilaian($data['periode']['id']);

      $data['periode_all'] = $this->model('Periode_model')->getAll();
      $data['periodes_penilaian'] = array();

      foreach($data['periode_all'] as $x => $val) {
        $temp['penilaian'] = $this->model('Penilaian_model')->getPenilaianByUserID($data['periode_all'][$x]['id'], Utils::GetUserId());
        $temp['periode'] = $data['periode_all'][$x];

        $data['periodes_penilaian'][$x] = $temp;
      }


      $this->view('penilaian/employee', $data);
    }

    public function hasil() {
      Utils::PrivatePage();
      $data['judul'] = 'Home';

      $data['periode'] = $this->model('Periode_model')->getActive();
      $data['users'] = $this->model('Penilaian_model')->getAllEmployeeAndPenilaian($data['periode']['id']);

      $data['periode_all'] = $this->model('Periode_model')->getAllPublished();
      $data['periodes_penilaian'] = array();

      foreach($data['periode_all'] as $x => $val) {
        $temp['penilaian'] = $this->model('Penilaian_model')->getPenilaianByUserID($data['periode_all'][$x]['id'], Utils::GetUserId());
        $temp['periode'] = $data['periode_all'][$x];

        $data['periodes_penilaian'][$x] = $temp;
      }


      $this->view('penilaian/hasil', $data);
    }

    public function bayes($data) {
      $jumK1 = $this->model('DatasetClassification_model')->getOut('Sangat Baik');
      $jumK2 = $this->model('DatasetClassification_model')->getOut('Baik');
      $jumK3 = $this->model('DatasetClassification_model')->getOut('Cukup');
      $jumK4 = $this->model('DatasetClassification_model')->getOut('Buruk');
      $jumK5 = $this->model('DatasetClassification_model')->getOut('Sangat Buruk');
      $totK = $jumK1 + $jumK2 + $jumK3 + $jumK4 + $jumK5;

      $jumG1A=$this->model('DatasetClassification_model')->getKK('delivery_time', intval($data['delivery_time']),"Sangat Baik");
      $jumG1B=$this->model('DatasetClassification_model')->getKK('delivery_time', intval($data['delivery_time']),"Baik");
      $jumG1C=$this->model('DatasetClassification_model')->getKK('delivery_time', intval($data['delivery_time']),"Cukup");
      $jumG1D=$this->model('DatasetClassification_model')->getKK('delivery_time', intval($data['delivery_time']),"Buruk");
      $jumG1E=$this->model('DatasetClassification_model')->getKK('delivery_time', intval($data['delivery_time']),"Sangat Buruk");

      $jumG2A=$this->model('DatasetClassification_model')->getKK('execution', intval($data['execution']),"Sangat Baik");
      $jumG2B=$this->model('DatasetClassification_model')->getKK('execution', intval($data['execution']),"Baik");
      $jumG2C=$this->model('DatasetClassification_model')->getKK('execution', intval($data['execution']),"Cukup");
      $jumG2D=$this->model('DatasetClassification_model')->getKK('execution', intval($data['execution']),"Buruk");
      $jumG2E=$this->model('DatasetClassification_model')->getKK('execution', intval($data['execution']),"Sangat Buruk");

      $jumG3A=$this->model('DatasetClassification_model')->getKK('team_work', intval($data['team_work']),"Sangat Baik");
      $jumG3B=$this->model('DatasetClassification_model')->getKK('team_work', intval($data['team_work']),"Baik");
      $jumG3C=$this->model('DatasetClassification_model')->getKK('team_work', intval($data['team_work']),"Cukup");
      $jumG3D=$this->model('DatasetClassification_model')->getKK('team_work', intval($data['team_work']),"Buruk");
      $jumG3E=$this->model('DatasetClassification_model')->getKK('team_work', intval($data['team_work']),"Sangat Buruk");


      $jumG4A=$this->model('DatasetClassification_model')->getKK('innovation', intval($data['innovation']),"Sangat Baik");
      $jumG4B=$this->model('DatasetClassification_model')->getKK('innovation', intval($data['innovation']),"Baik");
      $jumG4C=$this->model('DatasetClassification_model')->getKK('innovation', intval($data['innovation']),"Cukup");
      $jumG4D=$this->model('DatasetClassification_model')->getKK('innovation', intval($data['innovation']),"Buruk");
      $jumG4E=$this->model('DatasetClassification_model')->getKK('innovation', intval($data['innovation']),"Sangat Buruk");

      // if($jumG1A==0 || $jumG2A==0 || $jumG3A==0 || $jumG4A==0){
      //   $jumK1+=1;
      //   $totK+=1;
      //   $jumG1A+=1;$jumG2A+=1;$jumG3A+=1;$jumG4A+=1;
      // }

      // if($jumG1B==0 || $jumG2B==0 || $jumG3B==0 || $jumG4B==0 ){
      //   $jumK1+=1;
      //   $totK+=1;
      //   $jumG1B+=1;$jumG2B+=1;$jumG3B+=1;$jumG4B+=1;
      // }

      // if($jumG1C==0 || $jumG2C==0 || $jumG3C==0 || $jumG4C==0 ){
      //   $jumK1+=1;
      //   $totK+=1;
      //   $jumG1C+=1;$jumG2C+=1;$jumG3C+=1;$jumG4C+=1;
      // }

      // if($jumG1D==0 || $jumG2D==0 || $jumG3D==0 || $jumG4D==0 ){
      //   $jumK1+=1;
      //   $totK+=1;
      //   $jumG1D+=1;$jumG2D+=1;$jumG3D+=1;$jumG4D+=1;
      // }

      // if($jumG1E==0 || $jumG2E==0 || $jumG3E==0 || $jumG4E==0 ){
      //   $jumK1+=1;
      //   $totK+=1;
      //   $jumG1E+=1;$jumG2E+=1;$jumG3E+=1;$jumG4E+=1;
      // }

      $HA=($jumK1/$totK)*($jumG1A/$jumK1)*($jumG2A/$jumK1)*($jumG3A/$jumK1)*($jumG4A/$jumK1);
      $HB=($jumK2/$totK)*($jumG1B/$jumK2)*($jumG2B/$jumK2)*($jumG3B/$jumK2)*($jumG4B/$jumK2);
      $HC=($jumK3/$totK)*($jumG1C/$jumK3)*($jumG2C/$jumK3)*($jumG3C/$jumK3)*($jumG4C/$jumK3);
      $HD=($jumK4/$totK)*($jumG1D/$jumK4)*($jumG2D/$jumK4)*($jumG3D/$jumK4)*($jumG4D/$jumK4);
      $HE=($jumK5/$totK)*($jumG1E/$jumK5)*($jumG2E/$jumK5)*($jumG3E/$jumK5)*($jumG4E/$jumK5);

      $SHA="($jumK1/$totK) x ($jumG1A/$jumK1) x ($jumG2A/$jumK1) x ($jumG3A/$jumK1) x ($jumG4A/$jumK1)";
      $SHB="($jumK2/$totK) x ($jumG1B/$jumK2) x ($jumG2B/$jumK2) x ($jumG3B/$jumK2) x ($jumG4B/$jumK2)";
      $SHC="($jumK3/$totK) x ($jumG1C/$jumK3) x ($jumG2C/$jumK3) x ($jumG3C/$jumK3) x ($jumG4C/$jumK3)";
      $SHD="($jumK4/$totK) x ($jumG1D/$jumK4) x ($jumG2D/$jumK4) x ($jumG3D/$jumK4) x ($jumG4D/$jumK4)";
      $SHE="($jumK5/$totK) x ($jumG1E/$jumK5) x ($jumG2E/$jumK5) x ($jumG3E/$jumK5) x ($jumG4E/$jumK5)";

      $nk1="Sangat Baik";
      $nk2="Baik";
      $nk3="Cukup";
      $nk4="Buruk";
      $nk5="Sangat Buruk";
      

      if($HA>=$HB && $HA>=$HC && $HA>=$HD && $HA>=$HE) {
        $max=$HA;
        $index=$nk1;
      } else if ($HB>=$HA && $HB>=$HC && $HB>=$HD && $HB>=$HE) {
        $max=$HB;
        $index=$nk2;
      } else if ($HC>=$HA && $HC>=$HB && $HC>=$HD && $HC>=$HE) {
        $max=$HC;
        $index=$nk3;
      } else if ($HD>=$HA && $HD>=$HB && $HD>=$HC && $HD>=$HE) {
        $max=$HD;
        $index=$nk4;
      } else if ($HE>=$HA && $HE>=$HB && $HE>=$HC && $HE>=$HD) {
        $max=$HE;
        $index=$nk5;
      }


      // $hasilA = number_format($HA,12);
      // $hasilB = number_format($HB,12);
      // $hasilC = number_format($HC,12);
      // $hasilD = number_format($HD,12);
      // $hasilE = number_format($HE,12);

      // $gab="<h3>Hasil Analisa</h3>";
      // $gab.= "<strong>$nk1 => $SHA =$hasilA</strong><br>";
      // $gab.= "<strong>$nk2 => $SHB =$hasilB</strong><br>";
      // $gab.= "<strong>$nk3 => $SHC =$hasilC</strong><br>";
      // $gab.= "<strong>$nk4 => $SHD =$hasilD</strong><br>";
      // $gab.= "<strong>$nk5 => $SHE =$hasilE</strong><br>";

      // $gab2= "<b>Rekomendasi Bus Anda : $index ($max)<br>";
    
      // echo $gab;
      // echo $gab2;
      return $index;
    } 

    public function svm($data) {

      $dataset = $this->model('DatasetKenaikanGaji_model')->getAll();
  
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
  
      $predictions = $svm->predict([[intval($data['delivery_time']), intval($data['execution']), intval($data['team_work']), intval($data['innovation'])]]);
      // var_dump($predictions);
      if ($predictions[0] == 1) {
        return "Yes";
      }
      
      return "No";
    }

    public function report() {
      Utils::PrivatePage();
      $data['judul'] = 'Home';

      $data['periode'] = $this->model('Periode_model')->getActive();
      $data['users'] = $this->model('Penilaian_model')->getAllEmployeeAndPenilaianAndResult($data['periode']['id']);

      $this->view('penilaian/report', $data);
    }

    public function getdetail() {
      echo json_encode($this->model("Penilaian_model")->getById($_POST['id']));
    }

    public function getdetailhasil() {
      echo json_encode($this->model("Penilaian_model")->getDetailResult($_POST['id']));
    }
}