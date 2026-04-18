<?php include 'header.php'; ?>

<!-- Hero секция -->
<section class="page-hero">
    <div class="page-hero__bg">
        <img src="https://images.unsplash.com/photo-1520105072097-a42e7fd37e1b?w=1920&q=80" alt="Билеты">
    </div>
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <div class="breadcrumbs">
            <a href="index.php">Главная</a>
            <span>/</span>
            <span>Покупка билетов</span>
        </div>
        <h1 class="page-hero__title">
            <i class="fas fa-ticket-alt"></i>
            Покупка билетов
        </h1>
        <p class="page-hero__subtitle">Заполните форму и оформите билет онлайн</p>
    </div>
</section>

<!-- Форма билетов -->
<section class="section">
    <div class="container">
        <div class="ticket-form-wrapper">
            <form class="ticket-form" id="ticketForm">
                <!-- Маршрут -->
                <div class="form-section">
                    <h3 class="form-section__title">
                        <i class="fas fa-route"></i>
                        Маршрут
                    </h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ticketFrom">Откуда <span style="color: var(--clr-primary)">*</span></label>
                            <input type="text" id="ticketFrom" class="form-group__input" required autocomplete="off">
                            <div class="form-error" id="ticketFromError"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="ticketTo">Куда <span style="color: var(--clr-primary)">*</span></label>
                            <input type="text" id="ticketTo" class="form-group__input" required autocomplete="off">
                            <div class="form-error" id="ticketToError"></div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ticketDate">Дата <span style="color: var(--clr-primary)">*</span></label>
                            <input type="date" id="ticketDate" class="form-group__input" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="ticketTime">Время</label>
                            <select id="ticketTime" class="form-group__input">
                                <option value="any">Любое</option>
                                <option value="morning">Утро 06–12</option>
                                <option value="day">День 12–18</option>
                                <option value="evening">Вечер 18–00</option>
                                <option value="night">Ночь 00–06</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Пассажиры -->
                <div class="form-section">
                    <h3 class="form-section__title">
                        <i class="fas fa-users"></i>
                        Пассажиры
                    </h3>
                    
                    <div class="passengers-counter">
                        <button type="button" class="counter-btn" id="passMinus">−</button>
                        <span class="counter-value" id="passengerCount">1</span>
                        <button type="button" class="counter-btn" id="passPlus">+</button>
                        <span class="counter-label">взрослых</span>
                    </div>
                    
                    <div class="passengers-options">
                        <label class="checkbox-label">
                            <input type="checkbox" id="hasChild">
                            <span>Есть дети до 10 лет (−50%)</span>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" id="hasBenefit">
                            <span>Есть льготники (−30%)</span>
                        </label>
                    </div>
                </div>
                
                <!-- Класс обслуживания -->
                <div class="form-section">
                    <h3 class="form-section__title">
                        <i class="fas fa-couch"></i>
                        Класс обслуживания
                    </h3>
                    
                    <div class="class-selector">
                        <label class="class-option active" data-price="450">
                            <input type="radio" name="class" value="platzkart" checked>
                            <div class="class-option__icon"><i class="fas fa-bed"></i></div>
                            <div class="class-option__info">
                                <span class="class-option__name">Плацкарт</span>
                                <span class="class-option__desc">Общий вагон, 54 места</span>
                            </div>
                            <div class="class-option__price">450 ₽</div>
                        </label>
                        
                        <label class="class-option" data-price="850">
                            <input type="radio" name="class" value="kupe">
                            <div class="class-option__icon"><i class="fas fa-door-closed"></i></div>
                            <div class="class-option__info">
                                <span class="class-option__name">Купе</span>
                                <span class="class-option__desc">Закрытое, 4 места</span>
                            </div>
                            <div class="class-option__price">850 ₽</div>
                        </label>
                        
                        <label class="class-option" data-price="1500">
                            <input type="radio" name="class" value="sv">
                            <div class="class-option__icon"><i class="fas fa-star"></i></div>
                            <div class="class-option__info">
                                <span class="class-option__name">СВ</span>
                                <span class="class-option__desc">Люкс, 2 места</span>
                            </div>
                            <div class="class-option__price">1 500 ₽</div>
                        </label>
                    </div>
                </div>
                
                <!-- Контактные данные -->
                <div class="form-section">
                    <h3 class="form-section__title">
                        <i class="fas fa-user-circle"></i>
                        Контактные данные
                    </h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="passengerName">ФИО <span style="color: var(--clr-primary)">*</span></label>
                            <input type="text" id="passengerName" class="form-group__input" placeholder="Иванов Иван Иванович" required>
                            <div class="form-error" id="nameError"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="passengerPhone">Телефон <span style="color: var(--clr-primary)">*</span></label>
                            <input type="tel" id="passengerPhone" class="form-group__input" placeholder="+7 (___) ___-__-__" required>
                            <div class="form-error" id="phoneError"></div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="passengerEmail">Email</label>
                            <input type="email" id="passengerEmail" class="form-group__input" placeholder="example@mail.ru">
                        </div>
                    </div>
                </div>
                
                <!-- Итого -->
                <div class="form-total">
                    <div class="total-row">
                        <span>Стоимость билета:</span>
                        <span id="ticketPrice">450 ₽</span>
                    </div>
                    <div class="total-row">
                        <span>Пассажиров:</span>
                        <span id="ticketQuantity">1</span>
                    </div>
                    <div class="total-row">
                        <span>Скидка:</span>
                        <span id="ticketDiscount">0 ₽</span>
                    </div>
                    <div class="total-row total-row--accent">
                        <span>Итого:</span>
                        <span id="totalAmount">450 ₽</span>
                    </div>
                </div>
                
                <button type="submit" class="btn btn--primary btn--large btn--full" style="margin-top: 24px;">
                    <i class="fas fa-credit-card"></i>
                    Оплатить билет
                </button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>