<template>
    <div class="row w-100">
        <div class="col-12 text-center">
            <div class="site-pagination" v-if="pageCount > 1">
                <a v-for="n in pageCount"
                   :class="pageNumber + 1 == n ? 'mr-1 active' : 'mr-1' "
                   @click.prevent="paginatedPage(n-1)">
                    {{ n }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'pageCount',
        'pageNumber',
    ],
    mounted() {
    },
    methods: {
        paginatedPage: function (n) {
            this.$emit('paginatedPage', n)
        }
    }
}
</script>

<style scoped>
    a {
        cursor: pointer
    }
</style>
