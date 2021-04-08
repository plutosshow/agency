<template>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="submitForm" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ФИО</label>
                                        <select class="form-control" v-model="employee">
                                            <option v-for="emp in employeesList" :value="emp.id">
                                                {{ emp.surname + ' ' + emp.name + ' ' + emp.patronymic }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Должность</label>
                                        <input class="form-control" v-model="emp_post" type="text"
                                               placeholder="Должность">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Описание</label>
                                        <textarea class="form-control" v-model="emp_desc" type="text"
                                                  placeholder="Описание" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-8 col-md-7">
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="file"
                                                   ref="file" accept="image/*" v-on:change="handleFileUpload"/>
                                            <label class="custom-file-label" for="file">
                                               {{file.name ? file.name : 'Выбирите изображение'}}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5">
                                        <img class="preview mb-3" v-bind:src="imagePreview" v-show="showPreview"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary form-control">Добавить сотрудника</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'employeesList'
    ],
    data: function () {
        return {
            employee: '',
            emp_post: '',
            emp_desc: '',
            emp_image: '',
            file: [],
            showPreview: false,
            imagePreview: '',
        }
    },
    methods: {
        submitForm: function () {
            let takeData = this.takeData()
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/employees/createEmployee', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function (response) {
                console.log(response)
                self.refresh()
            }).catch(err => console.log(err));
        },
        takeData: function () {
            let data = {
                'user_id': this.employee,
                'post': this.emp_post,
                'desc': this.emp_desc,
                'image': this.emp_image
            }
            let formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }
            formData.append('file', this.file);
            return formData;
        },
        refresh: function () {
            this.$emit('refresh')
        },
        handleFileUpload() {
            this.file = this.$refs.file.files[0];
            let reader = new FileReader();
            reader.addEventListener("load", function () {
                this.showPreview = true;
                this.imagePreview = reader.result;
            }.bind(this), false);
            if (this.file) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file.name)) {
                    reader.readAsDataURL(this.file);
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
