<template>
    <div class="row w-100">
        <div class="col-12 text-center">
            <div class="site-pagination" v-if="flats.last_page > 1">
                <a v-for="n in flats.last_page"
                   :class="flats.current_page == n ? 'mr-1 active' : 'mr-1' "
                   :href="flats.path + '?page=' + n"
                   @click.prevent="onPaginate(n)">
                    {{ n }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'flats'
    ],
    mounted() {
        console.log('mounted pagination')
    },
    methods: {
        onPaginate: function (n) {
            this.$emit('onPaginate', n)
        }
    }
}
</script>
