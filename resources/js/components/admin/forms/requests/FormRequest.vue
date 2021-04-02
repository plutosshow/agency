<template>
    <div class="card-body table-responsive-md">
        <div v-if="!display && !createDisplay">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <button @click="addNew" class="btn btn-primary mr-2 mt-1">Создать запрос</button>
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
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Команды</th>
                </tr>
                </thead>
                <div v-if="paginatedData.length==0" class="hidden">
                    {{pageNumber=Number(pageCount)-1}}
                </div>
                <tbody v-for="(item,index) in searchList">
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
        <div v-if="search=='' && !display && !createDisplay">
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
            display: false,
            request: [],
            createDisplay: false,
            checkedNames: [],
            checkedList: [],
            checkAll: false,
            search: '',
            pageNumber: 0,
            size: 25,
        }
    },
    mounted() {
        this.showAll()
    },
    computed: {
        searchList: function () {
            if (this.search) {
                let search = this.search.toLowerCase()
                return this.items.filter(function (item) {
                    return item.name.toLowerCase().indexOf(search) > -1 ||
                        item.phone.toLowerCase().indexOf(search) > -1
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
            this.search = ''
            this.showAll()
        },
        addNew: function () {
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
.refresh:hover{
    color: #6f42c1;
}

.refresh:active {
    font-size: 15px;
}
</style>

