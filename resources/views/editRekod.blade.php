@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Kemaskini: Rekod CCC</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('updateRekod.id', [ 'id' => $data->id ]) }}">
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <select id="taman" class="form-control @error('taman') is-invalid @enderror" required name="taman" onchange="jalanSearch(value)">
          @foreach ($dataTaman as $taman)
          <option value="{{ $taman->id }}" @if ($data->tamanid == $taman->taman) selected @endif>{{ $taman->taman }}</option>
          @endforeach
        </select>
        @error('taman')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="jalan">Jalan:</label>
        <select id="jalan" class="form-control @error('jalan') is-invalid @enderror" required name="jalan">
          @foreach ($dataJalan as $jalan)
          <option value="{{ $jalan->id }}" @if ($data->jalanid == $jalan->jalan) selected @endif>{{ $jalan->jalan }}</option>
          @endforeach
        </select>
        @error('jalan')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="serahan">Tarikh Terima CCC:</label>
        <input type="date" class="form-control" id="datepicker" name="terima_ccc" value="{{ $data->terima_ccc }}" />
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="terima">Tarikh Tamat CCC:</label>
        <input type="date" class="form-control" id="datepicker" name="tamat_ccc" value="{{ $data->tamat_ccc }}" />
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="notis">Tarikh Pemberitahuan:</label>
        <input type="date" class="form-control" id="datepicker" name="notis" value="{{ $data->notis }}" />
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="status_sisa">Pengurusan Sisa Pepejal</label>
        <select id="status_sisa" class="form-control @error('status_sisa') is-invalid @enderror" name="status_sisa"
          value="{{ $data->status_sisa }}">
          <option>--Pilihan--</option>
          <option @if($data->status_sisa == 'Dalam tindakan') selected @endif value="Dalam tindakan">Dalam tindakan
          </option>
          <option @if($data->status_sisa == 'Belum diserah') selected @endif value="Belum diserah">Belum diserah
          </option>
          <option @if($data->status_sisa == 'Telah diserah') selected @endif value="Telah diserah">Telah diserah
          </option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="status_rumput">Pemotongan Rumput</label>
        <select id="status_rumput" class="form-control @error('status_rumput') is-invalid @enderror"
          name="status_rumput" value="{{ $data->status_rumput }}">
          <option>--Pilihan--</option>
          <option @if($data->status_rumput == 'Dalam tindakan') selected @endif value="Dalam tindakan">Dalam tindakan
          </option>
          <option @if($data->status_rumput == 'Belum diserah') selected @endif value="Belum diserah">Belum diserah
          </option>
          <option @if($data->status_rumput == 'Telah diserah') selected @endif value="Telah diserah">Telah diserah
          </option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="status_longkang">Pembersihan Longkang</label>
        <select id="status_longkang" class="form-control @error('status_longkang') is-invalid @enderror"
          name="status_longkang" value="{{ $data->status_longkang }}">
          <option>--Pilihan--</option>
          <option @if($data->status_longkang == 'Dalam tindakan') selected @endif value="Dalam tindakan">Dalam tindakan
          </option>
          <option @if($data->status_longkang == 'Belum diserah') selected @endif value="Belum diserah">Belum diserah
          </option>
          <option @if($data->status_longkang == 'Telah diserah') selected @endif value="Telah diserah">Telah diserah
          </option>
        </select>
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
@endsection