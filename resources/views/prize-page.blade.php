<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		Gift
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="{{asset('favicon_sHL_icon.ico')}}">
	<link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/lucky-panka/reset.css')}}">
	<link rel="stylesheet" href="{{asset('css/lucky-panka/main.css')}}">
	<link rel="stylesheet" href="{{asset('css/lucky-panka/swiper-bundle.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/lucky-panka/jquery.fancybox.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/lucky-panka/media.css')}}">
</head>
<body>

	<div class="pyro">
		<div class="before"></div>
		<div class="after"></div>
	</div>
	<section id="gift">
		<div class="gift-main">
			<div class="gift-main-left">
				<div class="language-toggle">
					<a href="?th">Th</a>
					/
					<a href="?en" class="active">En</a>
					/
					<a href="?ru">Ru</a>
				</div>
				<img class="logo" src="{{asset('img/lucky-panka/pocket/Panka Logo fin.png')}}" alt="logo" data-aos="fade-right" data-aos-offset="200" data-aos-duration="1000">
				<img class="lucky-panka" src="{{asset('img/lucky-panka/pocket/LUCKYPANKA.png')}}" alt="panka" data-aos-delay="500" data-aos="fade-right" data-aos-duration="1000">
				<div class="gift-main-prize watchs" style="display: none;" data-aos-delay="500" data-aos="fade-right" data-aos-duration="1000">
					<img src="{{asset('img/lucky-panka/pocket/backgraundpinktablet.png')}}" class="prize-bg" alt="prize-bg">
					<img src="{{$prize_image}}" class="prize-img" alt="prize-image">
				</div>
				<p class="prize" data-aos-delay="1000" data-aos="fade-right" data-aos-duration="1000">
					<i data-lang="en">YOU WIN:</i><i data-lang="ru">Вы выиграли:</i><br>
					<span>{{strtoupper($prize_name)}}</span>
				</p>
				<p class="text" data-aos-delay="0" data-aos="fade-right" data-aos-duration="1000"><span data-lang="en">HOW TO CLAIM YOUR PRIZE</span><span data-lang="ru">Как забрать ваш приз?</span></p>
			</div>
			<div class="gift-main-prize watchs">
				<img src="{{asset('img/lucky-panka/pocket/backgraundpinktablet.png')}}" class="prize-bg" alt="prize-bg" data-aos-delay="500" data-aos="fade-up" data-aos-duration="1000">
				<img src="{{$prize_image}}" class="prize-img" alt="prize-image" data-aos-delay="1500" data-aos="fade-left" data-aos-offset="200" data-aos-duration="1500">
			</div>
		</div>
		<div class="gift-list">
			<div class="gift-list-item">
				<div class="text">
					<div class="num"><img src="{{asset('img/lucky-panka/pocket/1 tablet.png')}}" alt="1"></div>
					<p><span data-lang="en">Come to the THE COVE PUB PATTAYA (see map below).</span><span data-lang="ru">Приходите в The Cove Pub (карта ниже).</span></p>
				</div>
			</div>
			<div class="gift-list-item">
				<div class="text">
					<div class="num"><img src="{{asset('img/lucky-panka/pocket/2 tablet.png')}}" alt="2"></div>
					<p><span data-lang="en">Present your QR code for our staff to check.</span><span data-lang="ru">Покажите фишку в QR-кодом работнику заведения.</span></p>
				</div>
			</div>
			<div class="gift-list-item">
				<div class="text">
					<div class="num"><img src="{{asset('img/lucky-panka/pocket/3 tablet.png')}}" alt="3"></div>
					<p><span data-lang="en">Claim your prize and enjoy.</span><span data-lang="ru">Забирайте ваш приз и наслаждайтесь.</span></p>
				</div>
			</div>
		</div>
		<div class="gift-contacts">
			<div class="gift-contacts-left">
				<p class="adress">
					315 170-171 Thappraya Rd,<br>
					Pattaya City, Bang Lamung<br>
					District, C
				</p>
				<div class="contacts">
					<a href="#" class="contacts-telegram">
						<img src="{{asset('img/lucky-panka/pocket/telegram.png')}}" alt="telegram">
					</a>
					<a href="tel:06-3989-0009" class="contacts-phone">06-3989-0009</a>
				</div>
				<img src="{{asset('img/lucky-panka/pocket/contacts-img.png')}}" alt="contacts-img">
			</div>
			<div class="gift-contacts-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2312.465769206974!2d100.86849739717965!3d12.902040163075663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102966030ddb423%3A0xfff7c9123ad798ae!2zVGhlINCh0L52ZSDQoHVi!5e0!3m2!1sru!2sru!4v1719833008732!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
