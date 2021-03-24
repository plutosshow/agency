<template>
    <table class="table table-white">
        <thead>
        <tr>
            <th scope="col"><input id="checkAll" type="checkbox"></th>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Команды</th>
        </tr>
        </thead>
        <tbody v-for="(item,index) in items">
        <tr>
            <th id="item.id" scope="row"><input type="checkbox"></th>
            <td>{{index+1}}</td>
            <td>{{item.name}}</td>
            <td>{{item.phone}}</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning">&#9998;</button>
                <button @click="destroyRequest(item.id)" type="button" class="btn btn-sm btn-danger">&#10008;</button>
            </td>
        </tr>
        </tbody>
    </table>
</template>
<script>
    export default {

        data: function(){
            return {
                items: [],
            }
        },
        mounted() {
          this.showAll()
        },
        methods: {
            showAll: function () {
                axios.get('http://yuri.shcherba.loc/admin/forms/requests/getAll').then((response) => {
                    this.items = response.data
                });
            },
            destroyRequest: function (id) {
                const check = confirm('Вы уверенны, что хотите отметить данный запрос как выполненный?')
                if(check)
                axios.get('http://yuri.shcherba.loc/admin/forms/requests/destroyRequest/' + id).then((response) => {
                    this.items = response.data
                });
            }
        }
    }
</script>
