<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        switch($current_page) {
            case 'index': echo 'ЖД Вокзал Стерлитамак | Главная'; break;
            case 'schedule': echo 'Табло — ЖД Вокзал Стерлитамак'; break;
            case 'tickets': echo 'Покупка билетов — ЖД Вокзал Стерлитамак'; break;
            default: echo 'ЖД Вокзал Стерлитамак';
        }
    ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Шапка -->
    <header class="header">
        <div class="container header__container">
            <a href="index.php" class="header__logo">
                <div class="logo__icon"><i class="fas fa-train"></i></div>
                <div>
                    <span class="logo__title">ЖД ВОКЗАЛ</span>
                    <span class="logo__subtitle">СТЕРЛИТАМАК</span>
                </div>
            </a>
            
            <nav class="header__nav" id="mainNav">
                <ul class="nav__list">
                    <li><a href="schedule.php" class="nav__link <?php echo $current_page === 'schedule' ? 'active-page' : ''; ?>"><i class="fas fa-clock"></i> Табло</a></li>
                    <li><a href="tickets.php" class="nav__link <?php echo $current_page === 'tickets' ? 'active-page' : ''; ?>"><i class="fas fa-ticket-alt"></i> Билеты</a></li>
                    <li><a href="index.php#services" class="nav__link">Услуги</a></li>
                    <li><a href="index.php#news" class="nav__link">Новости</a></li>
                    <li><a href="index.php#faq" class="nav__link">FAQ</a></li>
                    <li><a href="index.php#contacts" class="nav__link">Контакты</a></li>
                </ul>
            </nav>
            
            <div class="header__actions">
                <a href="tel:88001001001" class="header__phone">
                    <i class="fas fa-phone"></i>
                    <span>8 (800) 100-10-01</span>
                </a>
                <button class="btn btn--secondary header__login" id="loginBtn">
                    <i class="fas fa-user"></i> Войти
                </button>
                <div class="burger" id="burgerBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>