<?php

class Periode extends Controller {
  public function index() {
    Utils::PrivatePage();
    $data['judul'] = 'Home';

    $data['periodes'] = $this->model('Periode_model')->getAll();

    $this->view('periode/index', $data);
  }

  public function add() {
    Utils::PrivatePage();

    $result = $this->model("Periode_model")->add($_POST);

    if ($result['count'] > 0) {
      Flasher::setFlash('berhasil', 'ditambah', 'success', 'Periode');
      header('Location: ' . BASEURL . '/periode');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambah', 'danger', 'Periode');
      header('Location: ' . BASEURL . '/periode');
      exit;
    }
  }

  public function start($id) {
    $result = $this->model("Periode_model")->start($id);

    if ($result['count'] > 0) {
      Flasher::setFlash('berhasil', 'dimulai', 'success', 'Periode');
      header('Location: ' . BASEURL . '/periode');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dimulai', 'danger', 'Periode');
      header('Location: ' . BASEURL . '/periode');
      exit;
    }
  }

  public function publish($id) {
    $result = $this->model("Periode_model")->publish($id);

    if ($result['count'] > 0) {
      Flasher::setFlash('berhasil', 'diterbitkan', 'success', 'Periode');
      header('Location: ' . BASEURL . '/periode');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diterbitkan', 'danger', 'Periode');
      header('Location: ' . BASEURL . '/periode');
      exit;
    }
  }
}