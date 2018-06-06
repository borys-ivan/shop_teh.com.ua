<section id="sidebar">
    <div class="inner">

        <?

        foreach ($users_inform as $getUser) {
            echo "<br>Користувач:" . $getUser['user'];
            echo "<br>Пароль:" . $getUser['pass'];

            echo "<br>Імя:" . $getUser['name'];
            echo "<br>Прізвище:" . $getUser['surname'];

            echo "<br>Скринька:" . $getUser['email'];
            echo "<br>Телефон:" . $getUser['number'];
        }
        ?>

        <ul class="actions">
            <li><a href="/cabinet/update_users/<?echo $_SESSION['user_ID']?>" class="button scrolly">Редагувати профіль</a></li>
        </ul>
        <ul class="actions">
            <li><a href="/cabinet/logout" class="button scrolly">Вихід</a></li>
        </ul>


    </div>
</section>