<template>
    <div class="row mb-5">
        <div class="col-md-6 col-lg-4 mb-4 col-sm-12 justify-content-center" v-for=
            "flat in flats.data">
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
    </div>
</template>

<script>
export default {
    props: [
        'flats'
    ],
    data: function () {
        return {
            // message: '',
            price: false,
        }
    },
    mounted() {
        console.log('Component mounted.')
        this.show()

    },
    methods: {
        show: function () {
            console.log(this.flats)
        },
        //     update: function () {
        //         axios.get('/form/filter').then((response) => {
        //             this.json = response.data
        //             console.log(this.json)
        //         });
        //         // fetch('http://yuri.shcherba.loc/form/filter').then(response=>response.json())
        //         //     .then(json => {
        //         //         this.json = json
        //         //         console.log(json)
        //         //     })
        //     },
        format: function (price) {
            if(price){
                let priceFormat = Intl.NumberFormat().format(Number(price.toFixed(2)))
                return priceFormat
            }
        }
    }
}
</script>
