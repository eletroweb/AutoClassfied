@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid text-center" id="revenda-top" style="background-image: url(
    {{$revenda->capa?Storage::url($revenda->capa):asset('images/placeholder.jpg')
  }})">
  <div class="container">
  	<div class="row">
  		<div class="col-sm-5 m-auto">
  			<div id="avatar-revenda">
		  		@if($revenda->logo)
				    <img src="{{Storage::url($revenda->logo)}}" width="300" class="mx-auto d-block" alt="
				    {{$revenda->nomefantasia}}">
			    @else
			      <h1 class="jumbotron-heading">{{$revenda->nomefantasia}}</h1>
			    @endif
		  	</div>
  		</div>
  	</div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ $revenda->getUrl() }}">Página da revenda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Videos</li>
        </ol>
      </nav>
    </div>
  </div>
	<h1>Vídeos do canal</h1>
	<hr>
	<div class="row">
		<div class="col-sm-8">
			<div id="video-gallery" class="d-flex flex-row bd-highlight mb-3 flex-wrap text-center">
	          @forelse($videos as $v)
	            <a href="{{ $v->link }}">
	                <img height="100" src="{{ $v->thumb? Storage::url($v->thumb->url): '' }}"/>
	            </a>
	          @empty
	            <div class="alert alert-primary" role="alert">
	              Ainda não há videos publicados por aqui
	            </div>
	          @endforelse
	        </div>
		</div>
		<div class="col-sm-4">

		</div>
	</div>
</div>
<script>
	$('#video-gallery').lightGallery({
		thumbnail:true,
	    animateThumb: true,
	    showThumbByDefault: true
	});
</script>
@endsection
