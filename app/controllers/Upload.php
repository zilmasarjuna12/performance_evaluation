<?php

class Upload extends Controller {
  public function add() {
    $fileName = $_FILES['file']['name'];
    $fileNameSemen = $_FILES['file']['tmp_name'];

    $dirUpload = "./file/";
    move_uploaded_file($fileNameSemen, $dirUpload.$fileName);

    echo "/file/".$fileName;
  }
}