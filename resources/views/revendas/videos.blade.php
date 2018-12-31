@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Videos da revenda</h1>
    <p class="lead">Gerencie os vídeos da sua revenda.</p>
  </div>
</div>
<div class="container">
  @include('flash::message')
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Thumbnail</th>
        <th scope="col">Link</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse($videos as $video)
        <tr>
          <th scope="row">{{ $video->id }}</th>
          <td><img height="100" src="{{ $video->thumb? Storage::url($video->thumb->url) : '/img/thumbnail.jpeg' }}"></td>
          <td><a href="{{ $video->link }}">{{ $video->link }}</a></td>
          <td>
            <div class="btn-group">
              <form action="/videos/delete" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button type="submit" onclick="return confirm('Deseja realmente excluir o vídeo?');" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <p>Não há videos na sua revenda</p>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
