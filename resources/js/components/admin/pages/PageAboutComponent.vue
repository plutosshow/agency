<template>
    <div>
        <div class="card-header">
            <h5>Контент блок</h5>
        </div>
        <div class="card-body">
            <div class="row" v-for="item in items">
                <div class="col-md-4">
                    <img src="321321"/>
                </div>
                <div class="col-md-8">
                    <form method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" v-model="item.title" placeholder="Заголовок" type="text">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" v-model="item.sub_title" placeholder="Под заголовок" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" v-model="item.text" placeholder="Описание" type="text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="form-control btn btn-primary">Редактировать данные</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-header mt-3">
            <h5>Блок 2</h5>
        </div>
        <div class="card-body ">

        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            items: [],
        }
    },
    mounted() {
    },
    beforeMount() {
        this.showAll()
    },
    methods: {
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/admin/gallery/flats/getAllImages').then((response) => {
                this.items = response.data
            });
        },
    }
}
</script>
