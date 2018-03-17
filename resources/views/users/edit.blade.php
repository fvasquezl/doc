@extends ('layouts.app')

@section ('content')
    <h1>Editar usuarios</h1>
    <form action="{{route('usuarios.update',$user)}}" method="POST">
        {{csrf_field()}} {{method_field('PUT')}}
        <p>
            <label for="name">
                Nombre
                <input class="form-control" type="text" name="name" value="{{$user->name}}">
                {!!$errors->first('name','<span class=error>:message</span>')!!}
            </label>
        </p>
        <p>
            <label for="email">
                Email
                <input class="form-control" type="email" name="email" value="{{$user->email}}">
                {!!$errors->first('email','<span class=error>:message</span>')!!}
            </label>
        </p>

        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@stop