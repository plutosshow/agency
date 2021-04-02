<template>
    <div class="card-body table-responsive-xl">
        <div v-if="!displayUpdate && !displayCreate">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <button @click="addNew" class="btn btn-primary mr-2 mt-1">Добавить новый объект</button>
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
                    <th scope="col">Регион</th>
                    <th scope="col">Город</th>
                    <th scope="col">Улица</th>
                    <th scope="col">Комнат</th>
                    <th scope="col">Этаж</th>
                    <th scope="col">Площадь</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Команды</th>
                </tr>
                </thead>
                <tbody v-for="(item,index) in searchList">
                <tr :class="{ done: checkedList[index] }">
                    <th scope="row"><input @change="checked(item.id , (index) )" :id="item.id" v-model="checkedNames"
                                           :value="item.id" type="checkbox"></th>
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.region }}</td>
                    <td>{{ item.city }}</td>
                    <td>{{ item.street }}</td>
                    <td>{{ item.rooms }}</td>
                    <td>{{ item.floor }}</td>
                    <td>{{ item.commonSquare }}</td>
                    <td>{{ format(item.price) }}</td>
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
            <update-flats-component
                :items="setFlat"
                :files="files"
                @refresh="refresh"
            ></update-flats-component>
        </div>
        <div v-if="displayCreate">
            <button @click="refresh" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <hr>
            <create-flats-component
                @refresh="refresh"
            ></create-flats-component>
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
            setFlat: [],
            files: [],
            search: ''
        }
    },
    mounted() {
    },
    beforeMount() {
        this.showAllFlats()
    },
    computed: {
        searchList: function () {
            if (this.search) {
                let search = this.search.toLowerCase()
                return this.items.filter(function (item) {
                    return item.city.toLowerCase().indexOf(search) > -1 ||
                        item.region.toLowerCase().indexOf(search) > -1 ||
                        item.street.toLowerCase().indexOf(search) > -1 ||
                        item.rooms == search ||
                        item.floor == search ||
                        item.commonSquare == search ||
                        String(item.price).indexOf(search) > -1
                })
            }
            return this.items
        },
    },
    methods: {
        showAllFlats: function () {
            axios.get('http://yuri.shcherba.loc/admin/tables/flats/showFlats').then((response) => {
                this.items = response.data
                this.items = this.items.allFlats
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
            this.search = ''
            this.showAllFlats()
        },
        deleteById: function (id) {
            axios.get('http://yuri.shcherba.loc/admin/tables/flats/destroyFlat/' + id).then((response) => {
                this.items = response.data
                this.items = this.items.allFlats
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
            axios.get('http://yuri.shcherba.loc/admin/tables/flats/getFlat/' + id).then((response) => {
                this.setFlat = response.data
            });
            axios.get('http://yuri.shcherba.loc/admin/tables/flats/getFlatImages/' + id).then((response) => {
                this.files = response.data
            });
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

.refresh:hover{
    color: #6f42c1;
}

.refresh:active {
    font-size: 15px;
}
</style>
