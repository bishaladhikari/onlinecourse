<div class="col-md-10 col-md-offset-1">
    <form v-show="showCreate" @submit.prevent="storeSection" class="form-horizontal p-10 bg-mild-white">


        <h4>New Section</h4>

        <div class="form-group row">

            <label for="name" class="control-label col-lg-2">Title</label>


            <div class="col-lg-10">

                <input type="text" class="form-control" name="title"
                       placeholder="Enter title for your section" id="title" v-model="title"
                       required/>

            </div>
        </div>

        <div class="form-group row">

            <label for="name" class="control-label col-lg-2">Objective</label>


            <div class="col-lg-10">

                <input type="text" class="form-control" name="objective"
                       placeholder="Enter objective for your section" id="objective" v-model="objective"
                       required/>
                <small>What will your student learn at the end of this section?</small>


            </div>
        </div>


        {{csrf_field()}}
        {{--{{ method_field('PATCH') }}--}}
        <div class="form-group row">
                 <span class="pull-right m-r-10">
                  <a href="#" @click.prevent="showCreate = !showCreate" class="btn btn-info">Cancel</a>
                     <button type="submit" class="btn theme-btn">Save</button>
                 </span>
        </div>


        <div class="form-group pull-right">

        </div>
    </form>

</div>




