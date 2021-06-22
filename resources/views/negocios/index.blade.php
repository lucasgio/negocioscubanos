@extends('layouts.app')


@section('content')
    <div class="container py-4">
        <div class="p-5 mb-4 bg-light shadow-lg rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Bienvenido a Negocios - Cubanos</h1>
                <p class="col-md-8 fs-4">
                    Aqui puedes administar tu negocio.Puedes registrar tu negocio o puedes editar el que ya tienes registrado.
                    Si es tu primera vez aqui, no importa puedes dar click en el boton de Informacion y tendras mas detalles.
                </p>
                <button class="btn btn-outline-primary btn-lg" type="button">Información</button>
            </div>
        </div>

        <div class="row align-items-md-stretch mt-5">
            <div class="col">
                <div id="card_create" class="card card-cover h-100 overflow-hidden text-white  rounded-5 shadow-lg">
                  <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <ul class="d-flex list-unstyled mt-5">
                      <li class="d-flex align-items-center me-3">
                        <a type="button" class="btn btn-primary text-uppercase mt-5" href="{{ route( 'negocios.create' ) }}">Crear Perfil</a>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="col">
                <div id="card_edit" class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
                  <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <ul class="d-flex list-unstyled mt-5">
                        <li class="d-flex align-items-center me-3">
                            <a type="button" class="btn btn-primary text-uppercase mt-5" href="{{ route( 'negocios.edit' ) }}">Editar Perfil</a>
                        </li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    @endsection