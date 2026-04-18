/**
 * Ж/Д Вокзал Стерлитамак — единый скрипт для всех страниц
 */

document.addEventListener('DOMContentLoaded', () => {
    // ... все остальные init-функции ...

    // ===== КНОПКА НАВЕРХ =====
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }); 
    }
    // Общие функции (работают на всех страницах)
    initMobileMenu();
    initSmoothScroll();
    setDefaultDates();

    // Функции только для главной страницы
    if (document.getElementById('searchForm')) {
        initAutocomplete();
    }

    // Функции только для страницы билетов
    if (document.getElementById('ticketForm')) {
        initTicketForm();
        readURLParams(); // читаем параметры из URL
    }

    // Функции только для страницы табло
    if (document.getElementById('scheduleTable')) {
        initSchedule();
    }

    // Новости (главная)
    if (document.getElementById('newsGrid')) {
        initNewsFilter();
    }

    // FAQ (главная)
    if (document.getElementById('faqList')) {
        initFAQ();
    }

    // Модалки
    initModals();

    // Анимации
    initScrollAnimations();
});

// ==================== ДАННЫЕ ====================
const ROUTES = {
    'Уфа':           ['Стерлитамак','Салават','Кумертау','Белорецк','Сибай','Учалы','Чишмы','Янаул','Нефтекамск','Октябрьский','Иглино','Приютово'],
    'Стерлитамак':   ['Уфа','Салават','Кумертау','Сибай','Белорецк'],
    'Салават':       ['Уфа','Стерлитамак','Кумертау','Сибай'],
    'Кумертау':      ['Уфа','Стерлитамак','Салават','Сибай','Баймак'],
    'Белорецк':      ['Уфа','Стерлитамак','Учалы'],
    'Нефтекамск':    ['Уфа','Янаул','Октябрьский','Агидель'],
    'Октябрьский':   ['Уфа','Нефтекамск','Агидель','Приютово'],
    'Сибай':         ['Уфа','Стерлитамак','Салават','Кумертау','Баймак'],
    'Учалы':         ['Уфа','Белорецк'],
    'Баймак':        ['Кумертау','Сибай'],
    'Янаул':         ['Уфа','Нефтекамск'],
    'Чишмы':         ['Уфа'],
    'Иглино':        ['Уфа'],
    'Приютово':      ['Уфа','Октябрьский'],
    'Агидель':       ['Нефтекамск','Октябрьский'],
    'Раевский':      ['Уфа'],
    'Дюртюли':       ['Уфа'],
    'Благовещенск':  ['Уфа']
};

const CLASS_PRICES = { platzkart: 450, kupe: 850, sv: 1500 };

// ==================== АВТОДОПОЛНЕНИЕ (главная) ====================
function initAutocomplete() {
    const fromInput  = document.getElementById('fromStation');
    const toInput    = document.getElementById('toStation');
    const fromDD     = document.getElementById('fromDropdown');
    const toDD       = document.getElementById('toDropdown');
    const swapBtn    = document.getElementById('swapBtn');
    const msg        = document.getElementById('searchMessage');

    fromInput.addEventListener('input', () => {
        const q = fromInput.value.trim().toLowerCase();
        if (!q) { hideDD(fromDD); return; }
        const matches = Object.keys(ROUTES).filter(s => s.toLowerCase().includes(q));
        showDD(fromDD, matches, fromInput, 'from');
    });

    fromInput.addEventListener('focus', () => {
        const q = fromInput.value.trim().toLowerCase();
        const matches = q ? Object.keys(ROUTES).filter(s => s.toLowerCase().includes(q)) : Object.keys(ROUTES);
        showDD(fromDD, matches, fromInput, 'from');
    });

    toInput.addEventListener('input', () => {
        if (toInput.disabled) return;
        const q = toInput.value.trim().toLowerCase();
        const from = fromInput.value.trim();
        if (!from || !ROUTES[from]) return;
        const avail = ROUTES[from];
        const matches = q ? avail.filter(s => s.toLowerCase().includes(q)) : avail;
        showDD(toDD, matches, toInput, 'to');
    });

    toInput.addEventListener('focus', () => {
        if (toInput.disabled) { showMsg('Сначала выберите станцию отправления', 'error'); return; }
        const from = fromInput.value.trim();
        if (!from || !ROUTES[from]) return;
        showDD(toDD, ROUTES[from], toInput, 'to');
    });

    swapBtn.addEventListener('click', () => {
        const temp = fromInput.value;
        fromInput.value = toInput.value;
        toInput.value = temp;
        toInput.disabled = !!(fromInput.value && ROUTES[fromInput.value.trim()]);
        fromInput.focus();
    });

    document.addEventListener('click', e => {
        if (!e.target.closest('.autocomplete-wrapper')) { hideDD(fromDD); hideDD(toDD); }
    });

    [fromInput, toInput].forEach(input => {
        input.addEventListener('keydown', e => {
            const dd = input.id === 'fromStation' ? fromDD : toDD;
            const items = dd.querySelectorAll('.autocomplete-item');
            if (!items.length) return;
            let idx = [...items].findIndex(it => it.classList.contains('hl'));
            if (e.key === 'ArrowDown') { e.preventDefault(); idx = (idx + 1) % items.length; setHL(items, idx); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); idx = idx <= 0 ? items.length - 1 : idx - 1; setHL(items, idx); }
            else if (e.key === 'Enter' && idx >= 0) { e.preventDefault(); items[idx].click(); }
            else if (e.key === 'Escape') { hideDD(fromDD); hideDD(toDD); }
        });
    });

    function showDD(dd, items, input, type) {
        if (!items.length) {
            dd.innerHTML = '<div class="autocomplete-item">Ничего не найдено</div>';
            dd.classList.add('active'); return;
        }
        const q = input.value.trim();
        dd.innerHTML = items.map(item => {
            const highlighted = q ? highlight(item, q) : item;
            return `<div class="autocomplete-item" data-value="${item}">${highlighted}</div>`;
        }).join('');
        dd.classList.add('active');
        dd.querySelectorAll('.autocomplete-item').forEach(el => {
            el.addEventListener('click', () => {
                input.value = el.dataset.value;
                hideDD(dd);
                if (type === 'from') {
                    toInput.disabled = false;
                    toInput.value = '';
                    toInput.focus();
                }
            });
        });
    }

    function hideDD(dd) { dd.classList.remove('active'); }
    function setHL(items, idx) { items.forEach(it => it.classList.remove('hl')); if (items[idx]) items[idx].classList.add('hl'); }
    function highlight(text, q) { const re = new RegExp(`(${q.replace(/[.*+?^${}()|[\]\\]/g,'\\$&')})`, 'gi'); return text.replace(re, '<mark>$1</mark>'); }

    // Кнопка «Найти билеты» → переход на tickets.html
    document.getElementById('searchBtn').addEventListener('click', () => {
        const from = fromInput.value.trim();
        const to   = toInput.value.trim();
        const date = document.getElementById('searchDate').value;
        const pass = document.getElementById('searchPassengers').value;
        msg.className = 'search-form__message';

        if (!from || !to) { showMsg('Заполните оба поля', 'error'); return; }
        const avail = ROUTES[from];
        if (!avail || !avail.includes(to)) { showMsg(`Прямого сообщения «${from}» → «${to}» нет`, 'error'); return; }

        // Переход на страницу билетов с параметрами
        const params = new URLSearchParams({ from, to, date, passengers: pass });
        window.location.href = `tickets.html?${params.toString()}`;
    });

    function showMsg(text, type) { msg.textContent = text; msg.className = `search-form__message ${type}`; }
}

// ==================== ЧТЕНИЕ URL-ПАРАМЕТРОВ (страница билетов) ====================
function readURLParams() {
    const params = new URLSearchParams(window.location.search);
    const from = params.get('from');
    const to   = params.get('to');
    const date = params.get('date');
    const pass = params.get('passengers');

    if (from) document.getElementById('ticketFrom').value = from;
    if (to)   document.getElementById('ticketTo').value = to;
    if (date) document.getElementById('ticketDate').value = date;
    if (pass) {
        const sel = document.getElementById('searchPassengers'); // может не быть, проверим
        // на странице билетов нет searchPassengers, но есть passengerCount
    }
}

// ==================== ФОРМА БИЛЕТОВ ====================
function initTicketForm() {
    const form        = document.getElementById('ticketForm');
    const passCount   = document.getElementById('passengerCount');
    const classOpts   = document.querySelectorAll('.class-option');
    const priceEl     = document.getElementById('ticketPrice');
    const qtyEl       = document.getElementById('ticketQuantity');
    const discEl      = document.getElementById('ticketDiscount');
    const totalEl     = document.getElementById('totalAmount');
    let passengers    = 1;
    let basePrice     = CLASS_PRICES.platzkart;

    document.getElementById('passMinus').addEventListener('click', () => { passengers = Math.max(1, passengers - 1); passCount.textContent = passengers; calc(); });
    document.getElementById('passPlus').addEventListener('click', () => { passengers = Math.min(5, passengers + 1); passCount.textContent = passengers; calc(); });

    classOpts.forEach(opt => {
        opt.addEventListener('click', () => {
            classOpts.forEach(o => o.classList.remove('active'));
            opt.classList.add('active');
            opt.querySelector('input').checked = true;
            basePrice = parseInt(opt.dataset.price);
            calc();
        });
    });

    document.getElementById('hasChild').addEventListener('change', calc);
    document.getElementById('hasBenefit').addEventListener('change', calc);

    function calc() {
        qtyEl.textContent = passengers;
        let discount = 0;
        if (document.getElementById('hasChild').checked) discount += basePrice * 0.5;
        if (document.getElementById('hasBenefit').checked) discount += basePrice * 0.3;
        const total = (basePrice * passengers) - discount;
        priceEl.textContent = `${basePrice} ₽`;
        discEl.textContent = discount > 0 ? `−${Math.round(discount)} ₽` : '0 ₽';
        totalEl.textContent = `${Math.round(total)} ₽`;
    }

    const phoneInput = document.getElementById('passengerPhone');
    phoneInput.addEventListener('input', () => {
        let v = phoneInput.value.replace(/\D/g, '');
        if (!v) { phoneInput.value = ''; return; }
        if (v[0] === '8') v = '7' + v.slice(1);
        if (v[0] !== '7') v = '7' + v;
        let f = '+7';
        if (v.length > 1) f += ' (' + v.slice(1, 4);
        if (v.length >= 4) f += ') ' + v.slice(4, 7);
        if (v.length >= 7) f += '-' + v.slice(7, 9);
        if (v.length >= 9) f += '-' + v.slice(9, 10);
        phoneInput.value = f;
    });

    form.addEventListener('submit', e => {
        e.preventDefault();
        let valid = true;
        const from = document.getElementById('ticketFrom').value.trim();
        const to   = document.getElementById('ticketTo').value.trim();
        const date = document.getElementById('ticketDate').value;
        const name = document.getElementById('passengerName').value.trim();
        const phone = document.getElementById('passengerPhone').value.replace(/\D/g, '');

        document.querySelectorAll('.form-error').forEach(el => el.textContent = '');
        document.querySelectorAll('.form-group input').forEach(el => el.classList.remove('invalid'));

        if (!from || !to) {
            document.getElementById('ticketFromError').textContent = 'Укажите станции';
            document.getElementById('ticketToError').textContent = 'Укажите станции';
            valid = false;
        } else if (ROUTES[from] && !ROUTES[from].includes(to)) {
            document.getElementById('ticketToError').textContent = 'Нет прямого сообщения';
            valid = false;
        }
        if (!date) { document.getElementById('ticketDate').classList.add('invalid'); valid = false; }
        if (name.length < 3) { document.getElementById('nameError').textContent = 'Введите ФИО'; document.getElementById('passengerName').classList.add('invalid'); valid = false; }
        if (phone.length < 11) { document.getElementById('phoneError').textContent = 'Введите корректный телефон'; phoneInput.classList.add('invalid'); valid = false; }

        if (!valid) return;

        alert(`✅ Билет оформлен!\n\n🚂 ${from} → ${to}\n📅 ${date}\n👤 ${passengers} пасс.\n💰 ${totalEl.textContent}`);
        form.reset(); passengers = 1; passCount.textContent = '1';
        classOpts.forEach(o => o.classList.remove('active'));
        classOpts[0].classList.add('active');
        classOpts[0].querySelector('input').checked = true;
        basePrice = CLASS_PRICES.platzkart;
        calc();
    });
}

// ==================== РАСПИСАНИЕ ====================
function initSchedule() {
    const dirFilter = document.getElementById('scheduleDirection');
    const stFilter  = document.getElementById('scheduleStatus');
    const rows      = document.querySelectorAll('#scheduleBody tr');
    const note      = document.getElementById('scheduleNote');

    document.getElementById('applyScheduleFilter').addEventListener('click', () => {
        const dir = dirFilter.value;
        const st  = stFilter.value;
        let visible = 0;
        rows.forEach(row => {
            const show = (dir === 'all' || row.dataset.direction === dir) && (st === 'all' || row.dataset.status === st);
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        note.textContent = visible === 0 ? 'Нет рейсов по заданным фильтрам' : '';
    });

    document.getElementById('resetScheduleFilter').addEventListener('click', () => {
        dirFilter.value = 'all'; stFilter.value = 'all';
        rows.forEach(r => r.style.display = '');
        note.textContent = '';
    });

    document.querySelectorAll('.detail-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            openTrainModal(btn.dataset.train, btn.dataset.from, btn.dataset.to);
        });
    });
}

function openTrainModal(train, from, to) {
    const title   = document.getElementById('trainModalTitle');
    const content = document.getElementById('trainDetailsContent');
    title.textContent = `Поезд №${train}`;
    content.innerHTML = `
        <div class="train-details">
            <div class="train-route">${from} → ${to}</div>
            <div class="train-info">
                <p><strong>В пути:</strong> 2 ч 15 мин</p>
                <p><strong>Остановки:</strong> Чишмы, Иглино</p>
            </div>
            <div class="train-services">
                <h4>Услуги:</h4>
                <ul>
                    <li><i class="fas fa-wifi"></i> Wi-Fi</li>
                    <li><i class="fas fa-coffee"></i> Вагон-ресторан</li>
                    <li><i class="fas fa-plug"></i> Розетки 220В</li>
                    <li><i class="fas fa-snowflake"></i> Кондиционер</li>
                </ul>
            </div>
            <button class="btn btn--primary btn--full" onclick="closeModal('trainModal');window.location.href='tickets.html?from=${from}&to=${to}'">Купить билет</button>
        </div>`;
    openModal('trainModal');
}

// ==================== НОВОСТИ ====================
function initNewsFilter() {
    const filters = document.querySelectorAll('#newsFilters .news-filter');
    const cards   = document.querySelectorAll('#newsGrid .news-card');
    filters.forEach(btn => {
        btn.addEventListener('click', () => {
            filters.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const cat = btn.dataset.category;
            cards.forEach(card => {
                card.classList.toggle('hidden-card', cat !== 'all' && card.dataset.category !== cat);
            });
        });
    });
}

// ==================== FAQ ====================
function initFAQ() {
    document.querySelectorAll('#faqList .faq-question').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.parentElement;
            const isActive = item.classList.contains('active');
            document.querySelectorAll('#faqList .faq-item').forEach(i => i.classList.remove('active'));
            if (!isActive) item.classList.add('active');
        });
    });
}

// ==================== МОДАЛКИ ====================
function initModals() {
    const loginBtn = document.getElementById('loginBtn');
    if (loginBtn) loginBtn.addEventListener('click', () => openModal('loginModal'));

    document.querySelectorAll('[data-close-modal]').forEach(el => {
        el.addEventListener('click', () => {
            const modal = el.closest('.modal');
            if (modal) closeModal(modal.id);
        });
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') document.querySelectorAll('.modal.active').forEach(m => closeModal(m.id));
    });

    const loginForm = document.getElementById('loginForm');
    if (loginForm) loginForm.addEventListener('submit', e => { e.preventDefault(); alert('Вход выполнен!'); closeModal('loginModal'); });
}

function openModal(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = '';
}

// ==================== МОБИЛЬНОЕ МЕНЮ ====================
function initMobileMenu() {
    const burger = document.getElementById('burgerBtn');
    const nav    = document.getElementById('mainNav');
    if (!burger || !nav) return;

    burger.addEventListener('click', (e) => {
        e.stopPropagation();
        burger.classList.toggle('active');
        nav.classList.toggle('active');
    });

    // Закрытие при клике вне меню
    document.addEventListener('click', (e) => {
        if (!nav.contains(e.target) && !burger.contains(e.target)) {
            burger.classList.remove('active');
            nav.classList.remove('active');
        }
    });

    nav.querySelectorAll('.nav__link').forEach(link => {
        link.addEventListener('click', () => {
            burger.classList.remove('active');
            nav.classList.remove('active');
        });
    });
}

// ==================== ПЛАВНЫЙ СКРОЛЛ ====================
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
        });
    });
}

// ==================== ДАТЫ ====================
function setDefaultDates() {
    const today = new Date().toISOString().split('T')[0];
    ['searchDate','ticketDate'].forEach(id => { const el = document.getElementById(id); if (el && !el.value) el.value = today; });
}

// ==================== АНИМАЦИИ ====================
function initScrollAnimations() {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.route-card, .news-card, .service-card, .faq-item, .info-block, .map-placeholder, .station-scheme').forEach(el => {
        el.classList.add('anim'); observer.observe(el);
    });
}

// Глобальный доступ для inline onclick
window.openModal = openModal;
window.closeModal = closeModal;

// Кнопка наверх
const scrollTopBtn = document.getElementById('scrollTopBtn');
if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}