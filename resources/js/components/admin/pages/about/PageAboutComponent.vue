<template>
    <div>
        <div class="card-header">
            <h5>Контент блок</h5>
        </div>
        <div class="card-body" v-for="(item,key) in items">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <img class="preview mb-3" :ref="'prev'+parseInt( key )"
                         :src="'http://yuri.shcherba.loc/uploads/pages/' + item.image"/>
                    <img class="preview mb-3" v-bind:ref="'image'+parseInt( key )"/>
                </div>
                <div class="col-lg-9 col-md-8">
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
                    <button v-if="!createEmployee" @click="createEmployee=!createEmployee" class="btn btn-primary">
                        Добавить сотрудника
                    </button>
                    <button v-if="createEmployee" @click="createEmployee=!createEmployee" class="btn btn-danger">
                        Отмена
                    </button>
                </div>
            </div>
        </div>
        <div v-if="createEmployee">
            <create-employee-output
                @refresh="refresh"
                :employeesList="employeesList"
            ></create-employee-output>
        </div>
        <div v-if="!createEmployee">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" v-for="(emp, key) in employees">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button hidden :ref="'btn_cancel'+parseInt(emp.id)"
                                                    @click.prevent="cancelBtn(key, emp.id)"
                                                    class="btn btn-danger form-control">Отмена
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <img class="preview" :ref="'prev_emp'+parseInt( key )"
                                                 :src="'http://yuri.shcherba.loc/uploads/employees/' + emp.image">
                                            <img class="preview mb-3" v-bind:ref="'image_emp'+parseInt( key )"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>ФИО</label>
                                            <select disabled :ref="'emp_select'+parseInt(emp.id)" class="form-control"
                                                    v-model="emp.user_id">
                                                <option v-for="empItem in employeesList" :value="empItem.id">
                                                    {{
                                                        empItem.surname + ' ' + empItem.name + ' ' + empItem.patronymic
                                                    }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Должность</label>
                                            <input disabled :ref="'post_input'+parseInt(emp.id)" class="form-control"
                                                   v-model="emp.post" type="text"
                                                   placeholder="Должность">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea disabled :ref="'desc_area'+parseInt(emp.id)" class="form-control"
                                                      v-model="emp.desc" type="text"
                                                      placeholder="Описание" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" :ref="'cus_file' + emp.id" hidden>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input class="form-control custom-file-input" type="file" :id="emp.image"
                                                       ref="file_emp" accept="image/*" v-on:change="handleFileUploadEmployee(key)"/>
                                                <label class="custom-file-label" :for="'file' + emp.id">
                                                    Фото
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button :ref="'btn_red'+parseInt(emp.id)"
                                                    @click.prevent="updateEmployee(emp.id)"
                                                    class="btn btn-warning form-control">Редактировать
                                            </button>
                                            <button hidden :ref="'btn_submit'+parseInt(emp.id)"
                                                    @click.prevent="submitUpdateEmployee(key, emp.id)"
                                                    class="btn btn-primary form-control">Отправить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button :ref="'btn_delete'+parseInt(emp.id)"
                                                    @click.prevent="deleteEmployee(emp.id)"
                                                    class="btn btn-danger form-control">Удалить
                                            </button>
                                        </div>
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
            file_emp: [],
            imagePreview: [],
            createEmployee: false,
            employees: [],
            employeesList: []
        }
    },
    mounted() {
    },
    beforeMount() {
        this.showAll()
        this.getEmployees()
        this.showEmployees()
    },
    methods: {
        showAll: function () {
            axios.get('http://yuri.shcherba.loc/admin/pages/about/getDefaultBlocks').then((response) => {
                this.items = response.data
            });
        },
        refresh: function () {
            console.log("refresh")
            this.imagePreview = []
            this.createEmployee = false
            this.showAll()
            this.showEmployees()
        },
        submitForm: function (key) {
            let takeData = this.takeData(key)
            let self = this
            axios.post('http://yuri.shcherba.loc/admin/pages/about/updateAbout', takeData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function (response) {
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
            this.file[key] = this.$refs.file[key].files[0];
            let reader = new FileReader();
            console.log(111)
            reader.addEventListener("load", function () {
                this.$refs['image' + parseInt(key)][0].src = reader.result;
                this.$refs['prev' + parseInt(key)][0].hidden = true
            }.bind(this), false);
            if (this.file[key]) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file[key].name)) {
                    reader.readAsDataURL(this.file[key]);
                }
            }
        },
        handleFileUploadEmployee(key) {
            this.file_emp[key] = this.$refs.file_emp[key].files[0];
            let reader = new FileReader();
            console.log(this.$refs['image_emp' + parseInt(key)])
            reader.addEventListener("load", function () {
                this.$refs['image_emp' + parseInt(key)][0].src = reader.result;
                this.$refs['image_emp' + parseInt(key)][0].hidden = false;
                this.$refs['prev_emp' + parseInt(key)][0].hidden = true
            }.bind(this), false);
            if (this.file_emp[key]) {
                if (/\.(jpe?g|png|gif)$/i.test(this.file_emp[key].name)) {
                    reader.readAsDataURL(this.file_emp[key]);
                }
            }
        },
        showEmployees: function () {
            axios.get('http://yuri.shcherba.loc/admin/employees/showEmployees').then((response) => {
                this.employees = response.data
            });
        },
        getEmployees: function () {
            axios.get('http://yuri.shcherba.loc/admin/employees/getEmployees').then((response) => {
                this.employeesList = response.data
            });
        },
        updateEmployee: function (id) {
            this.$refs['emp_select' + parseInt(id)][0].disabled = !this.$refs['emp_select' + parseInt(id)][0].disabled
            this.$refs['post_input' + parseInt(id)][0].disabled = !this.$refs['post_input' + parseInt(id)][0].disabled
            this.$refs['desc_area' + parseInt(id)][0].disabled = !this.$refs['desc_area' + parseInt(id)][0].disabled
            this.$refs['cus_file' + parseInt(id)][0].hidden = !this.$refs['btn_submit' + parseInt(id)][0].hidden
            //Buttons hide
            this.$refs['btn_cancel' + parseInt(id)][0].hidden = !this.$refs['btn_cancel' + parseInt(id)][0].hidden
            this.$refs['btn_red' + parseInt(id)][0].hidden = !this.$refs['btn_red' + parseInt(id)][0].hidden
            this.$refs['btn_submit' + parseInt(id)][0].hidden = !this.$refs['btn_submit' + parseInt(id)][0].hidden
            this.$refs['btn_delete' + parseInt(id)][0].hidden = !this.$refs['btn_submit' + parseInt(id)][0].hidden
        },
        cancelBtn: function (key, id) {
            console.log("cancel")
            this.updateEmployee(id)
            this.$refs['prev_emp' + parseInt(key)][0].hidden = false
            this.$refs['image_emp' + parseInt(key)][0].hidden = true

        },
        deleteEmployee: function (id) {
            const check = confirm('Вы уверенны, что хотите удалить этого сотрудника со страницы "О нас"?')
            if (check)
                axios.get('http://yuri.shcherba.loc/admin/employees/destroyEmployee/' + id).then((response) => {
                    this.refresh()
                });
        },
        submitUpdateEmployee: function (key, id) {
            let data = this.employees[key]
            let self = this
            let formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }
            formData.append('file', this.file_emp[key]);
            axios.post('http://yuri.shcherba.loc/admin/employees/updateEmployee', formData, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function (response) {
                self.updateEmployee(id)
                self.refresh()
            }).catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>
.preview {
    width: 100%;
    border-radius: 5px;
    -webkit-box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.4), 0px 5px 3px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.4), 0px 5px 3px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.4), 0px 5px 3px rgba(0, 0, 0, 0.2);
}
</style>

