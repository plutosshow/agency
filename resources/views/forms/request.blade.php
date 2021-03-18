<div class="bg-white widget border rounded">
    <h3 class="h4 text-black widget-title mb-3">Связаться с агентом</h3>
    <form action="{{ route('form.request') }}" class="form-contact-agent" method="POST" id="answer">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name"  class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Имя">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" id="phone" class="phone form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Отправить запрос">
        </div>
    </form>
</div>
<div class="bg-white widget border rounded">
    <h3 class="h4 text-black widget-title mb-3">О агенте</h3>
    <p>Понравилось предложение, хотите купить или, наоборот, продать с помощью нашего агенства
        недвижимости. Оставляйте запрос и наш агент свяжеться с вами.</p>
</div>
