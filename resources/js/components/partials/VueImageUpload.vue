<template>
    <div class="border border-default p-4 mb-4">

        <vux-uploader-component
            v-model="fileList"
            :limit="image_limit"
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

        <small class="form-text text-muted ml-md-3 ml-sm-3 d-flex">
            Şəkil sayı: minimum 1 - maxsimum {{ image_limit }} ədəd olmalıdır.
        </small>

        <div v-if="image_errors.length > 1">
            <div v-for="error in image_errors">
                <div class="text-danger mt-1 ml-md-3 ml-sm-3">
                    {{ imageErrorsReplace(error, image_limit) }}
                </div>
            </div>
        </div>
        <div v-else-if="image_errors.length == 1">
            <div v-for="error in image_errors" class="text-danger mt-1 ml-md-3 ml-sm-3">
                {{ imageErrorsReplace(error, image_errors.length) }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "VueImageUpload",
    props: ['image_limit','image_errors'],
    data() {
        return {
            fileList: [],
        }
    },
    methods: {
        imageErrorsReplace(error, limit){
            let i = 0;
            let next_error = null;

            for( i; i < limit; i++ ) {
                if( this.replaceLastLetter(error, i) !== undefined ){
                    if( this.replaceLastLetter(error, i) != false ){
                        next_error = this.replaceLastLetter(error, i);
                    }
                }
            }

            return next_error;
        },
        replaceLastLetter(error, num){
            let number_replace = '';
            let dot_replace = '';
            let error_org = '';

            if (error.indexOf('images.'+num) != -1) {
                number_replace = error.replace( 'images.'+num, 'images.'+(num+1) );
                dot_replace = number_replace.replace(
                    'images.'+(num+1),
                    '"images - '+(num+1)+'"'
                );

                return dot_replace;
            }
            else if( error.indexOf('images') > -1 && error.indexOf('images.') == -1 ){
                error_org = error.replace('images', '"images"');
                return error_org
            }

            return false;
        },
        onChange(fileItem, fileList){
            this.$emit('imageList', fileList);
            console.log('on-change: ', this.fileList)
        },
        onCancel() {
            console.log('on-cancel: Success')
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
        // console.log( '>>>>>>>> - ',this.image_errors_var )

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
