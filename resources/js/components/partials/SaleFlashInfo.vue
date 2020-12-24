<template>
    <div class="container">
        <div class="sale__flash-info">
            <div class="mb-3">
                <h5 class="text__bold">
                    Sizin elan yoxlandıqdan sonra elanlar bölməsində yerləşdiriləcək.
                </h5>

                <br>

                Aşağıdakı PİN şifrəni unutmamaq üçün özünüzdə qeyd edin.

                <br>

                Elanı redaktə etmək üçün aşağıdakı PİN şifrədən istifadə edə bilərsiniz.
            </div>

            <table class="mb-2 sale__pin-bg-color">
                <tbody>
                    <tr>
                        <td class="text-right pr-2"> Pin: </td>
                        <td class="text__bold">{{ pin }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mb-2">
                Sizin elanınızın yoxlamadan uğurla keçməsindən əmin olmaq üçün,
                linki özünüzdə qeyd edin:

                <a :href="'http://avtolavka/announce/sale/show/'+number">
                    http://avtolavka/announce/sale/show/{{ number }}
                </a>
            </div>

            <div class="d-flex">
                <span class="mr-2">Elanınıza baxmaq üçün</span>

                <a :href="'http://avtolavka/announce/sale/show/'+number" class="text__italic">
                    tıklayın
                </a>
            </div>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 pl-0 m-auto">
            <a href="http://avtolavka/" class="btn btn-secondary">Çıxış</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Sale_flash_info",
    props: ['pin','number'],
    data(){
        return {

        }
    },
    mounted() {
        // console.log('AAAAAA === ', document.getElementById('search').style.display = 'none' );
        document.getElementById('search').style.display = 'none';
    }
}
</script>

<style scoped>

</style>
