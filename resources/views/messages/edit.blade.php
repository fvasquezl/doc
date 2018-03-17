@extends ('layouts.app')

@section ('content')
    <h1>Editar mensaje</h1>
    <form action="{{route('mensajes.update',$message)}}" method="POST">
        {{csrf_field()}} {{method_field('PUT')}}
        <p>
            <label for="nombre">
                Nombre
                <input class="form-control" type="text" name="nombre" value="{{$message->nombre}}">
                {!!$errors->first('nombre','<span class=error>:message</span>')!!}
            </label>
        </p>
        <p>
            <label for="email">
                Email
                <input class="form-control" type="email" name="email" value="{{$message->email}}">
                {!!$errors->first('email','<span class=error>:message</span>')!!}
            </label>
        </p>
        <p>
            <label for="mensaje">
                Mensaje
                <textarea class="form-control" name="mensaje">{{$message->mensaje}}</textarea>
                {!!$errors->first('email','<span class=error>:message</span>')!!}
            </label>
        </p>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@stop