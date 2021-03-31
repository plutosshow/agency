<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Фамилия</label>
                    <input type="text" v-model="surname" name="surname" class="form-control" required placeholder="Фамилия">
                </div>
                <div class="form-group col-md-4">
                    <label>Имя</label>
                    <input type="text" v-model="name" name="name" class="form-control" required placeholder="Имя">
                </div>
                <div class="form-group col-md-4">
                    <label>Отчество</label>
                    <input type="text" v-model="patronymic" name="patronymic" class="form-control" placeholder="Отчество">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Электоронная почта</label>
                    <input type="email" v-model="email" name="email" class="form-control" required placeholder="user@example.com">
                </div>
                <div class="form-group col-md-4">
                    <label>Роль</label>
                    <select type="text" v-model="role_name" name="name" class="form-control" placeholder="Имя">
                        <option v-for="role in roles" :value="role.name">{{role.name}}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Пароль</label>
                    <input v-model="password" id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group col-md-4">
                    <label>Подтверждение пароля</label>
                    <input v-model="password_confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
    data: function () {
        return {
            surname: "",
            name: "",
            patronymic: "",
            email: "",
            role_name: "",
            roles: [],
            password: '',
            password_confirmation: ''
        }
    },
    mounted() {
        this.getAllRoles()
    },
    methods: {
        getAllRoles: function () {
            axios.get('http://yuri.shcherba.loc/admin/tables/roles/getAllRoles').then((response) => {
                this.roles = response.data
            });
        },
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/users/createUser', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'application/form-data'
                }
            }).then(function (response) {
                self.refresh(self.success)
            }).catch(err => console.log(err));
        },
        takeData: function () {
            if(this.password == this.password_confirmation) {

                let data = {
                    'surname': this.surname,
                    'name': this.name,
                    'patronymic': this.patronymic,
                    'email': this.email,
                    'role_name': this.role_name,
                    'password': this.password
                }
                let formData = new FormData();
                for (let key in data) {
                    formData.append(key, data[key]);
                }
                return formData;
            }else{
                console.log("Пароли не совпадают")
            }
        },
        refresh: function () {
            this.$emit('refresh')
        }
    }
}
</script>
