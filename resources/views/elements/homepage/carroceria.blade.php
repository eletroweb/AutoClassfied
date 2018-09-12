@php
	$m = $marcas->filter(function ($marca, $key)use($nome) {
	    return strcmp(strtolower($marca->nome), $nome) == 0;
	})->first();
@endphp

<div class="m-1">
	<a href="{{isset($m->id)?'anuncios?paginate=10&order=visualizacoes&nome=&usado%5B%5D=0&usado%5B%5D=1&tipo%5B%5D=moto&tipo%5B%5D=carro&blindagem%5B%5D=1&blindagem%5B%5D=0&valor_maximo=&valor_minimo=&ano_maximo=&ano_minimo=&km_maximo=&km_minimo=&marca='.$m->id.'&modelo=&versao=&mais_buscados=0':'#'}}">
		<img class="rounded mx-auto d-block" height="100" src="{{$imageUrl}}" alt="{{$nome}}">	
	</a>
</div>

