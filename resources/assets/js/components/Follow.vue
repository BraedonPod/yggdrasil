<template>
	<div>
        <button v-if="isFollowed" @click.prevent="unFollow(user)" class="button button--primary active"><span class="button-label">Unfollow</span></button>
        <button v-else @click.prevent="follow(user)" class="button button--primary active"><span class="button-label">Follow</span></button>
	</div>
</template>

<script>
    export default {
        props: ['user', 'followed'],

        data: function() {
            return {
                isFollowed: '',
            }
        },

        mounted() {
            this.isFollowed = this.isFollow ? true : false;
        },

        computed: {
            isFollow() {
                return this.followed;
            },
        },

        methods: {
            favorite(user) {
                axios.post('/follow/'+user)
                    .then(response => this.isFollowed = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(user) {
                axios.post('/unfollow/'+user)
                    .then(response => this.isFollowed = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>