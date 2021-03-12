<template>
    <div class="container">
        <div class="row justify-content-center">
            <button v-on:click="update" class="btn btn-outline-primary text mb-1" v-if="!is_refresh">Обновить {{id}} /</button>
            <span class="badge badge-primary mb-1" v-if="is_refresh"></span>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body" v-for="item in json">
                        {{item.title}} --- {{ item.name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return  {
                json: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            update: function (){
                this.is_refresh = true;
                axios.get('/get-json').then((responce)  => {
                    console.log(responce.data)
                    this.json = responce.data
                    this.is_refresh = false
                    this.id++
                });
            }
        }
    }
</script>
