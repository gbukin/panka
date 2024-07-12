<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Сухари
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('favicon_sHL_icon.ico')}}">
    <link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#eac45f',
                        'gold-thin': 'rgba(234,196,95,0.5)'
                    }
                }
            }
        }
    </script>
</head>
<body style="background: #0b0c0c">

<section id="top">
    <div class="top-lines">
        <img src="img/wave1.png" alt="wave1">
        <img src="img/wave2.png" alt="wave2">
    </div>
</section>

<section class="relative bg-black z-10 md:p-16 md:pb-10 md:pt-4 md:mx-32 rounded-md border border-gold-thin">
    <table class="w-full table-auto bg-black">
        <thead>
        <caption class="font-bold text-xl text-gold md:mb-6">Lazada lottery</caption>
        <tr class="text-gold border-b border-gold">
            <td class="p-3">Order date</td>
            <td class="p-3">Order number</td>
            <td class="p-3">Customer name</td>
            <td class="p-3">Delivery city</td>
            <td class="p-3">Prize given</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr class="text-white">
                <td class="border-b border-gray-500/60 p-3">{{$item['order_date']}}</td>
                <td class="border-b border-gray-500/60 p-3">{{$item['order_number']}}</td>
                <td class="border-b border-gray-500/60 p-3">{{$item['customer_name']}}</td>
                <td class="border-b border-gray-500/60 p-3">{{$item['delivery_city']}}</td>
                <td class="border-b border-gray-500/60 p-3">{{$item['prize_given'] ? 'Yes' : 'No'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>

<section id="bottom">
    <div class="bottom-footer" id="contacts">
        <div class="bottom-footer-contacts">
            <a href="tel:+660951860009" class="phone">
                <img src="img/phone.png" alt="phone">
                +660951860009
            </a>
            <a href="mailto:pankacroutons@gmail.com" class="email">
                <img src="img/email.png" alt="email">
                pankacroutons@gmail.com
            </a>
            <a href="https://www.google.com/maps/place/Moo+12,+%D0%9F%D0%B0%D1%82%D1%82%D0%B0%D0%B9%D1%8F,+%D0%91%D0%B0%D0%BD%D0%BB%D0%B0%D0%BC%D1%83%D0%BD%D0%B3,+%D0%A7%D0%BE%D0%BD%D0%B1%D1%83%D1%80%D0%B8+20150,+%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4/@12.901586,100.8520936,15z/data=!4m6!3m5!1s0x3102966037239133:0x458e2f3f35c5312d!8m2!3d12.9014405!4d100.8699897!16s%2Fg%2F1ptx6s_jj?entry=ttu"
               target="_blank" class="adress">
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

</body>
</html>
