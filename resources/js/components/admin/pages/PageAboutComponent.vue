<template>
    <div>
        <div class="card-header">
            <h5>Контент блок</h5>
        </div>
        <div class="card-body">
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
