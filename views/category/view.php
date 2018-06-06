<?php include ROOT . '/views/layouts/header.php'; ?>

    <link rel="stylesheet" type="text/css" href="/template/css/main_update.css">
    <link rel="stylesheet" type="text/css" href="/template/slider/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/template/slider/slick/slick-theme.css">


<?php include ROOT . '/views/layouts/sidebar_busket.php'; ?>



    <div id="wrapper">


    <section id="intro" class="wrapper style1 fullscreen fade-up">


        <div class="inner">

            <div class="center slider">
                <?
                if (isset($recommend_product)) {

                    foreach ($recommend_product as $row) { ?>
                        <div>
                            <img src='<? echo $row['image'] ?>' alt='' width='300' height='250'>
                            <center><a href='/product/<? echo $row['ID'] ?>'><? echo $row['name'] ?></a><br>
                                <span id="price"><? echo $row['price'] ?>.грн</span>
                                <center>
                        </div>
                        <?
                    }
                }
                ?>
            </div>


            <?
            foreach ($CategoryId as $row) { ?>
                <table>
                    <tr>
                        <td id='teb_test2'><img src='<? echo $row['image'] ?>' alt='' width='125' height='125'></td>
                        <td id='teb_test1'>
                            <a href='/product/<? echo $row['ID'] ?>'><? echo $row['name'] ?></a> <span
                                    id="price"><? echo $row['price'] ?>.грн</span>
                            <? if ($row['new']) { ?><img src="/images/new.png"><?
                            } ?> <br><? echo $row['specifications'] ?></td>
                    </tr>
                </table>
                <?
            }
            ?>


        </div>

        <? echo $pagination->get(); ?>

    </section>


    <!--  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>-->

    <script src="/template/js/list_product.js"></script>
<?php include ROOT . '/views/layouts/footer.php'; ?>