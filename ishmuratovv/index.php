<?php include 'header.php'; ?>

<!-- Hero секция -->
<section class="hero">
    <div class="hero__bg">
        <img src="https://images.unsplash.com/photo-1520105072097-a42e7fd37e1b?w=1920&q=80" alt="Вокзал">
    </div>
    <div class="hero__overlay"></div>
    <div class="container hero__content">
        <h1 class="hero__title">Путешествуйте по Башкортостану<br>с комфортом</h1>
        <p class="hero__subtitle">Покупка билетов онлайн, актуальное расписание, полный спектр услуг</p>
        
        <!-- Форма поиска -->
        <form class="search-form" id="searchForm">
            <div class="search-form__row">
                <div class="search-form__group autocomplete-wrapper">
                    <label class="search-form__label" for="fromStation">
                        <i class="fas fa-map-marker-alt"></i> Откуда
                    </label>
                    <input type="text" id="fromStation" class="search-form__input" placeholder="Город отправления" required autocomplete="off">
                    <div class="autocomplete-dropdown" id="fromDropdown"></div>
                </div>
                
                <button type="button" class="search-form__swap" id="swapBtn" title="Поменять местами">
                    <i class="fas fa-exchange-alt"></i>
                </button>
                
                <div class="search-form__group autocomplete-wrapper">
                    <label class="search-form__label" for="toStation">
                        <i class="fas fa-map-marker-alt"></i> Куда
                    </label>
                    <input type="text" id="toStation" class="search-form__input" placeholder="Город назначения" required autocomplete="off" disabled>
                    <div class="autocomplete-dropdown" id="toDropdown"></div>
                </div>
            </div>
            
            <div class="search-form__row search-form__row--bottom">
                <div class="search-form__group">
                    <label class="search-form__label" for="searchDate">
                        <i class="fas fa-calendar"></i> Дата
                    </label>
                    <input type="date" id="searchDate" class="search-form__input" required>
                </div>
                
                <div class="search-form__group">
                    <label class="search-form__label" for="searchPassengers">
                        <i class="fas fa-users"></i> Пассажиры
                    </label>
                    <select id="searchPassengers" class="search-form__input">
                        <option value="1">1 пассажир</option>
                        <option value="2">2 пассажира</option>
                        <option value="3">3 пассажира</option>
                        <option value="4">4 пассажира</option>
                        <option value="5">5 пассажиров</option>
                    </select>
                </div>
                
                <button type="button" class="btn btn--primary btn--large" id="searchBtn">
                    <i class="fas fa-search"></i> Найти билеты
                </button>
            </div>
            
            <div class="search-form__message" id="searchMessage"></div>
        </form>
    </div>
</section>

<!-- Популярные маршруты -->
<section class="section">
    <div class="container">
        <h2 class="section__title">Популярные направления из Стерлитамака</h2>
        <p class="section__subtitle">Выбирайте удобное время и покупайте билеты онлайн</p>
        
        <div class="routes-grid" id="newsGrid">
            <div class="route-card anim">
                <div class="route-card__image">
                    <img src="https://images.unsplash.com/photo-1570125909232-eb263c188f7e?w=600&q=80" alt="Уфа">
                    <span class="route-card__badge">Популярное</span>
                </div>
                <div class="route-card__content">
                    <div class="route-card__header">
                        <h3 class="route-card__title">Стерлитамак — Уфа</h3>
                        <span class="route-card__distance">145 км</span>
                    </div>
                    <div class="route-card__info">
                        <span class="route-card__item"><i class="far fa-clock"></i> 2 ч 15 мин</span>
                        <span class="route-card__item"><i class="fas fa-train"></i> 8 рейсов в день</span>
                    </div>
                    <div class="route-card__price">
                        <span class="price__label">от</span>
                        <span class="price__value">450 ₽</span>
                    </div>
                    <a href="tickets.php?from=Стерлитамак&to=Уфа" class="btn btn--primary btn--full">Купить билет</a>
                </div>
            </div>
            
            <div class="route-card anim">
                <div class="route-card__image">
                    <img src="https://vsedomarossii.ru/albums/254/9853.jpg" alt="Салават">
                </div>
                <div class="route-card__content">
                    <div class="route-card__header">
                        <h3 class="route-card__title">Стерлитамак — Салават</h3>
                        <span class="route-card__distance">85 км</span>
                    </div>
                    <div class="route-card__info">
                        <span class="route-card__item"><i class="far fa-clock"></i> 1 ч 30 мин</span>
                        <span class="route-card__item"><i class="fas fa-train"></i> 6 рейсов в день</span>
                    </div>
                    <div class="route-card__price">
                        <span class="price__label">от</span>
                        <span class="price__value">320 ₽</span>
                    </div>
                    <a href="tickets.php?from=Стерлитамак&to=Салават" class="btn btn--primary btn--full">Купить билет</a>
                </div>
            </div>
            
            <div class="route-card anim">
                <div class="route-card__image">
                    <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=600&q=80" alt="Кумертау">
                </div>
                <div class="route-card__content">
                    <div class="route-card__header">
                        <h3 class="route-card__title">Стерлитамак — Кумертау</h3>
                        <span class="route-card__distance">120 км</span>
                    </div>
                    <div class="route-card__info">
                        <span class="route-card__item"><i class="far fa-clock"></i> 2 ч 00 мин</span>
                        <span class="route-card__item"><i class="fas fa-train"></i> 5 рейсов в день</span>
                    </div>
                    <div class="route-card__price">
                        <span class="price__label">от</span>
                        <span class="price__value">380 ₽</span>
                    </div>
                    <a href="tickets.php?from=Стерлитамак&to=Кумертау" class="btn btn--primary btn--full">Купить билет</a>
                </div>
            </div>
            
            <div class="route-card anim">
                <div class="route-card__image">
                    <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=600&q=80" alt="Сибай">
                    <span class="route-card__badge route-card__badge--new">Новое</span>
                </div>
                <div class="route-card__content">
                    <div class="route-card__header">
                        <h3 class="route-card__title">Стерлитамак — Сибай</h3>
                        <span class="route-card__distance">180 км</span>
                    </div>
                    <div class="route-card__info">
                        <span class="route-card__item"><i class="far fa-clock"></i> 3 ч 10 мин</span>
                        <span class="route-card__item"><i class="fas fa-train"></i> 4 рейса в день</span>
                    </div>
                    <div class="route-card__price">
                        <span class="price__label">от</span>
                        <span class="price__value">520 ₽</span>
                    </div>
                    <a href="tickets.php?from=Стерлитамак&to=Сибай" class="btn btn--primary btn--full">Купить билет</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Новости -->
<section class="section section--gray" id="news">
    <div class="container">
        <h2 class="section__title">Новости вокзала</h2>
        <p class="section__subtitle">Актуальная информация и объявления</p>
        
        <div class="news-filters" id="newsFilters">
            <button class="news-filter active" data-category="all">Все</button>
            <button class="news-filter" data-category="schedule">Расписание</button>
            <button class="news-filter" data-category="promo">Акции</button>
            <button class="news-filter" data-category="info">Информация</button>
            <button class="news-filter" data-category="repair">Ремонт</button>
        </div>
        
        <div class="news-grid">
            <article class="news-card anim" data-category="schedule">
                <div class="news-card__image">
                    <img src="https://images.unsplash.com/photo-1535535112387-56ffe8db21ff?w=600&q=80" alt="Новость">
                    <div class="news-card__date">
                        <span class="day">04</span>
                        <span class="month">апр</span>
                    </div>
                </div>
                <div class="news-card__content">
                    <span class="news-card__category">Расписание</span>
                    <h3 class="news-card__title">Изменения в расписании на апрель</h3>
                    <p class="news-card__excerpt">С 5 апреля вносятся изменения в график пригородных поездов направления Стерлитамак — Уфа.</p>
                    <a href="#" class="news-card__link">Подробнее <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            
            <article class="news-card anim" data-category="promo">
                <div class="news-card__image">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&q=80" alt="Новость">
                    <div class="news-card__date">
                        <span class="day">03</span>
                        <span class="month">апр</span>
                    </div>
                </div>
                <div class="news-card__content">
                    <span class="news-card__category">Акции</span>
                    <h3 class="news-card__title">Скидка 20% на купе</h3>
                    <p class="news-card__excerpt">До конца месяца действует специальное предложение на все маршруты в вагонах купе.</p>
                    <a href="#" class="news-card__link">Подробнее <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            
            <article class="news-card anim" data-category="info">
                <div class="news-card__image">
                    <img src="https://starkwood.ru/upload/iblock/f8a/i57hdw0e8dgz5tkoa9cg2cgco8xqquhl/tip-pomeshcheniya-komnata-otdykha-v-bane_-stilistika-dzhapandi_-eklektika_-osobennosti-balki_-dveri.webp" alt="Новость">
                    <div class="news-card__date">
                        <span class="day">02</span>
                        <span class="month">апр</span>
                    </div>
                </div>
                <div class="news-card__content">
                    <span class="news-card__category">Информация</span>
                    <h3 class="news-card__title">Новая комната отдыха</h3>
                    <p class="news-card__excerpt">На втором этаже вокзала открылась обновлённая комната отдыха с душем и телевизором.</p>
                    <a href="#" class="news-card__link">Подробнее <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            
            <article class="news-card anim" data-category="repair">
                <div class="news-card__image">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80" alt="Новость">
                    <div class="news-card__date">
                        <span class="day">01</span>
                        <span class="month">апр</span>
                    </div>
                </div>
                <div class="news-card__content">
                    <span class="news-card__category">Ремонт</span>
                    <h3 class="news-card__title">Ремонт платформы №3</h3>
                    <p class="news-card__excerpt">С 10 по 15 апреля — ремонтные работы. Поезда отправляются с платформы 1.</p>
                    <a href="#" class="news-card__link">Подробнее <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Услуги -->
<section class="section" id="services">
    <div class="container">
        <h2 class="section__title">Услуги вокзала</h2>
        <p class="section__subtitle">Всё для комфортного путешествия</p>
        
        <div class="services-grid">
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-suitcase-rolling"></i></div>
                <h3 class="service-card__title">Камеры хранения</h3>
                <p class="service-card__desc">Хранение багажа круглосуточно</p>
                <ul class="service-card__list">
                    <li>Мелкие вещи: 50 ₽/час</li>
                    <li>Крупный багаж: 100 ₽/час</li>
                    <li>Сутки: 500 ₽</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> 24 часа</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-bed"></i></div>
                <h3 class="service-card__title">Комнаты отдыха</h3>
                <p class="service-card__desc">Комфортные номера для ожидания</p>
                <ul class="service-card__list">
                    <li>Эконом: 800 ₽/час</li>
                    <li>Стандарт: 1 200 ₽/час</li>
                    <li>Люкс: 2 000 ₽/час</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> 24 часа</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-wifi"></i></div>
                <h3 class="service-card__title">Бесплатный Wi-Fi</h3>
                <p class="service-card__desc">Высокоскоростной интернет на всей территории</p>
                <ul class="service-card__list">
                    <li>Сеть: RZD_Free_WiFi</li>
                    <li>Без пароля</li>
                    <li>До 50 Мбит/с</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> Круглосуточно</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-utensils"></i></div>
                <h3 class="service-card__title">Кафе и магазины</h3>
                <p class="service-card__desc">Питание и товары в дорогу</p>
                <ul class="service-card__list">
                    <li>Кафе «Перрон» 07:00–22:00</li>
                    <li>Магазин «Дорога» 06:00–23:00</li>
                    <li>Кофейня 08:00–20:00</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> Разное</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-box-open"></i></div>
                <h3 class="service-card__title">Багажное отделение</h3>
                <p class="service-card__desc">Отправка и получение багажа</p>
                <ul class="service-card__list">
                    <li>Приём багажа</li>
                    <li>Выдача багажа</li>
                    <li>Упаковка</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> 08:00 – 20:00</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-first-aid"></i></div>
                <h3 class="service-card__title">Медпункт</h3>
                <p class="service-card__desc">Первая помощь и медикаменты</p>
                <ul class="service-card__list">
                    <li>Первая помощь</li>
                    <li>Измерение давления</li>
                    <li>Аптека</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> 08:00 – 20:00</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-parking"></i></div>
                <h3 class="service-card__title">Парковка</h3>
                <p class="service-card__desc">Охраняемая автостоянка, 150 мест</p>
                <ul class="service-card__list">
                    <li>Легковые: 200 ₽/сутки</li>
                    <li>Грузовые: 400 ₽/сутки</li>
                    <li>Видеонаблюдение</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> 24 часа</span>
            </div>
            
            <div class="service-card anim">
                <div class="service-card__icon"><i class="fas fa-ticket-alt"></i></div>
                <h3 class="service-card__title">Кассы и терминалы</h3>
                <p class="service-card__desc">Покупка и возврат билетов</p>
                <ul class="service-card__list">
                    <li>6 касс</li>
                    <li>4 терминала</li>
                    <li>Без комиссии</li>
                </ul>
                <span class="service-card__time"><i class="far fa-clock"></i> 05:00 – 23:00</span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section section--gray" id="faq">
    <div class="container">
        <h2 class="section__title">Частые вопросы</h2>
        <p class="section__subtitle">Ответы на популярные вопросы пассажиров</p>
        
        <div class="faq-list" id="faqList">
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Как купить билет на поезд?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Купить билет можно онлайн на нашем сайте, в кассах вокзала (05:00–23:00), через терминалы или по телефону 8 (800) 100-10-01.</p>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Как сдать или обменять билет?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>За 8+ часов — полный возврат. Менее 8 часов — удержание 50%. После отправления — возврат невозможен.</p>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Что можно провезти бесплатно?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <ul>
                        <li>Ручная кладь до 36 кг</li>
                        <li>Детскую и инвалидную коляску</li>
                        <li>Продукты для личного потребления</li>
                    </ul>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Есть ли скидки?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <ul>
                        <li>Студенты — 50% (сентябрь–июнь)</li>
                        <li>Пенсионеры — 30% на пригородные</li>
                        <li>Дети до 5 лет — бесплатно</li>
                    </ul>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Можно ли провозить животных?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Да, билет на животное — 25% от цены билета пассажира. Необходим ветеринарный сертификат.</p>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>За сколько прибыть на вокзал?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>С билетом — за 30–40 мин. Для покупки в кассе — за 1–1,5 часа. Посадка за 30 мин, окончание за 5 мин.</p>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Что делать при опоздании?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Обратитесь в кассу в течение 12 часов. Возврат 50% или обмен на другой рейс с доплатой.</p>
                </div>
            </div>
            
            <div class="faq-item anim">
                <button class="faq-question">
                    <span>Как получить справку о поездке?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>В кассе до отправления, у проводника в поезде или в личном кабинете (электронная). Бесплатно.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- О вокзале -->
<section class="section" id="contacts">
    <div class="container">
        <h2 class="section__title">Информация о вокзале</h2>
        
        <div class="about-grid">
            <div>
                <div class="info-block anim">
                    <h3><i class="fas fa-map-marker-alt"></i> Адрес</h3>
                    <p>г. Стерлитамак, ул. Вокзальная, 1<br>Республика Башкортостан, 453103</p>
                </div>
                
                <div class="info-block anim">
                    <h3><i class="fas fa-phone"></i> Телефоны</h3>
                    <p>Справочная: <a href="tel:88001001001">8 (800) 100-10-01</a><br>Кассы: <a href="tel:83473241234">8 (3473) 24-12-34</a></p>
                </div>
                
                <div class="info-block anim">
                    <h3><i class="fas fa-envelope"></i> Email</h3>
                    <p><a href="mailto:sterlitamak@rzd.ru">sterlitamak@rzd.ru</a></p>
                </div>
                
                <div class="info-block anim">
                    <h3><i class="far fa-clock"></i> Режим работы</h3>
                    <p>Вокзал: круглосуточно<br>Кассы: 05:00 – 23:00</p>
                </div>
                
                <div class="info-block anim">
                    <h3><i class="fas fa-info-circle"></i> Дополнительно</h3>
                    <p>Код станции: 65020<br>Тип: внеклассный<br>Год постройки: 1952 (реконструкция 2018)</p>
                </div>
            </div>
            
            <div class="about-map">
                <div class="map-placeholder anim">
                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=800&q=80" alt="Карта">
                    <div class="map-overlay">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Интерактивная карта</span>
                    </div>
                </div>
                
                <div class="station-scheme anim">
                    <h3>Схема вокзала</h3>
                    <img src="https://www.zd-media.ru/reklama-na-vokzalah/moscow/img-leningradskij/digital_msrh00006_sh.jpg" alt="Схема вокзала">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>