@extends('panel.app')
@section('content')
   <div class="container-fluid">
      <form class="mt-4" action="{{ route('panel.qr.store') }}" method="POST">
         @csrf
         <div class="form-check form-check-inline">
            <input class="form-check-input" checked type="radio" name="qrType" id="websiteItem" value="website">
            <label class="form-check-label" for="websiteItem">Sitio web</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="qrType" id="textItem" value="text">
            <label class="form-check-label" for="textItem">Texto</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="qrType" id="emailItem" value="email">
            <label class="form-check-label" for="emailItem">Correo electrónico</label>
          </div>


         <div class="mb-3 mt-4">
           <label for="contentItem" class="form-label">Contenido</label>
           <input type="text" name="content" class="form-control" id="contentItem" aria-describedby="emailHelp">
           <div id="emailHelp" class="form-text">Ingresa la URL o la información que deseas agregar</div>
         </div>
         <button type="submit" class="btn btn-primary">Guardar</button>
       </form>
   </div>
@stop