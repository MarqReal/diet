<div class="row" row-margin>
  <div class="input-field col s9 row-inputs">
    <input type="text" name="nome" id="nome" value="{{isset($nutricionista->nome) ? $nutricionista->nome : ''}}">
    <label for="nome">Nome</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s9 row-inputs">
      <select name="segmento" id="segmento">
        <option value="" disabled selected>Escolha um segmento</option>
        <option value="Coletivo" {{isset($nutricionista->segmento) && $nutricionista->segmento == 'Coletivo' ? 'selected' : '' }}>Coletivo</option>
        <option value="Esporte"  {{isset($nutricionista->segmento) && $nutricionista->segmento == 'Esporte' ? 'selected' : '' }}>Esporte</option>
        <option value="Gastronômico" {{isset($nutricionista->segmento) && $nutricionista->segmento == 'Gastronômico' ? 'selected' : '' }}>Gastronômico</option>
      </select>
      <label for="segmento">Segmento</label>
   </div>
</div>

<div class="row">
  <div class="input-field col s9 row-inputs">
    <input type="text" name="user_name" id="user_name" value="{{isset($nutricionista->user_name) ? $nutricionista->user_name : ''}}">
    <label for="user_name">Nome do Usuario (Twitter)</label>
  </div>
</div>
