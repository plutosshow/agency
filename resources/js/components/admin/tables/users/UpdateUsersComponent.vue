<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post" v-for="item in items">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Фамилия</label>
                    <input type="text" v-model="item.surname" name="surname" class="form-control" placeholder="Фамилия">
                </div>
                <div class="form-group col-md-4">
                    <label>Имя</label>
                    <input type="text" v-model="item.name" name="name" class="form-control" placeholder="Имя">
                </div>
                <div class="form-group col-md-4">
                    <label>Отчество</label>
                    <input type="text" v-model="item.patronymic" name="patronymic" class="form-control" placeholder="Отчество">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Электоронная почта</label>
                    <input type="email" v-model="item.email" name="email" class="form-control" placeholder="user@example.com">
                </div>
                <div class="form-group col-md-4">
                    <label>Роль</label>
                    <select type="text" v-model="item.role_id" name="name" class="form-control" placeholder="Имя">
                        <option v-for="role in roles" :value="role.id" :selected="item.role_name==role.name ? 'selected' : ''">{{role.name}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Зарегистрирован</label>
                    <input type="text" disabled v-model="item.created_at" name="patronymic" class="form-control" placeholder="Отчество">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary form-group">Отправить запрос</button>
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
            roles: []
        }
    },
    mounted() {
        this.getAllRoles()
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/users/updateUser', takeData, {
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
