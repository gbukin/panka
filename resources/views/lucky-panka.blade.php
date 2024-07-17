<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Panka Snacks
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('favicon_sHL_icon.ico')}}">
    <link rel="stylesheet" href="{{asset('fonts/lucky-panka/stylesheet.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/lucky-panka/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/lucky-panka/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/lucky-panka/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lucky-panka/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lucky-panka/media.css')}}">
</head>
<body>

<div class="top-block-head-fixed">
    <div class="top-block-head">
        <div class="language-toggle">
            <a href="?th">Th</a>
            /
            <a href="?en" class="active">En</a>
            /
            <a href="?ru">Ru</a>
        </div>
        <input class="header-menu__toggle" id="header-menu__toggle" type="radio" style="display: none;"/>
        <label class="header-menu__btn" for="header-menu__toggle">
            <div>
                <span></span>
            </div>
        </label>
    </div>
</div>

<div class="header-menu">
    <input class="header-menu__toggle" id="header-menu__toggle2" type="radio" style="display: none;"/>
    <label class="header-menu__btn" for="header-menu__toggle2">
        <div>
            <span></span>
        </div>
    </label>
    <ul>
        <li>
            <a href="#prizes">
                <span data-lang="en">PRIZES</span>
                <span data-lang="ru">ПРИЗЫ</span>
            </a>
        </li>
        <li>
            <a href="#etap">
                <span data-lang="en">HOW TO WIN</span>
                <span data-lang="ru">КАК ВЫИГРАТЬ</span>
            </a>
        </li>
        <li>
            <a href="#contacts">
                <span data-lang="en">CONTACTS</span>
                <span data-lang="ru">КОНТАКТЫ</span>
            </a>
        </li>
    </ul>
</div>

<section id="top">
    <img src="{{asset('img/lucky-panka/light4.png')}}" alt="light" class="light-4">
    <img src="{{asset('img/lucky-panka/light3.png')}}" alt="light" class="light-3">
    <img src="{{asset('img/lucky-panka/light2.png')}}" alt="light" class="light-2">
    <img src="{{asset('img/lucky-panka/light1.png')}}" alt="light" class="light-1">
    <div class="top-lines">
        <img src="{{asset('img/lucky-panka/wave1.png')}}" alt="wave1">
    </div>
    <div class="top-video">
        <video autoplay muted loop playsinline class="lazy">
            <source data-src="" type="video/mp4">
        </video>
    </div>
    <div class="top-block">
        <div class="top-block-head">
            <div class="language-toggle">
                <a href="?th">Th</a>
                /
                <a href="?en" class="active">En</a>
                /
                <a href="?ru">Ru</a>
            </div>
            <input class="header-menu__toggle" id="header-menu__toggle" type="radio" style="display: none;"/>
            <label class="header-menu__btn" for="header-menu__toggle">
                <div>
                    <span></span>
                </div>
            </label>
        </div>
        <div class="top-block-imgs">
            <img src="{{asset('img/lucky-panka/main-img-item1.png')}}" style="display: none;" data-aos="fade-left" data-aos-offset="200"
                 data-aos-delay="4500" data-aos-duration="2000" alt="item1">
            <img src="{{asset('img/lucky-panka/main-img-item2.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1500"
                 data-aos-duration="4000" alt="item2">
            <img src="{{asset('img/lucky-panka/main-img-item3.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1500"
                 data-aos-duration="4000" alt="item3">
            <img src="{{asset('img/lucky-panka/main-img-item4.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1500"
                 data-aos-duration="4000" alt="item4">
            <img src="{{asset('img/lucky-panka/LUCKYPANKA-NEW.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000"
                 alt="LUCKYPANKA">
        </div>
    </div>
</section>

<section id="prizes">
    <h2 class="header-sec" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500"><span
            data-lang="en"></span><span data-lang="ru">ПРИЗЫ</span></h2>
    <div class="prizes-items">
        <div class="prizes-item" data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" data-aos-duration="1500">
            <img src="{{asset('img/lucky-panka/note2.png')}}" alt="prize">
            <p class="name">MacBook</p>
        </div>
        <div class="prizes-item" data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" data-aos-duration="1500">
            <img src="{{asset('img/lucky-panka/prize3.png')}}" alt="prize">
            <p class="name">IPHONE 15</p>
        </div>
        <div class="prizes-item" data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" data-aos-duration="1500">
            <img src="{{asset('img/lucky-panka/prize4.png')}}" alt="prize">
            <p class="name">iPad</p>
        </div>
        <div class="prizes-item" data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" data-aos-duration="1500">
            <img src="{{asset('img/lucky-panka/prize2.png')}}" alt="prize">
            <p class="name">AirPods Max</p>
        </div>
        <div class="prizes-item" data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" data-aos-duration="1500">
            <img src="{{asset('img/lucky-panka/prize1.png')}}" alt="prize">
            <p class="name">Apple Watch</p>
        </div>
        <div class="prizes-item" data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" data-aos-duration="1500">
            <img src="{{asset('img/lucky-panka/pocket/prize-pocket1.png')}}" alt="prize">
            <p class="name">PACK OF CROUTONS</p>
        </div>
    </div>
    <img src="{{asset('img/lucky-panka/Wave2.png')}}" class="line-2" alt="wave">
</section>

<section id="etap">
    <h2 class="header-sec" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500"><span data-lang="en">HOW TO WIN</span><span
            data-lang="ru">Как выиграть?</span></h2>
    <div class="etap">
        <div class="etap-item">
            <div class="etap-item-num">
                <img src="{{asset('img/lucky-panka/etap-line.png')}}" alt="etap-line" data-aos="fade-right" data-aos-offset="200"
                     data-aos-duration="1500">
                <img src="{{asset('img/lucky-panka/1.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1000"
                     data-aos-duration="1500" alt="1">
            </div>
            <div class="etap-item-text" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
                <h3 class="header-sec"><span data-lang="en">BUY «PANKA»</span><span data-lang="ru">Купи пачку сухариков Panka</span>
                </h3>
                <p>
                        <span data-lang="en">You can buy our croutons at The Cove Pub,<br>
                        DD Weed Shop, The Gold, and on Lazada<br>
                        shop "Panka Snacks".</span>
                    <span data-lang="ru">Вы можете купить сухарики в наших магазинах:<br> The Cove Pub, DD Weed, The Gold, а также в магазине на LAZADA.</span>
                </p>
            </div>
        </div>
        <div class="etap-item">
            <div class="etap-item-text" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
                <h3 class="header-sec"><span data-lang="en">TASTE AMAZING FLAVOUR</span><span data-lang="ru">Удивительный вкус Panka</span>
                </h3>
                <p>
                        <span data-lang="en">"PANKA" offers amazing flavours<br>
                            that will definitely satisfy even<br>
                            the most discerning gourmets.<br>
                            There are over 10 000 limited packs<br>
                        that contain a QR code.</span>
                    <span data-lang="ru">Мы предлагаем вам удивительные вкусы, которые определенно удовлетворят даже
                        самых взыскательных гурманов. В период акции в наших упаковках Panka, будет находится 10 000 лимитированных фишек со своим уникальным QR-кодом.</span>
                </p>
            </div>
            <div class="etap-item-num">
                <img src="{{asset('img/lucky-panka/2.png')}}" alt="2" data-aos="fade-left" data-aos-offset="200" data-aos-delay="1000"
                     data-aos-duration="1500">
                <img src="{{asset('img/lucky-panka/etap-line.png')}}" alt="etap-line" data-aos="fade-left" data-aos-offset="200"
                     data-aos-duration="1500">
            </div>
        </div>
        <div class="etap-item">
            <div class="etap-item-num">
                <img src="{{asset('img/lucky-panka/etap-line.png')}}" alt="etap-line" data-aos="fade-right" data-aos-offset="200"
                     data-aos-duration="1500">
                <img src="{{asset('img/lucky-panka/3.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1000"
                     data-aos-duration="1500" alt="3">
            </div>
            <div class="etap-item-text" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
                <h3 class="header-sec"><span data-lang="en">SCAN QR</span><span data-lang="ru">Сканируй QR-код</span>
                </h3>
                <p>
                        <span data-lang="en">Scan the QR code with your phone<br>
                        and find out what your prize is.</span>
                    <span data-lang="ru">Отсканируйте QR-код с помощью вашего телефона<br> и узнайте какой приз вы выиграли.</span>
                </p>
            </div>
        </div>
        <div class="etap-item">
            <div class="etap-item-text" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
                <h3 class="header-sec"><span data-lang="en">CLAIM YOUR RRIZE</span><span data-lang="ru">Заберите ваш приз</span>
                </h3>
                <p>
                        <span data-lang="en">You can pick up the prize by coming to the<br>
                        «PANKA» office. All the information you need<br>
                        will be available on our promotional<br>
                        website after you scan the QR code.</span>
                    <span data-lang="ru">Вы можете забрать ваш приз, приехав к нам в офис Panka. Вся необходимая информация
                        будет доступна в нашей рекламной акции, после сканирования QR-кода на этом сайте.</span>
                </p>
            </div>
            <div class="etap-item-num">
                <img src="{{asset('img/lucky-panka/4.png')}}" alt="4" data-aos="fade-left" data-aos-offset="200" data-aos-delay="1000"
                     data-aos-duration="1500">
                <img src="{{asset('img/lucky-panka/etap-line.png')}}" alt="etap-line" data-aos="fade-left" data-aos-offset="200"
                     data-aos-duration="1500">
            </div>
        </div>
        <div class="etap-item">
            <div class="etap-item-num">
                <img src="{{asset('img/lucky-panka/etap-line.png')}}" alt="etap-line" data-aos="fade-right" data-aos-offset="200"
                     data-aos-duration="1500">
                <img src="{{asset('img/lucky-panka/5.png')}}" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1000"
                     data-aos-duration="1500" alt="5">
            </div>
            <div class="etap-item-text" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
                <h3 class="header-sec"><span data-lang="en">INCREASE YOUR CHANCES</span><span data-lang="ru">Увельчите свои шансы</span>
                </h3>
                <p>
                        <span data-lang="en">To do this, you need to buy more packs,<br>
                        perhaps you will be the one to win the<br>
                        main prize.</span>
                    <span data-lang="ru">Для этого вы можете купить больше пачек Panka,<br> возможно, именно вы выиграете главные призы.</span>
                </p>
            </div>
        </div>
    </div>
</section>

<section id="bottom">
    <div class="bottom-footer" id="contacts" data-aos="fade-bottom" data-aos-offset="200" data-aos-duration="2000">
        <div class="bottom-footer-contacts">
            <a href="tel:+660951860009" class="phone">
                <img src="{{asset('img/lucky-panka/phone.png')}}" alt="phone">
                +660951860009
            </a>
            <a href="mailto:pankacroutons@gmail.com" class="email">
                <img src="{{asset('img/lucky-panka/email.png')}}" alt="email">
                pankacroutons@gmail.com
            </a>
            <a href="https://www.google.com/maps/place/Moo+12,+%D0%9F%D0%B0%D1%82%D1%82%D0%B0%D0%B9%D1%8F,+%D0%91%D0%B0%D0%BD%D0%BB%D0%B0%D0%BC%D1%83%D0%BD%D0%B3,+%D0%A7%D0%BE%D0%BD%D0%B1%D1%83%D1%80%D0%B8+20150,+%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4/@12.901586,100.8520936,15z/data=!4m6!3m5!1s0x3102966037239133:0x458e2f3f35c5312d!8m2!3d12.9014405!4d100.8699897!16s%2Fg%2F1ptx6s_jj?entry=ttu"
               target="_blank" class="adress">
                <img src="{{asset('img/lucky-panka/map.png')}}" alt="map">
                315/170-172 Moo 12, Nongprue, Pattaya, Thailand, Chon Buri
            </a>
        </div>
        <div class="bottom-footer-right">
            <a href="/" class="logo">
                <img src="{{asset('img/lucky-panka/logo.png')}}" alt="logo">
            </a>
            <div class="socials">
                <a href="https://www.instagram.com/pankasnacks/" target="_blank">
                    <img src="{{asset('img/lucky-panka/insta.png')}}" alt="insta">
                </a>
                <a href="https://www.tiktok.com/@panka.snacks?_t=8lyoOk3xfFf&_r=1" target="_blank">
                    <img src="{{asset('img/lucky-panka/tik tok.png')}}" alt="tik-tok">
                </a>
                <a href="https://www.facebook.com/pankacompany" target="_blank">
                    <img src="{{asset('img/lucky-panka/fb.png')}}" alt="fb">
                </a>
                <a href="https://www.lazada.co.th/shop/panka-snacks/" target="_blank">
                    <img src="{{asset('img/lucky-panka/lazada2.png')}}" alt="lazada">
                </a>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('js/lucky-panka/all.js')}}"></script>
<script src="{{asset('js/lucky-panka/swiper-bundle.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="{{asset('js/lucky-panka/main.js')}}"></script>
</body>
</html>
