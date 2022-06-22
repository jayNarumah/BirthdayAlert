<!DOCTYPE html>
<html lang="en">
    <style>

@import url('https://fonts.googleapis.com/css?family=Carter+One');


*{
	box-sizing: border-box;
}

body, html{
	margin:0;
	padding:0;
	height:100%;
	font-family: "carter one",sans-serif;
	font-weight: bold!important;
}

.first--slide{
	position: relative;
	width:100%;
	height:100%;
	background:#423d46;
	color:#d8d0be;
	text-transform: uppercase;
	font-weight: 700;
	overflow: hidden;
}

.first--slide::before{
	content:"";
	position: absolute;
	width:0%;
	height: 100%;
	left:0;
	right:0;
	background:#fcbb5e;
	z-index: 3;
	animation:firstSlideRemove 500ms ease 6s 1 forwards;
}

@keyframes firstSlideRemove{
	from{
		width:0%;
	}
	to{
		width:100%;
	}
}

.slide--content{
	overflow: hidden;
	text-align: center;
	padding:4em;
	position: absolute;
	width:auto;
	height: auto;
	left:50%;
	top:45%;
	transform:translate(-50%,-45%);
	animation:firstSlideOver 500ms ease 2000ms 1  forwards;
}

.first--slide .slide--content h1{
	position: relative;
	animation: firstSlideTextOne 500ms ease 0s 1 forwards;
	font-size: 6em;
	margin:0;
	line-height: 1.2em;
	opacity: 0;
	transform: scale(0) rotate(-45deg);
}

.first--slide .slide--content h2{
	position: relative;
	color:#fcbb5e;
	font-size:4em;
	line-height: 1em;
	margin:0;
	top:-1.6em;
	opacity: 0;
	animation:  firstSlideTextTwo 500ms ease 350ms 1 forwards;
}

.first--slide span{
	display: inline-block;
	position: absolute;
	background: #bc835f;
}

.first--slide span.top{
	left:0;
	top:0;
	width:0px;
	height:2px;
	animation:firstSlideBorderOne 300ms ease 650ms 1 forwards;
}

.first--slide span.right{
	right:0;
	top:0;
	width:2px;
	height: 0;
	animation:firstSlideBorderTwo 300ms ease 950ms 1 forwards;
}

.first--slide span.bottom{
	right:0;
	bottom:0;
	width:0px;
	height: 2px;
	animation:firstSlideBorderOne 300ms ease 1250ms 1 forwards;
}

.first--slide span.left{
	left:0;
	bottom:0;
	height: 0;
	width: 2px;
	animation:firstSlideBorderTwo 300ms ease 1550ms 1 forwards;
}

.slide--content::after{
	content:"";
	position: absolute;
	width:175px;
	height: 175px;
	border-radius: 50%;
	background:#bc835f;
	z-index: -1;
	left:-75px;
	top:-75px;
	transform:scale(0);
	animation: firstSlideOverlayOne 300ms ease 1850ms 1 forwards,
	firstSlideOverlayTwo 500ms ease 2150ms 1 forwards;
}

@keyframes firstSlideTextOne{
	from{
		opacity: 0;
		transform:scale(0) rotate(-45deg);
	}
	to{
		opacity: 1;
		transform:scale(1) rotate(0deg);
	}
}

@keyframes firstSlideTextTwo{
	from{
		opacity: 0;
		top: -1.6em;
	}
	to{
		opacity: 1;
		top: 0em;
	}
}

@keyframes firstSlideBorderOne{
	from{
		width: 0px;
	}
	to{
		width: 100%;
	}
}

@keyframes firstSlideBorderTwo{
	from{
		height: 0;
	}
	to{
		height: 100%;
	}
}

@keyframes firstSlideOver{
	from{
		opacity: 1;
		transform:translate(-50%,-45%) rotate(0deg);
	}
	to{
		opacity: 0;
		transform:translate(-50%,-45%) rotate(-90deg);
	}
}

@keyframes firstSlideOverlayOne{
	from{
		transform: scale(0);
	}
	to{
		transform: scale(1);
	}
}

@keyframes firstSlideOverlayOne{
	from{
		transform: scale(1);
	}
	to{
		transform: scale(8);
	}
}

/*SECOND SLIDE ANIMATION*/

.slide--content--one{
	position: absolute;
	text-align: center;
	width:100%;
	height: auto;
	top:50%;
	transform:translateY(-50%);
	letter-spacing: 0.1em;
	animation:secondSlideMoveUp 300ms ease 750ms 1 forwards,
	secondSlideOver 1s ease 2.5s 1 forwards ;
}

@keyframes secondSlideOver{
	from{
		transform:translateY(-50%) rotate(0deg);
		left:0;
		opacity: 1;
	}
	to{
		transform: translateY(-50%) rotate(90deg);
		left:50%;
		opacity: 0;
	}
}

.slide--content--one h1 ,
.slide--content--one h2{
	position: relative;
	line-height: 1em;
	margin:0;
}

.slide--content--one h1.first{
	font-size: 6em;
	opacity: 0;
	transform:rotate(-180deg) scale(0);
	animation:secondSlideTextOne 500ms ease 0s 1 forwards;
}

.slide--content--one h2.first{
	font-size: 5em;
	transform: scale(0);
	opacity: 0;
	animation:secondSlideTextTwo 300ms ease 490ms 1 forwards;
}

.slide--content--one h2.second{
	font-size: 5em;
	transform: scale(0);
	opacity: 0;
	animation:secondSlideTextThree 200ms ease 1000ms 1 forwards;
}

.slide--content--one h1.second{
	top:3em;
	color:#fcbb5e;
	font-size: 6em;
	opacity: 0;
	animation: secondSlideTextFour 300ms ease 1200ms 1 forwards;
}

.circle--stuff{
	position: absolute;
	width:700px;
	height: 700px;
	border-radius: 50%;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
}

.circle--stuff svg{
	position: absolute;
	left:0;
	right:0;
	margin:auto;
	opacity: 0;
	top:8em;
	animation:secondSlideSVG 500ms ease 1400ms 1 forwards;
}


@keyframes secondSlideSVG{
	from{
		opacity: 0;
	}
	to{
		opacity: 1;
	}
}

@keyframes secondSlideTextOne{
	from{
		opacity: 0;
		transform:rotate(-180deg) scale(0);
	}
	to{
		opacity: 1;
		transform:rotate(0deg) scale(1);
	}
}

@keyframes secondSlideTextTwo{
	0%{
		transform: scale(0);
		opacity: 0;
	}
	70%{
		transform: scale(1.2);
		opacity: 1;
	}
	100%{
		transform: scale(1);
		opacity: 1;
	}
}

@keyframes secondSlideMoveUp{
	from{
		top:50%;
		transform:translateY(-50%);
	}
	to{
		top:40%;
		transform:translateY(-40%);
	}
}

@keyframes secondSlideTextThree{
	from{
		transform: scale(0);
		opacity: 0;
	}
	to{
		transform: scale(1);
		opacity: 1;
	}
}

@keyframes secondSlideTextFour{
	from{
		opacity: 0;
		transform: scale(0);
		top: 3em;
	}
	to{
		opacity: 1;
		transform: scale(1);
		top: 0em;
	}
}


/*second slide canvas container*/

.second--canvas{
	position: relative;
	width:100%;
	height: 100%;
	overflow: hidden;
}

.second--canvas::before ,
.second--canvas::after{
	content:"";
	position: absolute;
	width:0;
	height: 100%;
	left:0;
	top:0;
	z-index: -1;
	animation:secondCanvasIntro 500ms ease 0s 1 forwards;
}

.second--canvas::before{
	background: #e97e23;
}

.second--canvas::after{
	background:#ff1f64;
	animation-delay: 500ms;
}

.second--canvas .content{
	position: relative;
	width:100%;
	text-align: center;
	height: auto;
	top:40%;
	transform: translateY(-40%);
	text-transform: uppercase;
	letter-spacing: 0.1em;
	font-size:5em;
	color:#fff;
}

.second--canvas .content h2{
	position: relative;
	margin:0;
}

.second--canvas .content h2:nth-child(1){
	transform:rotate(-90deg);
	left:-2em;
	top:-1em;
	opacity: 0;
	animation:secondCanvasTextOne 500ms ease 1s 1 forwards
}

.second--canvas .content h2:nth-child(2){
	transform:translateX(5em);
	opacity: 0;
	animation:secondCanvasTextTwo 500ms ease 1.5s 1 forwards
}

.second--canvas .content h2:nth-child(3){
	transform:rotate(90deg);
	top:1em;
	left:-2em;
	opacity: 0;
	animation:secondCanvasTextThree 500ms ease 2s 1 forwards
}

.canvas--remove{
	position: absolute;
	width:100%;
	height: 0%;
	left:0;
	bottom:0;
	background: #fff;
	z-index: 2;
	animation:canvasRemove 500ms ease 3s 1 forwards;
}

@keyframes canvasRemove{
	from{
		height: 0%;
	}
	to{
		height: 100%;
	}
}

@keyframes secondCanvasIntro{
	from{
		width:0;
	}
	to{
		width:100%;
	}
}

@keyframes secondCanvasTextOne{
	from{
		transform:rotate(-90deg);
		left:-2em;
		top:-1em;
		opacity: 0;
	}
	to{
		transform:rotate(0deg);
		left:0;
		top:0;
		opacity:1
	}
}

@keyframes secondCanvasTextThree{
	from{
		transform:rotate(90deg);
		top:1em;
		left:-2em;
		opacity: 0;
	}
	to{
		transform:rotate(0deg);
		top:0em;
		left:0em;
		opacity: 1;
	}
}

@keyframes secondCanvasTextTwo{
	from{
		transform:translateX(5em);
		opacity: 0;
	}
	to{
		transform:translateX(0);
		opacity: 1
	}
}

/*third canvas*/

.third--canvas{
	position: relative;
	width:100%;
	height: 100%;
	overflow: hidden;
	background:transparent;
}

.star--bg{
	width:100%;
	height:100%;
	position: absolute;
	left:0;
	top:0;
	background:url("./images/Star-Transparent-PNG.png") center / cover repeat;
	opacity: 0;
	animation:thirdCanvasBackground 500ms ease 3s 1 forwards;
}

.star--bg img{
	position: absolute;
	width:auto;
	height:auto;
	top:1em;
	animation:thirdCanvasBanner 500ms ease 3.5s 1 forwards;
	opacity: 0;
}

.star--bg img#b1{
	transform:rotate(-15deg);
	left:0;
}

.star--bg img#b2{
	transform:rotate(15deg);
	right:0;
}

@keyframes thirdCanvasBanner{
	from{
		opacity: 0;
	}
	to{
		opacity: 1;
	}
}

@keyframes thirdCanvasBackground{
	from{
		opacity: 0;

	}
	to{
		opacity: 1;

	}
}

.third--canvas::before,
.third--canvas::after{
	content:"";
	position: absolute;
	width:100%;
	height: 0;
	bottom:0;
	left:0;
	z-index: -1;
	animation:thirdCanvasIntro 500ms ease 0s 1 forwards;
}

.third--canvas::before{
	background:#f09e40;
	animation-delay: 200ms
}

.third--canvas::after{
	background:#1080f2;
	animation-delay:700ms;
}


@keyframes thirdCanvasIntro{
	from{
		height: 0%;
	}
	to{
		height: 100%;
	}
}

.third--canvas .center--line{
	position: absolute;
	width:0%;
	height:5px;
	background:#fff;
	top:0;
	bottom:0;
	margin:auto;
	left:0;
	animation:thirdCanvasCenterLine 500ms ease 1s 1 forwards,
	thirdCanvasCenterLineOne 500ms ease 1.5s 1 forwards;
}

.third--canvas .center--line img{
	position: absolute;
	width:auto;
	height:auto;
	top:50%;
	transform:translateY(-50%) scale(0);
	opacity: 0;
	animation:thirdCanvasBalloons 500ms ease 2s 1 forwards;
}

.third--canvas .center--line img#bl--left{
	left:2em;
}

.third--canvas .center--line img#bl--right{
	right:2em;
	animation-delay: 2.5s;
}

.third--canvas .center--line h1{
	position: absolute;
	width:auto;
	height:auto;
	left:50%;
	top:50%;
	transform:translate(-50%,-50%);
	color:#1080f2;
	text-transform: uppercase;
	margin:0;
	font-size:5em;
}

.third--canvas .center--line h1 > span{
	position: relative;
	top:2em;
	opacity: 0;
	animation:thirdCanvasLastText 100ms ease 3s 1 forwards;
}

.third--canvas .center--line h1 > span:nth-child(1){
	animation-delay: 3s;
}

.third--canvas .center--line h1 > span:nth-child(2){
	animation-delay: 3100ms;
}

.third--canvas .center--line h1 > span:nth-child(3){
	animation-delay: 3200ms;
}

.third--canvas .center--line h1 > span:nth-child(4){
	animation-delay: 3300ms;
}

.third--canvas .center--line h1 > span:nth-child(5){
	animation-delay: 3400ms;
}

.third--canvas .center--line h1 > span:nth-child(6){
	animation-delay: 3500ms;
}

.third--canvas .center--line h1 > span:nth-child(7){
	animation-delay: 3600ms;
}

.third--canvas .center--line h1 > span:nth-child(8){
	animation-delay: 3700ms;
}

.third--canvas .center--line h1 > span:nth-child(9){
	animation-delay: 3800ms;
}

.third--canvas .center--line h1 > span:nth-child(10){
	animation-delay: 3900ms;
}

.third--canvas .center--line h1 > span:nth-child(11){
	animation-delay: 4000ms;
}

.third--canvas .center--line h1 > span:nth-child(12){
	animation-delay: 4100ms;
}

.third--canvas .center--line h1 > span:nth-child(13){
	animation-delay: 4200ms;
}

.third--canvas > img{
	position: absolute;
	width:auto;
	height:auto;
	bottom:1em;
	transform: scale(0);
	animation: giftIcon 500ms ease 4300ms 1 forwards;
}

.third--canvas > img#gf1{
	left:35%;
}

.third--canvas > img#gf2{
	left:45%;
	bottom:2em;
	animation-delay: 4800ms;
}

.third--canvas > img#gf3{
	left:55%;
	animation-delay: 5300ms;
}

@keyframes giftIcon{
	from{
		transform:scale(0);
	}
	to{
		transform:scale(1);
	}
}

@keyframes thirdCanvasLastText{
	from{
		opacity: 0;
		top:2em;
	}
	to{
		opacity: 1;
		top:0;
	}
}

@keyframes thirdCanvasBalloons{
	from{
		opacity: 0;
		transform:scale(0) translateY(-50%);
	}
	to{
		opacity: 1;
		transform:scale(1) translateY(-50%);
	}
}

@keyframes thirdCanvasCenterLine{
	from{
		width:0
	}
	to{
		width:100%;
	}
}

@keyframes thirdCanvasCenterLineOne{
	from{
		height:5px;
	}
	to{
		height:200px;
	}
}

    </style>

<!-- Mirrored from h26k2.github.io/birthday-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jun 2022 07:58:59 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <title>Birthday wish Animation through CSS | h26k2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <div class="first--slide">

        <div class="slide--content">
            <h1>hello</h1>
            <h2>{{$details['name']}}</h2>
            <span class="top"></span>
            <span class="right"></span>
            <span class="bottom"></span>
            <span class="left"></span>
        </div>

        <div class="slide--content--one">
            <h1 class="first">today</h1>
            <h2 class="first">is</h2>
            <h2 class="second">your</h2>
            <h1 class="second">special day</h1>
            <div class="circle--stuff">
                <svg viewBox="0 0 288 48" width="288" height="48" style="overflow: visible;">
                    <g transform="translate(144 0)">
                        <g transform="translate(-276.566 421.129)">
                            <rect width="12.608460234942264" height="12.608460234942264" fill="#F87B7C"
                                transform="rotate(72.60145421789896)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-147.31692562790084 0"
                                to="-294.6338512558017 480" dur="1.2580507927982927s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.2580507927982927s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(269.756 389.735)">
                            <rect width="6.6024317861213895" height="6.6024317861213895" fill="#FFC107"
                                transform="rotate(38.02803143466206)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="148.876375621307 0"
                                to="297.752751242614 480" dur="1.500721309571935s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0" dur="1.500721309571935s"
                                begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(174.705 169.205)">
                            <rect width="5.852897883045647" height="5.852897883045647" fill="#F65A5B"
                                transform="rotate(28.456635184965855)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="129.17077622623987 0"
                                to="258.34155245247973 480" dur="1.0529970168710006s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0529970168710006s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-130.903 64.4332)">
                            <rect width="10.500608397273465" height="10.500608397273465" fill="#F65A5B"
                                transform="rotate(33.518702042612105)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-115.41033595665428 0"
                                to="-230.82067191330856 480" dur="1.9569807707276798s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.9569807707276798s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(255.222 435.243)">
                            <rect width="5.741483052387249" height="5.741483052387249" fill="#39D1B4"
                                transform="rotate(46.49147792751984)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="133.85114085517338 0"
                                to="267.70228171034677 480" dur="1.3036790452656355s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3036790452656355s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(31.0162 15.9351)">
                            <rect width="6.80101713474188" height="6.80101713474188" fill="#FFC107"
                                transform="rotate(11.204022894474395)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="30.019648010959024 0"
                                to="60.03929602191805 480" dur="1.0387121585702985s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0387121585702985s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-3.09286 202.201)">
                            <rect width="10.607425290967909" height="10.607425290967909" fill="#F65A5B"
                                transform="rotate(73.47039150769439)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-2.17615538500645 0"
                                to="-4.3523107700129 480" dur="1.4662807556935682s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.4662807556935682s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(206.722 332.232)">
                            <rect width="7.636912663465038" height="7.636912663465038" fill="#F65A5B"
                                transform="rotate(18.036591826355995)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="122.16550975510404 0"
                                to="244.33101951020808 480" dur="1.4353281745859594s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.4353281745859594s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(137.252 313.902)">
                            <rect width="9.58640372808878" height="9.58640372808878" fill="#FA9C9D"
                                transform="rotate(84.9299171174362)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="82.98382665184931 0"
                                to="165.96765330369863 480" dur="1.5673910658448071s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.5673910658448071s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(112.875 188.052)">
                            <rect width="12.224275888715743" height="12.224275888715743" fill="#F65A5B"
                                transform="rotate(56.958868320425424)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="81.10118787423545 0"
                                to="162.2023757484709 480" dur="1.1256263736515593s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.1256263736515593s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-44.0883 105.22)">
                            <rect width="7.3193707683479285" height="7.3193707683479285" fill="#39D1B4"
                                transform="rotate(29.61901015919562)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-36.161416073732816 0"
                                to="-72.32283214746563 480" dur="1.0534095913396215s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0534095913396215s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(201.372 372.671)">
                            <rect width="5.544510601155997" height="5.544510601155997" fill="#F65A5B"
                                transform="rotate(2.2963703425883897)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="113.35963017076664 0"
                                to="226.71926034153327 480" dur="1.030518978123618s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.030518978123618s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(131.495 87.179)">
                            <rect width="10.759076659212255" height="10.759076659212255" fill="#FFC107"
                                transform="rotate(87.32528953957524)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="111.2837754504788 0"
                                to="222.5675509009576 480" dur="1.6733003196858514s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.6733003196858514s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(168.916 8.31682)">
                            <rect width="13.053827089343216" height="13.053827089343216" fill="#FFC107"
                                transform="rotate(41.59319430819056)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="166.0388449718487 0"
                                to="332.0776899436974 480" dur="1.167328833970436s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.167328833970436s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-246.023 361.539)">
                            <rect width="9.438843277640762" height="9.438843277640762" fill="#FA9C9D"
                                transform="rotate(77.07547908665653)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-140.32757933557534 0"
                                to="-280.6551586711507 480" dur="1.8215214067142032s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8215214067142032s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-19.4778 411.261)">
                            <rect width="5.155137368313447" height="5.155137368313447" fill="#F65A5B"
                                transform="rotate(63.68358494554056)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-10.489996883997884 0"
                                to="-20.97999376799577 480" dur="1.938744964010533s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.938744964010533s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-193.329 253.053)">
                            <rect width="12.572461872186224" height="12.572461872186224" fill="#FA9C9D"
                                transform="rotate(18.14043778713332)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-126.5912529949043 0"
                                to="-253.1825059898086 480" dur="1.7608957790386608s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7608957790386608s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(132.362 64.3945)">
                            <rect width="11.962171698190868" height="11.962171698190868" fill="#F87B7C"
                                transform="rotate(66.5452938923993)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="116.70535383045883 0"
                                to="233.41070766091767 480" dur="1.2748012693059791s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.2748012693059791s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(23.7278 28.7318)">
                            <rect width="5.809294053959366" height="5.809294053959366" fill="#39D1B4"
                                transform="rotate(12.777973190620841)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="22.387744172095072 0"
                                to="44.775488344190144 480" dur="1.990394651793788s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.990394651793788s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-166.194 338.268)">
                            <rect width="5.155192084927991" height="5.155192084927991" fill="#F87B7C"
                                transform="rotate(65.13887033072942)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-97.49050856733884 0"
                                to="-194.98101713467767 480" dur="1.5205048549215163s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.5205048549215163s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-31.4654 122.618)">
                            <rect width="10.368127452931883" height="10.368127452931883" fill="#39D1B4"
                                transform="rotate(44.25401495643392)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-25.062944124981968 0"
                                to="-50.125888249963936 480" dur="1.7807724976183688s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7807724976183688s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-42.2511 41.8627)">
                            <rect width="14.103528131335075" height="14.103528131335075" fill="#FFC107"
                                transform="rotate(72.09281246475781)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-38.861764593079066 0"
                                to="-77.72352918615813 480" dur="1.837076713482284s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.837076713482284s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-160.068 86.1509)">
                            <rect width="10.983279923644469" height="10.983279923644469" fill="#F87B7C"
                                transform="rotate(42.54113201739413)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-135.71076835776705 0"
                                to="-271.4215367155341 480" dur="1.4617462130029035s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.4617462130029035s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-29.8295 464.828)">
                            <rect width="9.161711928973633" height="9.161711928973633" fill="#FA9C9D"
                                transform="rotate(15.34556142284818)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-15.154273359641607 0"
                                to="-30.308546719283214 480" dur="1.4337419826765745s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.4337419826765745s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-178.317 128.014)">
                            <rect width="13.686769327961251" height="13.686769327961251" fill="#FFC107"
                                transform="rotate(45.07414220309329)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-140.77315685616557 0"
                                to="-281.54631371233114 480" dur="1.3309859125988193s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3309859125988193s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(219.727 410.159)">
                            <rect width="12.764074026565211" height="12.764074026565211" fill="#FFC107"
                                transform="rotate(83.87363030859562)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="118.48317389639978 0"
                                to="236.96634779279955 480" dur="1.3039269158524756s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3039269158524756s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(111.389 357.596)">
                            <rect width="8.285457717371177" height="8.285457717371177" fill="#FFC107"
                                transform="rotate(55.18291720980784)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="63.83361358999828 0"
                                to="127.66722717999656 480" dur="1.8032664697360352s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8032664697360352s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(75.6214 475.193)">
                            <rect width="13.200638456623885" height="13.200638456623885" fill="#FFC107"
                                transform="rotate(73.51717550864369)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="38.00101769286111 0"
                                to="76.00203538572222 480" dur="1.9478787303213856s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.9478787303213856s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(274.856 432.139)">
                            <rect width="8.968495048926354" height="8.968495048926354" fill="#FFC107"
                                transform="rotate(66.02890800046019)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="144.6387866106216 0"
                                to="289.2775732212432 480" dur="1.1950311173221444s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.1950311173221444s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-73.9908 129.708)">
                            <rect width="11.469532088642811" height="11.469532088642811" fill="#FA9C9D"
                                transform="rotate(23.880882117170138)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-58.25017828281587 0"
                                to="-116.50035656563173 480" dur="1.7631218650889633s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7631218650889633s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(195.443 148.666)">
                            <rect width="10.462121786336729" height="10.462121786336729" fill="#FFC107"
                                transform="rotate(26.548226340406018)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="149.22492086385515 0"
                                to="298.4498417277103 480" dur="1.0624958491755168s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0624958491755168s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-58.6732 432.261)">
                            <rect width="14.377316164643027" height="14.377316164643027" fill="#39D1B4"
                                transform="rotate(56.99518347171379)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-30.871770620846135 0"
                                to="-61.74354124169227 480" dur="1.637228355700252s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.637228355700252s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-139.405 326.431)">
                            <rect width="10.089588480012424" height="10.089588480012424" fill="#FFC107"
                                transform="rotate(53.39693328651522)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-82.97623670735247 0"
                                to="-165.95247341470494 480" dur="1.6240260735518415s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.6240260735518415s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-42.9264 14.5082)">
                            <rect width="5.605522069860404" height="5.605522069860404" fill="#39D1B4"
                                transform="rotate(86.567326362837)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-41.66699732647694 0"
                                to="-83.33399465295388 480" dur="1.3729834448841063s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3729834448841063s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-83.4398 23.0919)">
                            <rect width="13.569223440454884" height="13.569223440454884" fill="#39D1B4"
                                transform="rotate(86.28047320362091)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-79.60989820810235 0"
                                to="-159.2197964162047 480" dur="1.6981444705695712s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.6981444705695712s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-127.497 372.59)">
                            <rect width="12.966533291639399" height="12.966533291639399" fill="#F65A5B"
                                transform="rotate(83.52931885276857)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-71.77965589119036 0"
                                to="-143.55931178238072 480" dur="1.8029830839013916s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8029830839013916s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-109.582 323.12)">
                            <rect width="6.691190217900216" height="6.691190217900216" fill="#FA9C9D"
                                transform="rotate(47.43597820627009)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-65.49394850207734 0"
                                to="-130.9878970041547 480" dur="1.5469645527476263s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.5469645527476263s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-158.75 116.733)">
                            <rect width="9.96375744984303" height="9.96375744984303" fill="#FFC107"
                                transform="rotate(9.149378353079351)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-127.69522448692736 0"
                                to="-255.39044897385472 480" dur="1.2743070249499613s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.2743070249499613s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(39.8691 45.2325)">
                            <rect width="11.598710036991175" height="11.598710036991175" fill="#FA9C9D"
                                transform="rotate(76.22294910874258)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="36.43558234995789 0"
                                to="72.87116469991578 480" dur="1.8183696696850091s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8183696696850091s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-63.98 101.214)">
                            <rect width="8.703156709522599" height="8.703156709522599" fill="#F65A5B"
                                transform="rotate(55.22678231532443)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-52.83832435013566 0"
                                to="-105.67664870027131 480" dur="1.0351788944422509s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0351788944422509s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-207.586 325.836)">
                            <rect width="12.7674090818734" height="12.7674090818734" fill="#F87B7C"
                                transform="rotate(53.2099971109075)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-123.6496687354237 0"
                                to="-247.2993374708474 480" dur="1.3801286184806891s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3801286184806891s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-14.1761 359.014)">
                            <rect width="8.999663539806251" height="8.999663539806251" fill="#F65A5B"
                                transform="rotate(63.059129707808076)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-8.110149853597672 0"
                                to="-16.220299707195345 480" dur="1.5332334897832933s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.5332334897832933s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(186.115 110.245)">
                            <rect width="8.846869993590271" height="8.846869993590271" fill="#39D1B4"
                                transform="rotate(48.39105816056324)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="151.35248674639698 0"
                                to="302.70497349279395 480" dur="1.8171209491047406s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8171209491047406s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-44.9409 372.92)">
                            <rect width="5.787671588835311" height="5.787671588835311" fill="#39D1B4"
                                transform="rotate(25.736018869681374)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-25.291483926677277 0"
                                to="-50.58296785335455 480" dur="1.294870187978929s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.294870187978929s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-123.417 253.899)">
                            <rect width="14.005292966639402" height="14.005292966639402" fill="#FA9C9D"
                                transform="rotate(78.53166980312068)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-80.71953249258353 0"
                                to="-161.43906498516705 480" dur="1.502501770041541s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.502501770041541s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-230.289 330.106)">
                            <rect width="9.768355026891115" height="9.768355026891115" fill="#39D1B4"
                                transform="rotate(6.20830045074041)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-136.4494736963528 0"
                                to="-272.8989473927056 480" dur="1.9617639114021732s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.9617639114021732s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(265.433 381.927)">
                            <rect width="8.740484652817603" height="8.740484652817603" fill="#FA9C9D"
                                transform="rotate(33.112914915491366)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="147.81721881818615 0"
                                to="295.6344376363723 480" dur="1.4463132494751758s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.4463132494751758s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(39.8835 208.371)">
                            <rect width="8.478693141673741" height="8.478693141673741" fill="#F65A5B"
                                transform="rotate(70.4322873768517)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="27.810725423849558 0"
                                to="55.621450847699116 480" dur="1.0435485904484305s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0435485904484305s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-196.946 256.686)">
                            <rect width="14.772557082522477" height="14.772557082522477" fill="#FFC107"
                                transform="rotate(12.70748308933365)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-128.3237418055129 0"
                                to="-256.6474836110258 480" dur="1.7522213600748298s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7522213600748298s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(150.191 478.423)">
                            <rect width="10.628106842047844" height="10.628106842047844" fill="#FA9C9D"
                                transform="rotate(17.776604987264612)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="75.21931197943222 0"
                                to="150.43862395886444 480" dur="1.59286850157008s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.59286850157008s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-176.485 147.986)">
                            <rect width="12.61672667417864" height="12.61672667417864" fill="#F87B7C"
                                transform="rotate(64.26109092904363)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-134.89599168313967 0"
                                to="-269.79198336627934 480" dur="1.2136136152047012s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.2136136152047012s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(2.63655 133.571)">
                            <rect width="12.0983843373292" height="12.0983843373292" fill="#FA9C9D"
                                transform="rotate(77.1811483234397)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="2.0625914867788224 0"
                                to="4.125182973557645 480" dur="1.5838470702401857s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.5838470702401857s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-153.787 280.623)">
                            <rect width="12.877019817907263" height="12.877019817907263" fill="#39D1B4"
                                transform="rotate(23.860842745005897)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="-97.04875569413277 0"
                                to="-194.09751138826553 480" dur="1.6101299293674471s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.6101299293674471s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(81.0715 431.883)">
                            <rect width="9.117118916187268" height="9.117118916187268" fill="#FA9C9D"
                                transform="rotate(35.95068552997413)"></rect>
                            <animateTransform attributeName="transform" type="translate" from="42.674704554766656 0"
                                to="85.34940910953331 480" dur="1.4115420356298163s" begin="-10s"
                                repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.4115420356298163s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-139.629 392.8)">
                            <rect width="7.313004295500736" height="7.313004295500736" fill="#FA9C9D"
                                transform="rotate(58.02215575282054)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-76.78938850387553 0" to="-153.57877700775106 480" dur="1.0129214483440876s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0129214483440876s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-273.198 299.716)">
                            <rect width="12.585063692234112" height="12.585063692234112" fill="#FFC107"
                                transform="rotate(23.141937462371192)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-168.1829769087535 0" to="-336.365953817507 480" dur="1.0221483989192268s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0221483989192268s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(35.4281 298.09)">
                            <rect width="6.923794981974305" height="6.923794981974305" fill="#F65A5B"
                                transform="rotate(3.7746840564447925)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="21.85541553457417 0" to="43.71083106914834 480" dur="1.841477233909523s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.841477233909523s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-33.0682 476.788)">
                            <rect width="7.5732528577320535" height="7.5732528577320535" fill="#39D1B4"
                                transform="rotate(77.7718996598293)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-16.58958353532071 0" to="-33.17916707064142 480" dur="1.3473653905171072s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3473653905171072s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-283.314 326.701)">
                            <rect width="12.2603815691265" height="12.2603815691265" fill="#F87B7C"
                                transform="rotate(40.61186413835374)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-168.57637773029137 0" to="-337.15275546058274 480"
                                dur="1.0104588510243326s" begin="-10s" repeatCount="indefinite">
                            </animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0104588510243326s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-184.995 236.299)">
                            <rect width="14.208468465595544" height="14.208468465595544" fill="#F65A5B"
                                transform="rotate(3.823136008517254)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-123.9672518900931 0" to="-247.9345037801862 480" dur="1.008151763575754s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.008151763575754s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-16.0432 153.69)">
                            <rect width="14.13951789919437" height="14.13951789919437" fill="#FA9C9D"
                                transform="rotate(42.619301927043715)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-12.152238276917666 0" to="-24.304476553835332 480" dur="1.976559708932348s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.976559708932348s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-177.155 156.185)">
                            <rect width="5.133505938536141" height="5.133505938536141" fill="#FA9C9D"
                                transform="rotate(21.39834732398235)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-133.6627946033307 0" to="-267.3255892066614 480" dur="1.7626435353614347s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7626435353614347s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-298.208 442.713)">
                            <rect width="10.836267006261" height="10.836267006261" fill="#F87B7C"
                                transform="rotate(72.30364731432881)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-155.129444591013 0" to="-310.258889182026 480" dur="1.897024023744813s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.897024023744813s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(84.2279 92.2677)">
                            <rect width="7.121515445378002" height="7.121515445378002" fill="#F65A5B"
                                transform="rotate(6.357404543570042)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="70.64765751330808 0" to="141.29531502661615 480" dur="1.8647485817543341s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8647485817543341s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(190.66 379.05)">
                            <rect width="6.809910365652707" height="6.809910365652707" fill="#FA9C9D"
                                transform="rotate(81.16530403759086)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="106.5323927443129 0" to="213.0647854886258 480" dur="1.8784567579243676s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.8784567579243676s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-242.452 323.151)">
                            <rect width="14.074355906122618" height="14.074355906122618" fill="#F65A5B"
                                transform="rotate(48.409224917371716)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-144.9007558049375 0" to="-289.801511609875 480" dur="1.237222291333915s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.237222291333915s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-133.488 171.588)">
                            <rect width="9.246056340066431" height="9.246056340066431" fill="#FFC107"
                                transform="rotate(43.8327821758391)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-98.33540134965875 0" to="-196.6708026993175 480" dur="1.7118575625304209s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7118575625304209s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-212.338 477.609)">
                            <rect width="10.206275708067604" height="10.206275708067604" fill="#F87B7C"
                                transform="rotate(3.5180713953336706)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-106.43416329622404 0" to="-212.86832659244808 480"
                                dur="1.0388271083528573s" begin="-10s" repeatCount="indefinite">
                            </animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.0388271083528573s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(242.416 313.93)">
                            <rect width="6.474600901177441" height="6.474600901177441" fill="#FA9C9D"
                                transform="rotate(17.332006714008447)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="146.5614830699091 0" to="293.1229661398182 480" dur="1.1725354605029232s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.1725354605029232s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(192.019 277.818)">
                            <rect width="9.48876350160013" height="9.48876350160013" fill="#F87B7C"
                                transform="rotate(80.4424860466377)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="121.62468336575408 0" to="243.24936673150816 480" dur="1.7604495247076903s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.7604495247076903s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(279.76 449.142)">
                            <rect width="12.739962236214819" height="12.739962236214819" fill="#39D1B4"
                                transform="rotate(41.421608567353125)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="144.5253960453657 0" to="289.0507920907314 480" dur="1.9807597601629032s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.9807597601629032s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-108.772 462.209)">
                            <rect width="5.912076935930544" height="5.912076935930544" fill="#F65A5B"
                                transform="rotate(49.583326900563826)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-55.41304570703835 0" to="-110.8260914140767 480" dur="1.487324922186101s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.487324922186101s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-191.159 422.45)">
                            <rect width="14.584811421858316" height="14.584811421858316" fill="#F65A5B"
                                transform="rotate(27.837753606260925)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-101.67483313139012 0" to="-203.34966626278023 480" dur="1.285104860483476s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.285104860483476s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-187.329 333.699)">
                            <rect width="11.468429979820034" height="11.468429979820034" fill="#FFC107"
                                transform="rotate(36.27812415313309)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-110.50521774347041 0" to="-221.01043548694082 480"
                                dur="1.6387655937208296s" begin="-10s" repeatCount="indefinite">
                            </animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.6387655937208296s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <g transform="translate(-19.3892 203.962)">
                            <rect width="9.690275881619304" height="9.690275881619304" fill="#F65A5B"
                                transform="rotate(36.271222002843615)"></rect>
                            <animateTransform attributeName="transform" type="translate"
                                from="-13.607219250650084 0" to="-27.21443850130017 480" dur="1.3155557725809395s"
                                begin="-10s" repeatCount="indefinite"></animateTransform>
                            <animate attributeType="CSS" attributeName="opacity" values="1;0"
                                dur="1.3155557725809395s" begin="-10s" repeatCount="indefinite"></animate>
                        </g>
                        <animate attributeType="CSS" attributeName="opacity" values="0;1" dur="1s"
                            repeatCount="1" begin="DOMNodeInserted"></animate>
                    </g>
                    <g opacity="0" style="transition: opacity 0.5s ease-out;">
                        <path fill="#FFC107" d="M126.099 11.24l5 8.661 8.66-5-5-8.66z"></path>
                        <path fill="#F65A5B" d="M264.76 21.24l-8.661 5 5 8.661 8.66-5zM204.929 47.071v-10h-10v10z">
                        </path>
                        <path fill="#FFC107" d="M58.807 21.193l-6.928 4 4 6.928 6.928-4z"></path>
                        <path fill="#F65A5B" d="M282.171 18.828v4h4v-4z"></path>
                        <path fill="#F87B7C"
                            d="M261.586 7l-1.414 1.414 1.414 1.414L263 8.414zM212.586 24l-1.414 1.414 1.414 1.414L214 25.414z">
                        </path>
                        <path fill="#F65A5B" d="M154.586 9l-1.414 1.414 1.414 1.414L156 10.414z"></path>
                        <path fill="#F65A5B"
                            d="M187.586 1l-1.414 1.414 1.414 1.414L189 2.414zM113.586 4l-1.414 1.414 1.414 1.414L115 5.414z">
                        </path>
                        <path fill="#FFC107" d="M69.586 9l-1.414 1.414 1.414 1.414L71 10.414z"></path>
                        <path fill="#FFC107" d="M1.586 24L.172 25.414l1.414 1.414L3 25.414z"></path>
                        <path fill="#FFC107"
                            d="M131.586 31l-1.414 1.414 1.414 1.414L133 32.414zM18.76.24l-8.661 5 5 8.661 8.66-5zM171.343 14l-5.657 5.657 5.657 5.657L177 19.657z">
                        </path>
                        <path fill="#39D1B4"
                            d="M206.807 5.193l-6.928 4 4 6.928 6.928-4zM98.343 36.414l-4.242 4.243 4.242 4.243 4.243-4.243z">
                        </path>
                        <path fill="#FFC107"
                            d="M93.44 11.096l-2 3.464 3.463 2 2-3.464zM49.172 4l-2.829 2.828 2.829 2.828L52 6.828zM27.172 39l-2.829 2.828 2.829 2.828L30 41.828z">
                        </path>
                        <path fill="#F65A5B" d="M227.343 3.829l-2.828 2.828 2.828 2.828 2.829-2.828z"></path>
                    </g>
                </svg>
            </div>
        </div>

    </div>

    <div class="second--canvas">
        <div class="content">
            <h2>let's</h2>
            <h2>celebrate</h2>
            <h2>and</h2>
        </div>
        <div class="canvas--remove"></div>
    </div>

    <div class="third--canvas">
        <div class="star--bg">
            <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/amusement-park.png')))}}" alt="" id="b1" />
            <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/amusement-park.png')))}}" alt="" id="b2" />
        </div>
        <div class="center--line">
            <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/balloons.png')))}}" id="bl--right" alt="" />
            <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/balloons.png')))}}" id="bl--left" alt="" />
            <h1><span>h</span><span>a</span><span>p</span><span>p</span><span>y</span>
                <span>b</span><span>i</span><span>r</span><span>t</span><span>h</span><span>d</span><span>a</span><span>y</span>
            </h1>
        </div>
        <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/gift.png')))}}" alt="" id="gf1" />
        <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/gift.png')))}}" alt="" id="gf2" />
        <img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('src/images/gift.png')))}}" alt="" id="gf3" />
    </div>


    <script>

let firstSlideContainer =
document.getElementsByClassName("slide--content")[0];

let secondSlideContainer =
document.getElementsByClassName("slide--content--one")[0];

let secondCanvas =
document.getElementsByClassName("second--canvas")[0];

secondSlideContainer.setAttribute("style","display:none");
secondCanvas.setAttribute("style","display:none");

let thirdCanvas =
document.getElementsByClassName("third--canvas")[0];

thirdCanvas.setAttribute("style","display:none");



let containerToggleOne = setTimeout(function(){
	firstSlideContainer.setAttribute("style","display:none");
	secondSlideContainer.setAttribute("style","display:block");
},2500);


let removeFirstSlide = setTimeout(function(){
	document.getElementsByClassName("first--slide")[0].setAttribute("style","display:none;")
	secondCanvas.setAttribute("style","display:block");
},6500);

let removeSecondCanvas = setTimeout(function(){
	secondCanvas.setAttribute("style","display:none");
	thirdCanvas.setAttribute("style","display:block")
},9800)

    </script>
</body>

<!-- Mirrored from h26k2.github.io/birthday-animation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jun 2022 07:59:01 GMT -->

</html>
