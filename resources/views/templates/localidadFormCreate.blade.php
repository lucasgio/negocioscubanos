<div class="row clear-fix mt-3">
    <input type="hidden" value="{{ old('lat') }}" id="lat" name="lat">
    <input type="hidden" value="{{ old('lng') }}" id="lng" name="lng">
</div>
<div class="row clear-fix">
    <div class="col-md-4">
        <div class="form-group">
            <label for="calle">Calle Principal</label>
            <input type="text" readonly class="form-control" name="calle" id="calle" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">
                Detalla la provincia desde la ubicación dada en el mapa
            </small>
            @error('calle')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" readonly class="form-control" name="provincia" id="provincia" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">
                Detalla la provincia desde la ubicación dada en el mapa
            </small>
            @error('provincia')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="municipio">Municipio</label>
            <input type="text" readonly class="form-control" name="municipio" id="municipio" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">
                Detalla el municipio desde la ubicación dada en el mapa
            </small>
            @error('municipio')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
