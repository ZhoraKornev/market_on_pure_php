<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<meta name="description" content="">-->
    <meta name="author" content="">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <link href="/assets/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/styles/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/styles/prettyPhoto.css" rel="stylesheet">
    <link href="/assets/styles/price-range.css" rel="stylesheet">
    <link href="/assets/styles/animate.css" rel="stylesheet">
    <link href="/assets/styles/main.css" rel="stylesheet">
    <link href="/assets/styles/responsive.css" rel="stylesheet">
    <!--<!--[if lt IE 9]>-->
    <script src="/assets/js/html5shiv.js"></script>
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="tel:+38 093 093 093"><i class="fa fa-phone"></i> +38 093 093 093</a></li>
                            <li><a href="mailto:testmail@gmail.com"><i class="fa fa-envelope"></i> testmail@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/assets/img/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/cart">
                                    <i class="fa fa-shopping-cart"></i> Корзина
                                    (<span id="cart-count"><?php echo cart::countItems(); ?></span>)
                                </a>
                            </li>
                            <?php if (user::isGuest()): ?>
                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                            <?php else: ?>
                            <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="/cart/">Корзина</a></li>
                                </ul>
                            </li>
                            <li><a href="/blog/">Блог</a></li>
                            <li><a href="/about/">О магазине</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
<!--Реализация хлебных крошек в микроформате всё реализовано на лету-->
    <?php
    //$path = $_SERVER["PHP_SELF"];
    $path = $_SERVER['REQUEST_URI'];
    $parts = explode('/',$path);
    $domenName = 'http://wezom.test';
    //print_r($parts);
    //Проверяем на каком уровне мы находимся
    if (count($parts) < 2)
    {
        echo("<div itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"\" itemprop=\"url\"><span itemprop=\"title\">$pageDescription</span></a></div>");
    }
    //если мы находимся на вложеном подуровне то смотрим где + добавляем ссылки в путь, потому как микроформат требует полного пути то используем перменную имени домена
    else
    {
        echo ("<div itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"$domenName\" itemprop=\"url\"><span itemprop=\"title\">Главная</span></a> &raquo; ");
        //print_r($parts);
        for ($i = 2; $i < count($parts); $i++)
        {
            if (!strstr($parts[$i],"."))
            {
                echo("<a href=$domenName/");
                for ($j = 0; $j <= $i; $j++) {echo $parts[$j]."";};
                //echo("\">". str_replace('-', ' ', $parts[$i])."</a> » ");
                echo("\">". $pageDescription."</a> » ");


            }
            else
            {
                $str = $parts[$i];
                $pos = strrpos($str,".");
                $parts[$i] = substr($str, 0, $pos);
                echo str_replace('-', ' ', $parts[$i]);
            };
        };
    };
    ?>
<!--    <?php /*breadCrumbs::run(); */?>
    --><?php /*echo $crumbs['text'] */?>



<!--    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="адрес страницы 3го уровня (например, подрубрика)" itemprop="url">
            <span itemprop="title">$pageDescription</span>
        </a>
    </div>-->



</header><!--/header-->