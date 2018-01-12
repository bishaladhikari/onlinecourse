<template>
    <div class="panel panel-card clearfix bg-mild-white ">
        <edit-lesson v-if="editLesson" :lesson="lesson" :index="index" @cancel-edit-lesson="editLesson=!editLesson"
                     @fetch-lessons="fetchLessons">
        </edit-lesson>
        <div class="panel-heading drag-me " v-else>

            <b>Lesson {{ index + 1 }}: {{ lesson.title }}</b>
            <a href="#" class="message" v-on:click.prevent="editLesson=!editLesson"><i class="fa fa-pencil p-5"></i>
            </a>
            <a href="#" class="message" v-on:click.prevent="deleteLesson(lesson.id)"><i
                    class="glyphicon glyphicon-trash"></i></a>
            <span class="pull-right">

                <a class="btn btn-outlined" data-toggle="collapse" :data-target="'#collapseContent'+index"><i
                        class="fa fa-chevron-circle-down p-5"></i>Add Content</a>

                </span>


        </div>
        <div class="panel-body " v-show="!editLesson">
            <div :id="'collapseContent'+index" class="collapse bg-mild-white">
                <create-article v-show="createArticle" @cancel-create-article="createArticle=!createArticle;">
                </create-article>
                <upload-video v-show="uploadVideo" @cancel-upload-video="uploadVideo=!uploadVideo;" :lesson="lesson">
                </upload-video>
                <embed-video v-show="embedVideo" @cancel-embed-video="embedVideo=!embedVideo;" :lesson="lesson">
                </embed-video>
                <div class="row p-10 " v-show="!createArticle && !uploadVideo && !embedVideo">

                    <div class="col-xs-6">
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn btn-mild-blue col-xs-12">
                                    <i class="fa fa-video-camera p-5"></i>
                                    Add video content
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="#" @click.prevent="uploadVideo=!uploadVideo"><i
                                            class="fa fa-upload p-5"></i>Upload video</a></li>
                                    <li><a href="#" @click.prevent="embedVideo=!embedVideo"><i
                                            class="fa fa-youtube p-5"></i>Youtube Link</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-6">
                        <a href="#" class="btn btn-mild-blue col-xs-12" @click.prevent="createArticle=!createArticle">
                            <i class="fa fa-book p-5"></i>
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
                createArticle: false,
                uploadVideo: false,
                embedVideo: false,
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
                }, () => {
                    axios.delete('/api/author/lesson/' + lesson_id).then(function (response) {
                        this.fetchLessons();
                        swal('Deleted!', 'Lesson Deleted', 'success');

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