<template>
    <form @submit.prevent="updateLesson">
        <div class="form-horizontal p-10 bg-mild-white">


            <h4>Edit Lesson {{index+1}}</h4>

            <div class="form-group row">

                <label class="control-label col-lg-2">Title</label>


                <div class="col-lg-10">

                    <input type="text" class="form-control"
                           placeholder="Enter lesson title" id="title" v-model="editLessonForm.title"
                           required/>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Description: </label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" placeholder="Enter description"
                           v-model="editLessonForm.description" required>
                    <small class="text-danger" v-show=""></small>
                </div>
            </div>


            <div class="form-group row">
                        <span class="pull-right m-r-10">
                            <button type="button" @click.prevent="cancelEditLesson" class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn theme-btn" >Update</button>
                        </span>
            </div>

        </div>


    </form>




</template>

<script>
    export default {
        props: ['lesson','index'],

        data: function () {
            return {
                editLessonForm: {

                    title: this.lesson.title,
                    description: this.lesson.description,

                },
            }
        },

//        computed:{
//            createLesson:createLesson
//        },

        methods: {

            updateLesson(){

                axios.put('/api/author/lesson/'+this.lesson.id, {
                    title: this.editLessonForm.title,
                    description: this.editLessonForm.description,
                }).then(function (response) {
//                    this.title= response.data.title;

                        this.cancelEditLesson();
                }.bind(this)).catch(function (error) {
                    console.log(error);
                })
            },

            cancelEditLesson(){
//                this.createLesson=false;
                this.$emit('cancel-edit-lesson');
                this.$emit('fetch-lessons');

            }

        },


//        mounted() {
//            console.log('hello');
//        }


    }

</script>
