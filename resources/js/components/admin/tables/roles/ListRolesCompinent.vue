<template>
    <div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Список пользователей с ролью "<strong>{{ listBy }}</strong>"</h4>
            </div>
        </div>
        <div class="row">
            <table class="table table-white">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Эл. почта</th>
                </tr>
                </thead>
                <tbody v-for="(item,index) in items">
                <tr>
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.surname }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.patronymic}}</td>
                    <td>{{ item.email }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'listBy'
    ],
    data: function () {
        return {
            role: "",
            guard_name: 'web',
            items: []
        }
    },
    mounted() {
        this.getList()
    },
    methods: {
        getList: function () {
            const self = this
            axios.get('http://yuri.shcherba.loc/admin/tables/users/usersWithRole/' + this.listBy).then(function (response) {
                self.items = response.data
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
