@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Selenggara: Taman</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('addtaman') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <input class="form-control @error('acc') is-invalid @enderror" type="text" required name="taman" />
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
  <br>
  <div class="table-responsive">
    <table align="center" width="100%" cellspacing="0" class="display" id="taman">
      <thead>
        <tr>
          <th class="text-center">BIL</th>
          <th class="text-center">TAMAN</th>
          <th class="text-center">TINDAKAN</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $taman)
        <tr>
          <td class="text-center"></td>
          <td class="text-center">{{ $taman->taman }}</td>
          <td class="text-center">
            <a href="{{ route('taman.id', ['id' => $taman->id ]) }}"><i class="far fa-edit"
                style="color:#00FF0A;"></i></a>
            <a class="text-right" onClick="mDelete({{ $taman->id }})"><i class="far fa-trash-alt"
                style="color:#FF0000;"></i></a>
            <form action="" method="POST">
              @method('DELETE')
              @csrf
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- /.container-fluid -->

<script>
  var t = window.$('#taman').DataTable({})
  
  t.on('order.dt search.dt', function () {
      t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
      });
  }).draw();
</script>

@endsection