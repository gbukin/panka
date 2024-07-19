<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Panka Snacks
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('favicon_sHL_icon.ico')}}">
    <link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
</head>
<body>

<div class="top-block-head-fixed">
    <div class="top-block-head">
        <div class="language-toggle">
            <a href="#-" id="langThHead" onclick="setLang('th')">Th</a>
            /
            <a href="#-" id="langEnHead" onclick="setLang('en')" class="active">En</a>
        </div>
        <input class="header-menu__toggle" id="header-menu__toggle" type="radio" style="display: none;" />
        <label class="header-menu__btn" for="header-menu__toggle">
            <div>
                <span></span>
            </div>
        </label>
    </div>
</div>

<div class="header-menu">
    <input class="header-menu__toggle" id="header-menu__toggle2" type="radio" style="display: none;" />
    <label class="header-menu__btn" for="header-menu__toggle2">
        <div>
            <span></span>
        </div>
    </label>
    <ul>
        <li>
            <a href="#about-us" data-translation-key="about_us">ABOUT US</a>
        </li>
        <li>
            <a href="#our-flavours" data-translation-key="our_flavours">OUR FLAVOURS</a>
        </li>
        <li>
            <a href="#premium" data-translation-key="premium_quality">PREMIUM QUALITY</a>
        </li>
        <li>
            <a href="{{route('lazada-lottery')}}" data-translation-key="lazada_lottery">LAZADA LOTTERY</a>
        </li>
        <li>
            <a href="#contacts" data-translation-key="contacts">CONTACTS</a>
        </li>
    </ul>
</div>

<section id="top">
    <div class="top-lines">
        <img src="img/wave1.png" alt="wave1">
        <img src="img/wave2.png" alt="wave2">
    </div>
    <div class="top-video">
        <video autoplay muted loop playsinline class="lazy">
            <source data-src="video_new.mp4" type="video/mp4">
        </video>
        <img src="img/LOGO header.png" alt="logo">
    </div>
    <div class="top-block">
        <div class="top-block-head">
            <div class="language-toggle">
                <a href="#-" id="langTh" onclick="setLang('th')">Th</a>
                /
                <a href="#-" id="langEn" onclick="setLang('en')" class="active">En</a>
            </div>
            <input class="header-menu__toggle" id="header-menu__toggle" type="radio" style="display: none;" />
            <label class="header-menu__btn" for="header-menu__toggle">
                <div>
                    <span></span>
                </div>
            </label>
        </div>
        <div class="top-block-imgs">
            <p>&nbsp;</p>
            <img src="img/main-img-item2.png" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1500" data-aos-duration="4000" alt="item2">
            <img src="img/main-img-item3.png" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1500" data-aos-duration="4000" alt="item3">
            <img src="img/main-img-item4.png" data-aos="fade-right" data-aos-offset="200" data-aos-delay="1500" data-aos-duration="4000" alt="item4">
        </div>
    </div>
    <div class="top-about" id="about-us">
        <h2 class="header-sec" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-translation-key="about_us">ABOUT US</h2>
        <div class="top-about-block">
            <img src="img/foto about us.jpg" data-aos="fade-right" data-aos-offset="200" data-aos-duration="2000" alt="about us">
            <div class="text" data-aos="fade-left" data-aos-offset="200" data-aos-duration="2000">
                <p data-translation-key="about_us_first_part">
                    "PANKA" offers amazing flavours that will definitely satisfy even the most discerning gourmets.
                </p>
                <p data-translation-key="about_us_second_part">
                    We invite you to the amazing world
                    of "PANKA". Become a part of
                    our inspiring taste journey!
                </p>
            </div>
        </div>
    </div>
</section>

<section id="center">
    <h2 class="header-sec" id="our-flavours" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-translation-key="our_flavours">OUR FLAVOURS</h2>
    <div class="center-lines">
        <img src="img/wave2.1.png" alt="wave2.1">
    </div>
    <div class="center-slider" data-aos="fade-bottom" data-aos-offset="200" data-aos-duration="2000">
        <div class="prev">
            <img src="img/arrow L.png" alt="prev">
        </div>
        <div class="slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-value="BBQ">
                    <img src="img/Adjika backgraud.png" class='bg' alt="bg">
                    <img src="img/Adjika.png" class="img" alt="BBQ">
                </div>
                <div class="swiper-slide" data-value="CHEESE FLAVOUR">
                    <img src="img/BBQ backgraud.png" class='bg' alt="bg">
                    <img src="img/BBQ.png" class="img" alt="CHEESE">
                </div>
                <div class="swiper-slide" data-value="KING CRAB">
                    <img src="img/Cheese backgraud.png" class='bg' alt="bg">
                    <img src="img/Cheese.png" class="img" alt="KING CRAB">
                </div>
                <div class="swiper-slide" data-value="JELLY MEAT WITH HORSERADISH">
                    <img src="img/Crab backgraud.png" class='bg' alt="bg">
                    <img src="img/Crab.png" class="img" alt="JELLY MEAT">
                </div>
                <div class="swiper-slide" data-value="SMOKED SALMON">
                    <img src="img/Jelly Meat backgraud.png" class='bg' alt="bg">
                    <img src="img/Jelly meat.png" class="img" alt="SMOKE SALMON">
                </div>
                <div class="swiper-slide" data-value="SOUR CREAM & ONION">
                    <img src="img/Salmon backgraud.png" class='bg' alt="bg">
                    <img src="img/Salmon.png" class="img" alt="SOUR CREAM & ONION">
                </div>
                <div class="swiper-slide" data-value="TOM YUM">
                    <img src="img/Smetana backgraud.png" class='bg' alt="bg">
                    <img src="img/Sour cream.png" class="img" alt="TOM YUM">
                </div>
                <div class="swiper-slide" data-value="AJIKA SAUSE">
                    <img src="img/Tom Yam backgraud.png" class='bg' alt="bg">
                    <img src="img/Tom Yum.png" class="img" alt="AJIKA SAUSE">
                </div>
            </div>
        </div>
        <div class="next">
            <img src="img/arrow R.png" alt="next">
        </div>
    </div>
    <p class="center-h">BBQ</p>
</section>

<section id="bottom">
    <h2 class="header-sec" id="premium" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000" data-translation-key="premium_quality">PREMIUM QUALITY</h2>
    <div class="bottom-about-block">
        <div class="text" data-aos="fade-right" data-aos-offset="200" data-aos-duration="2000">
            <div>
                <p data-translation-key="premium_quality_first_part">
                    We take pride in being the first
                    in Thailand to offer such
                    high-quality croutons in various flavour compositions.
                </p>
                <p data-translation-key="premium_quality_second_part">
                    But what truly sets us apart is
                    our passion and dedication to
                    our craft. Each batch of croutons
                    is made with care and attention
                    to detail by our team of skilled professionals.
                </p>
            </div>
            <img src="img/grenka.png" data-aos="fade-down" data-aos-offset="200" data-aos-delay="1500" data-aos-duration="4000" alt="grenka">
        </div>
        <a href="https://www.youtube.com/watch?v=C0DPdy98e4c&ab_channel=SimonYapp" data-fancybox="" data-aos="fade-left" data-aos-offset="200" data-aos-duration="2000" class="video">
            <img src="img/fotoquality.jpg" alt="quality">
        </a>
    </div>
    <div class="bottom-footer" id="contacts" data-aos="fade-bottom" data-aos-offset="200" data-aos-duration="2000">
        <div class="bottom-footer-contacts">
            <a href="tel:+660951860009" class="phone">
                <img src="img/phone.png" alt="phone">
                +660951860009
            </a>
            <a href="mailto:pankacroutons@gmail.com" class="email">
                <img src="img/email.png" alt="email">
                pankacroutons@gmail.com
            </a>
            <a href="https://www.google.com/maps/place/Moo+12,+%D0%9F%D0%B0%D1%82%D1%82%D0%B0%D0%B9%D1%8F,+%D0%91%D0%B0%D0%BD%D0%BB%D0%B0%D0%BC%D1%83%D0%BD%D0%B3,+%D0%A7%D0%BE%D0%BD%D0%B1%D1%83%D1%80%D0%B8+20150,+%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4/@12.901586,100.8520936,15z/data=!4m6!3m5!1s0x3102966037239133:0x458e2f3f35c5312d!8m2!3d12.9014405!4d100.8699897!16s%2Fg%2F1ptx6s_jj?entry=ttu" target="_blank" class="adress">
                <img src="img/map.png" alt="map">
                315/170-172 Moo 12, Nongprue, Pattaya, Thailand, Chon Buri
            </a>
        </div>
        <div class="bottom-footer-right">
            <a href="/" class="logo">
                <img src="img/logo.png" alt="logo">
            </a>
            <div class="socials">
                <a href="https://www.instagram.com/pankasnacks/" target="_blank">
                    <img src="img/insta.png" alt="insta">
                </a>
                <a href="https://www.tiktok.com/@panka.snacks?_t=8lyoOk3xfFf&_r=1" target="_blank">
                    <img src="img/tik tok.png" alt="tik-tok">
                </a>
                <a href="https://www.facebook.com/pankacompany" target="_blank">
                    <img src="img/fb.png" alt="fb">
                </a>
                <a href="https://www.lazada.co.th/shop/panka-snacks/" target="_blank">
                    <img src="img/lazada2.png" alt="lazada">
                </a>
            </div>
        </div>
    </div>
</section>

<script src="js/all.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/translate.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="js/main.js"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7N94RN61SF"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7N94RN61SF');
</script>
</body>
</html>
