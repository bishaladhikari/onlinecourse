<template>
    <div class="panel" >
        <div class="panel-heading">

            <div  class="form-horizontal p-10 ">


                <h4>Add Article</h4>
                <div class="form-group">

                    <div class="col-lg-12">
                        <vue-editor id="editor"
                                    useCustomImageHandler
                                    @imageAdded="handleImageAdded" v-model="htmlForEditor">

                        </vue-editor>
                        <small class="text-danger" v-show=""></small>
                    </div>
                </div>


                <div class="form-group row">
                        <span class="pull-right m-r-10">
                            <button type="button" @click.prevent="cancelCreateArticle" class="btn btn-info">Cancel</button>
                            <button type="button" class="btn theme-btn">Save</button>
                        </span>
                </div>

            </div>


        </div>




    </div>


</template>
<script>
    import { VueEditor } from 'vue2-editor';

    export default{


        components:{VueEditor},

        data(){
            return {
                htmlForEditor:'',

            }
        },
        methods: {

            storeArticle(){

                axios.post('/api/author/article',{});


            },
            cancelCreateArticle(){
//                this.createArticle = false;
                this.$emit('cancel-create-article');

            },

            handleImageAdded: function(file, Editor, cursorLocation) {
                console.log('test')
                // An example of using FormData
                // NOTE: Your key could be different such as:
                // formData.append('file', file)
//
//                let formData = new FormData();
//                formData.append('image', file);
//
//                axios({
//                    url: 'https://fakeapi.yoursite.com/images',
//                    method: 'POST',
//                    data: formData
//                })
//                    .then((result) => {
//                        let url = result.data.url // Get url from response
//                        Editor.insertEmbed(cursorLocation, 'image', url);
//                    })
//                    .catch((err) => {
//                        console.log(err);
//                    })
            }

        }
    }
</script>