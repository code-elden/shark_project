<div class="mb-3">
    <label for="user_id">Usuario <b class="text-danger">*</b></label>
    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
        @foreach ($users as $item)
        @if($item->id == $venta->user_id)
        <option value="{{ $item->id }}" selected> {{$item}}</option>
        @else
        <option value="{{ $item->id }}"> {{$item}}</option>
        @endif
        @endforeach
    </select>
    @error('user_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="fecha">Fecha <b class="text-danger">*</b></label>
    <input class="form-control @error('fecha') is-invalid @enderror" type="date" name="fecha" value="{{ old('fecha', $venta->fecha) }}">
    @error('fecha')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="total">total <b class="text-danger">*</b></label>
    <input class="form-control @error('total') is-invalid @enderror" type="text" name="total" value="{{ old('total', $venta->total) }}">
    @error('total')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>