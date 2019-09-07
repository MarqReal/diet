<div class="row">
  <div class="input-field col s10 row-inputs">
    <input id="nome" name="nome" type="text" value="{{(isset($dieta)) ? $dieta->nome : ''}}">
    <label for="nome">Nome da dieta (ex: Dieta Low Carb) </label>
  </div>
</div>

<!-- <div class="row">
  <div class="col s9 row-inputs"> 
    <div class="input-field container-dataNascimento">
      <input type="text" class="datepicker" id="dt_inicio" name="dt_inicio" value="{{ isset(Auth::user()->dt_dieta) ? date('d/m/Y', strtotime(str_replace('/', '-', Auth::user()->dt_dieta))) : ''}}">
      <label>Data de inicio (Ex: 10/09/2019)</label>
    </div>
  </div>
</div> -->
<!-- <div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="semanas" name="semanas" type="number" class="validate" min="1">
    <label for="semanas">Periodo em semanas (ex: 3) </label>
  </div>
</div> -->
<div class="row">
    <div class="input-field col s10 row-inputs">
      <select id="objetivo">
        <option value="" disabled selected>Objetivo</option>
        <option value="Perder peso" {{(isset($dieta->objetivo) && $dieta->objetivo == "Perder peso") ? "selected" : ""}}>Perder peso</option>
        <option value="Manter peso" {{(isset($dieta->objetivo) && $dieta->objetivo == "Manter peso") ? "selected" : ""}}>Manter peso</option>
        <option value="Ganhar peso" {{( isset($dieta->objetivo) && $dieta->objetivo == "Ganhar peso") ? "selected" : ""}}>Ganhar peso</option>
      </select>
      <label>Objetivo</label>
    </div> 
</div>

<div class="row">
    <div class="input-field col s10 row-inputs" id="spaceCafeManha">
    <select multiple id="cafeManha">
      <option value="" disabled selected>Alimentos p/ o café da manhã</option>
      @foreach($alimentos as $alimento)
        <option value="{{$alimento->id}}" porcao="{{$alimento->porcao}}">{{$alimento->nome}}</option>
      @endforeach  
    </select>
    <label>Café da manhã</label>
  </div>
</div>

<div class="row">
    <div class="input-field col s10 row-inputs" id="spaceAlmoco">
    <select multiple id="almoco">
      <option value="" disabled selected>Alimentos p/ o almoço</option>
      @foreach($alimentos as $alimento)
        <option value="{{$alimento->id}}" porcao="{{$alimento->porcao}}">{{$alimento->nome}}</option>
      @endforeach  
    </select>
    <label>Almoço</label>
  </div>
</div>

<div class="row">
    <div class="input-field col s10 row-inputs" id="spaceCafeTarde">
    <select multiple id="cafeTarde">
      <option value="" disabled selected>Alimentos p/ o café da tarde</option>
      @foreach($alimentos as $alimento)
        <option value="{{$alimento->id}}" porcao="{{$alimento->porcao}}">{{$alimento->nome}}</option>
      @endforeach  
    </select>
    <label>Café da tarde</label>
  </div>
</div>

<div class="row">
    <div class="input-field col s10 row-inputs" id="spaceJantar">
    <select multiple id="jantar">
      <option value="" disabled selected>Alimentos p/ o jantar</option>
      @foreach($alimentos as $alimento)
        <option value="{{$alimento->id}}" porcao="{{$alimento->porcao}}">{{$alimento->nome}}</option>
      @endforeach  
    </select>
    <label>Jantar</label>
  </div>
</div>
