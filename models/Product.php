<?php


class Product
{

    public static function getProductId($id)
    {

        $db = Db::dbConnect();

        $product = $db->get_results("SELECT*FROM product WHERE ID='" . $db->escape($id) . "'", ARRAY_A);
        if ($product) {



            foreach ($product as $row) {

                if($row['is_new']==1){
                    $name_new="Так";
                }else{$name_new="Ні";}

                if($row['status']==1){
                    $name_status="Опублікувати";
                }else{$name_status="Приховати";}

                $rez[] = array('ID' => $row['ID'], 'name' => $row['name'], 'description' => $row['description'],
                    'price' => $row['price'], 'specifications' => $row['specifications'], 'ID_product' => $row['ID_product']
                , 'image' => $row['image'],'new'=>$row['is_new'],'status'=>$row['status']
                ,'count'=>$row['count'],'name_status'=>$name_status,'name_new'=> $name_new);
            }

            return $rez;


        } else {
            echo "<br> ID товара не знайдено в базі данних";
        }

        //return $product;


    }

    public static function addProduct($category, $id_product, $name, $name_image, $description,
                                      $specifications, $price, $new, $status, $count)
    {

        $db = Db::dbConnect();

        $path = "/image/";

        $add_list_products = $db->query("INSERT INTO list_products (`name`,`category_ID`) 
VALUES ('" . $db->escape($name) . "','" . $db->escape($category) . "')");
        $add_product = $db->query("INSERT INTO product (`name`,`description`,`price`,`specifications`,`id_product`,
            `image`,`is_new`,`status`,`count`)
VALUES ('" . $db->escape($name) . "','" . $db->escape($description) . "','" . $db->escape($price) . "',
        '" . $db->escape($specifications) . "','" . $db->escape($id_product) . "','" . $db->escape($path . $name_image) .
            "','" . $db->escape($new) . "','" . $db->escape($status) . "','" . $db->escape($count) . "')");

        //echo $db->debug();
    }


    public static function checkNameProduct($name)
    {
        if (strlen($name) != 0) {
            return true;
        }
        return false;
    }

    public static function checkArticle($id_product)
    {
        if (strlen($id_product) != 0) {
            return true;
        }
        return false;
    }

    public static function checkCategory($category)
    {
        if ($category != 'Вибрати категорію') {
            return true;
        }
        return false;
    }


}