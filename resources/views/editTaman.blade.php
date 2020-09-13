@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Selenggara: Taman</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('updateTaman.id', [ 'id' => $data->id ]) }}">
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <input class="form-control @error('taman') is-invalid @enderror" type="text" required name="taman"
          value="{{ $data->taman }}" />
        @error('taman')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">
        {{ __('Simpan') }}
      </button>
      <button type="reset" class="btn btn-secondary">
        {{ __('Padam') }}
      </button>
    </div>
  </form>

</div>
<!-- /.container-fluid -->
@endsection