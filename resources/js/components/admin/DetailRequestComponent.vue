<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" v-for="req in request" method="post">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Имя</label>
                    <input type="text" v-model="req.name" name="name" class="form-control" placeholder="Имя">
                </div>
                <div class="form-group col-md-6">
                    <label>Телефон</label>
                    <input type="text" v-model="req.phone" name="phone" class="form-control" placeholder="+7-(000)-000-00-00">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Создан</label>
                    <input type="text" disabled v-model="req.created_at" name="created_at" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Отредактирован</label>
                    <input type="text" disabled v-model="req.updated_at" name="updated_at" class="form-control">
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
        'request',
    ],
    data: function() {
      return {
          success: false
      }
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/forms/requests/updateRequest', takeData, {
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
            let data = this.request['0']
            let formData = new FormData();
            for(let key in data) {
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
