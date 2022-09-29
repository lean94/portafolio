@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="header"></div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error )
                                    -{{$error}}  <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{route('projects.store')}}" method="post">
                            <div class="form-row row">
                                <div class="col-sm-3">
                                    <input value="{{old('name')}}" class="form-control" type="text" name="name"  placeholder="Nombre">
                                </div>
                                <div class="col-sm-4">
                                    <input  class="form-control" value="{{old('description')}}" type="text" name="description"  placeholder="Descripcion">
                                </div>
                                <div class="col-sm-3">
                                    <input  class="form-control"  type="text" name="url"  placeholder="Url del Proyecto">
                                </div>
                                <div class="col-sm-3">
                                    <input  class="form-control"  type="text" name="image_url"  placeholder="Url de la imagen ">
                                </div>
                                <div class="col-sm-3">
                                    <input  class="form-control"  type="text" name="repository_url"  placeholder="Url del repositorio">
                                </div>
                                <div class="col-sm-3">                                    
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Activo</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" > Enviar </button>
                                </div>
                            </div>
                            <div class="form-row"></div>
                            <div class="form-row"></div>
                        </form>
                    </div>
                    <div class="footer"></div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)

                        <tr>
                            <td>{{$project->name}}</td>
                            <td>{{$project->image_url}}</td>
                            <td>{{$project->descriptopn}}</td>
                            <td>
                                <form action="{{route('projects.destroy', $project)}}" method="post"> 
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit"  value="Eliminar" class="btn btn-sm btn-danger"  onclick=" return confirm('¿Desea Elimiar?') " >
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @endsection