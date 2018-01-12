<template>
    <div class="panel" >
        <div class="panel-body">

            <div  class="form-horizontal p-10 ">
                <vue-clip :options="options" :on-total-progress="totalProgress">

                        <template slot="clip-uploader-action">
                            <div class=" bg-mild-white p-10" style="cursor:pointer" >
                                <div class="dz-message"><i class="big-font fa fa-upload p-10"></i><b>Browse or drop your files here </b></div>
                            </div>
                        </template>

                        <template slot="clip-uploader-body" scope="props">
                            <div v-for="file in props.files">
                                <img v-bind:src="file.dataUrl" />
                                {{ file.name }} {{ file.status }}
      </div>
                        </template>



                </vue-clip>
                <div class="progress m-t-10">
                    <div class="progress-bar" role="progressbar" :style="{ width: progress + '%'}" aria-valuemax="100" style="background: #607d8b;color:white">{{parseInt(progress)}}%</div>
                </div>

                <div class="form-group row">
                        <span class="pull-right m-r-10">
                            <button type="button" @click.prevent="cancelUploadVideo" class="btn btn-info">Cancel</button>
                            <button type="button" class="btn theme-btn">Save</button>
                        </span>
                </div>

            </div>


        </div>




    </div>


</template>
<script>


    export default{


        components:{},

        data(){
            return {
                options: {
                    url: '/api/author/lesson/video/upload',
                    paramName: 'file'
                },
                progress:''


            }
        },
        methods: {

            cancelUploadVideo(){

                this.$emit('cancel-upload-video');

            },
            totalProgress (progress, totalBytes, bytesSent) {
                this.progress=progress;
            }



        }
    }
</script>