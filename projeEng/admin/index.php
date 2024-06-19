

<?php

include "ad_header.php";
include "ad_navbar.php";




?>
<style></style>
<link rel="stylesheet" href="slider.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap&subset=latin-ext" rel="stylesheet" /><link rel='stylesheet' href='https://unpkg.com/swiper@6.0.2/swiper-bundle.min.css'>


<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Abril+Fatface" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<style>
	.gallery-wrapper
	{
		margin-top: 120px;
	}
</style>

<!--loader thx:https://codepen.io/aurer/pen/jEGbA-->
<div class="loader">
		 <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
				<path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
					  <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/>
				</path>
		 </svg>
  </div>

  <!--gallery-->
  <div class="gallery-wrapper">
		 <div class="content">
				<div class="gallery full" style="margin-left: 300px;">
					  <div class="swiper-container">
							 <div class="swiper-wrapper">
									<div class="swiper-slide">
										  <div class="image">
												 <img src="../images//f0c40dc2da345b941ac669f14d46dc9d.gif" alt="" />
										  </div>

										  <div class="overlay">
												 <div class="text-wrap">
														<div class="name">
															  <span style="color: #FFB900;">Online Taksi</span>
														</div>
														<div class="caption">
															  <p>
																	 Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quasi aliquam eius, blanditiis quae, explicabo praesentium corporis tempora quam et rem nulla repellendus placeat, nisi omnis earum sunt suscipit aspernatur!
															  </p>
														</div>
												 </div>
										  </div>
									</div>
									<div class="swiper-slide">
										  <div class="image">
												 <img src="../logo.png" alt="" />
										  </div>

										  <div class="overlay">
												 <div class="text-wrap">
														<div class="name">
															  <span>Thumbnail Gallery</span>
														</div>
														<div class="caption">
															  <p>
																	 Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quasi aliquam eius, blanditiis quae, explicabo praesentium corporis tempora quam et rem nulla repellendus placeat, nisi omnis earum sunt suscipit aspernatur!
															  </p>
														</div>
												 </div>
										  </div>
									</div>
									<div class="swiper-slide">
										  <div class="image">
												 <img src="../images/image_processing20191107-15675-1476317.gif" alt="" />
										  </div>

										  <div class="overlay">
												 <div class="text-wrap">
														<div class="name">
															  <span>Thumbnail Gallery</span>
														</div>
														<div class="caption">
															  <p>
																	 Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quasi aliquam eius, blanditiis quae, explicabo praesentium corporis tempora quam et rem nulla repellendus placeat, nisi omnis earum sunt suscipit aspernatur!
															  </p>
														</div>
												 </div>
										  </div>
									</div>
							 </div>
					  </div>

					  <div class="swiper-next-button">
							 <em class="material-icons"><i class="fa-solid fa-arrow-right"></i></em>
					  </div>
					  <div class="swiper-prev-button">
							 <em class="material-icons"><i class="fa-solid fa-arrow-left"></i></em>
					  </div>
				</div>

				<div class="gallery thumb">
					  <div class="swiper-container">
							 <div class="swiper-wrapper">
									<div class="swiper-slide">
										  <div class="image">
												 <img src="../images/f0c40dc2da345b941ac669f14d46dc9d.gif" alt="" />

												 <div class="overlay">
														<em class="material-icons">remove_red_eye</em>
												 </div>
										  </div>
									</div>
									<div class="swiper-slide">
										  <div class="image">
												 <img src="../images/logo.png" alt="" />

												 <div class="overlay">
														<em class="material-icons">remove_red_eye</em>
												 </div>
										  </div>
									</div>
									<div class="swiper-slide">
										  <div class="image">
												 <img src="../images/image_processing20191107-15675-1476317.gif" alt="" />

												 <div class="overlay">
														<em class="material-icons">remove_red_eye</em>
												 </div>
										  </div>
									</div>
							 </div>
					  </div>

					  <div class="swiper-next-button">
							 <em class="material-icons">arrow_right_alt</em>
					  </div>
					  <div class="swiper-prev-button">
							 <em class="material-icons">arrow_right_alt</em>
					  </div>
				</div>
		 </div>
  </div>



  <script>

$(function(){
    if($('.gallery-wrapper').length){
        var galleryThumbs = new Swiper('.gallery-wrapper .content .gallery.thumb .swiper-container', {
            speed: 900,
            effect: 'slide',
            spaceBetween: 12,
            grabCursor: false,
            simulateTouch: true,
            loop: false,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.gallery-wrapper .content .gallery.thumb .swiper-next-button',
                prevEl: '.gallery-wrapper .content .gallery.thumb .swiper-prev-button',
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                414: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 7,
                    spaceBetween: 10
                }
            },
			  on: {
				  init: function() { 
				  	let containerThumbWidth = $('.gallery-wrapper .content .gallery.thumb').outerWidth();
	
	let totalThumbWidth = 0;
	
	$('.gallery.thumb .swiper-container .swiper-wrapper .swiper-slide').each(function(){
		let thumbWidth = $(this).outerWidth();
		totalThumbWidth += thumbWidth
	});
	
	
	
	if(totalThumbWidth < containerThumbWidth){
		$('.gallery.thumb .swiper-next-button, .gallery.thumb .swiper-prev-button').addClass('hide');
	}else{
		$('.gallery.thumb .swiper-next-button, .gallery.thumb .swiper-prev-button').removeClass('hide');
	}
			   }
			  }
        });

        var galleryFull = new Swiper('.gallery-wrapper .content .gallery.full .swiper-container', {
            speed: 900,
            effect: 'slide',
            slidesPerView: 3,
            spaceBetween: 0,
            centeredSlides: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                stopOnLastSlide: false
            },
            keyboard: {
                enabled: true,
            },
            grabCursor: false,
            simulateTouch: false,
            loop: true,
            navigation: {
                nextEl: '.gallery-wrapper .content .gallery.full .swiper-next-button',
                prevEl: '.gallery-wrapper .content .gallery.full .swiper-prev-button',
            },
            thumbs: {
                swiper: galleryThumbs
            },
            on: {
                slideChangeTransitionStart: function () {
                    $('.gallery-wrapper .content .gallery.full .swiper-slide .overlay').removeClass('show');
                },
                slideChangeTransitionEnd: function () {
                    $('.gallery-wrapper .content .gallery.full .swiper-slide-active .overlay').addClass('show');
                }
            }
        });
    }
});


$(window).on("load", function() {
    setTimeout(function(){
        $('.loader').fadeOut();
    }, 1000);
});
  </script>

  <?php include "ad_footer.php"   ?>
  <?php include "../randevuMail.php" ?>
