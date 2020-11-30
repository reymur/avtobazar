<template>
    <div class="">
        <form class="form-group">
            <div class="px-md-4 px-sm-4">
                <div class="form-group">
                    <label for="sale-type">Elanın növü</label>
                    <select class="form-control" id="sale-type">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="condition">Elanın vəziyyəti</label>
                    <select class="form-control" id="condition">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="announce">Elanın adı</label>
                    <input type="email" class="form-control" id="announce" placeholder="">
                </div>

                <div class="form-group">
                    <label for="price">Qiymət, AZN</label>
                    <input type="price" class="form-control" id="price" placeholder="">
                </div>

                <div class="form-group">
                    <label for="city">Şəhər</label>
                    <select class="form-control" id="city">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="body">Məzmun</label>
                    <textarea class="form-control" id="body" rows="3"></textarea>
                </div>
            </div>

            <div class="col-lg-10 col-xl-10 col-md-12 col-sm-12 m-lg-auto m-xl-auto mt-4 mb-3 p-md-0 p-sm-0">
                <vue-image-upload></vue-image-upload>
            </div>

            <div class="form-group border border-info px-5 py-4 mt-4">
                <div class="form-group">
                    <label for="name">Adınız</label>
                    <input type="text" class="form-control" id="name"
                           placeholder="name@example.com">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email"
                           placeholder="name@example.com">
                </div>

                <div class="form-group">
                    <label for="phone">Mobil nömrə</label>
                    <input type="email" class="form-control" id="phone"
                           placeholder="name@example.com">
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
name: "SaleMakeForm"
}
</script>

<style scoped>

</style>
