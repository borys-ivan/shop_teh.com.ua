<?php include ROOT . '/views/layouts/header.php'; ?>

<link rel="stylesheet" href="/template/css/zoom_image.css"/>
<!--<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/template/js/myscripts.js"></script>-->


<?php include ROOT . '/views/layouts/sidebar_busket.php'; ?>


<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">


            <div id="block">


            </div>


            <h1><?
                foreach ($ProductId as $row) {

                echo $row['name']; ?></h1>


            <em>Артикул:<? echo $row['ID_product'] ?></em>
            <p><a href='#'><img width='300' height='300' src='<? echo $row['image'] ?>'/></a></p>


            <h4>Опис:</h4>
            <div id="text2" style="display:none; text-align:justify;">
                <br><h5><em> <? echo $row['description'] ?></em></h5><br></div>
            <a href="javascript:look('text2');" id="a-text2">показати</a><br><br>


            <a href='#' data-id='<? echo $row['ID']; ?>' class="add_to_basket">Добавити в корзину</a><br>
            <a href='#' data-id='<? echo $row['ID']; ?>' class="remove_from_basket">Видалити з корзини</a><br>


            <h2>Ціна:<? echo $row['price'] ?>.грн</h2><br>


            <br><h4>Характеристика:</h4>

            <? echo $row['specifications'];
            } ?>


        </div>
    </section>


    <script src="/template/js/show_hide_text.js"></script>
    <script src="/template/js/zoom_image.js"></script>


    <?php include ROOT . '/views/layouts/footer.php'; ?>
