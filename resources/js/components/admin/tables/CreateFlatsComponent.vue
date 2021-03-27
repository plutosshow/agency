<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Кол-во комнат</label>
                    <input type="number" v-model="rooms" name="rooms" class="form-control" required placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Этаж</label>
                    <input type="number" v-model="floor" name="floor" class="form-control" required placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Цена</label>
                    <input type="number" v-model="price" name="price" class="form-control" placeholder="0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Жилая площадь</label>
                    <input type="number" v-model="livedSquare" name="livedSquare" class="form-control" required placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Общая площадь</label>
                    <input type="number" v-model="commonSquare" name="commonSquare" class="form-control" placeholder="0" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Год постройки</label>
                    <input type="year" v-model="year" name="commonSquare" class="form-control" placeholder="0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Тип постройки</label>
                    <select v-model="type" id="type" type="" class="form-control" name="type" required>
                        <option value="Новостройка">Новостройка</option>
                        <option value="Вторичное">Вторичное</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label>Адрес</label>
                    <input v-model="location" id="location" class="form-control" name="location" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Описание</label>
                    <textarea v-model="comment" class="form-control" id="comment" rows="3"></textarea>
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
            rooms: "",
            floor: "",
            price: "",
            livedSquare: "",
            commonSquare: "",
            year: "",
            type: '',
            location: '',
            comment: ''
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
                console.log(data)
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
