<div class="mb-3">
    <label for="dni">DNI <b class="text-danger">*</b></label>
    <input class="form-control @error('dni') is-invalid @enderror" type="text" name="dni" value="{{ old('dni', $user->dni) }}">
    @error('dni')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="nombres">Nombres <b class="text-danger">*</b></label>
    <input class="form-control @error('nombres') is-invalid @enderror" type="text" name="nombres" value="{{ old('nombres', $user->nombres) }}">
    @error('nombres')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="apellidos">Apellidos <b class="text-danger">*</b></label>
    <input class="form-control @error('apellidos') is-invalid @enderror" type="text" name="apellidos" value="{{ old('apellidos', $user->apellidos) }}">
    @error('apellidos')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="direccion">Dirección <b class="text-danger">*</b></label>
    <input class="form-control @error('direccion') is-invalid @enderror" type="text" name="direccion" value="{{ old('direccion', $user->direccion) }}">
    @error('direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="telefono">Teléfono</label>
    <input class="form-control @error('telefono') is-invalid @enderror" type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}">
    @error('telefono')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="email">Email <b class="text-danger">*</b></label>
    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $user->email) }}">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="password">Password <b class="text-danger">*</b></label>
    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}">
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="rol_id">Rol <b class="text-danger">*</b></label>
    <select class="form-control @error('rol_id') is-invalid @enderror" name="rol_id">
        @foreach ($roles as $item)
        @if($item->id == $user->rol_id)
        <option value="{{ $item->id }}" selected> {{$item}}</option>
        @else
        <option value="{{ $item->id }}"> {{$item}}</option>
        @endif
        @endforeach
    </select>
    @error('rol_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>