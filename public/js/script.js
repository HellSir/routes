let IndexComponent = {
    name: 'index',
    methods: {
        changePage(page) {
            this.$emit('changepage', page);
        },
        profilePage() {
            if (localStorage.getItem('token')) {
                this.$emit('changepage', 'profile');
            } else {
                this.$emit('changepage', 'register');
            }
        },
        bookingPage(){
            if(localStorage.getItem('token')){
                this.$emit('changepage','booking');
                this.$emit('transportcss', 'css/booking')
            }else {
                this.$emit('changepage','index')
            }
        },
        searchPage(){
          this.$emit('changepage','search')
        }
    },
    template:
        `
        <div>
        <header>
    <h2 @click="changePage('index')">
        <a class="logo" href="#"><img src="image/logo.png"></a>
    </h2>
    <nav>
        <li><a href="#shares">Акции</a></li>
        <li><a @click="searchPage">Поиск</a></li>
        <li><a @click="bookingPage">Регистарция на рейс</a></li>
        <li><a @click="profilePage">Личный кабинет</a></li>
    </nav>
</header>

<section class="hero">
    <div class="background-image" style="background-image: url(image/promotion1.jpg)"></div>
    <h1 class="title">Добро пожаловать на официальный сайт</h1>
    <h3>Разработан специально для WorldSkills</h3>
    <a href="#" class="btn">Поддержать проект</a>
</section>

<section class="our-work">
    <h3>Почему мы?</h3>
    <p>Наша компания предостовляет цены на билет дешевле, чем в любой другой компании.Если у вас возникла проблема, мы обязательно ее решим. Мы работаем на все 100%, нам нечего бояться. Мы работаем 24 часа 7 дней в неделю 365 дней в году.</p>
    <hr>

    <ul class="grid">
        <li class="small" style="background-image: url(image/4.jpg);"></li>
        <li class="large" style="background-image: url(image/3.jpg);"></li>
        <li class="large" style="background-image: url(image/1.jpg);"></li>
        <li class="small" style="background-image: url(image/2.jpg);"></li>
    </ul>
</section>

<section class="form">
    <h3>Заполни поля для нахождния дешёвых авиабилетов</h3>
    <p>Лучший способ купить авиабилеты дешево</p>
    <hr>
    <div class="form-head">
        <form>
            <div class="From">
                <h4 class="forFrom">Откуда</h4>
                <input type="text" id="otkyda" placeholder="Откуда" >
            </div>

            <div class="For">
                <h4 class="forFrom">Куда</h4>
                <input type="text" id="kyda" placeholder="Куда" >
            </div>

                <div class="Data-For">
                    <h4 class="forFrom">Дата отправления</h4>
                    <input type="date" id="data-for" placeholder="Туда" >
                </div>

                <div class="Data-From">
                    <h4 class="forFrom">Дата возвращения</h4>
                    <input type="date" id="data-from" placeholder="Обратно" >
                </div>

            <div>
                <h4 class="forFrom">Кол-во пассажиров</h4>
                <input type="number" id="pass" placeholder="Кол-во пассаж..." min="1" max="8">
            </div>

            <div>
                <input class="btn" type="button" value="Найти билеты">
            </div>

        </form>
    </div>
</section>

<section class="shares"><a name="shares"></a>
    <h3>Акции</h3>
    <p>Наша компания предоставляет нашим клиентам ряд акций:</p>
    <ul class="grid">
        <li class="promotion">
            <h4>Returning and Changing Your Tickets</h4>
            <img src="image/promotion/promotion1.jpg">
            <p>The pandemic has changed many travelers’ plans, but we know that it will not last forever.
                Once all of this is over, we will continue exploring this world the way we used to.
                Special rules that have been developed for this challenging situation will help you cancel your trip
                or postpone it until later.</p>
        </li>
        <li class="promotion">
            <h4>Best offers</h4>
            <img src="image/promotion/promotion2.jpg">
            <p>To see again the streets that witnessed so much. To hug your beloved ones and look back to see
                what you’ve come through. And to think of new dreams that will be so special!</p>
        </li>
        <li class="promotion">
            <h4>See you more often</h4>
            <img src="image/promotion/promotion3.jpg">
            <p>Since the beginning of January, we have been expanding the geography of flights in Russia so that you can
                see your loved ones more often. Choose our company to fly to where you are always expected.</p>
        </li>
        <li class="promotion">
            <h4>Everything is on again</h4>
            <img src="image/promotion/promotion4.jpg">
            <p>From August 10, we will resume flights to Turkey. Flights from Moscow to Antalya will be operated twice
                a day daily, and flights on the Moscow-Dalaman route will be operated three to seven times a week.</p>
        </li>
    </ul>
</section>

<section class="FormEmail">
    <div>
    <h4 class="forFrom">Email</h4>
    <input type="email" placeholder="Email">
    <input class="btn" type="button" value="Подписаться">
    </div>
</section>

<footer>
    <ul class="footerAlign">
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru">Home</a></li>
        <hr>
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru/login">Login</a></li>
        <hr>
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru/signup">Sign up</a></li>
        <hr>
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru/contact">Contact</a></li>
        <hr>
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru/news">News</a></li>
        <hr>
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru/return">Return</a></li>
        <hr>
        <li class="footerText"><a href="http://xxxxxx-m1.wsr.ru/feedback"></a>Feedback</li>
    </ul>
</footer>
</div>
        `
};

let RegisterComponent = {
    name: 'register',
    data() { return {
        firstName: '',
        lastName: '',
        telephone: '',
        documentNumber: '',
        password: '',
    }},
    methods: {
        changePage(page) {
            this.$emit('changepage', page);
        },
        register() {
            let body = JSON.stringify({
                first_name: this.firstName,
                last_name: this.lastName,
                phone: this.telephone,
                document_number: this.documentNumber,
                password: this.password
            });

            let xhr = new XMLHttpRequest();

            xhr.open('POST', '/api/register', false);

            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.send(body);

            console.log(xhr.response);

            if (xhr.status === 204) {
                this.$emit('changepage', 'login');
            }
        }
    },
    template:
    `
<div>
    <link href="/css/register.css" rel="stylesheet">
    <section class="register">
        <div class="register-form">
            <div class="h">
                <h1>Регистрация</h1>
            </div>
            <ul>
                <li><input type="text" placeholder="Имя" v-model="firstName"></li>
                <li><input type="text" placeholder="Фамилия" v-model="lastName"></li>
                <li><input type="text" placeholder="Номер документа" v-model="documentNumber"></li>
                <li><input type="tel" placeholder="Телефон" v-model="telephone"></li>
                <li><input type="password" placeholder="Пароль" v-model="password"></li>
                <li><input type="password" placeholder="Повтор пароля"></li>
                <li><h4>Уже есть запись?<a @click="changePage('login')">Войти</a></h4></li>
                <li><input type="submit" class="btn" @click="register"></li>
            </ul>
        </div>
    </section>
</div>

    `
};

let LoginComponent = {
    name: 'login',
    data() { return {
        telephone: '',
        password: ''
    }},
    methods: {
        changePage(page) {
            this.$emit('changepage', page);
        },
        login() {
            let xhr = new XMLHttpRequest();

            xhr.open('POST', '/api/login', false);

            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.send(JSON.stringify({
                phone: this.telephone,
                password: this.password
            }));

            if (xhr.status === 200) {
                localStorage.setItem('token', JSON.parse(xhr.response).data.token);
                this.$emit('changepage', 'profile');
            }
        }
    },
    template:
    `
    <div>
    <link rel="stylesheet" href="/css/login.css">
        <section class="login">
    <div class="login-form">
        <div class="h">
            <h1>Авторизация</h1>
        </div>
        <ul>
            <li><input type="tel" placeholder="Телефон" v-model="telephone"></li>
            <li><input type="password" placeholder="Пароль" v-model="password" @keyup.enter="login"></li>
            <li class="toRegister"><h4><a @click="changePage('register')">Создать учётную запись</a></h4></li>
            <li><input type="submit" class="btn" @click="login"></li>
        </ul>
    </div>
    </section>
    </div>
    `
};

let ProfileComponent = {
    name: 'profile',
    data() { return {
        firstName: '',
        lastName: ''
    }},
    created() {
        let xhr = new XMLHttpRequest();

        xhr.open('GET', '/api/user', true);
        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
        xhr.send();
        xhr.onload = () => {
            this.firstName = JSON.parse(xhr.response).data.first_name;
            this.lastName = JSON.parse(xhr.response).data.last_name;
        };
        xhr.onerror = () => {
            console.log(xhr.response);
        };
    },
    methods: {
        exit() {
            localStorage.removeItem('token');
            this.$emit('changepage', 'login');
        }
    },
    template:
    `
    <div>
    <link rel="stylesheet" href="/css/profile.css">
    <header>
    <h3>Личный кабинет</h3>
    <nav class="nav">
        <div class="nav1">
        <div class="div">Имя: {{ firstName }}</div>
            <hr>
        <div class="div">Фамилия: {{ lastName }}</div>
            <hr>
        <div class="div">Кол-во полётов:</div>
        </div>
        <a class="button" @click="exit">Выйти</a>
    </nav>
</header>

<section class="nothing">
</section>
<section class="required">
    <div class="head">
        <h3>Бронирование билета</h3>
        <div  class="input">
            <div>
                <ul>
                    <li><label>Код бронирования<input type="text"></label></li>
                    <li><label>Дата вылета<input type="date"></label></li>
                    <li><label>Время вылета<input type="date"></label></li>
                </ul>
            </div>

            <div>
                <ul>
                    <li><label>Время прилёта<input type="time"></label></li>
                    <li><label>Название аэропорта вылета<input type="text"></label></li>
                    <li><label>Название аэрапорта назначения<input type="text"></label></li>
                </ul>
            </div>
        </div>
    </div>
</section>
    </div>
    `
};

let BookingComponent = {
    name:'booking',
    data(){ return{
        firstName:'',
        lastName:'',
        documentNumber:'',
        css: 'css/booking.css'
    }},
    changePage(page){
        this.$emit('changepage',page);
    },
    transportCss(css) {
        this.$emit('transportcss',css)
    },

    created() {
        let xhr = new XMLHttpRequest();

        xhr.open('GET','/api/user',true);
        xhr.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('token'));
        xhr.send();
        xhr.onload = () => {
            this.firstName = JSON.parse(xhr.response).data.first_name;
            this.lastName = JSON.parse(xhr.response).data.last_name;
            this.documentNumber = JSON.parse(xhr.response).data.document_number;
        };
        xhr.onerror = () => {
            console.log(xhr.response);
        };
    },
    template:
        `
        <div>
        <link href="css/booking.css" rel="stylesheet">
        <header>
    <h3>Бронирование</h3>
    <nav class="nav">
        <div class="nav1">
            <div class="div">Имя:{{ firstName }}</div>
            <hr>
            <div class="div">Фамилия:{{lastName}}</div>
            <hr>
            <div class="div">Кол-во полётов:</div>
            <hr>
            <div class="div">Номер документа:{{documentNumber}}</div>
        </div>
        <div class="btn">
            <a class="button" href="#">+</a>
            <a class="button" href="#">-</a>
        </div>
    </nav>
    <nav class="nav2">
        <div class="nav3">
            <div class="div">Итого:</div>
        </div>
        <a class="button-2" href="#">Бронировать</a>
    </nav>
</header>

<section class="nothing">
</section>
<section class="required">
    <div class="head">
        <h3>Бронирование</h3>
        <div  class="input">
            <div>
                <ul>
                    <li><label>Номер рейса<input type="text"></label></li>
                    <li><label>Название аэрапорта вылета<input type="text"></label></li>
                    <li><label>Время вылета<input type="time"></label></li>
                    <li><label>Название аэрапорта назначения<input type="text"></label></li>
                </ul>
            </div>

            <div>
                <ul>
                    <li><label>Название города вылета<input type="text"></label></li>
                    <li><label>Дата вылета<input type="date"></label></li>
                    <li><label>Название города назначения<input type="text"></label></li>
                    <li class="nothing"><input type="text" placeholder="Стоимость"></li>
                </ul>
            </div>
        </div>
    </div>
</section>
        </div>
        `

};

let SearchComponent = {
    name:'search',
    data() {return {
        name:'Name'
    }
    },
    changePage(page){
        this.$emit('changepage',page);
    },
    template:
    `
    <div>
    <div class="hidden">
    <link href="css/search.css" rel="stylesheet"></div>

        <section>
        <div class="head">
            <h3>Поиск</h3>
            <div  class="input">
                <div>
                    <ul>
                        <li><label>Номер рейса<input type="text"></label></li>
                        <li><label>Дата вылета<input type="date"></label></li>
                        <li><label>Время в пути<input type="date"></label></li>
                    </ul>
                </div>

                <div>
                    <ul>
                        <li><label>Воздушное судно<input type="time"></label></li>
                        <li><label>Время вылета<input type="text"></label></li>
                        <li><label>Вероятность вылета<input type="text"></label></li>
                        <li class="nothing"><input type="text" placeholder="Стоимость"></li>
                    </ul>
            </div>
        </div>
        </div>
        </section>
    </div>
    `

}

let vue = new Vue({
    el: '#app',
    components: {
        index: IndexComponent,
        register: RegisterComponent,
        login: LoginComponent,
        profile: ProfileComponent,
        booking: BookingComponent,
        search: SearchComponent
    },
    data: {
        name:'',
        currentComponent: 'index'
    },
    methods: {
        changePage(page) {
            this.currentComponent = page;
        },
    }
});
