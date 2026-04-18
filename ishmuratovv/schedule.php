<?php include 'header.php'; ?>

<!-- Hero секция -->
<section class="page-hero">
    <div class="page-hero__bg">
        <img src="https://images.unsplash.com/photo-1535535112387-56ffe8db21ff?w=1920&q=80" alt="Табло">
    </div>
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <div class="breadcrumbs">
            <a href="index.php">Главная</a>
            <span>/</span>
            <span>Табло</span>
        </div>
        <h1 class="page-hero__title">
            <i class="fas fa-clock"></i>
            Табло расписания
        </h1>
        <p class="page-hero__subtitle">Актуальное расписание поездов со станции Стерлитамак</p>
    </div>
</section>

<!-- Расписание -->
<section class="section">
    <div class="container">
        <!-- Фильтры -->
        <div class="schedule__filters">
            <div class="filter-group">
                <label for="scheduleDirection">Направление:</label>
                <select id="scheduleDirection" class="filter-input">
                    <option value="all">Все направления</option>
                    <option value="Уфа">Уфа</option>
                    <option value="Салават">Салават</option>
                    <option value="Кумертау">Кумертау</option>
                    <option value="Сибай">Сибай</option>
                    <option value="Белорецк">Белорецк</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="scheduleStatus">Статус:</label>
                <select id="scheduleStatus" class="filter-input">
                    <option value="all">Все статусы</option>
                    <option value="ontime">По расписанию</option>
                    <option value="arrived">Прибыл</option>
                    <option value="delayed">Задерживается</option>
                </select>
            </div>
            
            <div class="filter-group">
                <button type="button" class="btn btn--primary" id="applyScheduleFilter">
                    <i class="fas fa-filter"></i> Применить
                </button>
                <button type="button" class="btn btn--secondary" id="resetScheduleFilter">
                    <i class="fas fa-undo"></i> Сбросить
                </button>
            </div>
        </div>
        
        <!-- Таблица -->
        <div class="table-wrapper">
            <table class="schedule-table" id="scheduleTable">
                <thead>
                    <tr>
                        <th>№ поезда</th>
                        <th>Откуда</th>
                        <th>Куда</th>
                        <th>Отправление</th>
                        <th>Прибытие</th>
                        <th>В пути</th>
                        <th>Платформа</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody id="scheduleBody">
                    <tr data-direction="Уфа" data-status="ontime">
                        <td><strong>735Э</strong></td>
                        <td>Стерлитамак</td>
                        <td>Уфа</td>
                        <td>06:15</td>
                        <td>08:30</td>
                        <td>2 ч 15 мин</td>
                        <td>2</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Салават" data-status="arrived">
                        <td><strong>6521</strong></td>
                        <td>Стерлитамак</td>
                        <td>Салават</td>
                        <td>07:40</td>
                        <td>09:10</td>
                        <td>1 ч 30 мин</td>
                        <td>1</td>
                        <td><span class="status status--arrived">Прибыл</span></td>
                    </tr>
                    <tr data-direction="Кумертау" data-status="delayed">
                        <td><strong>6523</strong></td>
                        <td>Стерлитамак</td>
                        <td>Кумертау</td>
                        <td>09:25</td>
                        <td>11:25</td>
                        <td>2 ч 00 мин</td>
                        <td>3</td>
                        <td><span class="status status--delayed">Задерживается</span></td>
                    </tr>
                    <tr data-direction="Уфа" data-status="ontime">
                        <td><strong>737Э</strong></td>
                        <td>Стерлитамак</td>
                        <td>Уфа</td>
                        <td>11:00</td>
                        <td>13:15</td>
                        <td>2 ч 15 мин</td>
                        <td>2</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Сибай" data-status="ontime">
                        <td><strong>6525</strong></td>
                        <td>Стерлитамак</td>
                        <td>Сибай</td>
                        <td>12:30</td>
                        <td>15:40</td>
                        <td>3 ч 10 мин</td>
                        <td>1</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Уфа" data-status="ontime">
                        <td><strong>739Э</strong></td>
                        <td>Стерлитамак</td>
                        <td>Уфа</td>
                        <td>14:45</td>
                        <td>17:00</td>
                        <td>2 ч 15 мин</td>
                        <td>2</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Белорецк" data-status="ontime">
                        <td><strong>6527</strong></td>
                        <td>Стерлитамак</td>
                        <td>Белорецк</td>
                        <td>16:20</td>
                        <td>19:45</td>
                        <td>3 ч 25 мин</td>
                        <td>3</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Уфа" data-status="ontime">
                        <td><strong>741Э</strong></td>
                        <td>Стерлитамак</td>
                        <td>Уфа</td>
                        <td>18:10</td>
                        <td>20:25</td>
                        <td>2 ч 15 мин</td>
                        <td>2</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Салават" data-status="ontime">
                        <td><strong>6529</strong></td>
                        <td>Стерлитамак</td>
                        <td>Салават</td>
                        <td>19:35</td>
                        <td>21:05</td>
                        <td>1 ч 30 мин</td>
                        <td>1</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Уфа" data-status="ontime">
                        <td><strong>743Э</strong></td>
                        <td>Стерлитамак</td>
                        <td>Уфа</td>
                        <td>21:00</td>
                        <td>23:15</td>
                        <td>2 ч 15 мин</td>
                        <td>2</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Кумертау" data-status="ontime">
                        <td><strong>6531</strong></td>
                        <td>Стерлитамак</td>
                        <td>Кумертау</td>
                        <td>22:15</td>
                        <td>00:15</td>
                        <td>2 ч 00 мин</td>
                        <td>3</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                    <tr data-direction="Уфа" data-status="ontime">
                        <td><strong>745Э</strong></td>
                        <td>Стерлитамак</td>
                        <td>Уфа</td>
                        <td>23:30</td>
                        <td>01:45</td>
                        <td>2 ч 15 мин</td>
                        <td>2</td>
                        <td><span class="status status--ontime">По расписанию</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="schedule__note" id="scheduleNote"></div>
    </div>
</section>

<?php include 'footer.php'; ?>