<template>
    <div>
        <form @submit.prevent="submitForm" class="col-md-12" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Кол-во комнат</label>
                    <input type="number" v-model="items.rooms" name="rooms" class="form-control" required
                           placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Этаж</label>
                    <input type="number" v-model="items.floor" name="floor" class="form-control" required
                           placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Цена</label>
                    <input type="number" v-model="items.price" name="price" class="form-control" placeholder="0"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Жилая площадь</label>
                    <input type="number" step="0.01" v-model="items.livedSquare" name="livedSquare" class="form-control"
                           required
                           placeholder="0">
                </div>
                <div class="form-group col-md-4">
                    <label>Общая площадь</label>
                    <input type="number" step="0.01" v-model="items.commonSquare" name="commonSquare"
                           class="form-control"
                           placeholder="0"
                           required>
                </div>
                <div class="form-group col-md-4">
                    <label>Год постройки</label>
                    <input type="year" v-mask="'####'" v-model="items.year" name="commonSquare" class="form-control"
                           placeholder="2020" required>
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
                    <input type="zip" v-mask="'######'" v-model="items.zip" id="zip" class="form-control" name="zip"
                           required>
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
                <div class="form-group col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFile" ref="files" multiple
                               @change="handleFilesUpload">
                        <label class="custom-file-label" for="inputFile">Выбирите изображения</label>
                        <div class="custom-file-label" v-for="file in files">
                            <div v-if="files.length==1">
                                {{ file.image ? file.image : file.name }}
                            </div>
                            <div v-if="files.length!=1">
                                {{ files.length }} фото выбрано
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="files.length" class="row">
                <div class="form-group col-md-2" v-for="(file, key) in files">
                    <img class="preview" v-if="file.image" :src="'http://yuri.shcherba.loc/uploads/' + file.image"/>
                    <img v-else-if="!file.image" class="preview" v-bind:ref="'image'+parseInt( key )"/>
                    <button type="button" class="btn btn-remove"
                            v-if="file.image"
                            @click.prevent="removeFile(parseInt( key ))"
                            @click.preven="destroyImage(file.image_id, file.image)"
                    >
                        &#10008;
                    </button>
                    <button type="button" class="btn btn-remove"
                            v-else-if="!file.image"
                            @click.prevent="removeFile(parseInt( key ))"
                    >
                        &#10008;
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 text-center" v-if="files.length">
                    <button class="btn btn-danger form-control" @click.prevent="removeAllFiles">
                        Удалить все изображения
                    </button>
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
        'files'
    ],
    data: function () {
        return {
            success: false,
        }
    },
    mounted() {
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let formData = this.submitFiles(takeData)
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/tables/flats/updateFlat', formData, {
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
        removeAllFiles: function () {
            if (this.files) {
                this.files.forEach(item => this.destroyImage(item.image_id, item.image))
            }
            this.files.splice(0, this.files.length)

            this.getImagePreviews()
        },
        destroyImage: function (id, filename) {
            if (id) {
                axios.get('http://yuri.shcherba.loc/admin/tables/flats/destroyImage/' + id + '/' + filename)
                    .then(function (response) {
                        console.log('deleted:' + filename)
                    }).catch(err => console.log(err));
            }
        }
    },
}
</script>

<style scoped>
.preview {
    position: relative;
    width: 100%;
    border-radius: 2px;
    -webkit-box-shadow: 0px 2px 1px rgba(0, 0, 0, 0.4), 0px 3px 2px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 2px 1px rgba(0, 0, 0, 0.4), 0px 3px 2px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 2px 1px rgba(0, 0, 0, 0.4), 0px 3px 2px rgba(0, 0, 0, 0.2);
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
