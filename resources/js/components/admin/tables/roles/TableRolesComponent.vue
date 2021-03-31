<template>
    <div class="card-body table-responsive-xl">
        <div v-if="!displayUpdate && !displayCreate">
            <div class="row">
                <div class="col-md-11">
                    <button @click="addNew" class="btn btn-primary">Добавить новую роль</button>
                    <button @click="deleteChecked" class="btn btn-danger">Удалить отмеченные</button>

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
                    <th scope="col">Роль</th>
                    <th scope="col">Защитник</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody v-for="(item,index) in items">
                <tr :class="{ done: checkedList[index] }">
                    <th scope="row"><input @change="checked(item.id , (index) )" :id="item.id" v-model="checkedNames"
                                           :value="item.id" type="checkbox"></th>
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.guard_name }}</td>
                    <td>
                        <button @click="update(item.id)" type="button" class="btn btn-sm btn-warning">&#9998;
                        </button>
                        <button @click="destroy(item.id)" type="button" class="btn btn-sm btn-danger">&#10008;
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="displayUpdate">
            <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <update-roles-component
                :items="setRole"
                @refresh="refresh"
            ></update-roles-component>
        </div>
        <div v-if="displayCreate">
            <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <create-roles-component
                @refresh="refresh"
            ></create-roles-component>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            items: [],
            displayUpdate: false,
            displayCreate: false,
            checkAll: false,
            checkedNames: [],
            checkedList: [],
            setRole: []
        }
    },
    mounted() {
        this.showAll()
    },
    methods: {
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/admin/tables/roles/getAllRoles').then((response) => {
                this.items = response.data
            });
        },
        format: function (price) {
            if (price) {
                let priceFormat = Intl.NumberFormat().format(Number(price.toFixed(2)))
                return priceFormat
                this.filter = true
            }
        },
        refresh: function () {
            this.displayUpdate = false
            this.displayCreate = false
            this.checkAll = false
            this.checkedNames = []
            this.checkedList = []
            this.showAll()
        },
        deleteById: function (id) {
            axios.get('http://yuri.shcherba.loc/admin/tables/roles/destroyRole/' + id).then((response) => {
                this.items = response.data
            });
        },
        destroy: function (id) {
            const check = confirm('Вы уверенны, что хотите дать этому объекту статус не активен?')
            if (check) {
                this.deleteById(id)
            }
        },
        checked: function (id, index) {
            this.checkedList[index] = !this.checkedList[index]
        },
        addNew: function () {
            this.displayCreate = true
        },
        update: function (id) {
            this.displayUpdate = true
            axios.get('http://yuri.shcherba.loc/admin/tables/roles/getRole/' + id).then((response) => {
                this.setRole = response.data
            });
        },
        deleteChecked: function () {
            if (this.checkedNames.length) {
                const check = confirm('Вы уверенны, что хотите удалить выбранные учетные записи?')
                if (check) {
                    this.checkedNames.forEach(item => this.deleteById(item))
                }
                this.refresh()
            } else {
                alert('Не выбрано, не 1 элемента')
            }
        },
        checkedAll: function () {
            let all = []
            this.items.forEach(function (item, index) {
                all[index] = item.id
            })
            if (this.checkAll)
                this.checkedNames = all
            else
                this.checkedNames = []
            for (let k = 0; k < all.length; k++) {
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
