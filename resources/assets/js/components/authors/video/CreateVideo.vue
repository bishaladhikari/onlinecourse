<template>
    <div class="panel" >
        <div class="panel-heading">

            <div  class="form-horizontal p-10 ">
                <vue-clip :options="options">
                    <template slot="clip-uploader-action">
                        <div class=" bg-mild-white" >
                            <div class="dz-message"><i class="big-font fa fa-upload p-10"></i><b> Click or Drag and Drop your files here to upload </b></div>
                        </div>
                    </template>

                    <template slot="clip-uploader-body" scope="props">
                        <div v-for="file in props.files">
                            <img v-bind:src="file.dataUrl" />
                            {{ file.name }} {{ file.status }}
      </div>
                    </template>

                </vue-clip>



                <div class="form-group row">
                        <span class="pull-right m-r-10">
                            <button type="button" @click.prevent="cancelCreateVideo" class="btn btn-info">Cancel</button>
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
                    url: '/upload',
                    paramName: 'file'
                },
                createVideo: true,


            }
        },
        methods: {

            cancelCreateVideo(){

                this.$emit('cancel-create-video');

            },



        }
    }
</script>