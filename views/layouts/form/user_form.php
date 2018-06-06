<script src="/template/js/myscripts.js"></script>
<div id="block">
    <?if (!isset($_SESSION['user_ID'])) { ?>
        <div>
            <h4>Користувач</h4>
            <center><p><input size='15' type='text' id='user_name'></p></center>
            <h4>Пароль</h4>
            <center><p><input type='password' id='pass'></p></center>
            <ul class='actions'>
                <center>
                    <li><input type='submit' id='submit' value="вхід"></li>
                </center>
            </ul>
            <center><a href='/cabinet/registration_or_login'>Реєстрація</a></center>
        </div>
    <?}if (isset($_SESSION['user_ID'])) { ?>
        <center>Користувач:<a href='/cabinet'><? print_r($_SESSION['user_name']) ?></a><br></center>
        <center><a href='/cabinet/logout'>вихід</a></center>

    <? } ?>
</div>


