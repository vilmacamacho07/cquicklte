<div class="form-group row">
    <label for="placas_truck" class="col-lg-3 col-form-label requerido">#Placas</label>
    <div class="col-lg-8">
    <input type="text" name="placas_truck" id="placas_truck" class="form-control" value="{{old('placas_truck', $gondola->placas_truck ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="conductor_names" class="col-lg-3 col-form-label requerido">Nombre del Conductor</label>
    <div class="col-lg-8">
    <input type="text" name="conductor_names" id="conductor_names" class="form-control" value="{{old('conductor_names', $gondola->conductor_names ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="conductor_apellidos" class="col-lg-3 col-form-label requerido">Apellidos del Conductor</label>
    <div class="col-lg-8">
    <input type="text" name="conductor_apellidos" id="conductor_apellidos" class="form-control" value="{{old('conductor_apellidos', $gondola->conductor_apellidos ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="mt3" class="col-lg-3 col-form-label requerido">mt3</label>
    <div class="col-lg-8">
    <input type="number" name="mt3" id="mt3" class="form-control" value="{{old('mt3', $gondola->mt3 ?? '')}}" required/>
    </div>
</div>

<div class="form-group row">
    <label for="name_admin_flete" class="col-lg-3 col-form-label">Supervisor de la Gondola</label>
    <div class="col-lg-8">
    <input type="text" name="name_admin_flete" id="name_admin_flete" class="form-control" value="{{old('name_admin_flete', $gondola->name_admin_flete ?? '')}}"/>
    </div>
</div>

<div class="form-group row">
    <label for="foto" class="col-lg-3 col-form-label">INE</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($gondola->foto) ? Storage::url("imagenes/gondolas/$gondola->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Documentos+Gondola"}}" accept="image/*"/>
    </div>
</div>
