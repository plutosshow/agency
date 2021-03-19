<template>
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <AddExampleComponent
                    @addTitle='addTitle'
                >
                </AddExampleComponent>
                    <AjaxComponent
                        v-bind:data = 'json'
                        @remove = 'remove'
                    ></AjaxComponent>
            </div>
        </div>
    </div>
</template>

<script>
import AddExampleComponent from  "./AddExampleComponent";
import AjaxComponent from "./AjaxComponent";
export default {
    data: function(){
        return  {
            message: '',
            json: [],
            path: ''
            }
    },
    mounted() {
        console.log('Component mounted.')
        fetch('http://yuri.shcherba.loc/form/filter').then(response=>response.json())
        .then(json => {
            this.json = json
            console.log(json)
        })

    },
    methods: {
        remove(id) {
            this.$emit('remove', id)
            this.json = this.json.filter(t => t.id != id)
        },
        addTitle(newTitle){
            this.json.push(newTitle)
        }
    },
    components: {
        AjaxComponent, AddExampleComponent
    }
}
</script>
