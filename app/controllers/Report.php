<?php

class Report extends Controller {
  public function index() {

  }

  public function kenaikangaji() {
    Utils::PrivatePage();

    $data['periodes'] = $this->model('Periode_model')->getAll();
    $data['periode'] = $this->model('Periode_model')->getActive();
    $data['users'] = $this->model('User_model')->getAllEmployee();

    $data['users_penilaian'] = array();

    foreach($data['users'] as $x => $val) {
      $temp['penilaian'] = $this->model('Penilaian_model')->getPenilaianAndResultByUserID($data['periode']['id'], $data['users'][$x]['user_id']);
      $temp['user'] = $data['users'][$x];

      $data['users_penilaian'][$x] = $temp;
    }
    $this->view('report/kenaikangaji', $data);
  }

  public function kenaikangajibyperiode($id) {
    Utils::PrivatePage();

    $data['periodes'] = $this->model('Periode_model')->getAll();
    $data['periode'] = $this->model('Periode_model')->getDetail($id);
    $data['users'] = $this->model('User_model')->getAllEmployee();

    $data['users_penilaian'] = array();

    foreach($data['users'] as $x => $val) {
      $temp['penilaian'] = $this->model('Penilaian_model')->getPenilaianAndResultByUserID($data['periode']['id'], $data['users'][$x]['user_id']);
      $temp['user'] = $data['users'][$x];

      $data['users_penilaian'][$x] = $temp;
    }
  }

  public function evaluasi() {
    Utils::PrivatePage();

    $data['periodes'] = $this->model('Periode_model')->getAll();
    $data['periode'] = $this->model('Periode_model')->getActive();
    $data['users'] = $this->model('User_model')->getAllEmployee();

    $data['users_penilaian'] = array();

    foreach($data['users'] as $x => $val) {
      $temp['penilaian'] = $this->model('Penilaian_model')->getPenilaianAndResultByUserID($data['periode']['id'], $data['users'][$x]['user_id']);
      $temp['user'] = $data['users'][$x];

      $data['users_penilaian'][$x] = $temp;
    }

    $this->view('report/evaluasi', $data);
  }

  public function evaluasibyperiode($id) {
    Utils::PrivatePage();

    $data['periodes'] = $this->model('Periode_model')->getAll();
    $data['periode'] = $this->model('Periode_model')->getDetail($id);
    $data['users'] = $this->model('User_model')->getAllEmployee();

    $data['users_penilaian'] = array();

    foreach($data['users'] as $x => $val) {
      $temp['penilaian'] = $this->model('Penilaian_model')->getPenilaianAndResultByUserID($data['periode']['id'], $data['users'][$x]['user_id']);
      $temp['user'] = $data['users'][$x];

      $data['users_penilaian'][$x] = $temp;
    }

    $this->view('report/evaluasi', $data);
  }
}