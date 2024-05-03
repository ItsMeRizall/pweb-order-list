<?php
class ProductModel 
{
  private $table = "product";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllProduct()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getColumnsProduct()
  {
    $this->db->query("SHOW COLUMNS FROM ". $this->table);
    return $this->db->resultSet();
  }

  public function countProduct()
    {
      $this->db->query("SELECT COUNT(*) as total FROM ". $this->table);
      $result = $this->db->single();

      return $result['total'];
    }

    public function tambahDataProduct($data)
    {
        
        $fileName = $_FILES['product_image']['name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    
        
        $newFileName = 'product_' . date('YmdHis') . '.' . $fileExt;
    
        
        $targetDir = "./assets/";
    
        $targetFilePath = $targetDir . $newFileName;
    
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO " . $this->table . " VALUES ('', :name_product, :price, :stock, :type_product, :image_product)";
            $this->db->query($query);
            $this->db->bind(":name_product", $data["name_product"]);
            $this->db->bind(":price", $data["price"]);
            $this->db->bind(":stock", $data["stock"]);
            $this->db->bind(":type_product", $data["type_product"]);
            $this->db->bind(":image_product", $newFileName);
    
            $this->db->execute();
            var_dump($this->db->rowCount());
            return $this->db->rowCount();
        } else {
            return "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
    

  public function getProductById($id)
  {
    $this->db->query("SELECT * FROM ". $this->table . " WHERE id=:id");
    $this->db->bind("id", $id);
    return $this->db->single();
  }

  // public function ubahDataProduct($data)
  // {
  //   $query = "UPDATE " . $this->table . " SET 
  //             name_product = :name_product,
  //             price = :price,
  //             stock = :stock,
  //             type_product = :type_product
  //           WHERE id = :id;";
    
  //   $this->db->query($query);
  //   $this->db->bind("id", $data["id"]);
  //   $this->db->bind("name_product", $data["name_product"]);
  //   $this->db->bind("price", $data["price"]);
  //   $this->db->bind("stock", $data["stock"]);
  //   $this->db->bind("type_product", $data["type_product"]);

  //   $this->db->execute();
  //   return $this->db->rowCount();

  // }

  public function ubahDataProduct($data)
{
    $query = "UPDATE " . $this->table . " SET 
              name_product = :name_product,
              price = :price,
              stock = :stock,
              type_product = :type_product,
              image_product = :image_product
            WHERE id = :id;";
    
    // Upload image if provided
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['product_image']['name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = 'product_' . date('YmdHis') . '.' . $fileExt;
        $targetDir = "./assets/images_product";
        $targetFilePath = $targetDir . $newFileName;

        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFilePath)) {
            $data['image_product'] = $newFileName;
        } else {
            return "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }

    $this->db->query($query);
    $this->db->bind(":id", $data["id"]);
    $this->db->bind(":name_product", $data["name_product"]);
    $this->db->bind(":price", $data["price"]);
    $this->db->bind(":stock", $data["stock"]);
    $this->db->bind(":type_product", $data["type_product"]);
    if (isset($data['image_product'])) {
        $this->db->bind(":image_product", $data['image_product']);
    } else {
        $this->db->bind(":image_product", null, PDO::PARAM_NULL);
    }

    $this->db->execute();
    return $this->db->rowCount();
}


  public function hapusDataProduct($id)
  {
    $query = "DELETE FROM " . $this->table . 
              " WHERE id = :id";
    $this->db->query($query);
    $this->db->bind("id", $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

}

