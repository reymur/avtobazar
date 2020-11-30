<template>
    <div class="border border-default p-4 mb-4">

        <vux-uploader-component
            v-model="fileList"
            limit="5"
            capture="true"
            title="Şəkil əlavə etmək"
            :autoUpload="false"
            :detectImageAutoRotate="true"
            :params="{
                  token: '13579',
                  linkid: '2323',
                  modelname: 'modelname'
                }"
            :headers="{
              'custom-header': 'custom-info',
            }"

            withCredentials
            @on-change="onChange"
            @on-cancel="onCancel"
            @on-success="onSuccess"
            @on-error="onError"
            @on-delete="onDelete"
        />

        <small class="form-text text-muted d-flex">
            Şəkil sayı: minimum 1 - maxsimum ədəd 5 olmalıdır.
        </small>
    </div>
</template>

<script>
export default {
    name: "VueImageUpload",
    data() {
        return {
            fileList: [],
        }
    },
    methods: {
        onChange(fileItem, fileList) {
            console.log('on-change: ', fileItem, fileList)
        },
        onCancel() {
            console.log('on-cancel: Sucess')
        },
        onSuccess(res, fileItem) {
            console.log('on-success: ', res)
            fileItem.fileid = res.data
        },
        onError(res) {
            console.log('on-error: ', res)
        },
        onDelete(deleteItem, cb) {
            // setTimeout(() => {
            console.log('on-delete: ', deleteItem)
            cb && cb()
            // }, 3000);
        },
    },
    mounted() {
        // setTimeout(() => {
        // this.fileList.push({
        //   url: './assets/pic_160.png'
        // })
        // }, 1000);
        console.log(
            'vux title chine - ', document.getElementsByClassName('vux-uploader')[0]
                        .classList
        )

        // document.getElementsByClassName('vux-uploader_title')[0]
        //     .classList.add('upload__img-title')
    },
}
</script>

<style lang="css" scoped>
.vux-uploader_title {
    display: none;
}
</style>
