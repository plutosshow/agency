<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post">
            <div class="row">
                <div class="form-group offset-md-3 col-md-6 col-sm-12">
                    <label>Роль</label>
                    <input type="text" v-model="role" name="role" class="form-control" required placeholder="writer">
                </div>
            </div>
            <div class="row">
                <div class="form-group offset-md-3 col-md-6 col-sm-12">
                    <label>Имя защитника</label>
                    <input disabled type="text" v-model="guard_name" name="role" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group offset-md-3 col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary form-control">Отправить запрос</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            role: "",
            guard_name: 'web'
        }
    },
    mounted() {
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/roles/createRole', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'application/form-data'
                }
            }).then(function (response) {
                self.refresh(self.success)
            }).catch(err => console.log(err));
        },
        takeData: function () {
            let data = {
                'role': this.role,
                'guard_name': this.guard_name
            }
            let formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }
            return formData;
        },
        refresh: function () {
            this.$emit('refresh')
        }
    }
}
</script>
