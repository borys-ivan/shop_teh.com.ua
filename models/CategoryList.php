<?php


class CategoryList

{
    const SHOW_BY_DEFAULT = 5;

    public static function getCategoriesList()
    {

        $db = Db::dbConnect();

        $category = $db->get_results("SELECT*FROM category", ARRAY_A);

        if ($category) {
            foreach ($category as $row) {
                $rez[] = array('ID' => $row['ID'], 'name_cat' => $row['category'], 'id_cat' => $row['category_ID']
                , 'image' => $row['image']);
            }

            return $rez;

        }

    }

    public static function getCategoryId($id, $page = 1)
    {
        if ($id) {
            $db = Db::dbConnect();
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            // echo SHOW_BY_DEFAULT;
            // echo $offset;

            $products = $db->get_results("SELECT list_products.ID,list_products.name,product.price,product.specifications
               ,product.image,product.is_new 
               FROM list_products,product 
               WHERE list_products.ID=product.ID 
               AND list_products.category_ID='" . $db->escape($id) . "' 
               ORDER BY list_products.ID ASC 
               LIMIT " . self::SHOW_BY_DEFAULT .
                " OFFSET " . $offset, ARRAY_A);

            // echo $db->debug();


            if ($products) {
                foreach ($products as $row) {
                    $rez[] = array('ID' => $row['ID'], 'name' => $row['name'], 'price' => $row['price'],
                        'specifications' => $row['specifications'], 'image' => $row['image'],'new'=>$row['is_new']);
                }

                return $rez;

            }


        }
        // return $category_prod;

    }

    public static function getProductCount($id)
    {
        $db = Db::dbConnect();
        $result = $db->get_var("SELECT count(ID) AS count FROM list_products WHERE category_ID='" . $db->escape($id) . "'");

        return $result;
    }


    public static function recommend_product($id)
    {

        $db = Db::dbConnect();

        $recommend = $db->get_results("SELECT list_products.ID,list_products.name,product.price,product.specifications,product.image 
               FROM list_products,product 
               WHERE list_products.ID=product.ID 
               AND list_products.category_ID='" . $db->escape($id) . "' 
               AND is_recommended>=10", ARRAY_A);

        if ($recommend) {
            foreach ($recommend as $row) {
                $rez[] = array('ID' => $row['ID'], 'name' => $row['name'], 'price' => $row['price'], 'image' => $row['image']);
            }

            return $rez;

        }

    }

}