<template>
<div class="container">
<div class="row">
    <div class="col-lg-3">
        <h1 class="my-4">Lara Blog</h1>
        <div class="list-group" v-for="category in categories">
            <button class="list-group-item" v-on:click="applyCategory(category.id)">
                {{ category.title }}
            </button>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mb-4" v-for="post in posts">
                <div class="card h-100">
                    <a :href="'post/'+post.id">
                        <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a :href="'post/'+post.id">{{ post.title }}</a>
                        </h4>
                        <p class="card-text">{{ post.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            categories: [],
            posts: [],
        }
    },

    mounted() {
        this.loadCategories();
        this.loadPosts();
    },

    methods: {
        loadCategories: function (){
            axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data.data;
                })
                .catch(function (error) {
                    console.log(error)
                });
        },

        loadPosts: function (){
            axios.get('/api/posts')
                .then((response) => {
                    this.posts = response.data.data;
                })
                .catch(function (error) {
                    console.log(error)
                });
        },

        applyCategory: function (id) {
            axios.get('/api/postByCategory/' + id)
                .then((response) => {
                    this.posts = response.data.data
                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    }
}
</script>

<style scoped>

</style>
