<template>
    <div class="row w-100">
        <div class="col-12 text-center">

            <div class="site-pagination" v-if="items.last_page > 1">
                <a v-for="n in items.last_page"
                   :class="items.current_page == n ? 'mr-1 active' : 'mr-1' "
                   :href="items.path + '?page=' + n"
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
        'items'
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
