<?php

class Dashboard extends Controller {

  
  public function index()
  {
    $data["judul"] = "Data Product";
    $data["Product"] = $this->model("ProductModel")->getAllProduct();
    $this->view("dashboard/index", $data);
  }
}