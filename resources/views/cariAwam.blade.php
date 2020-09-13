@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Pembersihan Awam</b></h1>
  </div>
  <a class="btn btn-success" href="{{ route('awamExport') }}">Export File <i class="fa fa-table"
      style="color:#ffffff;"></i></a>
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
    <table align="center" width="100%" cellspacing="0" class="display" id="cariAwam">
      <thead>
        <tr>
          <th class="text-center">BIL</th>
          <th class="text-center">TARIKH SERAHAN</th>
          <th class="text-center">JUMLAH SERAHAN</th>
          <th class="text-center">TARIKH TERIMA</th>
          <th class="text-center">JUMLAH TERIMA</th>
          <th class="text-center">TAMAN</th>
          <th class="text-center">JALAN</th>
          <th class="text-center">SUB AWAM</th>
          <th class="text-center">JENIS SUB</th>
          <th class="text-center">UNIT</th>
          <th class="text-center">JENIS</th>
          <th class="text-center">FREKUENSI</th>
          <th class="text-center">CATATAN</th>
          <th class="text-center">TINDAKAN</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $serahan)
        <tr>
          <td class="text-center"></td>
          <td class="text-center">{{ $serahan->serahan }}</td>
          <td class="text-center">{{ $serahan->jumlah_serahan }}</td>
          <td class="text-center">{{ $serahan->terima }}</td>
          <td class="text-center">{{ $serahan->jumlah_terima }}</td>
          <td class="text-center">{{ $serahan->taman }}</td>
          <td class="text-center">{{ $serahan->jalan }}</td>
          <td class="text-center">{{ $serahan->sub_awam }}</td>
          <td class="text-center">{{ $serahan->jenis_sub }}</td>
          <td class="text-center">{{ $serahan->unit }}</td>
          <td class="text-center">{{ $serahan->jenis }}</td>
          <td class="text-center">{{ $serahan->frekuensi }}</td>
          <td class="text-center">{{ $serahan->catatan }}</td>

          <td class="text-center">
            <a href="{{action('AwamController@downloadAwamPDF', $serahan->id)}}"><i class="fa fa-download"
                aria-hidden="true" style="color:#000000;"></i></a>
            <a href="{{ route('updateAwam.id', ['id' => $serahan->id ]) }}"><i class="far fa-edit"
                style="color:#00FF0A;"></i></a>
            <a class="text-right" onClick="awamDelete({{ $serahan->id }})"><i class="far fa-trash-alt"
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
  var t = window.$('#cariAwam').DataTable({})
  
  t.on('order.dt search.dt', function () {
      t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
      });
  }).draw();
</script>
@endsection