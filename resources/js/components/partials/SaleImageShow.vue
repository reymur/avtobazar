<template>
    <div class="">
        <vue-picture-swipe
            :items="saleImage"
        ></vue-picture-swipe>
    </div>
</template>

<script>
export default {
    name: "SellerPhoto",
    props: ['sale','sale_images'],
    data(){
        return {
            photo: this.sale.image,
            saleImage: []
        }
    },
    methods: {
        imagesShow(images){
            if( images !== null && images !== undefined && images.length > 0 ) {
                this.mainVisibleImages(images); // Main visible Images
            }
        },
        mainVisibleImages(images) {
            for (let i = 1; i < (images.length); i++) {
                if (images[i].title !== undefined) {
                    if( i === 1 ){
                        let big_image = images[i].title.replace('small', 'big');

                        this.saleImage.push({
                            src: '/images/sale/' + big_image,
                            thumbnail: '/images/sale/' + big_image,
                            w: 1200,
                            h: 800,
                            alt: big_image
                        });
                    }
                    if (images[i].title.indexOf('small') > -1) {
                        if( images[i].title.indexOf('small_1') !== 0 ) {
                            this.saleImage.push({
                                src: '/images/sale/' + images[i].title,
                                thumbnail: '/images/sale/' + images[i].title,
                                w: 1200,
                                h: 800,
                                alt: images[i].title
                            });
                        }
                    }
                }
            }
        },
        imagesStyle(){
            document.addEventListener('DOMContentLoaded', () => {
                let figure = document.getElementsByTagName('figure');

                if( figure.length !== undefined && figure.length > 0 ){
                    this.mainImageStyle(figure);
                    this.otherImagesStyle(figure);
                }
            });
        },
        mainImageStyle(figure){
            if( figure !== undefined ) {
                if(window.innerWidth <= 576) {
                    figure[0].classList.remove('sale__main-image');
                    figure[0].classList.add('for__md')
                }
                else if(window.innerWidth <= 768) {
                    figure[0].classList.remove('sale__main-image');
                    figure[0].classList.add('for__md');
                }
                else if(window.innerWidth <= 992) {
                    figure[0].classList.remove('for__md');
                    figure[0].classList.add('sale__main-image');
                }
                else if(window.innerWidth <= 1200) {
                    figure[0].classList.remove('for__md');
                    figure[0].classList.add('sale__main-image');
                }

                window.addEventListener('resize', () => {
                    if( window.innerWidth <= 576 ) {
                        figure[0].classList.add('for__md');
                    }
                    else if(window.innerWidth <= 768) {
                        figure[0].classList.add('for__md');
                    }
                    else if(window.innerWidth <= 992) {
                        figure[0].classList.remove('for__md');
                        figure[0].classList.add('sale__main-image');
                    }
                    else if(window.innerWidth <= 1200) {
                        figure[0].classList.remove('for__md');
                        figure[0].classList.add('sale__main-image');
                    }
                });

                figure[0].classList.add('sale__main-image')
                figure[0].getElementsByTagName('img')[0].style.height = '100%'
            }
        },
        otherImagesStyle(figure){
            let i = 1;

            if( figure !== undefined ) {
                figure[0].setAttribute("id", "fig-"+0 ) // Main figure

                window.addEventListener('resize', () => {
                    let i = 1;
                    let figure = document.getElementsByTagName('figure');

                    figure[0].setAttribute("id", "fig-"+0 ) // Main figure

                    for (i; i < figure.length; i++) {
                        if (figure[i] !== undefined) {
                            figure[i].setAttribute("id", "fig-"+i ) // Other figures

                            if(window.innerWidth <= 576){
                                figure[i].classList.remove('sale__other-images');
                                figure[i].classList.remove('for__other-md');
                                figure[i].classList.add('for__other-sm');
                                figure[i].getElementsByTagName('img')[0].style.width = '100%'
                                figure[i].getElementsByTagName('img')[0].style.height = '100%'
                            }else if(window.innerWidth <= 768){
                                figure[i].classList.remove('sale__other-images');
                                figure[i].classList.remove('for__other-sm');
                                figure[i].classList.add('for__other-md');
                                figure[i].getElementsByTagName('img')[0].style.width = '100%'
                                figure[i].getElementsByTagName('img')[0].style.height = '100%'
                            }else if(window.innerWidth <= 992){
                                figure[i].classList.remove('for__other-md');
                                figure[i].classList.remove('for__other-sm');
                                figure[i].classList.add('sale__other-images');
                                figure[i].getElementsByTagName('img')[0].style.width = '100%'
                                figure[i].getElementsByTagName('img')[0].style.height = '100%'
                            }else if(window.innerWidth <= 1200 || window.innerWidth >= 1200){
                                figure[i].classList.remove('for__other-md');
                                figure[i].classList.remove('for__other-sm');
                                figure[i].classList.add('sale__other-images');
                                figure[i].getElementsByTagName('img')[0].style.width = '100%'
                                figure[i].getElementsByTagName('img')[0].style.height = '100%'
                            }
                        }
                    }
                })

                for (i; i < figure.length; i++) {
                    if (figure[i] !== undefined) {

                        figure[i].setAttribute("id", "fig-"+i)

                        if(window.innerWidth <= 576){
                            figure[i].classList.remove('sale__other-images');
                            figure[i].classList.remove('for__other-md');
                            figure[i].classList.add('for__other-sm');
                            figure[i].getElementsByTagName('img')[0].style.width = '100%'
                            figure[i].getElementsByTagName('img')[0].style.height = '100%'
                        }else if(window.innerWidth <= 768){
                            figure[i].classList.remove('sale__other-images');
                            figure[i].classList.remove('for__other-sm');
                            figure[i].classList.add('for__other-md');
                            figure[i].getElementsByTagName('img')[0].style.width = '100%'
                            figure[i].getElementsByTagName('img')[0].style.height = '100%'
                        }else if(window.innerWidth <= 992){
                            figure[i].classList.remove('for__other-md');
                            figure[i].classList.remove('for__other-sm');
                            figure[i].classList.add('sale__other-images');
                            figure[i].getElementsByTagName('img')[0].style.width = '100%'
                            figure[i].getElementsByTagName('img')[0].style.height = '100%'
                        }else if(window.innerWidth <= 1200 || window.innerWidth >= 1200){
                            figure[i].classList.remove('for__other-md');
                            figure[i].classList.remove('for__other-sm');
                            figure[i].classList.add('sale__other-images');
                            figure[i].getElementsByTagName('img')[0].style.width = '100%'
                            figure[i].getElementsByTagName('img')[0].style.height = '100%'
                        }
                    }
                }
            }
        },

        imageSmallOnBigChange(){
            document.addEventListener('DOMContentLoaded', () => {
                let pswps = document.getElementsByClassName('pswp__img');
                let left = document.getElementsByClassName('pswp__button pswp__button--arrow--left');
                let right = document.getElementsByClassName('pswp__button pswp__button--arrow--right');

                this.changeSmallOnBig(pswps);
                this.forRightAndLeftPreviousButton(pswps, left, right);
            });
        },
        changeSmallOnBig(pswps){
            document.addEventListener('click',(e) => {
                let image = e.target;

                setTimeout( () => {
                    for( let pswp of pswps ) {
                        if( pswp !== undefined && image !== undefined ) {
                            if( pswp.src !== undefined && image.src !== undefined ) {
                                if (pswp.src === image.src) {
                                    pswp.src = pswp.src.replace('small', 'big');
                                }
                            }
                        }
                    }
                },500)
            });
        },
        forRightAndLeftPreviousButton(pswps, left, right){
            this.leftPrevious(left, pswps);
            this.rightPrevious(right, pswps);

        },
        leftPrevious(left, pswps){
            if( left !== undefined ) {
                left[0].addEventListener('click', (e) => {
                    for (let pswp of pswps) {
                        if (pswp !== undefined) {
                            if (pswp.src !== undefined) {
                                pswp.src = pswp.src.replace('small', 'big');
                            }
                        }
                    }
                });
            }
        },
        rightPrevious(right, pswps){
            if( right !== undefined ) {
                right[0].addEventListener('click', (e) => {
                    for (let pswp of pswps) {
                        if (pswp !== undefined) {
                            if (pswp.src !== undefined) {
                                pswp.src = pswp.src.replace('small', 'big');
                            }
                        }
                    }
                });
            }
        }
    },
    mounted() {
        this.imagesShow(this.sale_images);
        this.imagesStyle();
        this.imageSmallOnBigChange();
    }
}
</script>

<style scoped>

</style>
