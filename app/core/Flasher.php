<?php

class Flasher {
  public static function setFlash($pesan, $aksi, $tipe, $section) {
    $_SESSION['flash'] = [
      'pesan' => $pesan,
      'aksi' => $aksi,
      'tipe' => $tipe,
      'section' => $section,
    ];
  }

  public static function flash() {
    if (isset($_SESSION['flash'])) {
      echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
            Data '. $_SESSION['flash']['section'] . ' <strong>'. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'] .' .
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      unset($_SESSION['flash']);
    }
  }

  public static function setError($pesan) {
    $_SESSION['error'] = $pesan;
  }

  public static function flashError() {
    if (isset($_SESSION['error'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            '. $_SESSION['error'] .'
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      unset($_SESSION['error']);
    }
  }
}