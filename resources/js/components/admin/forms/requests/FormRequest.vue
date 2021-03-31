<template>
    <div class="card-body">
        <div v-if="!display && !createDisplay">
            <div class="row">
                <div class="col-md-11">
                    <button @click="createRequest" class="btn btn-primary">Создать новый запрос</button>
                    <button class="btn btn-danger" @click.prevent="deleteChecked"> Удалить отмеченные</button>

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
                    <th scope="col"><input @change="checkedAll" id="checkAll" v-model="checkAll"
                                           type="checkbox"></th>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Команды</th>
                </tr>
                </thead>
                <tbody v-for="(item,index) in items">
                <tr :class="{ done: checkedList[index] }">
                    <th scope="row"><input @change="checked(item.id , (index) )" :id="item.id" v-model="checkedNames"
                                           :value="item.id" type="checkbox"></th>
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.phone }}</td>
                    <td>
                        <button @click="getRequest(item.id)" type="button" class="btn btn-sm btn-warning">&#9998;
                        </button>
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
            checkedNames: [],
            checkedList: [],
            checkAll: false,
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
                this.deleteById(id)
        },
        getRequest: function (id) {
            this.display = true
            axios.get('http://yuri.shcherba.loc/admin/forms/requests/getRequest/' + id).then((response) => {
                this.request = response.data
            });
        },
        refresh: function () {
            this.checkAll = false
            this.checkedNames = []
            this.checkedList = []
            this.display = false
            this.createDisplay = false
            this.showAll()
            console.log()
        },
        createRequest: function () {
            this.createDisplay = true
        },
        checked: function (id, index) {
            this.checkedList[index] = !this.checkedList[index]
        },
        deleteById: function (id) {
            axios.get('http://yuri.shcherba.loc/admin/forms/requests/destroyRequest/' + id).then((response) => {
                this.items = response.data
            });
        },
        deleteChecked: function () {
            if (this.checkedNames.length) {
                const check = confirm('Вы уверенны, что хотите отметить данные заявки как выполненные?')
                if (check){
                    this.checkedNames.forEach(item => this.deleteById(item))
                }
                this.refresh()
            } else {
                alert('Не выбрано, не 1 элемента')
            }
        },
        checkedAll: function (){
            let all = []
            this.items.forEach(function (item, index){
                all[index] = item.id
            })
            if(this.checkAll)
                this.checkedNames = all
            else
                this.checkedNames = []
            for(let k = 0; k < all.length; k++){
                if (this.checkedList[k] != true || this.checkedNames.length == 0)
                    this.checked(all[k], k)
            }
        }
    }
}
</script>

<style scoped>
.done {
    background-color: #6f42c1;
    color: white;
}
</style>

