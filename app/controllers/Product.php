<?php

class Product extends Controller {

  
  public function index()
  {
    $data["judul"] = "Data Product";
    $data["Product"] = $this->model("ProductModel")->getAllProduct();
    $this->view("templates/header", $data);
    $this->view("Product/index", $data);
    $this->view("templates/footer");
  }

  public function tambahProduct()
  {
    if ($this->model("ProductModel")->tambahDataProduct($_POST) > 0){
      Flasher::setFlash('Data Product', 'berhasil', 'ditambahkan', 'success');
      header("Location:" . BASEURL . "/Product");
      exit;
    } else{
      Flasher::setFlash('Data Product', 'gagal', 'ditambahkan', 'danger');
      header("Location:" . BASEURL . "/Product");
      exit;
    }
  }

  public function getUbahProduct()
  {
    echo json_encode($this->model("ProductModel")->getProductById($_POST["id"]));
  }

  public function editProduct()
  {
    if ($this->model("ProductModel")->ubahDataProduct($_POST) > 0){
      Flasher::setFlash('Data Product', 'berhasil', 'diubah', 'success');
      header("Location:" . BASEURL . "/Product");
      exit;
    } else{
      Flasher::setFlash('Data Product', 'gagal', 'diubah', 'danger');
      header("Location:" . BASEURL . "/Product");
      exit;
    }
  }

  public function hapusProduct($id)
  {
    if ($this->model("ProductModel")->hapusDataProduct($id) > 0){
      Flasher::setFlash('Data Product', 'berhasil', 'dihapus', 'success');
      header("Location:" . BASEURL . "/Product");
      exit;
    } else{
      Flasher::setFlash('Data Product', 'gagal', 'dihapus', 'danger');
      header("Location:" . BASEURL . "/Product");
      exit;
    }
  }

}