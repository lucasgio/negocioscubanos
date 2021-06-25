<div>
    <h6 class="form-text text-muted"> Información de contacto</h6>
    <div class="row clear-fix mt-5">
        <div class="col-md-4">
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control @error('telefono') is-invalid @enderror"
                    value="{{ old('telefono') }}" name="telefono" id="telefono" aria-describedby="helpId"
                    placeholder="Telefono del negocio">
                <small id="helpId" class="form-text text-muted">Escriba el numero de telefono para que los
                    clientes lo puedan contactar
                </small>
                @error('telefono')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="apertura">Apertura</label>
                <input type="time" class="form-control @error('apertura') is-invalid @enderror"
                    value="{{ old('apertura') }}" name="apertura" id="apertura" aria-describedby="helpId"
                    placeholder="Horario de apertura">
                <small id="helpId" class="form-text text-muted">Horario de apertura del negocio</small>
                @error('apertura')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cierre">Cierre</label>
                <input type="time" class="form-control @error('cierre') is-invalid @enderror"
                    value="{{ old('cierre') }}" name="cierre" id="cierre" aria-describedby="helpId"
                    placeholder="Horario de cierre">
                <small id="helpId" class="form-text text-muted">Horario de cierre del negocio</small>
            </div>
            @error('cierre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
