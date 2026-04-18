<!-- Модальное окно: Вход -->
<div class="modal" id="loginModal">
    <div class="modal__overlay" data-close-modal></div>
    <div class="modal__content">
        <button class="modal__close" data-close-modal><i class="fas fa-times"></i></button>
        <h3 class="modal__title">Вход в личный кабинет</h3>
        <form id="loginForm">
            <div class="form-group">
                <label>Телефон или email</label>
                <input type="text" required class="form-group__input">
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" required class="form-group__input">
            </div>
            <button type="submit" class="btn btn--primary btn--full">Войти</button>
        </form>
    </div>
</div>

<!-- Модальное окно: Детали поезда -->
<div class="modal" id="trainModal">
    <div class="modal__overlay" data-close-modal></div>
    <div class="modal__content modal__content--large">
        <button class="modal__close" data-close-modal><i class="fas fa-times"></i></button>
        <h3 class="modal__title" id="trainModalTitle">Информация о поезде</h3>
        <div id="trainDetailsContent"></div>
    </div>
</div>