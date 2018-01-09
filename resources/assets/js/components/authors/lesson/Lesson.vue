<template>
    <div class="panel panel-card clearfix bg-mild-white ">
        <div class="panel-heading drag-me ">


            <edit-lesson v-if="editLesson" :lesson="lesson"  @cancel-edit-lesson="editLesson=!editLesson" @fetch-lessons="fetchLessons">
            </edit-lesson>

            <div v-else>
                <b>Lecture {{ index + 1 }}: {{ lesson.title }}</b>
                <a href="#" class="message" v-on:click.prevent="editLesson=!editLesson"><i class="fa fa-pencil p-5"></i>
            </a>
                <a href="#" class="message" v-on:click.prevent="deleteLesson(lesson.id)"><i class="glyphicon glyphicon-trash"></i></a>
                <span class="pull-right">

                <a  class="btn btn-outlined" data-toggle="collapse" :data-target="'#collapseContent'+index"><i class="fa fa-book p-5"></i>Add Content</a>

                </span>

            </div>


        </div>
        <div class="panel-body " v-show="!editLesson" >
        <div :id="'collapseContent'+index" class="collapse bg-mild-white" >
            <create-article v-show="createArticle" @cancel-create-article="createArticle=!createArticle;">
            </create-article>
            <create-video v-show="createVideo" @cancel-create-video="createVideo=!createVideo;">
            </create-video>
                <div class="row p-10 " v-show="!createArticle && !createVideo">

                    <div class="col-xs-6">
                        <a href="#" class="btn btn-mild-blue col-xs-12" @click.prevent="createVideo=!createVideo">
                            <i class="fa fa-arrow-up p-5"></i>
                            Upload video</a>

                    </div>
                    <div class="col-xs-6">
                        <a href="#" class="btn btn-mild-blue col-xs-12" @click.prevent="createArticle=!createArticle">
                            <i class="fa fa-plus p-5"></i>
                            Add Article</a>

                    </div>
                </div>



            </div>
        </div>



    </div>


</template>
<script>


    export default{

        props: ['lesson', 'index'],
        data(){
            return {
                createArticle:false,
                createVideo:false,
                editLesson: false,

            }
        },
        methods: {


            deleteLesson(lesson_id){
                swal({
                        title: "Are you sure?",
                        text: "The Lesson will be deleted!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },()=>{
                        axios.delete('/api/author/lesson/'+lesson_id).then(function (response) {
                            this.fetchLessons();
                            swal('Deleted!','Lesson Deleted','success');

                        }.bind(this)).catch(function (error) {
                            console.log(error);
                        })

                    });

            },
            fetchLessons(){
                this.$emit('fetch-lessons');

            }


        }
    }

</script>