<?php 

class Penilaian extends Controller {
    public function index() {
      Utils::PrivatePage();

      $data['judul'] = 'Form penilaian';

      $this->view('penilaian/index', $data);
    }
}