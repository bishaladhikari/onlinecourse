<template>
    <form @submit.prevent="storeLesson">
        <div class="panel">
            <div class="panel-heading bg-mild-blue">
                Add New Lesson

            </div>


            <div class="panel-body bg-mild-white">
                <div class="form-horizontal">


                    <div class="form-group row">

                        <label class="control-label col-lg-2">Title</label>


                        <div class="col-lg-10">

                            <input type="text" class="form-control"
                                   placeholder="Enter lesson title" id="title" v-model="title"
                                   required/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Description: </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Enter description"
                                   v-model="description" required>
                            <small class="text-danger" v-show=""></small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <span class="pull-right m-r-10">
                            <button type="button" @click.prevent="cancelCreateLesson"
                                    class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn theme-btn">Save</button>
                        </span>
                    </div>
                </div>
            </div>


        </div>

    </form>


</template>

<script>
    export default {
        props: ['course_id'],

        data: function () {
            return {
                title: null,
                description: null,
                preview: null,
                lesson_type: null,
                createLesson: false,
            }
        },

//        computed:{
//            createLesson:createLesson
//        },

        methods: {

            storeLesson(){
                axios.post('/api/author/lesson', {
                    course_id: this.course_id,
                    title: this.title,
                    lesson_type: this.lesson_type,
                    description: this.description,
                    preview: this.preview
                }).then(function (response) {

                    this.title = null;
                    this.description = null;
                    this.lesson_type = null;
                    this.preview = null;
                    this.fetchLessons();
                    this.cancelCreateLesson();
                }.bind(this)).catch(function (error) {
                    console.log(error);
                })
            },

            cancelCreateLesson(){
//                this.createLesson=false;
                this.$emit('cancel-create-lesson');
            },
            fetchLessons(){
//                this.createLesson=false;
                this.$emit('fetch-lessons');
            },


        },

//
//        mounted() {
//            console.log('hello');
//        }


    }
</script>
