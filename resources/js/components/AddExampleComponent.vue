<template>
    <form class="form-group" @submit.prevent="onSubmit">
        <input type="text" class="form-control" v-model="title">
        <button class="btn btn-primary form-control">Create</button>
    </form>
</template>

<script>
    export default {
        data() {
          return {
              title: ''
          }
        },
        methods: {
            onSubmit() {
                console.log(this.title)
                if(this.title.trim()){
                    const newTitle = {
                        id: Date.now(),
                        data: this.title,
                        completed: false
                    }
                    this.$emit('addTitle', newTitle)
                    this.title = ''
                }
            }
        }
    }
</script>
