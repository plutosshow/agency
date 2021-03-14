<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Обновить {{id}}</div>
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
            this.startTimer()
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
            },
            stopTimer () {
                if (this.interval) {
                    window.clearInterval(this.interval)
                }
            },
            startTimer () {
                this.stopTimer()
                this.interval = window.setInterval(() => {
                    this.update()
                }, 5000)
            },
            // beforeUpdate: function(){
            //     axios.get('/get-json').then((responce)  => {
            //         console.log(responce.data)
            //         this.json = responce.data
            //         this.is_refresh = false
            //         this.id = 21;
            //     });
            // },
        }
    }
</script>
