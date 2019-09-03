<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="nome" name="nome" type="text" class="validate">
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
<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="semanas" name="semanas" type="number" class="validate" min="1">
    <label for="semanas">Periodo em semanas (ex: 3) </label>
  </div>
</div>
<div class="row">
    <div class="input-field col s9 row-inputs">
      <select id="objetivo">
        <option value="" disabled selected>Objetivo</option>
        <option value="perder" {{(isset(Auth::user()->relacao->situacao) && Auth::user()->relacao->situacao == "perder") ? "selected" : ""}}>Perder peso</option>
        <option value="manter" {{(isset(Auth::user()->relacao->situacao) && Auth::user()->relacao->situacao == "manter") ? "selected" : ""}}>Manter peso</option>
        <option value="ganhar" {{( isset(Auth::user()->relacao->situacao) && Auth::user()->relacao->situacao == "ganhar") ? "selected" : ""}}>Ganhar peso</option>
      </select>
      <label>Objetivo</label>
    </div> 
</div>

<div class="row">
    <div class="input-field col s9 row-inputs" id="spaceCafeManha">
    <select multiple id="cafeManha">
      <option value="" disabled selected>Selecione a(s) opção(ões)</option>
      <option prefixo="cafeManha" value="1">Maça</option>
      <option prefixo="cafeManha" value="2">Banana</option>
      <option prefixo="cafeManha" value="3">Uva</option>
      <option prefixo="cafeManha" value="3">Pessego</option>  
    </select>
    <label>Alimentos para o café da manhã</label>
  </div>
</div>

<div class="row">
    <div class="input-field col s9 row-inputs" id="spaceAlmoco">
    <select multiple id="almoco">
      <option value="" disabled selected>Selecione a(s) opção(ões)</option>
      <option prefixo="Almoco" value="1">Maça</option>
      <option prefixo="Almoco" value="2">Banana</option>
      <option prefixo="Almoco" value="3">Uva</option>
      <option prefixo="Almoco"value="3">Pessego</option>  
    </select>
    <label>Alimentos para o almoço</label>
  </div>
</div>

<div class="row">
    <div class="input-field col s9 row-inputs" id="spaceCafeTarde">
    <select multiple id="cafeTarde">
      <option value="" disabled selected>Selecione a(s) opção(ões)</option>
      <option prefixo="cafeTarde" value="1">Maça</option>
      <option prefixo="cafeTarde" value="2">Banana</option>
      <option prefixo="cafeTarde" value="3">Uva</option>
      <option prefixo="cafeTarde" value="3">Pessego</option>  
    </select>
    <label>Alimentos para o café da tarde</label>
  </div>
</div>

<div class="row">
    <div class="input-field col s9 row-inputs" id="spaceJantar">
    <select multiple id="jantar">
      <option prefixo="jantar" value="" disabled selected>Selecione a(s) opção(ões)</option>
      <option prefixo="jantar" value="1">Maça</option>
      <option prefixo="jantar" value="2">Banana</option>
      <option prefixo="jantar" value="3">Uva</option>
      <option prefixo="jantar" value="3">Pessego</option>  
    </select>
    <label>Alimentos para o jantar</label>
  </div>
</div>
