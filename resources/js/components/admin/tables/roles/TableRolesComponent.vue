<template>
    <div class="card-body table-responsive-xl">
        <div v-if="!displayUpdate && !displayCreate && !displayList">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <button @click="addNew" class="btn btn-primary mr-2 mt-1">Создать роль</button>
                            <button @click="deleteChecked" class="btn btn-danger mt-1">Удалить отмеченные</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-end">

                        <div class="col-md-7">
                            <input v-model="search" class="form-control form-control-sm mt-1"
                                   placeholder="Введите ваш запрос">
                        </div>
                        <div class="col-md-2">
                            <button @click="refresh" class="btn btn-info mt-1 refresh"><i class="fas fa-sync-alt"></i></button>
                        </div>
                    </div>
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
                <div v-if="paginatedData.length==0" class="hidden">
                    {{pageNumber=0}}
                </div>
                <tbody v-for="(item) in searchList">
                <tr :class="{ done: checkedList[item.id] }">
                    <th scope="row"><input @change="checked(item.id)" :id="item.id" v-model="checkedNames"
                                           :value="item.id" type="checkbox"></th>
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.guard_name }}</td>
                    <td>
                        <button @click="update(item.id)" type="button" class="btn btn-sm btn-warning">&#9998;
                        </button>
                        <button @click="showList(item.name)" type="button" class="btn btn-sm btn-info"><i
                            class="fas fa-clipboard-list"></i>
                        </button>
                        <button @click="destroy(item.id)" type="button" class="btn btn-sm btn-danger">&#10008;
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-md-2 mr-1">
                    <select v-model="size" class="form-control form-control-sm">
                        <option value="5">5 элементов</option>
                        <option value="10">10 элементов</option>
                        <option value="15">15 элементов</option>
                        <option value="25">25 элементов</option>
                        <option value="50">50 элементов</option>
                        <option value="100">100 элементов</option>
                        <option :value="items.length">Все элементы</option>
                    </select>
                </div>
            </div>
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
        <div v-if="displayList">
            <div class="row">
                <div class="col-md-2">
                    <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                </div>
            </div>
            <list-roles-component
                @refresh="refresh"
                :listBy="listBy"
            ></list-roles-component>
        </div>
        <div v-if="search=='' && !displayList && !displayCreate && !displayUpdate">
            <pagination-component
                :pageCount="pageCount"
                :pageNumber="pageNumber"
                @paginatedPage="paginatedPage"
            ></pagination-component>
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
            displayList: false,
            checkedNames: [],
            checkedList: [],
            setRole: [],
            listBy: '',
            search: '',
            pageNumber: 0,
            size: 25,
        }
    },
    mounted() {
    },
    beforeMount() {
        this.showAll()
    },
    computed: {
        searchList: function () {
            if (this.search) {
                let search = this.search.toLowerCase()
                return this.items.filter(function (item) {
                    return item.name.toLowerCase().indexOf(search) > -1 ||
                        item.guard_name.toLowerCase().indexOf(search) > -1
                })
            }
            return this.paginatedData
        },
        pageCount() {
            let l = this.items.length,
                s = this.size;
            return Math.ceil(l / s);
        },
        paginatedData() {
            const start = this.pageNumber * Number(this.size),
                end = Number(start) + Number(this.size);
            return this.items.slice(start, end);
        }
    },
    methods: {
        paginatedPage: function (currentPage) {
            this.pageNumber = currentPage
        },
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/admin/tables/roles/getAllRoles').then((response) => {
                this.items = response.data
            });
        },
        showList: function (role_name) {
            this.listBy = role_name
            this.displayList = true
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
            this.displayList = false
            this.checkAll = false
            this.checkedNames = []
            this.checkedList = []
            this.search = ''
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
        checked: function (id) {
            this.checkedList[id] = !this.checkedList[id]
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
            const self = this
            let start = self.pageNumber * Number(self.size)
            if (this.checkAll){
                this.paginatedData.forEach(function (item) {
                    self.checkedNames[start] = item.id
                    start++
                })
                this.checkedNames.forEach(function (item) {
                    if(self.checkedList[item] != true){self.checked(item)}
                })
            } else{
                this.checkedList.forEach(function (item, index) {
                    if(self.checkedList[index] != false){self.checked(index)}
                })
                self.checkedNames = []
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
.refresh:hover{
    color: #6f42c1;
}

.refresh:active {
    font-size: 15px;
}
</style>
