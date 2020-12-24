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
    props: ['sale'],
    data(){
        return {
            photo: this.sale.image,
            saleImage: []
        }
    },
    methods: {
        documentResize(){
            // addEventListener('resize',() => {
            //     if( window.innerWidth <= 768 ){
            //         alert(333333333)
            //     }
            // })
        },
        imagesShow(){
            let i = 0;

            for(i=0; i<5; i++){
                this.saleImage.push({
                    src: '/images/sale/' + this.sale.image,
                    thumbnail: '/images/sale/' + this.sale.image,
                    w:1200,
                    h:800,
                    alt: this.sale.image
                })
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
                window.addEventListener('resize', () => {
                    let i = 1;
                    let figure = document.getElementsByTagName('figure');

                    for (i; i < figure.length; i++) {
                        if (figure[i] !== undefined) {
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
        }
    },
    mounted() {
        this.documentResize();
        this.imagesShow();
        this.imagesStyle();

        document.addEventListener('DOMContentLoaded', ()=> {
            let tags = document.getElementsByTagName('figure');
            console.log('SSSSSSSSSSS = ', tags.length)
        })
    }
}
</script>

<style scoped>

</style>
