<div class="row">
  <div class="input-field col s10 row-inputs">
    <input id="nome" name="nome" type="text" value="{{(isset($dieta)) ? $dieta->nome : ''}}">
    <label for="nome">Nome da dieta (ex: Dieta Low Carb) </label>
  </div>
</div>
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
@if(!isset($dieta))
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
@else
  <div class="row" id="dieta-infos">
    <div id="dietas" class="col s12">
      <ul id="dieta{{$dieta->id}}" class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">free_breakfast</i>Café da Manhã</div>
            <div class="collapsible-body">
              @foreach($dieta->cafeManha as $item)
                <span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
              @endforeach
            </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">local_dining</i>Almoço</div>
            <div class="collapsible-body">
              @foreach($dieta->almoco as $item)
                <span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
              @endforeach
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">local_bar</i>Café da Tarde</div>
            <div class="collapsible-body">
              @foreach($dieta->cafeTarde as $item)
                <span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
              @endforeach
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">room_service</i>Jantar</div>
            <div class="collapsible-body">
              @foreach($dieta->jantar as $item)
                <span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
              @endforeach
            </div>
        </li>
      </ul>
    </div>
  </div>
@endif