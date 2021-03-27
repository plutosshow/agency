<template>
    <div class="py-5">
        <div class="container">
            <form class="row mb-5" v-if="pageNumber==0">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <input @keyup="filterChanges" v-model="livedSquare" name="livedSquare" id="livedSquare" class="form-control d-block rounded-0" type="number" placeholder="Жилая площадь от">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <input @keyup="filterChanges" v-model="commonSquare" name="commonSquare" id="commonSquare" class="form-control d-block rounded-0" type="number" placeholder="Общая площадь от">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select @change="filterChanges" v-model="location" name="location" id="location" class="select-clear form-control d-block rounded-0">
                            <option disabled selected value="">Город</option>
                            <option v-for="item in items">{{item.city}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select @change="filterChanges" v-model="rooms" name="rooms" id="rooms" class="select-clear form-control d-block rounded-0">
                            <option disabled selected value="">Количество комнат</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5+</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="mb-4">
                        <label>Цена от</label>
                        <input @keyup="filterChanges" v-model="price_min" type="number" class="form-control" name="Price_min" placeholder="0 руб">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <label>Цена до</label>
                    <input @keyup="filterChanges" v-model="price_max" type="number" class="form-control" name="Price_max" placeholder="0 руб">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <label>Поиск по вашему желанию</label>
                    <input @click="submitChanges" id="filter-btn" type="button" class="btn btn-primary btn-block form-control-same-height rounded-0" value="Сбросить фильтры поиска">
                </div>

            </form>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <span class="icon mr-3 flaticon-house"></span>
                        <div class="text">
                            <h2 class="mt-0">Большое количество предложений</h2>
                            <p>Недвижимость от бюджетной до элитной.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <span class="icon mr-3 flaticon-location"></span>
                        <div class="text">
                            <h2 class="mt-0">Расположение недвижимости</h2>
                            <p>Выбери город, в котором ищешь недвижимость</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'items',
            'pageNumber'
        ],
        data: function () {
            return {
                location: "",
                rooms: "",
                price_min: "",
                price_max: "",
                livedSquare: "",
                commonSquare: "",
            }
        },
        mounted() {
        },
        methods: {
            filterChanges () {
                this.$emit('filterChanges', this.livedSquare, this.commonSquare,
                    this.location, this.rooms, this.price_min, this.price_max)
            },
            submitChanges () {
                event.preventDefault();
                this.rooms = ''
                this.commonSquare = ''
                this.livedSquare = ''
                this.location = ''
                this.price_max = ''
                this.price_min = ''
                this.$emit('submitChanges')
            }
        }
    }
</script>
