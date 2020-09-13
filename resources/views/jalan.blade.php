@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Selenggara: Jalan</b></h1>
  </div>

  <form class="user" method="POST" action="{{ route('addjalan') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <select id="taman" class="form-control @error('taman') is-invalid @enderror" required name="taman_fk">
          <option></option>
          @foreach ($taman as $taman1)
          <option value="{{ $taman1->id }}">{{ $taman1->taman }}</option>
          @endforeach
        </select>
        @error('taman')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Jalan:</label>
        <input type="text" class="form-control @error('jalan') is-invalid @enderror" required name="jalan" id="jalan">
        @error('jalan')
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
    <table align="center" width="100%" cellspacing="0" class="display" id="jln">
      <thead>
        <tr>
            <th class="text-center">BIL</th>
            <th class="text-center">TAMAN</th>
            <th class="text-center">JALAN</th>
            <th class="text-center">TINDAKAN</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $jalan)
        <tr>
          <td class="text-center"></td>
          <td class="text-center">{{ $jalan->taman }}</td>
          <td class="text-center">{{ $jalan->jalan }}</td>
          <td class="text-center">
            <a href="{{ route('jalan.id', ['id' => $jalan->id ]) }}"><i class="far fa-edit"
                style="color:#00FF0A;"></i></a>
            <a class="text-right" onClick="myDelete({{ $jalan->id }})"><i class="far fa-trash-alt"
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

<script>
  var t = window.$('#jln').DataTable({})
  
  t.on('order.dt search.dt', function () {
      t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
      });
  }).draw();
  
</script>
@endsection