<template>
    <div>


        <!--            @FilterLivedSquare='FilterLivedSquare'-->
        <!--            @FilterCommonSquare='FilterCommonSquare'-->
        <!--            @FilterLocation='FilterLocation'-->
        <!--            @FilterRooms='FilterRooms'-->
        <!--            @FilterPrice_min='FilterPrice_min'-->
        <!--            @FilterPrice_max='FilterPrice_max'-->
        <div class="vue-filter">
            <filter-component
                :pageNumber="pageNumber"
                :items='paginatedData'
                @filterChanges="filterChanges"
                @submitChanges="submitChanges"
            ></filter-component>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-4 col-sm-12 justify-content-center"
                 v-if="items.length"
                 v-for="flat in paginatedData"
            >
                <a :href="'property/' + flat.id" class="prop-entry d-block">
                    <figure>
                        <img :src="flat.image" alt="Image" class="img-fluid">
                    </figure>
                    <div class="prop-text">
                        <div class="inner">
                            <span class="price rounded">₽ {{ format(flat.price) }}  </span>
                            <h3 class="title">{{ flat.region }}</h3>
                            <p class="location">{{ flat.city }}, {{ flat.street }}, {{ flat.zip }}</p>
                        </div>
                        <div class="prop-more-info">
                            <div class="inner d-flex">
                                <div class="col">
                                    <span>Площадь:</span>
                                    <strong>{{ flat.commonSquare }} м<sup>2</sup></strong>
                                </div>
                                <div class="col">
                                    <span>Этаж:</span>
                                    <strong>{{ flat.floor }}</strong>
                                </div>
                                <div class="col">
                                    <span>Тип:</span>
                                    <strong>{{ flat.type }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div  v-if="!items.length" class="col-md-12 col-sm-12 alert alert-primary justify-content-center">
                <div class="text-center">По вашему запросу квартиры не найдены!!!</div>
            </div>
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
            json: [],
            price: false,
            items: [],
            pageNumber: 0,
            size: 9
        }
    },
    mounted() {
        console.log('Component mounted.')
        //this.show()
        this.showAll()
    },
    computed: {
        pageCount(){
            let l = this.items.length,
                s = this.size;
            console.log(Math.ceil(l/s))
            return Math.ceil(l/s);
        },
        paginatedData(){
            const start = this.pageNumber * this.size,
                end = start + this.size;
            return   this.items.slice(start, end);
        }
    },
    methods: {
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/get/showAllFlats').then((response) => {
                this.json = response.data
                this.items = this.json.allFlats
            });
        },
        submitChanges: function () {
            this.showAll()
        },
        format: function (price) {
            if (price) {
                let priceFormat = Intl.NumberFormat().format(Number(price.toFixed(2)))
                return priceFormat
                this.filter = true
            }
        },
        paginatedPage: function (currentPage){
            this.pageNumber = currentPage
        },
        filterChanges: function (livedSquare, commonSquare, location, rooms, price_min, price_max) {
            if (livedSquare != '') {
                let filtredList = this.items.filter(t => t.livedSquare >= livedSquare);
                this.items = filtredList
            }
            if (commonSquare != '') {
                let filtredList = this.items.filter(t => t.commonSquare >= commonSquare);
                this.items = filtredList
            }
            if (location != '') {
                let filtredList = this.items.filter(t => t.city === location);
                this.items = filtredList
            }
            if (rooms != '') {
                let filtredList = this.items.filter(t => (rooms != 5) ? t.rooms == rooms : t.rooms >= rooms);
                this.items = filtredList
            }
            if (price_min != '') {
                let filtredList = this.items.filter(t => t.price >= price_min);
                this.items = filtredList
            }
            if (price_max != '') {
                let filtredList = this.items.filter(t => t.price <= price_max);
                this.items = filtredList
            }
            if(livedSquare == '' && commonSquare == '' && location == '' && rooms == ''
                && price_min == '' && price_max == ''){
                this.showAll()
            }
        },
    }
}
</script>
