<template>
    <transition name="modal">
        <div class="modal" id="exampleModal">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button class="close" @click="$emit('close')" type="button"><span aria-hidden="true">&times;</span></button>
    					<h5 class="modal-title" id="exampleModalLongTitle">{{movie.title}} {{item_type}}</h5>
    				</div>
    				<div class="modal-body">
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Library Status</label>
    						<div class="col-sm-7">
    							<select class="form-control">
    							  <option v-if="item_type == 'Book'"
    								  v-for="status_template in book_status_templates"
    								  :selected="status_template == libentry.status ? 'selected' : ''">
    								  {{ status_template }}</option>
    								<option v-if="item_type == 'Movie'"
    								  v-for="status_template in movie_status_templates"
    								  :selected="status_template == libentry.status ? 'selected' : ''">
    								  {{ status_template }}</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Progress</label>
    						<div class="col-sm-7">
    							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    								<input class="form-control" max="1" min="0" type="number">
    								<div class="input-group-addon">
    									of 1 episodes
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Rating</label>
    						<div class="col-sm-7">
    							<select class="form-control" id="exampleFormControlSelect1">
    								<option 
    								  v-for="count in 5"
    								  :selected="count == libentry.rating ? 'selected' : ''">
    								  {{ count }}
    								</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Rewatch Count</label>
    						<div class="col-sm-7">
    							<input class="form-control" min="0" type="number">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Started</label>
    						<div class="col-sm-7">
    							<input class="form-control" id="datepicker" :value="libentry.started_at" placeholder="DD/MM/YYYY" type="text">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Finished</label>
    						<div class="col-sm-7">
    							<input class="form-control" id="datepicker" :value="libentry.finished_at" placeholder="DD/MM/YYYY" type="text">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Personal Notes</label>
    						<div class="col-sm-7">
    							<textarea class="form-control" style="overflow: hidden; word-wrap: break-word; resize: none; height: 62px;">{{ libentry.notes }}</textarea>
    						</div>
    					</div>
    				</div>
    				<div class="modal-footer">
    					<button aria-label="Remove from Library" class="btn" style="float:left;"><i aria-hidden="true" class="fa fa-trash-o"></i></button> 
    					<button class="btn btn-primary" type="button">Save changes</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </transition>
</template>
<script>
export default {
  props: ["item_type", "item_id"],

  data() {
    return {
        endpoint: "/api/" + this.item_type + "/" + this.item_id + "/librarystatus",
        isLoading: false,
        movie: [],
        libentry: [],
        movie_status_templates: ['Completed', 'Watching', 'Plan to Watch', 'Dropped'],
        book_status_templates: ['Completed', 'Reading', 'Plan to Read', 'Dropped']
    };
  },
  mounted () {
    this.getStatus()
  },

  methods: {
    getStatus() {
        this.isLoading = true;
        
        axios
        .get(this.endpoint)
        .then(response => {
            this.isLoading = false;
            this.movie = response.data[0];
            this.libentry = response.data[1];

        })
        .catch(error => {
          this.isLoading = false;
        });
    }
  }
};
</script>
