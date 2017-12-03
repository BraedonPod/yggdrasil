<template>
    <transition name="modal">
        <div class="modal" id="exampleModal">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button class="close" @click="$emit('close')" type="button"><span aria-hidden="true">&times;</span></button>
    					<h5 class="modal-title" id="exampleModalLongTitle">Title</h5>
    				</div>
    				<div class="modal-body">
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Library Status</label>
    						<div class="col-sm-7">
    							<select class="form-control">
    								<option>Complete</option>
    								<option>Watching</option>
    								<option>Plan to Watch</option>
    								<option>Dropped</option>
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
    								<option>1</option>
    								<option>2</option>
    								<option>3</option>
    								<option>4</option>
    								<option>5</option>
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
    							<input class="form-control" placeholder="DD/MM/YYYY" type="text">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Finished</label>
    						<div class="col-sm-7">
    							<input class="form-control" placeholder="DD/MM/YYYY" type="text">
    						</div>
    					</div>
    					<div class="form-group row">
    						<label class="col-sm-5 col-form-label">Personal Notes</label>
    						<div class="col-sm-7">
    							<textarea class="form-control" style="overflow: hidden; word-wrap: break-word; resize: none; height: 62px;"></textarea>
    						</div>
    					</div>
    				</div>
    				<div class="modal-footer">
    					<button aria-label="Remove from Library" class="btn button--secondary" style="float:left;"><i aria-hidden="true" class="fa fa-trash-o"></i></button> <button class="btn btn-primary" type="button">Save changes</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </transition>
</template>
