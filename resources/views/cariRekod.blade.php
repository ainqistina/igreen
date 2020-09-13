@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Rekod CCC</b></h1>
  </div>
  <br><br>
  <div class="table-responsive">
    @if (Session::has('save'))
        <div class="alert alert-success">
          {{ Session::get('save') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @elseif (Session::has('update'))
        <div class="alert alert-success">
          {{ Session::get('update') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @elseif (Session::has('delete'))
        <div class="alert alert-success">
          {{ Session::get('delete') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    <table align="center" width="100%" cellspacing="0" class="display" id="cariRekod">
      <thead>
        <tr>
          <th class="text-center">BIL</th>
          <th class="text-center">JALAN</th>
          <th class="text-center">TAMAN</th>
          <th class="text-center">TARIKH TERIMA CCC</th>
          <th class="text-center">TARIKH TAMAT TEMPOH CCC</th>
          <th class="text-center">TARIKH PEMBERITAHUAN</th>
          <th class="text-center">PENGURUSAN SISA PEPEJAL</th>
          <th class="text-center">PEMOTONGAN RUMPUT</th>
          <th class="text-center">PEMBERSIHAN LONGKANG</th>
          <th class="text-center">TINDAKAN</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $serahan)
        <tr>
          <td class="text-center"></td>
          <td class="text-center">{{ $serahan->taman }}</td>
          <td class="text-center">{{ $serahan->jalan }}</td>
          <td class="text-center">{{ $serahan->terima_ccc }}</td>
          <td class="text-center">{{ $serahan->tamat_ccc }}</td>
          <td class="text-center">{{ $serahan->notis }}</td>
          <td class="text-center">{{ $serahan->status_sisa }}</td>
          <td class="text-center">{{ $serahan->status_rumput }}</td>
          <td class="text-center">{{ $serahan->status_longkang }}</td>

          <td class="text-center">
            <a href="{{ route('updateRekod.id', ['id' => $serahan->id ]) }}"><i class="far fa-edit"
                style="color:#00FF0A;"></i></a>
            <a class="text-right" onClick="rekodDelete({{ $serahan->id }})"><i class="far fa-trash-alt"
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
  var t = window.$('#cariRekod').DataTable({})
  
  t.on('order.dt search.dt', function () {
      t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
      });
  }).draw();
</script>
@endsection