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
                    <input type="number" v-model="livedSquare" name="livedSquare" class="form-control" required
                           placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Общая площадь</label>
                    <input type="number" v-model="commonSquare" name="commonSquare" class="form-control" placeholder="0"
                           required>
                </div>
                <div class="form-group col-md-4">
                    <label>Год постройки</label>
                    <input type="year" v-mask="'####'" v-model="year" name="commonSquare" class="form-control"
                           placeholder="2020" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Регион</label>
                    <input v-model="region" id="region" class="form-control" name="region" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Округ/район</label>
                    <input v-model="district" id="district" class="form-control" name="district" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Город/Населенный пункт</label>
                    <input v-model="city" id="city" class="form-control" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Улица</label>
                    <input v-model="street" id="street" class="form-control" name="street" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Дом</label>
                    <input v-model="building" id="building" class="form-control" name="building" required>
                </div>
                <div class="form-group col-md-4">
                    <label>ZIP</label>
                    <input type="zip" v-mask="'#######'" v-model="zip" id="zip" class="form-control" name="zip"
                           required>
                </div>
                <div class="form-group col-md-4">
                    <label>Тип постройки</label>
                    <select v-model="type" id="type" type="" class="form-control" name="type" required>
                        <option value="Новостройка">Новостройка</option>
                        <option value="Вторичное">Вторичное</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Описание</label>
                    <textarea v-model="comment" class="form-control" id="comment" rows="3"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFile" ref="files" multiple
                               @change="handleFilesUpload">
                        <label class="custom-file-label" for="inputFile">Выбирите изображения</label>
                        <div class="custom-file-label" v-for="file in files">
                            <div v-if="files.length==1">
                                {{ file.name }}
                            </div>
                            <div v-if="files.length!=1">
                                {{ files.length }} фото выбрано
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="(file, key) in files" class="form-group col-md-1 col-sm-4">
                    <img class="preview" v-bind:ref="'image'+parseInt( key )"/>
                    <button type="button" class="btn btn-remove" @click.prevent="removeFile(parseInt( key ))">&#10008;</button>
                </div>
                <div class="form-group col-md-12 text-center" v-if="files.length">
                    <button class="btn btn-danger form-control" @click="removeAllFiles">Удалить все изображения</button>
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
            rooms: "",
            floor: "",
            price: "",
            livedSquare: "",
            commonSquare: "",
            year: "",
            type: '',
            location: '',
            comment: '',
            //TODO
            region: '',
            district: '',
            city: '',
            street: '',
            building: '',
            zip: '',
            files: []
        }
    },
    mounted() {
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let formData = this.submitFiles(takeData)
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/flats/createFlat', formData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'multiple/form-data'
                }
            }).then(function (response) {
                self.refresh(self.success)
            }).catch(err => console.log(err));
            // if (this.files) {
            //     this.submitFiles()
            // }
        },
        takeData: function () {
            let data = {
                rooms: this.rooms,
                floor: this.floor,
                price: this.price,
                livedSquare: this.livedSquare,
                commonSquare: this.commonSquare,
                year: this.year,
                type: this.type,
                comments: this.comment,
                //TODO
                region: this.region,
                district: this.district,
                city: this.city,
                street: this.street,
                building: this.building,
                zip: this.zip,
            }
            let formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }
            return formData;
        },
        refresh: function () {
            this.$emit('refresh')
        },
        addFiles() {
            this.$refs.files.click();
        },
        submitFiles(formData) {
            for (var i = 0; i < this.files.length; i++) {
                let file = this.files[i];
                formData.append('files[' + i + ']', file);
            }
            return formData
        },
        handleFilesUpload() {
            let uploadedFiles = this.$refs.files.files;
            for (var i = 0; i < uploadedFiles.length; i++) {
                this.files.push(uploadedFiles[i]);
            }
            this.getImagePreviews()
        },
        removeFile(key) {
            this.files.splice(key, 1)
            this.getImagePreviews()
        },
        getImagePreviews() {
            for (let i = 0; i < this.files.length; i++) {

                if (/\.(jpe?g|png|gif)$/i.test(this.files[i].name)) {

                    let reader = new FileReader();
                    reader.addEventListener("load", function () {
                        this.$refs['image' + parseInt(i)][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL(this.files[i]);
                }
            }
        },
        removeAllFiles: function() {
            this.files = []
            this.getImagePreviews()
        },
    },
    components: {
        TheMask
    }
}
</script>

<style scoped>
.preview {
    position: relative;
    width: 100%;
    border-radius: 2px;
    -webkit-box-shadow: 0px 2px 1px rgba(0,0,0,0.4), 0px 3px 2px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 1px rgba(0,0,0,0.4), 0px 3px 2px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 1px rgba(0,0,0,0.4), 0px 3px 2px rgba(0,0,0,0.2);
}
.btn-remove {
    position: absolute;
    top: -10px;
    right: 2%;
    color: red;
    font-size: 15px;
    z-index: 2;
}

.btn-remove:hover {
    color: DarkRed;
    z-index: 2;
}
</style>
