@extends('layouts.app')

@section('content')
  <div class="resultado-compra">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12 text-center texto-resultado">
          @if ($condition)
            <img src="/Iconos/compraExitosa.png" alt="">
            <h1>¡Gracias por su compra!</h1>
            <h4>El pago fue realizado con exito</h4>
            <a href="#">volver al inicio</a>
          @else
            <img src="/Iconos/compraDefectuosa.png" alt="">
            <h1>¡Lo sentimos, ha ocurrido un error en el pago!</h1>
            <h4>Vuelve a intentarlo o usa otro método de pago</h4>
            <a href="#">volver al carrito</a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
