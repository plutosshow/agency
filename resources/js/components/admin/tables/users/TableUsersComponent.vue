<template>
    <div class="card-body table-responsive-xl">
        <div v-if="!displayUpdate && !displayCreate">
            <div class="row">
                <div class="col-md-11">
                    <button @click="addNewUser" class="btn btn-primary">Добавить пользователя</button>
                    <button @click="deleteChecked" class="btn btn-danger" >Удалить отмеченные</button>

                </div>
                <div class="col-md-1">
                    <button @click="refresh" class="btn"><i class="fas fa-sync-alt"></i></button>
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
                    <th scope="col">Фамилия</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Эл. почта</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Команды</th>
                </tr>
                </thead>
                <tbody v-for="(item,index) in items">
                <tr :class="{ done: checkedList[index] }">
                    <th scope="row"><input @change="checked(item.id , (index) )" :id="item.id" v-model="checkedNames"
                                           :value="item.id" type="checkbox"></th>
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.surname }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.patronymic}}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.role_name }}</td>
                    <td>
                        <button @click="updateUser(item.id)" type="button" class="btn btn-sm btn-warning">&#9998;
                        </button>
                        <button @click="destroyUser(item.id)" type="button" class="btn btn-sm btn-danger">&#10008;
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="displayUpdate">
            <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <update-users-component
                :items="setUser"
                @refresh="refresh"
            ></update-users-component>
        </div>
        <div v-if="displayCreate">
            <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <create-users-component
                @refresh="refresh"
            ></create-users-component>
        </div>
    </div>
</template>

<script>
import CreateUsersComponent from "./CreateUsersComponent";
export default {
    components: {CreateUsersComponent},
    data: function () {
        return {
            items: [],
            displayUpdate: false,
            displayCreate: false,
            checkAll: false,
            checkedNames: [],
            checkedList: [],
            destroylist: [],
            setUser: []
        }
    },
    mounted() {
        this.showAllUsers()
    },
    methods: {
        showAllUsers: function () {
            axios.get('http://yuri.shcherba.loc/admin/tables/users/getAllUsers').then((response) => {
                this.items = response.data
            });
        },
        refresh: function () {
            this.displayUpdate = false
            this.displayCreate = false
            this.checkAll = false
            this.checkedNames = []
            this.checkedList = []
            this.destroylist = []
            this.showAllUsers()
        },
        deleteById: function (id) {
            axios.get('http://yuri.shcherba.loc/admin/tables/users/destroyUser/' + id).then((response) => {
                this.items = response.data
            });
        },
        destroyUser: function (id) {
            const check = confirm('Вы уверенны, что хотите удалить учетную записась данного пользователя?')
            if (check)
                this.deleteById(id)
        },
        checked: function (id, index) {
            this.checkedList[index] = !this.checkedList[index]
        },
        addNewUser: function () {
            this.displayCreate = true
        },
        updateUser: function (id) {
            this.displayUpdate = true
            axios.get('http://yuri.shcherba.loc/admin/tables/users/getUser/' + id).then((response) => {
                this.setUser = response.data
            });
        },
        deleteChecked: function () {
            if (this.checkedNames.length) {
                const check = confirm('Вы уверенны, что хотите удалить выбранные учетные записи?')
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
