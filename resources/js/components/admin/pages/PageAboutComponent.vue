<template>
    <div>
        <div class="card-header">
            <h5>Контент блок</h5>
        </div>
        <div class="card-body" v-for="(item,key) in items">
            <div class="row">
                <div class="col-md-4">
                    <img v-if="!showPreview[key]" class="preview mb-3"
                         :src="'http://yuri.shcherba.loc/uploads/pages/' + item.image"/>
                    <img class="preview mb-3" v-bind:src="imagePreview[key]" v-show="showPreview[key]"/>
                </div>
                <div class="col-md-8">
                    <form @submit.prevent="submitForm(key)" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Заголовок</label>
                                    <input class="form-control" v-model="item.title" placeholder="Заголовок" required
                                           type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Подзаголовок</label>
                                    <input class="form-control" v-model="item.sub_title"
                                           placeholder="Подзаголовок"
                                           type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Описание</label>
                                    <textarea class="form-control" v-model="item.text" placeholder="Описание"
                                              rows="7" type="text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="colors">Цвет фона</label>
                                    <select class="form-control" v-model="item.color" id="colors">
                                        <option value="white">Белый</option>
                                        <option value="light-gray">Серый</option>
                                        <option value="primary">Фиолетовый</option>
                                        <option value="success">Зеленый</option>
                                        <option value="danger">Красный</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="position">Расположение</label>
                                    <select class="form-control" v-model="item.position" id="position">
                                        <option value="left">Левое</option>
                                        <option value="right">Правое</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input class="form-control custom-file-input" type="file" :id="'file' + item.id"
                                               ref="file" accept="image/*" v-on:change="handleFileUpload(key)"/>
                                        <label class="custom-file-label" :for="'file' + item.id">
                                            {{ item.image }}
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="form-control btn btn-primary">Редактировать данные
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-header mt-3">
            <div class="row">
                <div class="col-md-12">
                    <h5>Сотрудники</h5>
                </div>
            </div>

        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary">Добавить сотрудника</button>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-md-4">
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <img src=""/>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>ФИО</label>
                                       <input class="form-control" type="text" placeholder="ФИО">
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Должность</label>
                                       <input class="form-control" type="text" placeholder="Должность">
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Описание</label>
                                       <textarea class="form-control" type="text" placeholder="Описание" rows="5"></textarea>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            items: [],
            file: [],
            showPreview: [],
            imagePreview: []
        }
    },
    mounted() {
    },
    beforeMount() {
        this.showAll()
    },
    methods: {
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/admin/pages/about/getDefaultBlocks').then((response) => {
                this.items = response.data
            });
        },
        refresh: function () {
            this.showPreview = []
            this.imagePreview = []
            this.showAll()
        },
        submitForm: function (key) {
            let takeData = this.takeData(key)
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/pages/about/updateAbout', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    // 'content-type': 'application/form-data'
                    'Content-Type': 'multipart/form-data'

                }
            }).then(function (response) {
                console.log(response)
                self.refresh()
            }).catch(err => console.log(err));
        },
        takeData: function (key) {
            let data = this.items[key]
            let formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }
            formData.append('file', this.file[key]);
            formData.append('previous_file_name', this.items[key].image);
            return formData;
        },
        handleFileUpload(key) {
            console.log(key)
            console.log(this.$refs)
            this.file[key] = this.$refs.file[key].files[0];
            let reader = new FileReader();
            reader.addEventListener("load", function () {
                this.showPreview[key] = true;
                this.imagePreview[key] = reader.result;
            }.bind(this), false);
            if (this.file[key]) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file[key].name)) {
                    reader.readAsDataURL(this.file[key]);
                }
            }
        }
    }
}
</script>

<style scoped>
.preview {
    width: 100%;
}
</style>
