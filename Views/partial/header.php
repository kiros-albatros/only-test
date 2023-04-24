<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link type="text/css" href="style.css" rel="stylesheet" media="all"/>
    <title>Test for Only</title>
</head>
<body>

<header class="header">
    <div class="header__wrapper">
        <div class="header__column">
            <a href="<?= URLROOT ?>">Главная страница</a>
        </div>
        <div class="header__column">
            <?php
            if (isset($_SESSION['user_id'])) { ?>
                <a href="<?= URLROOT ?>/profile/<?= $_SESSION['user_id'] ?>">Личный кабинет</a>
                <a href="<?= URLROOT ?>/logout">Выйти</a>
            <?php } else { ?>
                <a href="<?= URLROOT ?>/login">Войти</a>
                <a href="<?= URLROOT ?>/register">Регистрация</a>
            <?php }
            ?>
        </div>
    </div>
</header>
<main>
    <div class="container">

