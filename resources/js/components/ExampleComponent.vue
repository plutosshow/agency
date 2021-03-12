<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body" v-for="message in exdata">
                        {{message}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:  [
            "exdata"
        ],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
