<template>
    <span>
        <a class="favorited" href="#" v-if="isFavorited" @click.prevent="unFavorite(movie)">
            <i  class="fa fa-heart"></i>
        </a>
        <a class="favorite" href="#" v-else @click.prevent="favorite(movie)">
            <i  class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['movie', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(movie) {
                axios.post('/favorite/'+movie)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(movie) {
                axios.post('/unfavorite/'+movie)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>