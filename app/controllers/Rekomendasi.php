<?php 

class Rekomendasi extends Controller {
  public function index() {
    $jumK1 = $this->model('DatasetClassification_model')->getOutTraining('Yes');
    $jumK2 = $this->model('DatasetClassification_model')->getOutTraining('No');
    $totK = $jumK1 + $jumK2;

    $jumG1A=$this->model('DatasetClassification_model')->getKKTraining('delivery_time',2,"Yes");
    $jumG1B=$this->model('DatasetClassification_model')->getKKTraining('delivery_time', 2,"No");

    $jumG2A=$this->model('DatasetClassification_model')->getKKTraining('execution', 2,"Yes");
    $jumG2B=$this->model('DatasetClassification_model')->getKKTraining('execution', 2,"No");

    $jumG3A=$this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"Yes");
    $jumG3B=$this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"No");

    $jumG4A=$this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"Yes");
    $jumG4B=$this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"No");

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

  public function upload_csv() {
    // Allowed mime types
    $fileMimes = array(
      'text/x-comma-separated-values',
      'text/comma-separated-values',
      'application/octet-stream',
      'application/vnd.ms-excel',
      'application/x-csv',
      'text/x-csv',
      'text/csv',
      'application/csv',
      'application/excel',
      'application/vnd.msexcel',
      'text/plain'
    );


    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
          // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
        {
            // Get row data
            $temp['email'] = $getData[0];
            $temp['name'] = $getData[1];
            $temp['job_position'] = $getData[2];
            $temp['delivery_time'] = $getData[3];
            $temp['execution'] = $getData[4];
            $temp['team_work'] = $getData[5];
            $temp['innovation'] = $getData[6];
            $temp['naik_gaji'] = $getData[8];
            $this->model('DatasetKenaikanGaji_model')->add($temp);
        }

        // Close opened CSV file
        fclose($csvFile);
    }

    header('Location: ' . BASEURL . '/rekomendasi/kenaikangaji');
  }

  public function sa() {
    $dataset = $data['datasets'] = $this->model('DatasetKenaikanGaji_model')->getAll();;

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

    // $predictions = $svm->predict([[intval($data['delivery_time']), intval($data['execution']), intval($data['team_work']), intval($data['innovation'])]]);
    print_r($svm);
  }

  public function upload_csv_evaluasi() {
    // Allowed mime types
    $fileMimes = array(
      'text/x-comma-separated-values',
      'text/comma-separated-values',
      'application/octet-stream',
      'application/vnd.ms-excel',
      'application/x-csv',
      'text/x-csv',
      'text/csv',
      'application/csv',
      'application/excel',
      'application/vnd.msexcel',
      'text/plain'
    );

    $index = 0;


    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
          // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
        {
            // Get row data
            $temp['email'] = $getData[0];
            $temp['name'] = $getData[1];
            $temp['job_position'] = $getData[2];
            $temp['delivery_time'] = $getData[3];
            $temp['execution'] = $getData[4];
            $temp['team_work'] = $getData[5];
            $temp['innovation'] = $getData[6];
            $temp['penilaian'] = $getData[7];


            $this->model('DatasetClassification_model')->add($temp);

            if ($index < 140) {
              $this->model('DatasetClassification_model')->addTraining($temp);
            } else {
              $this->model('DatasetClassification_model')->addTesting($temp);
            }

            $index += 1;
        }

        // Close opened CSV file
        fclose($csvFile);
    }

    header('Location: ' . BASEURL . '/rekomendasi/evaluasi');
  }

  public function kenaikangaji() {
    Utils::PrivatePage();
    $data['judul'] = 'Home';

    $data['count_TP'] = 0;
    $data['count_TN'] = 0;
    $data['count_FP'] = 0;
    $data['count_FN'] = 0;
    $data['count_testing'] = 0;
    $data['datasets'] = $this->model('DatasetKenaikanGaji_model')->getAll();
    $data['datasets_tidaknaikgaji'] = $this->model('DatasetKenaikanGaji_model')->getAllTidakNaikGaji();
    $data['datasets_naikgaji'] = $this->model('DatasetKenaikanGaji_model')->getAllNaikGaji();

    $data['jumlah_dataset'] = count($data['datasets']);
    $data['datasets_traning'] = [];
    $data['datasets_testing'] = [];
    $data['accurasi'] = 0;
    $data['accurasi_error'] = 0;
    $data['w'] = [0, 0, 0, 0];
    $data['b'] = 0;

    if (count($data['datasets']) > 0) {
      $split = array_chunk($data['datasets'], 140);
      $data['datasets_traning'] = $split[0];
      $data['datasets_testing'] = $split[1];
   


      $crit = array();
      $target = array();
      $itemPredict = array();

      $dataset = $data['datasets_traning'];

      foreach($dataset as $usr => $val) {
        $itemCrit = array(intval($dataset[$usr]['delivery_time']), intval($dataset[$usr]['execution']), intval($dataset[$usr]['team_work']), intval($dataset[$usr]['innovation']));
        $itemTarget = -1;

        if ($dataset[$usr]['naik_gaji'] == "Yes") {
          $itemTarget = 1;
        }

        array_push($crit, $itemCrit);
        array_push($target, $itemTarget);
      }

      foreach($data['datasets_testing'] as $usr => $val) {
        $itemPred = array(intval($data['datasets_testing'][$usr]['delivery_time']), intval($data['datasets_testing'][$usr]['execution']), intval($data['datasets_testing'][$usr]['team_work']), intval($data['datasets_testing'][$usr]['innovation']));

        array_push($itemPredict, $itemPred);
      }

      $svm = new Svm();
      $svm->train($crit, $target);

      $data ['w'] = $svm->getW();
      $data['b'] = $svm->getB();

      $predictions = $svm->predict($itemPredict);

      foreach($data['datasets_testing'] as $usr => $val) {
        $hasil = "";

        if ($predictions[$usr] == "1") {
          $hasil = "Yes";
        } else {
          $hasil = "No";
        }

        if ($hasil == "Yes" && $data['datasets_testing'][$usr]['naik_gaji'] == "Yes") {
          $data['count_TP'] += 1;
        } else if ($hasil == "No" && $data['datasets_testing'][$usr]['naik_gaji'] == "No") {
          $data['count_TN'] += 1;
        } else  if ($hasil == "Yes" && $data['datasets_testing'][$usr]['naik_gaji'] == "No") {
          $data['count_FP'] += 1;
        } else if ($hasil == "No" && $data['datasets_testing'][$usr]['naik_gaji'] == "Yes") {
          $data['count_FN'] += 1;
        }
        $data['count_testing'] += 1;
        $data['datasets_testing'][$usr]['hasil'] = $hasil;
      }
    }
    if ($data['count_testing'] > 0) {
      $data['accurasi'] = (($data['count_TP']+$data['count_TN'])/$data['count_testing']) * 100;
      $data['accurasi_error'] = (($data['count_FP']+$data['count_FN'])/$data['count_testing']) * 100;
    }

    $this->view("rekomendasi/kenaikangaji", $data);
  }

  public function evaluasi() {
    Utils::PrivatePage();

    $data['datasets'] = $this->model('DatasetClassification_model')->getAll();
    $data['datasets_traning'] = $this->model('DatasetClassification_model')->getAllTraining();
    $data['datasets_testing'] = $this->model('DatasetClassification_model')->getAllTesting();
    $data['jumlah_dataset'] = count($data['datasets']);
    $data['count_TP'] = 0;
    $data['count_FN'] = 0;
    $data['count_testing'] = 0;
    $data['accurasi'] = 0;
    $data['error_accurasi'] = 0;

    $data['class'] = [0, 0, 0, 0, 0];
    $data['delivery_time'][0] = [0, 0, 0, 0, 0];
    $data['delivery_time'][1] = [0, 0, 0, 0, 0];
    $data['delivery_time'][2] = [0, 0, 0, 0, 0];
    $data['delivery_time'][3] = [0, 0, 0, 0, 0];
    $data['delivery_time'][4] = [0, 0, 0, 0, 0];

    $data['execution'][0] = [0, 0, 0, 0, 0];
    $data['execution'][0] = [0, 0, 0, 0, 0];
    $data['execution'][0] = [0, 0, 0, 0, 0];
    $data['execution'][0] = [0, 0, 0, 0, 0];
    $data['execution'][0] = [0, 0, 0, 0, 0];

    $data['team_work'][0] = [0, 0, 0, 0, 0];
    $data['team_work'][0] = [0, 0, 0, 0, 0];
    $data['team_work'][0] = [0, 0, 0, 0, 0];
    $data['team_work'][0] = [0, 0, 0, 0, 0];
    $data['team_work'][0] = [0, 0, 0, 0, 0];

    $data['innovation'][0] = [0, 0, 0, 0, 0];
    $data['innovation'][0] = [0, 0, 0, 0, 0];
    $data['innovation'][0] = [0, 0, 0, 0, 0];
    $data['innovation'][0] = [0, 0, 0, 0, 0];
    $data['innovation'][0] = [0, 0, 0, 0, 0];

    foreach($data['datasets_testing'] as $usr => $val) {
      $hasil = $this->bayes($data['datasets_testing'][$usr]);

      if ($hasil == $data['datasets_testing'][$usr]['penilaian']) {
        $data['count_TP'] += 1;
      } else {
        $data['count_FN'] += 1;
      }

      $data['count_testing'] += 1;
      $data['datasets_testing'][$usr]['hasil'] = $hasil;
    }

    if (count($data['datasets_traning']) > 0) { 
      $jumK1 = $this->model('DatasetClassification_model')->getOutTraining('Sangat Baik');
      $jumK2 = $this->model('DatasetClassification_model')->getOutTraining('Baik');
      $jumK3 = $this->model('DatasetClassification_model')->getOutTraining('Cukup');
      $jumK4 = $this->model('DatasetClassification_model')->getOutTraining('Buruk');
      $jumK5 = $this->model('DatasetClassification_model')->getOutTraining('Sangat Buruk');
      $totK = $jumK1 + $jumK2 + $jumK3 + $jumK4 + $jumK5;

      $data['delivery_time'][0] = [$this->model('DatasetClassification_model')->getKKTraining('delivery_time', 1,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 2,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 3,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 4,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 5,"Sangat Baik")/$jumK1];
      $data['delivery_time'][1] = [$this->model('DatasetClassification_model')->getKKTraining('delivery_time', 1,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 2,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 3,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 4,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 5,"Baik")/$jumK2];
      $data['delivery_time'][2] = [$this->model('DatasetClassification_model')->getKKTraining('delivery_time', 1,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 2,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 3,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 4,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 5,"Cukup")/$jumK3];
      $data['delivery_time'][3] = [$this->model('DatasetClassification_model')->getKKTraining('delivery_time', 1,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 2,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 3,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 4,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 5,"Buruk")/$jumK4];
      $data['delivery_time'][4] = [$this->model('DatasetClassification_model')->getKKTraining('delivery_time', 1,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 2,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 3,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 4,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('delivery_time', 5,"Sangat Buruk")/$jumK5];

      $data['execution'][0] = [$this->model('DatasetClassification_model')->getKKTraining('execution', 1,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('execution', 2,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('execution', 3,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('execution', 4,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('execution', 5,"Sangat Baik")/$jumK1];
      $data['execution'][1] = [$this->model('DatasetClassification_model')->getKKTraining('execution', 1,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('execution', 2,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('execution', 3,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('execution', 4,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('execution', 5,"Baik")/$jumK2];
      $data['execution'][2] = [$this->model('DatasetClassification_model')->getKKTraining('execution', 1,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('execution', 2,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('execution', 3,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('execution', 4,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('execution', 5,"Cukup")/$jumK3];
      $data['execution'][3] = [$this->model('DatasetClassification_model')->getKKTraining('execution', 1,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('execution', 2,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('execution', 3,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('execution', 4,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('execution', 5,"Buruk")/$jumK4];
      $data['execution'][4] = [$this->model('DatasetClassification_model')->getKKTraining('execution', 1,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('execution', 2,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('execution', 3,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('execution', 4,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('execution', 5,"Sangat Buruk")/$jumK5];

      $data['team_work'][0] = [$this->model('DatasetClassification_model')->getKKTraining('team_work', 1,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('team_work', 3,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('team_work', 4,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('team_work', 5,"Sangat Baik")/$jumK1];
      $data['team_work'][1] = [$this->model('DatasetClassification_model')->getKKTraining('team_work', 1,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('team_work', 3,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('team_work', 4,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('team_work', 5,"Baik")/$jumK2];
      $data['team_work'][2] = [$this->model('DatasetClassification_model')->getKKTraining('team_work', 1,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('team_work', 3,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('team_work', 4,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('team_work', 5,"Cukup")/$jumK3];
      $data['team_work'][3] = [$this->model('DatasetClassification_model')->getKKTraining('team_work', 1,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('team_work', 3,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('team_work', 4,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('team_work', 5,"Buruk")/$jumK4];
      $data['team_work'][4] = [$this->model('DatasetClassification_model')->getKKTraining('team_work', 1,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('team_work', 2,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('team_work', 3,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('team_work', 4,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('team_work', 5,"Sangat Buruk")/$jumK5];

      $data['innovation'][0] = [$this->model('DatasetClassification_model')->getKKTraining('innovation', 1,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('innovation', 3,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('innovation', 4,"Sangat Baik")/$jumK1, $this->model('DatasetClassification_model')->getKKTraining('innovation', 5,"Sangat Baik")/$jumK1];
      $data['innovation'][1] = [$this->model('DatasetClassification_model')->getKKTraining('innovation', 1,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('innovation', 3,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('innovation', 4,"Baik")/$jumK2, $this->model('DatasetClassification_model')->getKKTraining('innovation', 5,"Baik")/$jumK2];
      $data['innovation'][2] = [$this->model('DatasetClassification_model')->getKKTraining('innovation', 1,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('innovation', 3,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('innovation', 4,"Cukup")/$jumK3, $this->model('DatasetClassification_model')->getKKTraining('innovation', 5,"Cukup")/$jumK3];
      $data['innovation'][3] = [$this->model('DatasetClassification_model')->getKKTraining('innovation', 1,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('innovation', 3,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('innovation', 4,"Buruk")/$jumK4, $this->model('DatasetClassification_model')->getKKTraining('innovation', 5,"Buruk")/$jumK4];
      $data['innovation'][4] = [$this->model('DatasetClassification_model')->getKKTraining('innovation', 1,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('innovation', 2,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('innovation', 3,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('innovation', 4,"Sangat Buruk")/$jumK5, $this->model('DatasetClassification_model')->getKKTraining('innovation', 5,"Sangat Buruk")/$jumK5];

      $data['class'] = [$jumK1/$totK, $jumK2/$totK, $jumK3/$totK, $jumK4/$totK, $jumK5/$totK];
    }

    if ($data['count_testing'] > 0) {
      $data['accurasi'] = ($data['count_TP']/$data['count_testing']) * 100;
      $data['error_accurasi'] = ($data['count_FN']/$data['count_testing']) * 100;
    }

    $this->view("rekomendasi/evaluasi", $data);
  }

  public function bayes($data) {
    $jumK1 = $this->model('DatasetClassification_model')->getOutTraining('Sangat Baik');
    $jumK2 = $this->model('DatasetClassification_model')->getOutTraining('Baik');
    $jumK3 = $this->model('DatasetClassification_model')->getOutTraining('Cukup');
    $jumK4 = $this->model('DatasetClassification_model')->getOutTraining('Buruk');
    $jumK5 = $this->model('DatasetClassification_model')->getOutTraining('Sangat Buruk');
    $totK = $jumK1 + $jumK2 + $jumK3 + $jumK4 + $jumK5;

    $jumG1A=$this->model('DatasetClassification_model')->getKKTraining('delivery_time', intval($data['delivery_time']),"Sangat Baik");
    $jumG1B=$this->model('DatasetClassification_model')->getKKTraining('delivery_time', intval($data['delivery_time']),"Baik");
    $jumG1C=$this->model('DatasetClassification_model')->getKKTraining('delivery_time', intval($data['delivery_time']),"Cukup");
    $jumG1D=$this->model('DatasetClassification_model')->getKKTraining('delivery_time', intval($data['delivery_time']),"Buruk");
    $jumG1E=$this->model('DatasetClassification_model')->getKKTraining('delivery_time', intval($data['delivery_time']),"Sangat Buruk");

    $jumG2A=$this->model('DatasetClassification_model')->getKKTraining('execution', intval($data['execution']),"Sangat Baik");
    $jumG2B=$this->model('DatasetClassification_model')->getKKTraining('execution', intval($data['execution']),"Baik");
    $jumG2C=$this->model('DatasetClassification_model')->getKKTraining('execution', intval($data['execution']),"Cukup");
    $jumG2D=$this->model('DatasetClassification_model')->getKKTraining('execution', intval($data['execution']),"Buruk");
    $jumG2E=$this->model('DatasetClassification_model')->getKKTraining('execution', intval($data['execution']),"Sangat Buruk");

    $jumG3A=$this->model('DatasetClassification_model')->getKKTraining('team_work', intval($data['team_work']),"Sangat Baik");
    $jumG3B=$this->model('DatasetClassification_model')->getKKTraining('team_work', intval($data['team_work']),"Baik");
    $jumG3C=$this->model('DatasetClassification_model')->getKKTraining('team_work', intval($data['team_work']),"Cukup");
    $jumG3D=$this->model('DatasetClassification_model')->getKKTraining('team_work', intval($data['team_work']),"Buruk");
    $jumG3E=$this->model('DatasetClassification_model')->getKKTraining('team_work', intval($data['team_work']),"Sangat Buruk");


    $jumG4A=$this->model('DatasetClassification_model')->getKKTraining('innovation', intval($data['innovation']),"Sangat Baik");
    $jumG4B=$this->model('DatasetClassification_model')->getKKTraining('innovation', intval($data['innovation']),"Baik");
    $jumG4C=$this->model('DatasetClassification_model')->getKKTraining('innovation', intval($data['innovation']),"Cukup");
    $jumG4D=$this->model('DatasetClassification_model')->getKKTraining('innovation', intval($data['innovation']),"Buruk");
    $jumG4E=$this->model('DatasetClassification_model')->getKKTraining('innovation', intval($data['innovation']),"Sangat Buruk");

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

  public function svm($datatraining, $data) {

    $dataset = $datatraining;

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
    if ($predictions[0] == 1) {
      return "Yes";
    }
    
    return "No";
  }
}