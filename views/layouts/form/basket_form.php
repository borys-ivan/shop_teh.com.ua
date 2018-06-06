<script src="/template/js/basket.js"></script>


<div id="block2">
    <?
    if(!empty($_SESSION['basket'])) {
       // print_r($_SESSION['basket']);
        echo("<br><br> Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>");
        echo("Cумма:" . $_SESSION['total_price'] . ".грн");
        echo "<br><a href='/user_basket'>Увійти в корзину</a><br>";
    }else{
        //print_r($_SESSION['basket']);
        echo("<br><br> Загальна кількість:0.шт<br>");
        echo("Cумма:0.грн");
        echo "<br><a href='/user_basket'>Увійти в корзину</a><br>";
    }

/*   echo Busket::view_basket();*/

   ?>
</div>