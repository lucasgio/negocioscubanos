@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

    <div class="container">
        @if (session('estado'))
            <div class="alert alert-success mt-5 mx-5" role="alert">
                <h4 class="alert-heading">Felicitaciones!</h4>
                <p>Su negocio se ha registrado con exito.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        @endif
        <div class="clear-fix">
            <h3 class="display-6 text-uppercase mt-5">crea tu perfil de negocio</h3>
            <form action="{{ route('negocios.store') }}" enctype="multipart/form-data" method="POST" novalidate>
                @csrf
                <fieldset>
                    @include('templates.infoformcreate')
                </fieldset>

                <fieldset class="border p-4 mt-5">
                    @include('templates.contactformcreate')
                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <h6 class="form-text text-muted"> Imagenes</h6>
                    <div id="dropzone" class="dropzone h-100 form-control"></div>
                </fieldset>
                <input type="hidden" name="uuid" id="uuid" value="{{ Str::uuid()->toString() }}">

                <p class="display-6 mt-5">Mapa de ubicación</p>
                <small class="form-text text-muted mb-3">
                    Debe escojer el pin del mapa azul y moverlo hacia la direccion o calle principal de su negocio.
                    Puede realizar zoom para tener mejor vista del mapa y despues acercar para fijar el pin.
                    Una vez fijado el pin en la direccion correcta aparecera la informacion en los cuadros de abajo del mapa
                    para que usted confirme si esta correcta o no.
                </small>
                <div id="mapa" style="height: 500px"></div>

                <fieldset>
                    @include('templates.forms.localidadformcreate')
                </fieldset>
                <input type="submit" class="btn btn-primary btn-flat mt-5" value="Guardar informacion">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="" defer></script>
    <script src="https://unpkg.com/esri-leaflet/dist/esri-leaflet.js" defer></script>
    <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"
        integrity="sha512-llCHNP2CQS+o3EUK2QFehPlOngm8Oa7vkvdUpEFN71dVOf3yAj9yMoPdS5aYRTy8AEdVtqUBIsVThzUSggT0LQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
