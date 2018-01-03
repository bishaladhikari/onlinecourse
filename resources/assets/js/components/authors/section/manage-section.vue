
<script>
    export default {
        mounted() {
            this.fetchSections();
        },
        data: function () {
            return {
                loading:true,
                sections:[],

                title: '',
                objective:'',
                showCreate:false,
                saveStatus: '',

            }

        },
        props:['course','course_obj'],
        methods: {
            fetchSections(){
                return axios.get('/api/author/'+this.course+'/sections').then(function (response) {
                    this.sections = response.data;
//                    this.showEdit = false;
//                    this.duration = 2;
//                    this.videoLink = null;
//                    this.showEditContent=false;
//                    this.editing_question=false
                    this.loading = false;
                }.bind(this))
                    .catch(function(error){
                        console.log('Could not fetch sections');
                    });
            },
            storeSection(){
                axios.post('/api/author/section', {
                    course_id: this.course,
                    title: this.title,
                    objective: this.objective
                }).then(function (response){
                    this.fetchSections();
                    this.title = '';
                    this.objective = '';
                    this.showCreate = false;

                }.bind(this)).catch(function (error){
                    this.saveStatus = 'Error saving. Try again';
                    setTimeout(() => {
                        this.saveStatus = null
                    }, 3000);

                    this.err = error.response.data;
                })
            },
            fetchSection(id){
                return axios.get('/api/author/section/'+id).then(function (response) {
                    this.editSection = response.data;
                    this.showEdit=true;
                }.bind(this))
                    .catch(function(error){
                        console.log('Could not fetch section');
                    });
            },


        },


    }
</script>
