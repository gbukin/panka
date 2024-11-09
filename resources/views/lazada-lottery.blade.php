<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Panka 11/11
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="favicon_sHL_icon.ico">
    <link rel="stylesheet" href="{{asset('fonts/lazada-lottery/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('css/lazada-lottery/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/lazada-lottery/main.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #prizes {
            border-collapse: separate !important;
            border-spacing: 5px !important;
        }

        #prizes > tr, td, th {
            border: 2px solid gray !important;
            margin: 1rem;
        }
    </style>
</head>
<body>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<div id="app">
<section id="main">
    <div class="main-top">
        <img src="{{asset('img/lazada-lottery/LOGO header.png')}}" alt="logo">
        @isset($lazada_prizes)
        <h1 class="text-white text-6xl font-bold">List of winners</h1>
        <div class="bg-yellow-400 text-9xl w-fit mx-auto rounded-3xl p-1">
            “PANKA 11/11”
        </div>
        @endisset
    </div>

    @isset($lazada_prizes)
    <div class="mt-8 main-table">
        <table class="table mx-auto" id="prizes">
            <thead>
            <tr>
                <th class="bg-orange-200 text-2xl font-bold w-44 ">Gift:</th>
                <th class="bg-orange-200 text-2xl font-bold">ID number:</th>
                <th class="bg-orange-200 text-2xl font-bold">Order number:</th>
                <th class="bg-orange-200 text-2xl font-bold">Customer name:</th>
                <th class="bg-orange-200 text-2xl font-bold">Delivery City:</th>
                <th class="bg-orange-200 text-2xl font-bold">Prize given:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lazada_prizes as $prize)
                <tr>
                    <td class="w-44 @if($prize['is_main']) bg-lime-300 @else bg-amber-300 @endif">{{$prize['gift']}}</td>
                    <td class="bg-transparent">{{$prize['lazada_lottery']['id']}}</td>
                    <td class="bg-transparent">{{$prize['lazada_lottery']['order_number']}}</td>
                    <td class="bg-transparent">{{$prize['lazada_lottery']['customer_name']}}</td>
                    <td class="bg-transparent">{{$prize['lazada_lottery']['delivery_city']}}</td>
                    <td class="bg-transparent">{{$prize['lazada_lottery']['prize_given']? 'Given' : 'Not given'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endisset

    <div class="main-top">
        <p class="main-top-p">
            <span class="flex flex-row gap-x-2 justify-center text-black">
                <a href="{{asset('img/lazada-lottery/rules_en.jpg')}}" target="_blank" class="rules">
                    <button class="text-center p-2 bg-amber-300 rounded-md shadow-md hover:bg-amber-400 active:bg-amber-500">RULES</button>
                </a>
                <a href="{{asset('img/lazada-lottery/rules_ru.jpg')}}" target="_blank" class="rules">
                    <button class="text-center p-2 bg-amber-300 rounded-md shadow-md hover:bg-amber-400 active:bg-amber-500">ПРАВИЛА</button>
                </a>
                <a href="{{asset('img/lazada-lottery/rules_th.jpg')}}" target="_blank" class="rules">
                    <button class="text-center p-2 bg-amber-300 rounded-md shadow-md hover:bg-amber-400 active:bg-amber-500">กฎ</button>
                </a>
            </span>
        </p>
        <p class="main-top-h">Panka 11/11</p>
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
                    <td class="p-1 md:p-3 text-3xl text-blue-600 font-bold">{{$item['id']}}</td>
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
    <div class="bottom-footer" id="contacts">
        <div class="bottom-footer-contacts">
            <a href="#-" class="terms&conditions"
               @click="modalOpen=true"
               style="text-decoration: underline !important; cursor: pointer">
                Terms & Conditions
            </a>
            <a href="tel:+66826900800" class="phone">
                <img src="{{asset('img/lazada-lottery/phone.png')}}" alt="phone">
                +66826900800
            </a>
            <a href="mailto:pankacroutons@gmail.com" class="email">
                <img src="{{asset('img/lazada-lottery/email.png')}}" alt="email">
                pankacroutons@gmail.com
            </a>
            <a href="https://www.google.com/maps/place/Moo+12,+%D0%9F%D0%B0%D1%82%D1%82%D0%B0%D0%B9%D1%8F,+%D0%91%D0%B0%D0%BD%D0%BB%D0%B0%D0%BC%D1%83%D0%BD%D0%B3,+%D0%A7%D0%BE%D0%BD%D0%B1%D1%83%D1%80%D0%B8+20150,+%D0%A2%D0%B0%D0%B8%D0%BB%D0%B0%D0%BD%D0%B4/@12.901586,100.8520936,15z/data=!4m6!3m5!1s0x3102966037239133:0x458e2f3f35c5312d!8m2!3d12.9014405!4d100.8699897!16s%2Fg%2F1ptx6s_jj?entry=ttu" target="_blank" class="adress">
                <span>
                    <img src="{{asset('img/lazada-lottery/map.png')}}" style="display: inline" alt="map">
                    315/170-172 Moo 12, Nongprue, Pattaya, Thailand, Chon Buri
                </span>
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
    <div id="modalFade"
         style="background: rgba(0,0,0,0.4);"
         class="z-20 inset-0 h-100 w-100 absolute overflow-y-auto"
         v-on:click="modalOpen = false"
         v-show="modalOpen">
    </div>
    <dialog id="modal"
            v-bind:open="modalOpen"
            v-on:click="modalOpen = false"
            class="z-20 fixed w-full h-full inset-0 overflow-y-auto"
            style="background-color: rgba(1,1,1,0.5)">
        <div class="mx-auto mt-32 p-5 w-3/5 md:w-1/4 border-primary bg-white rounded-md shadow">
            <span class="w-full cursor-pointer border-0 shadow-none font-bold text-red-600"
                  v-on:click="modalOpen = false">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="2.5"
                     stroke="currentColor"
                     class="w-6 h-6 ml-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </span>

            <p class="text-center font-bold mb-5">
                Terms & Conditions
            </p>

            <div>
                <p class="flex flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                    </svg>
                    <a target="_blank" href="{{asset('docs/lazada-lottery/rules-ru.docx')}}" style="text-decoration: underline !important" class="text-blue-600">
                        Акция Lazada (правила).docx
                    </a>
                </p>
                <p class="flex flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                    </svg>
                    <a target="_blank" href="{{asset('docs/lazada-lottery/rules-en.docx')}}" style="text-decoration: underline !important" class="text-blue-600">
                        RULES OF PROVISIONS OF.docx
                    </a>
                </p>
            </div>

            <button class="mt-4 p-2 text-white bg-red-600 hover:bg-red-700 active:bg-red-800 block ml-auto rounded-md"
                v-on:click="modalOpen = false">
                Close
            </button>
        </div>
    </dialog>
</section>
</div>
<script>
    const { createApp, ref } = Vue

    createApp({
        setup() {
            const modalOpen = ref(false)
            return {
                modalOpen
            }
        }
    }).mount('#app')
</script>
</body>
</html>
