<?php include ROOT . '/views/layouts/header.php'; ?>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/template/js/basket_order.js"></script>




<?php include ROOT . '/views/layouts/sidebar_busket.php'; ?>



<?php
    if($_SESSION['basket'])
        {
          include ROOT . '/views/layouts/form/form_order_list.php';
      
        }else{
            
            include ROOT . '/views/layouts/form/empty_order_list.php';
        }
?>


<?php include ROOT . '/views/layouts/footer.php'; ?>

