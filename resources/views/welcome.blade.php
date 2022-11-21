<!DOCTYPE html>
<html>

<head>
	<title>MDC CANTEEN</title>

</head>

<body>
	<header>
		<div id="logo"><img src="../frontend/images/logo.png" class="brand-image image-circle elevation-4">
			MDC<span id="logo-s">CANTEEN</span>
		</div>

		@if (Route::has('login'))
		@auth
		<span class="sign"><a href="{{ route('login') }}">HOME</a></span>
		@else
		<span class="sign"><a  class="act"  href="{{ route('login') }}">SIGN IN</a></span>
		@if (Route::has('register'))
		<span class="sign"><a href="{{ route('register') }}">REGISTER</a></span>
		@endif
		@endauth
		@endif
	</header>
	<div class="slider">
		<!-- fade css -->
		<div class="myslide fade">
			<div class="txt">
				<h1>Mater Dei College</h1>
				<p>Cabulijan, Tubigon, Bohol</p>
			</div>
			<img src="{{asset('frontends/mdc/mdc.jpg')}}" style="width: 100%; height: 100%;">
		</div>
		<div class="myslide fade">
			<div class="txt">
				<h1>Mater Dei College</h1>
				<p>Cabulijan, Tubigon, Bohol</p>
			</div>
			<img src="{{asset('frontends/mdc/md.jpg')}}" style="width: 100%; height: 100%;">
		</div>


		<!-- onclick js -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		<div class="dotsbox" style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
		</div>
		<!-- /onclick js -->
	</div>
</body>
<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: sans-serif;
	}

	header {
		height: 60px;
		width: 100%;
		position: absolute;
		top: 0;
		z-index: 2;
	}

	#logo {
		line-height: 60px;
		margin-left: 40px;
		display: inline-block;
		cursor: pointer;
		font-size: 30px;
		font-weight: bold;
		color: #0004ff;
	}

	#logo:hover {
		color: #eef9ff;
	}

	#logo-s {
		color: #000000;
		margin-left: 5px;
	}

	#logo:hover #logo-s {
		color: #0004ff;
	}

	.sign {
		float: right;
		line-height: 60px;
		margin-right: 40px;
	}

	.sign a {
		color: rgb(0, 0, 0);
		font-weight: bold;
		text-decoration: none;
	}

	.act {
		border: 2px solid #0004ff;
		border-radius: 50px;
		padding: 6px 15px;
	}

	.sign a:hover {
		color: #ffffff;
		/* blue */
		border-color: #ffffff;
		/* blue */
	}

	/* /1 */

	/* 2 */
	.slider {
		position: relative;
		width: 100%;
		background: #2c3e50;
		/* darckblue */
	}

	.myslide {
		height: 610px;
		display: none;
		overflow: hidden;
	}

	.prev,
	.next {
		position: absolute;
		top: 50%;
		font-size: 50px;
		padding: 15px;
		cursor: pointer;
		color: rgb(4, 0, 255);
		transition: 0.5s;
		user-select: none;
	}

	.prev:hover,
	.next:hover {
		color: #00a7ff;
		/* blue */
	}

	.next {
		right: 0;
	}

	.dotsbox {
		position: absolute;
		left: 50%;
		transform: translate(-50%);
		bottom: 20px;
		cursor: pointer;
	}

	.dot {
		display: inline-block;
		width: 15px;
		height: 15px;
		border: 3px solid #fff;
		border-radius: 50%;
		margin: 0 10px;
		cursor: pointer;
	}

	/* /2 */

	/* javascript */
	.active,
	.dot:hover {
		border-color: #00a7ff;
		/* blue */
	}

	/* /javascript */

	/* muslide add fade */
	.fade {
		-webkit-animation-name: fade;
		-webkit-animation-duration: 1.5s;
		animation-name: fade;
		animation-duration: 5s;
	}

	@-webkit-keyframes fade {
		from {
			opacity: 0.8
		}

		to {
			opacity: 1
		}
	}

	@keyframes fade {
		from {
			opacity: 0.8
		}

		to {
			opacity: 1
		}
	}

	/* /muslide add fade */

	/* 3 */
	.txt {
		position: absolute;
		color: rgb(255, 255, 255);
		letter-spacing: 2px;
		line-height: 35px;
		top: 80%;
		left: 15%;
		-webkit-animation-name: posi;
		-webkit-animation-duration: 2s;
		animation-name: posi;
		animation-duration: 2s;
		z-index: 1;
	}

	@-webkit-keyframes posi {
		from {
			left: 25%;
		}

		to {
			left: 15%;
		}
	}


	@keyframes posi {
		from {
			left: 25%;
		}

		to {
			left: 15%;
		}
	}

	.txt h1 {
		color: #ffffff;
		/* blue */
		font-size: 50px;
		margin-bottom: 20px;
		font-family: "Old English Text MT", sans-serif;
	}

	.txt p {
		font-weight: bold;
		font-size: 20px;
	}

	@-webkit-keyframes zoomin {
		from {
			transform: scale(1, 1);
		}

		to {
			transform: scale(1.5, 1.5);
		}
	}


	@keyframes zoomin {
		from {
			transform: scale(1, 1);
		}

		to {
			transform: scale(1.5, 1.5);
		}
	}

	/* /4 */



	/* 5 */
	@media (max-width: 991px) and (min-width: 768px) {
		.myslide {
			height: 1000px;
		}

		.txt {
			letter-spacing: 2px;
			line-height: 25px;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			-webkit-animation-name: posi2;
			-webkit-animation-duration: 2s;
			animation-name: posi2;
			animation-duration: 2s;
		}

		@-webkit-keyframes posi2 {
			from {
				top: 35%;
			}

			to {
				top: 50%;
			}
		}


		@keyframes posi2 {
			from {
				top: 35%;
			}

			to {
				top: 50%;
			}
		}

		.txt h1 {
			font-size: 50px;
		}

		.txt p {
			font-size: 15px;
		}

	}

	/* /5 */

	/* 6 */
	@media (max-width: 767px) {
		.txt h1 {
			font-size: 30px;
			margin-bottom: 20px;
		}

		.sign {
			margin-right: 20px;
		}

		.sign a {
			font-size: 12px;
		}
	}

	.image-circle {
		border-radius: 50%;
	}

	.elevation-4 {
		box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22) !important;
	}

	.brand-image {
		float: left;
		height: 60px;
		width: 60px;
		margin-left: .8rem;
		margin-right: .5rem;
		margin-top: 3px;

	}
</style>

</html>

<script>
	const myslide = document.querySelectorAll('.myslide'),
	  dot = document.querySelectorAll('.dot');
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 4000);
function autoSlide() {
	counter += 1;
	slidefun(counter);
}
function plusSlides(n) {
	counter += n;
	slidefun(counter);
	resetTimer();
}
function currentSlide(n) {
	counter = n;
	slidefun(counter);
	resetTimer();
}
function resetTimer() {
	clearInterval(timer);
	timer = setInterval(autoSlide, 5000);
}

function slidefun(n) {
	
	let i;
	for(i = 0;i<myslide.length;i++){
		myslide[i].style.display = "none";
	}
	for(i = 0;i<dot.length;i++) {
		dot[i].className = dot[i].className.replace(' active', '');
	}
	if(n > myslide.length){
	   counter = 1;
	   }
	if(n < 1){
	   counter = myslide.length;
	   }
	myslide[counter - 1].style.display = "block";
	dot[counter - 1].className += " active";
}
</script>