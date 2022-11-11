<div class="mb-3">
    <label for="nombre">Nombre <b class="text-danger">*</b></label>
    <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
    @error('nombre')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="caracteristica">Característica </label>
    <textarea class="form-control @error('caracteristica') is-invalid @enderror" name="caracteristica" rows="5">{{ old('caracteristica', $producto->caracteristica) }}</textarea>
    @error('caracteristica')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="stock">Stock <b class="text-danger">*</b></label>
    <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" value="{{ old('stock', $producto->stock) }}">
    @error('stock')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="precio">Precio <b class="text-danger">*</b></label>
    <input class="form-control @error('precio') is-invalid @enderror" type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}">
    @error('precio')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="imagen">Imagen <b class="text-danger">*</b></label>
    <input class="form-control @error('imagen') is-invalid @enderror" type="file" name="imagen">
    @error('imagen')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


<div class="mb-3">
    <label for="categoria_id">Categoría <b class="text-danger">*</b></label>
    <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">
        @foreach ($categorias as $item)
        @if($item->id == $producto->categoria_id)
        <option value="{{ $item->id }}" selected> {{$item}}</option>
        @else
        <option value="{{ $item->id }}"> {{$item}}</option>
        @endif
        @endforeach
    </select>
    @error('categoria_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>