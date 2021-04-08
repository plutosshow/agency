<template>
    <div class="card-body table-responsive-xl">
        <div v-if="!displayCreate">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <button @click="changeMain" class="btn btn-primary mt-1">Выводить на главной</button>
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
                            <button @click="refresh" class="btn btn-info mt-1 refresh"><i class="fas fa-sync-alt"></i>
                            </button>
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
                    <th scope="col">Изображение</th>
                    <th scope="col">Квартира</th>
                    <th scope="col">На главной</th>
                    <th scope="colgroup">Удаление</th>


                </tr>
                </thead>
                <div v-if="paginatedData.length==0" class="hidden">
                    {{pageNumber=0}}
                </div>
                <tbody v-for="(item) in searchList">
                <tr :class="{ done: checkedList[item.id] }">
                    <th scope="row"><input @change="checked(item.id , (item.id) )" :id="item.id" v-model="checkedNames"
                                           :value="item.id" type="checkbox"></th>
                    <td>{{ item.id }}</td>
                    <td><img class="preview" :src="'http://yuri.shcherba.loc/uploads/' + item.image"/></td>
                    <td>{{ item.flat }}</td>
                    <td>
                        <strong @click="changeStatusById(item.id, item.show_on_main)" class="pointer">{{item.show_on_main == 1 ? "Да" : "Нет"}}</strong>
                    </td>
                    <td>
                        <button @click="destroy(item.id, item.image)" type="button" class="btn btn-sm btn-danger">&#10008;
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
        <div v-if="displayCreate">
            <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <create-flats-component
                @refresh="refresh"
            ></create-flats-component>
        </div>
        <div v-if="search=='' && !displayCreate">
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
            displayCreate: false,
            checkAll: false,
            checkedNames: [],
            checkedList: [],
            setFlat: [],
            files: [],
            search: '',
            pageNumber: 0,
            size: 25,
            checkedStatus: [],

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
                    return String(item.id).indexOf(search) > -1 ||
                        String(item.flat).indexOf(search) > -1
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
            axios.get('http://yuri.shcherba.loc/admin/gallery/flats/getAllImages').then((response) => {
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
            this.checkAll = false
            this.checkedNames = []
            this.checkedList = []
            this.search = ''
            this.showAll()
        },
        deleteById: function (id, filename) {
            axios.get('http://yuri.shcherba.loc/admin/tables/flats/destroyImage/' + id + '/' + filename).then((response) => {
                // this.items = response.data
                // this.items = this.items.allFlats
                this.refresh()
            });
        },
        destroy: function (id) {
            const check = confirm('Вы уверенны, что хотите удалить эту фотографию?')
            if (check) {
                this.deleteById(id)
            }
        },
        checked: function (id) {
            this.checkedList[id] = !this.checkedList[id]
        },
        deleteChecked: function () {
            if (this.checkedNames.length) {
                const check = confirm('Вы уверенны, что хотите сделать неактивными выбранные объекты?')
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
        },
        changeStatusById: function (id, show_on_main) {
            console.log(id)
            let status = show_on_main
            if(!this.checkedNames.length){
                status = show_on_main == 0 ? 1 : 0
            } else {
                status = 1;
            }
            axios.get('http://yuri.shcherba.loc/admin/gallery/flats/changeStatus/' + id + '/' + status).then((response) => {
                this.refresh()
            });

        },
        changeMain: function (id) {
            if (this.checkedNames.length) {
                const check = confirm('Вы уверенны, что хотите вывести данные объекты на главной?')
                if (check) {
                    this.checkedNames.forEach(item => this.changeStatusById(item))
                }
                this.refresh()
            } else {
                alert('Не выбрано, не 1 элемента')
            }
        },
    }
}
</script>

<style scoped>
.done {
    background-color: #6f42c1;
    color: white;
}

.refresh:hover {
    color: #6f42c1;
}

.refresh:active {
    font-size: 15px;
}

.preview {
    position: relative;
    width: 150px;
    border-radius: 2px;
    -webkit-box-shadow: 0px 2px 1px rgba(0,0,0,0.4), 0px 3px 2px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 1px rgba(0,0,0,0.4), 0px 3px 2px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 1px rgba(0,0,0,0.4), 0px 3px 2px rgba(0,0,0,0.2);
}

.pointer {
    cursor: pointer;
}
</style>
