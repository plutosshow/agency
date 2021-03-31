<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Кол-во комнат</label>
                    <input type="number" v-model="items.rooms" name="rooms" class="form-control" required placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Этаж</label>
                    <input type="number" v-model="items.floor" name="floor" class="form-control" required placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Цена</label>
                    <input type="number" v-model="items.price" name="price" class="form-control" placeholder="0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Жилая площадь</label>
                    <input type="number" v-model="items.livedSquare" name="livedSquare" class="form-control" required
                           placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Общая площадь</label>
                    <input type="number" v-model="items.commonSquare" name="commonSquare" class="form-control" placeholder="0"
                           required>
                </div>
                <div class="form-group col-md-4">
                    <label>Год постройки</label>
                    <input type="year" v-mask="'####'" v-model="items.year" name="commonSquare" class="form-control" placeholder="2020" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Регион</label>
                    <input v-model="items.region" id="region" class="form-control" name="region" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Округ/район</label>
                    <input v-model="items.district" id="district" class="form-control" name="district" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Город/Населенный пункт</label>
                    <input v-model="items.city" id="city" class="form-control" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Улица</label>
                    <input v-model="items.street" id="street" class="form-control" name="street" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Дом</label>
                    <input v-model="items.building" id="building" class="form-control" name="building" required>
                </div>
                <div class="form-group col-md-4">
                    <label>ZIP</label>
                    <input type="zip" v-mask="'#######'" v-model="items.zip" id="zip" class="form-control" name="zip" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Тип постройки</label>
                    <select v-model="items.type" id="type" type="" class="form-control" name="type" required>
                        <option value="Новостройка">Новостройка</option>
                        <option value="Вторичное">Вторичное</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Описание</label>
                    <textarea v-model="items.comments" class="form-control" id="comment" rows="3"></textarea>
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
        }
    },
    mounted() {
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/flats/updateFlat', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'application/form-data'
                }
            }).then(function (response) {
                self.refresh()
            }).catch(err => console.log(err));
        },
        takeData: function () {
            let data = this.items
            let formData = new FormData();
            for(let key in data) {
                formData.append(key, data[key]);
            }
            return formData;
        },
        refresh: function () {
            this.$emit('refresh')
        },
    },
}
</script>
