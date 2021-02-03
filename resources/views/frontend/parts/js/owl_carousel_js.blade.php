<script>
    $('.employees-carousel').owlCarousel({
        loop: true,
        margin: 10,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })

    $('.about-us-carousel').owlCarousel({
        loop: false,
        nav: false,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    $('.patient-services-carousel').owlCarousel({
        loop: false,
        nav: true,
        margin: 10,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 3,
            }
        }
    })
</script>
