<div class="row"> 
  <div class="input-field col s9 row-inputs">
    <input id="nome" name="nome" type="text" value="{{(isset($alimento->nome)) ? $alimento->nome : ''}}">
    <label for="nome">Nome do alimento (ex: Banana) </label>
  </div>
</div>
<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="descricao" name="descricao" type="text" value="{{(isset($alimento->descricao)) ? $alimento->descricao : ''}}">
    <label for="descricao">Descrição (ex: Banana é tipicamente...)</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="unidade_medida" name="unidade_medida" type="number" min="1" step="any"  value="{{(isset($alimento->unidade_medida)) ? $alimento->unidade_medida : ''}}">
    <label for="unidade_medida">Unidade de medida (ex: 100)</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s9 row-inputs">
    <select id="tipo_medida">
      <option value="" disabled selected>Escolha o tipo de medida</option>
      <option {{(isset($alimento) && $alimento->tipo_medida == "kg") ? "selected" : ''}} value="kg">Quilogramas</option>
      <option {{(isset($alimento) && $alimento->tipo_medida == "g") ? "selected" : ''}} value="g">Gramas</option>
      <option {{(isset($alimento) && $alimento->tipo_medida == "ml") ? "selected" : ''}} value="ml">Mililitro</option>
      <option {{(isset($alimento) && $alimento->tipo_medida == "l") ? "selected" : ''}} value="l">Litros</option>
    </select>
    <label>Escolha o tipo de medida</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s9 row-inputs">
    <select id="porcao">
      <option value="" disabled selected>Escolha o tipo de porção</option>
      <option {{(isset($alimento) && $alimento->porcao == "Unidade(s)") ? "selected" : ''}} value="Unidade(s)">Unidade</option>
      <option {{(isset($alimento) && $alimento->porcao == "Xicara(s)") ? "selected" : ''}} value="Xicara(s)">Xicara </option>
      <option {{(isset($alimento) && $alimento->porcao == "Colher(es) de Sopa") ? "selected" : ''}} value="Colher(es) de Sopa">Colher de Sopa</option>
      <option {{(isset($alimento) && $alimento->porcao == "Concha(s)") ? "selected" : ''}} value="Concha(s)">Concha</option>
      <option {{(isset($alimento) && $alimento->porcao == "Fatia(s)") ? "selected" : ''}} value="Fatia(s)">Fatia</option>
      <option {{(isset($alimento) && $alimento->porcao == "Copo(s) 250ml") ? "selected" : ''}} value="Copo(s) 250ml">Copo 250ml</option>
      <option {{(isset($alimento) && $alimento->porcao == "Copo(s) 400ml") ? "selected" : ''}} value="Copo(s) 400ml">Copo 400ml</option>
    </select>
    <label>Escolha o tipo de porção</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s9 row-inputs">
    <select id="mes">
      <option value="" disabled selected>Escolha o mês</option>
      <option {{(isset($alimento) && $alimento->mes == "01") ? "selected" : ''}} value="01">Janeiro</option>
      <option {{(isset($alimento) && $alimento->mes == "02") ? "selected" : ''}} value="02">Fevereiro</option>
      <option {{(isset($alimento) && $alimento->mes == "03") ? "selected" : ''}} value="03">Março</option>
      <option {{(isset($alimento) && $alimento->mes == "04") ? "selected" : ''}} value="04">Abril</option>
      <option {{(isset($alimento) && $alimento->mes == "05") ? "selected" : ''}} value="05">Maio</option>
      <option {{(isset($alimento) && $alimento->mes == "06") ? "selected" : ''}} value="06">Junho</option>
      <option {{(isset($alimento) && $alimento->mes == "07") ? "selected" : ''}} value="07">Julho</option>
      <option {{(isset($alimento) && $alimento->mes == "08") ? "selected" : ''}} value="08">Agosto</option>
      <option {{(isset($alimento) && $alimento->mes == "09") ? "selected" : ''}} value="09">Setembro</option>
      <option {{(isset($alimento) && $alimento->mes == "10") ? "selected" : ''}} value="10">Outubro</option>
      <option {{(isset($alimento) && $alimento->mes == "11") ? "selected" : ''}} value="11">Novembro</option>
      <option {{(isset($alimento) && $alimento->mes == "12") ? "selected" : ''}} value="12">Dezembro</option>
    </select>
    <label>Escolha o mês</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="carboidrato" name="carboidrato" type="number" step='any'  value="{{(isset($alimento->carboidrato)) ? $alimento->carboidrato : ''}}">
    <label for="carboidrato">Qtde de carboidrato (ex: 12,67)</label>
  </div>
</div>
<div class="row"> 
  <div class="input-field col s9 row-inputs">
    <input id="proteina" name="proteina" type="number"  step='any'  value="{{(isset($alimento->proteina)) ? $alimento->proteina : ''}}">
    <label for="proteina">Qtde de proteina (ex: 14,47)</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="lipideos" name="lipideos" type="number"  step='any' value="{{(isset($alimento->lipideos)) ? $alimento->lipideos : ''}}">
    <label for="lipideos">Qtde de lipídeos (ex: 25,65)</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="fibra_alimentar" name="fibra_alimentar" type="number"  value="{{(isset($alimento->fibra_alimentar)) ? $alimento->fibra_alimentar : ''}}">
    <label for="fibra_alimentar">Qtde Fibra alimentar (ex: 12,31)</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s9 row-inputs">
    <input id="calorias" name="calorias" type="number" value="{{(isset($alimento->calorias)) ? $alimento->calorias : ''}}">
    <label for="calorias">Qtde Calorias (ex: 12,07)</label>
  </div>
</div>
