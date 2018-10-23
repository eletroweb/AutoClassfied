@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Adicionar novo vídeo</h1>
    <p class="lead">Para adicionar um vídeo é muito fácil, você só precisa informar o link do vídeo no youtube (por exemplo) e adicionar a sua thumbnail personalizada (imagem a ser exibida antes do vídeo).</p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ $revenda->getUrl() }}">Página da revenda</a></li>
          <li class="breadcrumb-item"><a href="{{ $revenda->getUrl().'/videos' }}">Videos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Adicionar video</li>
        </ol>
      </nav>
    </div>
  </div>
	<div class="row">
		<div class="col-sm-6">
			<form action="{{ route('revenda_add_video') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="link">Url do vídeo:</label>
					<input type="text" name="link" id="link" placeholder="Digite a url do vídeo" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="thumbnail">Thumbnail do vídeo (Opcional)</label>
					<input type="file" name="thumbnail" placeholder="Seleciona a thumbnail" class="form-control" id="thumbnail">
				</div>

				<button class="btn btn-primary">Adicionar vídeo</button>
			</form>
		</div>
	</div>
</div>
@endsection
