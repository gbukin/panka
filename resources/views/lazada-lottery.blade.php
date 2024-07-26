<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Panka Lottery 11/11
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="favicon_sHL_icon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('fonts/lazada-lottery/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('css/lazada-lottery/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/lazada-lottery/main.css')}}">
</head>
<body>

<section id="main">
    <div class="main-top">
        <img src="{{asset('img/lazada-lottery/LOGO header.png')}}" alt="logo">
        <p class="main-top-p">
            <a href="https://panka.pro/img/lazada-lottery/rules.jpg" class="rules">RULES</a>
        </p>
        <p class="main-top-h">Panka Lottery 11/11</p>
    </div>
    <div class="main-table">
        <table class="w-full table-auto rounded-md bg-white text-black">
            <thead>
            <tr class="text-black bg-white font-bold border-b border-black rounded-t-md">
                <td class="p-1 md:p-3 rounded-tl-md">Your ID</td>
                <td class="p-1 md:p-3">Order date</td>
                <td class="p-1 md:p-3">Order number</td>
                <td class="p-1 md:p-3">Customer name</td>
                <td class="p-1 md:p-3">Delivery city</td>
                <td class="p-1 md:p-3 rounded-tr-md">Prize given</td>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $index => $item)
                <tr class="text-black">
                    <td class="p-1 md:p-3 text-3xl text-blue-600 font-bold">{{$index + 1}}</td>
                    <td class="p-1 md:p-3">{{$item['order_date']}}</td>
                    <td class="p-1 md:p-3">{{$item['order_number']}}</td>
                    <td class="p-1 md:p-3">{{$item['customer_name']}}</td>
                    <td class="p-1 md:p-3">{{$item['delivery_city']}}</td>
                    <td class="p-1 md:p-3">{{$item['prize_given'] ? 'Yes' : 'No'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
<section id="bottom">
    <div class="bottom-footer" id="contacts">
        <div class="bottom-footer-contacts flex">
            <a href="tel:+660951860009" class="phone">
                <img src="{{asset('img/lazada-lottery/phone.png')}}" alt="phone">
                +660951860009
            </a>
            <a href="mailto:pankacroutons@gmail.com" class="email">
                <img src="{{asset('img/lazada-lottery/email.png')}}" alt="email">
                pankacroutons@gmail.com
            </a>
            <a href="https://www.google.com/maps/place/Moo+12,+%D0%9F%D0%B0%D1%82%D1%82%D0%B0%D0%B9%D1%8F,+%D0%91%D0%B0%D0%BD%D0%BB%D0%B0%D0%BC%D1%83%D0%BD%D0%B3,+%D0%A7%D0%BE%D0%BD%D0%B1%D1%83%D1%80%D0%B8+20150,+%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4/@12.901586,100.8520936,15z/data=!4m6!3m5!1s0x3102966037239133:0x458e2f3f35c5312d!8m2!3d12.9014405!4d100.8699897!16s%2Fg%2F1ptx6s_jj?entry=ttu" target="_blank" class="adress">
                <img src="{{asset('img/lazada-lottery/map.png')}}" alt="map">
                315/170-172 Moo 12, Nongprue, Pattaya, Thailand, Chon Buri
            </a>
        </div>
        <div class="bottom-footer-right">
            <a href="/" class="logo">
                <img src="{{asset('img/lazada-lottery/logo.png')}}" alt="logo">
            </a>
            <div class="socials">
                <a href="https://www.instagram.com/pankasnacks/" target="_blank">
                    <img src="{{asset('img/lazada-lottery/insta.png')}}" alt="insta">
                </a>
                <a href="https://www.tiktok.com/@panka.snacks?_t=8lyoOk3xfFf&_r=1" target="_blank">
                    <img src="{{asset('img/lazada-lottery/tik tok.png')}}" alt="tik-tok">
                </a>
                <a href="https://www.facebook.com/pankacompany" target="_blank">
                    <img src="{{asset('img/lazada-lottery/fb.png')}}" alt="fb">
                </a>
                <a href="https://www.lazada.co.th/shop/panka-snacks/" target="_blank">
                    <img src="{{asset('img/lazada-lottery/lazada2.png')}}" alt="lazada">
                </a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
