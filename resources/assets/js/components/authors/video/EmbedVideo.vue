<template>
    <form @submit.prevent="storeLink">
        <div class="panel">
            <div class="panel-body">

                <div class="form-horizontal p-10 ">
                    <div class="form-group row">

                        <label class="control-label col-lg-2">Youtube Link</label>


                        <div class="col-lg-10">

                            <input type="text" class="form-control"
                                   placeholder="Example: https://www.youtube.com/watch?v=1MwjX4dG72s" id="title"
                                   v-model="videoLink"
                                   required/>

                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="pull-right m-r-10">
                            <button type="button" @click.prevent="cancelEmbedVideo" class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn theme-btn">Save</button>
                        </span>
                    </div>

                </div>


            </div>


        </div>
    </form>


</template>
<script>


    export default{


        props: ['lesson'],

        data(){
            return {
                videoLink: '',
                progress: ''


            }
        },
        methods: {

            cancelEmbedVideo(){

                this.$emit('cancel-embed-video');

            },
            storeLink(){
                axios.post('/api/author/lesson/video/embed',{
                    lesson_id:this.lesson.id,
                    videoLink:this.videoLink
                }).then(function (response) {
                   this.videoLink='';
                }.bind(this)).catch(function (error) {
                    console.log(error);
                })


            }


        }
    }
</script>