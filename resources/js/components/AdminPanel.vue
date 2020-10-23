<template>
<div>
    <button @click="openAddCategoriesForm">Довавить Категорию</button>
    <AddForm
        v-show="showAddModal"
        @close="closeAddCategoriesForm"
        @add="createCategory(addData)"
    />
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody v-for="category in categories">
        <tr>
            <th scope="row">{{ category.id }}</th>
            <td>{{ category.title }}</td>
            <td>{{ category.description }}</td>
            <td>
                <button v-on:click="deleteCategory(category.id)">Удалить</button>
                <button v-on:click="showEdit = true">Изменить</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import AddForm from './AddForm.vue';
export default {
    components: {
        AddForm,
    },
    data: function () {
        return {
            categories: [],
            showAddModal: false,
            showEditModal: false,
        }
    },

    mounted() {
        this.loadCategories();
    },

    methods: {
        loadCategories: function () {
            axios.get('/api/category')
                .then((response) => {
                    this.categories = response.data.data;
                })
                .catch(function (error) {
                    console.log(error)
                });
        },

        changeCategory: function (id, data){
            axios.put('/api/category/' + id, data)
                .then((response) => {
                    this.categories = response.data.data
                })
                .catch(function (error) {
                    console.log(error)
                });
        },

        deleteCategory: function (id){
            axios.delete('/api/category/'+id)
                .then((response) => {
                    this.categories = response.data.data
                })
                .catch(function (error) {
                    console.log(error)
                });
        },

        createCategory: function (params){
            console.log(params)
            axios.get('/api/category/create',{
                params: {
                    title: params.title,
                    description: params.description
                }
            })
                .then((response) => {
                    this.categories = response.data.data
                })
                .catch(function (error) {
                    console.log(error)
                });
        },

        openAddCategoriesForm: function (){
            this.showAddModal = true
        },

        closeAddCategoriesForm: function (){
            this.showAddModal = false
        }
    }
}
</script>

<style scoped>

</style>
