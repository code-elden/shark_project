
<div class="mb-3">
    <label for="categoria_id">Rol <b class="text-danger">*</b></label>
    <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">
        @foreach ($categorias as $item)
        @if($item->id == $user->categoria_id)
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