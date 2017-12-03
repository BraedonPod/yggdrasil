<template>
	<div v-if="status == ''" class="entry-state-status">
		<button @click="addStatus('Completed')" class="button button--secondary seen-this" value="Completed">Completed</button>
		<button @click="addStatus('Plan to Watch')" class="button button--secondary want-to-watch"value="Plan to Watch">Plan to Watch</button>
		<button @click="addStatus('Watching')" class="button button--secondary started-watching"value="Watching">Watching</button>
	</div>
			
	<div v-else-if="status == 'Completed' || status == 'Dropped'" class="entry-state-status">
		<span class="state-helper">
  			Status: <font color="#3097D1">{{ status }}</font>
		</span>		

		<button class="button button--secondary started-watching"value="Edit">Edit</button>
	</div>
	
	<div v-else-if="status == 'Plan to Watch'" class="entry-state-status">
		<span class="state-helper">
  			Status: <font color="#3097D1">{{ status }}</font>
		</span>
		
		<button @click="updateStatus('Completed')" class="button button--secondary seen-this">Completed</button>
		<button @click="updateStatus('Watching')" class="button button--secondary started-watching">Watching</button>
	</div>
			
	<div v-else-if="status == 'Watching'" class="entry-state-status">
		<span class="state-helper">
  			Status: <font color="#3097D1">{{ status }}</font>
		</span>
		
		<!--<button data-toggle="modal" data-target="#exampleModal" class="button button--secondary seen-this" value="Completed">Completed</button>-->
		<button @click="updateStatus('Completed')" class="button button--secondary seen-this">Completed</button>
		<button class="button button--secondary started-watching">Edit</button>
		<button @click="updateStatus('Dropped')" class="button button--secondary dropped">Dropped</button>
	</div>
</template>

<script>
export default {
  props: ["item_status", "item_type", "item_id", "logged_in"],

  data() {
    return {
        status: this.item_status,
        isLoggedIn: this.logged_in,
        endpoint: "/api/" + this.item_type + "/" + this.item_id + "/status",
        isLoading: false,
    };
  },

  methods: {
    addStatus(newstatus) {
        this.isLoading = true;
        
        axios
        .post(this.endpoint, {
            status: newstatus
          })
        .then(response => {
          this.isLoading = false;
          this.status = newstatus;
          
        })
        .catch(error => {
          this.isLoading = false;
        });
    },
    
    updateStatus(newstatus) {
        this.isLoading = true;
        
        axios
        .patch(this.endpoint+"/"+newstatus)
        .then(response => {
          this.isLoading = false;
          this.status = newstatus;
          
        })
        .catch(error => {
          this.isLoading = false;
        });
    }
  }
};
</script>