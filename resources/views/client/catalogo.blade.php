@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mb-3">
                <h3>Categorías</h3>

                <div class="list-group mt-3">
                    @foreach($categorias as $item)
                    <a class="list-group-item list-group-item-action" href="{{ route('catalogo-categoria', $item->nombre) }}">{{ $item }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <form action="{{ route('catalogo-categoria', $categoria) }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="filter" value="{{ $filter }}" placeholder="Buscar por Nombre">
                            </div>
                            <div class="col-md-auto ">
                                <input class="btn btn-dark" type="submit" value="Buscar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    @foreach($productos as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <a class="text-dark" href="{{ route('ver-producto', $item->id) }}">
                                <div class="card-body">
                                    <img class="img-fluid" src="/img-product/{{$item->imagen}}" width="150">
                                    <h5>{{ $item->nombre }}</h5>

                                    <p class="card-text">
                                        <strong>Precio: $ </strong>{{ $item->precio }} <br>
                                        <strong>Unidades disponibles: </strong>{{ $item->stock }} <br>
                                        <strong>{{ $item->categoria }}</strong>
                                    </p>
                                </div>
                            </a>

                            <div class="card-footer">

                                <form action="{{ route('add-carrito', $item->id) }}" method="post">
                                    @csrf
                                    <div class="form-row align-items-center">
                                        <input type="number" name="producto_id" value="{{ $item->id }}" hidden>
                                        <div class="col-6">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <input name="cantidad" type="number" min="1" class="form-control" id="inlineFormInputGroup" value="1">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <input class="btn btn-success mb-2" type="submit" value="Agregar">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="d-flex justify-content-end mt-3">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection