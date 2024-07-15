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
    <style>
        #top::after {
            background: none;
        }

        #bottom::before {
            background: none;
        }

        #bottom {
            background: none;
        }
    </style>
</head>
<body style="background: rgb(119,0,208);
background: radial-gradient(circle, rgba(119,0,208,1) 7%, rgba(226,12,124,1) 59%, rgba(0,3,153,1) 98%);">
<section id="top">
    <div class="top-lines">
        <img src="img/wave1.png" alt="wave1">
        <img src="img/wave2.png" alt="wave2">
    </div>
</section>

<div class="z-10 relative">
    <img class="absolute md:left-2/3 -top-16 z-[1]"
         src="{{asset('img/lazada-lottery/iphone.png')}}">

    <img class="absolute left-16 md:left-1/4 -top-44 md:-top-36"
         src="{{asset('img/lazada-lottery/air_pods_1.png')}}">

    <img class="absolute invisible md:visible md:left-[90%] top-32"
         src="{{asset('img/lazada-lottery/air_pods_2.png')}}">

    <img class="absolute rotate-45 left-32 md:left-2 -top-36 md:top-10"
         src="{{asset('img/lazada-lottery/marshall.png')}}">

    {{--    <img class="absolute left-3/4 md:left-3/4 top-full"--}}
    {{--        src="{{asset('img/lazada-lottery/panka_pack_1.png')}}">--}}

    <img class="absolute invisible md:visible left-[40%] -top-1/2"
         src="{{asset('img/lazada-lottery/panka_pack_2.png')}}">

    <span class="relative font-bold text-5xl drop-shadow-lg text-center block text-white md:mb-6 z-10">
        Panka Lottery 11/11
    </span>

    <section class="relative z-10 md:p-64 md:py-10 rounded-md border border-gold-thin"
             style="background: rgba(53,50,53,0.3);">
        <table class="w-full table-auto rounded-md bg-white text-black">
            <thead>
            <tr class="text-black bg-white font-bold border-b border-black rounded-t-md">
                <td class="p-1 md:p-3 rounded-tl-md"></td>
                <td class="p-1 md:p-3">Order date</td>
                <td class="p-1 md:p-3">Order number</td>
                <td class="p-1 md:p-3">Customer name</td>
                <td class="p-1 md:p-3">Delivery city</td>
                <td class="p-1 md:p-3 rounded-tr-md">Prize given</td>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr class="text-black">
                    <td class="border-b border-gray-500/60 p-1 md:p-3 font-bold">{{$item['id']}}</td>
                    <td class="border-b border-gray-500/60 p-1 md:p-3">{{$item['order_date']}}</td>
                    <td class="border-b border-gray-500/60 p-1 md:p-3">{{$item['order_number']}}</td>
                    <td class="border-b border-gray-500/60 p-1 md:p-3">{{$item['customer_name']}}</td>
                    <td class="border-b border-gray-500/60 p-1 md:p-3">{{$item['delivery_city']}}</td>
                    <td class="border-b border-gray-500/60 p-1 md:p-3">{{$item['prize_given'] ? 'Yes' : 'No'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>

<section id="bottom">
    <div class="bottom-footer" id="contacts">
        <div class="bottom-footer-contacts">
            <a href="/rules.jpg" target="_blank">
                <span class="border-b">Rules</span>
            </a>
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
