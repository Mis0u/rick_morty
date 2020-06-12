import $ from 'jquery';
import "slick-carousel";

$('#slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    fade: true,
    cssEase: 'linear',
    speed: 800,
    arrows: false,
    pauseOnFocus: false,
    pauseOnHover: false
});