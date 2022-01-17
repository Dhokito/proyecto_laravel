@extends('layouts.app1')

@section("titulo")
    <title>AlquiLanz</title>
@endsection

@section("contenido")
    <h3>Comunicado de Contacto</h3>
    <img src="https://blogger.googleusercontent.com/img/a/AVvXsEiey2wYCcroOyiqCAeaq6XkQH5uDv9UEgN7LN4sCgU5yjdeGbG2pwEPxGLH6G2o6s7QQVKkV0CnCbhQZ-rcYJsrb_84gLy7wO9RN4YIfvGQp7b2GBk7rwRKUKZd5dHQmNhCSy8PO2jgE0hT8QcgUpqIb5q8Jw_tSLEc01S1QEkoO8sWQ3o1XHC1lBtAKg=s500" class="rounded mx-auto d-block" alt="Responsive image" height="250px" weight="300px">
    <div>
        <p>Nombre: {{$contacto['nombre']}}</p>
        <p>Apellidos: {{$contacto['apellidos']}}</p>
        <p>Correo Electrónico: {{$contacto['email']}}</p>
        <div background-color="red"><p>Asunto: {{$contacto['asunto']}}</p></div>
    </div>
@endsection
