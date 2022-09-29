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
                            <form action="{{route('users.store')}}" method="post">
                                <div class="form-row row">
                                    <div class="col-sm-3">
                                        <input value="{{old('name')}}" class="form-control" type="text" name="name"  placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-4">
                                        <input  class="form-control" value="{{old('email')}}" type="email" name="email"  placeholder="Email">
                                    </div>
                                    <div class="col-sm-3">
                                        <input  class="form-control"  type="password" name="password"  placeholder="Password">
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
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('users.destroy', $user)}}" method="post"> 
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

