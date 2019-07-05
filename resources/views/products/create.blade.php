@extends('layouts.main')
@section('contenido')
    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Crear producto
                             <a href="{{route('home')}}" class="btn bnt-success btn-sm float-right">inicio</a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="form">
                            <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-contrlol" name="description">
                            </div>
                            <div class="form-group">
                            <label for="">Precio</label>
                            <input type="number" class="form-contrlol" name="price">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
