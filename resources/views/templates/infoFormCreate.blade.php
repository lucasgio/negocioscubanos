<div class="row clear-fix">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Nombre del negocio">Nombre del negocio</label>
            <input 
                type="text" 
                value="{{ old('nombre') }}" 
                autocomplete="off" 
                name="nombre_negocio" 
                id="nombre_negocio" 
                class="form-control 
                @error('nombre_negocio') is-invalid @enderror"
                placeholder="ej: Pachanga" 
                aria-describedby="helpId"
            >
            <small id="helpId" class="text-muted">Escriba el nombre del negocio</small>
        </div>
        @error('nombre_negocio')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>  
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="Categoria">Categoria</label>
            <select 
                class="form-control 
                @error('categoria') is-invalid @enderror" 
                name="categoria_id" 
                id="categoria"    
            >
                <option value="">-- Selecciones una Categoria --</option>
                @foreach ($categoriasNegocio as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }} >{{ $categoria->nombre }}</option>

                @endforeach
            </select>
            <small id="helpId" class="text-muted">Indique cual es la categoria de su negocio</small>
            @error('categoria')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>  
                </span>
            @enderror    
        </div>
    </div>
</div>
<div class="row clear-fix">
    <div class="col-md-6">
        <div class="form-group">
            <label for="imagen del negocio">Imagen del negocio</label>
            <input 
                type="file" 
                class="form-control-file" 
                name="imagen_principal" 
                id="imagen_principal"
                aria-describedby="fileHelpId">
            <small id="fileHelpId" class="form-text text-muted">Sube una imagen de tu negocio.No insertes el
                logotipo</small>
        </div>
        @error('imagen_principal')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>  
                </span>
        @enderror
    </div>
    <div class="col-md-6">
       <div class="form-group">
         <label for="descripcion">Descripción</label>
         <textarea 
            class="form-control 
            @error('descripcion') is-invalid @enderror" 
            placeholder="Restaurante rosa es un espacio para degustar deliciosos platos de la comida cubana e internacional...." 
            name="descripcion" 
            id="descripcion" 
            rows="3"
            >
        </textarea>
       </div>
       <small id="fileHelpId" class="form-text text-muted">Haga una pequeña descripción de su negocio</small>
       @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>  
                </span>
        @enderror
    </div>
</div>