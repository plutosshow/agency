<template>
    <div class="card-body">
        <div class="alert alert-success col-md-12" v-if="updateSuccess">
            Данные успешно обновленны
        </div>
        <div v-if="!display && !createDisplay">
            <div class="row">
                <div class="col-md-11">
                    <button @click="createRequest" class="btn btn-primary">Создать новый запрос</button>
                </div>
                <div class="col-md-1">
                    <button @click='refresh' class="btn"><i class="fas fa-sync-alt"></i></button>
                </div>
            </div>
            <div class="row">
                <hr class="cm-hr">
            </div>
            <table class="table table-white">
                <thead>
                <tr>
                    <th scope="col"><input id="checkAll" type="checkbox"></th>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Команды</th>
                </tr>
                </thead>
                <tbody v-for="(item,index) in items">
                <tr>
                    <th id="item.id" scope="row"><input type="checkbox"></th>
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.phone }}</td>
                    <td>
                        <button @click="getRequest(item.id)" type="button" class="btn btn-sm btn-warning">&#9998;</button>
                        <button @click="destroyRequest(item.id)" type="button" class="btn btn-sm btn-danger">&#10008;
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="display">
            <button @click='refresh' class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <detail-request
                :request="request"
                @refresh="refresh"
            ></detail-request>
        </div>
        <div v-if="createDisplay">
            <button @click='refresh' class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <create-request
                @refresh="refresh"
            ></create-request>
        </div>
    </div>
</template>
<script>
export default {

    data: function () {
        return {
            items: [],
            display: false,
            request: [],
            createDisplay: false,
            updateSuccess: false
        }
    },
    mounted() {
        this.showAll()
    },
    methods: {
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/admin/forms/requests/getAll').then((response) => {
                this.items = response.data
            });
        },
        destroyRequest: function (id) {
            const check = confirm('Вы уверенны, что хотите отметить данный запрос как выполненный?')
            if (check)
                axios.get('http://yuri.shcherba.loc/admin/forms/requests/destroyRequest/' + id).then((response) => {
                    this.items = response.data
                });
        },
        getRequest: function (id) {
            this.display = true
            axios.get('http://yuri.shcherba.loc/admin/forms/requests/getRequest/' + id).then((response) => {
                this.request = response.data
                this.updateSuccess = false
            });
        },
        refresh: function () {
                this.display = false
                this.createDisplay = false
                this.showAll()
        },
        createRequest: function () {
            this.createDisplay = true
            console.log( this.createDisplay)
        }
    }
}
</script>
