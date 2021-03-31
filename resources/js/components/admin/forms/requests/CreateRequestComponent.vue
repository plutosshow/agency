<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Имя</label>
                    <input type="text" v-model="name" name="name" class="form-control" placeholder="Имя">
                </div>
                <div class="form-group col-md-6">
                    <label>Телефон</label>
                    <input type="tel" v-mask="'+7-(###)-###-##-##'" v-model="phone" name="phone" class="phone form-control" placeholder="+7-(000)-000-00-00">
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
import {TheMask} from 'vue-the-mask'

export default {
    data: function () {
        return {
            name: '',
            phone: '',
        }
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/forms/requests/createRequest', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'application/form-data'
                }
            }).then(function (response) {
                self.success = true
                self.refresh(self.success)
            }).catch(err => console.log(err));
        },
        takeData: function () {
            let data = {
                'name': this.name,
                'phone': this.phone
            }
            let formData = new FormData();
            for(let key in data) {
                formData.append(key, data[key]);
            }
            return formData;
        },
        refresh: function () {
            this.$emit('refresh')
        }
    },
    components: {
        TheMask
    }

}
</script>
