<? //session_start();?>

<?php include ROOT . '/views/layouts/header.php'; ?>


<?php include ROOT . '/views/layouts/sidebar.php'; ?>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Intro -->
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h1>Вас вітає інтернет магазин!</h1>

            <!--<ul class="actions">
                <li><a href="#one" class="button scrolly">Детальніше</a></li>
            </ul>-->
        </div>
    </section>


    <!-- One -->
    <section id="one" class="wrapper style2 spotlights">
        <section>
            <!--<a href="#" class="image"><img src="images/pic01.jpg" alt="" data-position="center center"/></a>-->

            <div class="content">
                <div class="inner">
                    <h2>Каталог</h2>

                    <!--<img href="test" width='235' height='235' src="/images/tablet.png">
                    <a href=""><img width='235' height='235' src="/images/laptop.png"></a>
                    <a href=""><img width='235' height='235' src="/images/phone.png"></a>-->
                    <? //include "php/CategoryList.php";?>

                    <?

                    foreach ($categories as $row) { ?>

                        <!-- echo "<br><br><a href='/category/" . $row['id_cat'] . "'class='button'>" .
                        //     $row['name_cat'] . "</a>";-->
                        <a id="a_category" href='/category/<? echo $row['id_cat']; ?>'><img width='235' height='235'
                                                                                            src='<? echo $row['image']; ?>'><? //echo $row['name_cat'];?>
                        </a>


                    <? } ?>
                    <br>
                    <p>
                    <li>Все що ви купите в нашому магазині - це сертифіковані товари, на які є гарантія виробника.
                    </li>
                    </p>
                    <p>
                    <li>Ви не продадуть того, що вам не потрібно.</li>
                    </p>
                    <p>
                    <li>Ми не тільки доставляємо товар, але і надаємо сервіс і техобслуговування.
                        Ви ніколи не залишитеся без відповіді на свої питання.
                    </li>
                    </p>


                    <!--<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
                    <ul class="actions">
                        <li><a href="#" class="button">Learn more</a></li>
                    </ul>-->
                </div>
            </div>
        </section>


        <!--<section>
            <a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
            <div class="content">
                <div class="inner">
                    <h2>Feugiat consequat</h2>
                    <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
                    <ul class="actions">
                        <li><a href="#" class="button">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <a href="#" class="image"><img src="images/pic03.jpg" alt="" data-position="25% 25%" /></a>
            <div class="content">
                <div class="inner">
                    <h2>Ultricies aliquam</h2>
                    <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
                    <ul class="actions">
                        <li><a href="#" class="button">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </section>-->

        <!-- Two -->
        <!--	<section id="two" class="wrapper style3 fade-up">
                <div class="inner">
                    <h2>What we do</h2>
                    <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
                    <div class="features">
                        <section>
                            <span class="icon major fa-code"></span>
                            <h3>Lorem ipsum amet</h3>
                            <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                        </section>
                        <section>
                            <span class="icon major fa-lock"></span>
                            <h3>Aliquam sed nullam</h3>
                            <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                        </section>
                        <section>
                            <span class="icon major fa-cog"></span>
                            <h3>Sed erat ullam corper</h3>
                            <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                        </section>
                        <section>
                            <span class="icon major fa-desktop"></span>
                            <h3>Veroeros quis lorem</h3>
                            <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                        </section>
                        <section>
                            <span class="icon major fa-chain"></span>
                            <h3>Urna quis bibendum</h3>
                            <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                        </section>
                        <section>
                            <span class="icon major fa-diamond"></span>
                            <h3>Aliquam urna dapibus</h3>
                            <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                        </section>
                    </div>
                    <ul class="actions">
                        <li><a href="#" class="button">Learn more</a></li>
                    </ul>
                </div>
            </section>-->

        <!-- Three -->
        <section id="three" class="wrapper style1 fade-up">
            <div class="inner">
                <h2>Контакти</h2><br><br><br><br>
                <!--<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat
                    malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet
                    imperdiet est velit quis lorem.</p>-->
                <div class="split style1">
                    <section>
                        <!--    <form method="post" action="site/SendingToMail">
                                <div class="field half first">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"/>
                                </div>
                                <div class="field half">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"/>
                                </div>
                                <div class="field">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" rows="5"></textarea>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" name="submit" value="Send Message"></li>
                                </ul>
                            </form>-->
                    </section>
                    <section>
                        <ul class="contact">
                            <li>
                                <h3>Email</h3>
                                <a href="#">borys.ivan@gmail.com</a>
                            </li>
                            <li>
                                <h3>Phone</h3>
                                <span>(093)61-377-64</span>
                            </li>
                            <li>
                                <h3>Social</h3>
                                <ul class="icons">
                                    <!--<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>-->
                                    <li><a href="https://www.facebook.com/ivan.borys.39" class="fa-facebook"><span
                                                    class="label">Facebook</span></a></li>
                                    <li><a href="https://github.com/borys-ivan/shop_teh.ua" class="fa-github"><span
                                                    class="label">GitHub</span></a></li>
                                    <!--<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>-->
                                    <!--<li><a href="#" class="fa-linkedin"><span class="label">LinkedIn</span></a></li>-->
                                </ul>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </section>

</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>
