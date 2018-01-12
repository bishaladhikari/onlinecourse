<template>
    <div  v-cloak="">
        <div class="row">
            <div class="col-md-offset-6">
                <i v-show="loading" class="fa fa-spinner fa-spin big-font "></i>

            </div>
            <div class="col-md-10 col-md-offset-1">

                <!--<draggable v-model="lessons"-->
                           <!--:options="{animation:150,handle:'.drag-me'}" @start="drag=true" @end="drag=false" @change="updateLessonSort">-->
                           <!--&lt;!&ndash;:options="{animation:150}"&ndash;&gt;-->

                <ul class="lesson-list" style="list-style:none;padding:0">
                    <li v-for="(lesson , index) in lessons">
                        <lesson  :lesson="lesson" :index="index" :key="lesson.id" @fetch-lessons="fetchLessons">
                        </lesson>
                    </li>

                </ul>


                <!--</draggable>-->


                <!--create lesson-->
                <a href="#" class="btn btn-outlined col-lg-12 p-10"
                   v-show="!createLesson" v-on:click.prevent="createLesson=!createLesson">
                    <i class="fa fa-plus p-5"></i>
                    Add New Lesson
                </a>
                <create-lesson  :course_id="this.course_id"  v-if="createLesson" @cancel-create-lesson="createLesson=!createLesson;" @fetch-lessons="fetchLessons">
                </create-lesson>


            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable';

    export default{
        mounted() {
            this.fetchLessons();

            $('.lesson-list').sortable({
                connectWith: '.lesson-list',
                handle:'.drag-me',
//                container: '.container',
                helper: 'clone',
                revert: 'invalid',
                forceHelperSize: true,
                placeholder: {
                    element: function(clone, ui) {
                        return $('<li></li>');
                    },
                    update: function() {
                        return;
                    }
                },start: function(e, ui){
                    ui.placeholder.height(ui.item.height());
                }
            });

        },

        components:{
          draggable,
        },
        props:['course_id'],
        data(){
            return {
                loading:true,
                createLesson:false,
                editLesson:false,

//                lessonEdit:false,
                title: null,
                description: null,
//                lessonEditForm:{
//                    title:'',
//                    description:'',
//
//                },

                lessons: {
                    title: '',
                    description: ''
                },
                errors: [],
                lessons: [],
                update_post: {}
            }
        },
        methods:{
            fetchLessons()
            {
                axios.get('/api/author/lesson?course_id='+this.course_id)
                    .then(response => {

                        this.lessons = response.data;
                        this.loading = false;


                    });
            },
            updateLessonSort(){
                console.log('sorted');

            }
//            cancelCreateLesson(){
//                this.createLesson=false;
//
//            },
//            cancelEditLesson(){
//                this.editLesson=true;
//
//
//
//            },
//            cancelEdit(){
//                this.edit=false;
//            }
        }
    }

</script>