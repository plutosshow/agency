<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post" v-for="item in items">
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>Роль</label>
                    <input type="text" v-model="item.name" name="role" class="form-control" required placeholder="writer">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>Имя защитника</label>
                    <input   type="text" v-model="item.guard_name" name="role" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>Создано</label>
                    <input disabled type="text" v-model="item.created_at" name="role" class="form-control" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>Отредактировано</label>
                    <input disabled type="text" v-model="item.updated_at" name="role" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary form-control">Отправить запрос</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: [
        'items',
    ],
    data: function() {
        return {
            success: false,
        }
    },
    mounted() {
        this.getAllRoles()
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/roles/updateRole', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'application/form-data'
                }
            }).then(function (response) {
                self.refresh()
            }).catch(err => console.log(err));
        },
        takeData: function () {
            let data = this.items['0']
            let formData = new FormData();
            for(let key in data) {
                formData.append(key, data[key]);
            }
            return formData;
        },
        refresh: function () {
            this.$emit('refresh')
        },
        getAllRoles: function () {
            axios.get('http://yuri.shcherba.loc/admin/tables/roles/getAllRoles').then((response) => {
                this.roles = response.data
            });
        }
    },
}
</script>
