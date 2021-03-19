<template>
    <div class="container">
        <div class="row justify-content-center">
                    <div class="card-bod alert-success col-md-8" v-for="item in data">
                        <div v-bind:class="{done: item.completed}">
                            <ul class="list-group align-items-center ">
                                <li class="list-group-item">
                                    <input type="checkbox" v-on:change="item.completed=!item.completed">
                                    {{ item.id }}. {{ item.data }}, {{ item.name }}
                                    <button class='alert-danger' v-on:click="remove(item.id)">&times;</button>
                                </li>

                            </ul>
                        </div>
                    </div>
            </div>
        </div>
</template>

<script>
    export default {
        props:  ['data'],
        mounted() {
            console.log('Component mounted.')
            // this.startTimer()
        },
        methods: {
            remove(id) {
                this.$emit('remove', id)
            },
        },
    }
</script>

<style scoped>
    .done {
        text-decoration: line-through;
    }
</style>
