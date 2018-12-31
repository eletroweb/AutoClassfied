@extends('admin.index')
@section('content')
<div class="container">
  @include('flash::message')
  <div class="card">
    <form class="card-body">
      <div class="form-group">
        <label for="s">Procure pelo e-mail ou nome</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="s" placeholder="Maria Almeida, por exemplo" aria-label="Maria Almeida, por exemplo" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Procurar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  @include('newsletter_users.table')
</div>
@endsection
