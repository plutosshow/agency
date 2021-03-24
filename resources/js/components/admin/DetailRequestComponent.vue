<template>
    <form class="col-md-12">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name"  class="form-control @error('name') is-invalid"  value="" placeholder="Имя">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone" class="phone form-control @error('phone') is-invalid"  value="" placeholder="+7-(000)-000-00-00">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Отправить запрос">
            </div>
    </form>
</template>

<script>
export default {

}
</script>
