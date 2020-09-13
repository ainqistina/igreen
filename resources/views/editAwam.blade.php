@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Kemaskini: Pembersihan Awam</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('updateAwam.id', [ 'id' => $data->id ]) }}">
    @method('PUT')
    @csrf
    <h2 class="h3 mb-0 text-gray-800"><b>A. INFO SERAHAN</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="serahan">Tarikh Serahan:</label>
        <input  type="date" class="form-control" id="datepicker" name="serahan" value="{{ $data->serahan }}" />
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jumlah_serahan">Jumlah Serahan:</label>
        <input class="form-control @error('jumlah_serahan') is-invalid @enderror" type="text" required
          name="jumlah_serahan" value="{{ $data->jumlah_serahan }}" />
        @error('jumlah_serahan')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <h2 class="h3 mb-0 text-gray-800"><b>B. INFO TERIMA</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="terima">Tarikh Terima:</label>
        <input type="date" class="form-control" id="datepicker2" name="terima" value="{{ $data->terima }}" />
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jumlah_terima">Jumlah Terima:</label>
        <input class="form-control @error('jumlah_terima') is-invalid @enderror" type="text" required
          name="jumlah_terima" value="{{ $data->jumlah_terima }}" />
        @error('jumlah_terima')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <h2 class="h3 mb-0 text-gray-800"><b>C. MAKLUMAT PEMBERSIHAN AWAM</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <select id="taman" class="form-control @error('taman') is-invalid @enderror" required name="taman" onchange="jalanSearch(value)">
          @foreach ($tmn as $taman)
            <option value="{{ $taman->id }}" @if ($data->tamanid == $taman->id) selected @endif>{{ $taman->taman }}</option>
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
          @foreach ($jln as $jalan)
            <option value="{{ $jalan->id }}" @if ($data->jalanid == $jalan->id) selected @endif >{{ $jalan->jalan }}</option>
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
        <label class="small mb-1" for="sub_awam">Sub Kategori</label>
        <select id="sub_awam" class="form-control @error('sub_awam') is-invalid @enderror" name="sub_awam"
          value="{{ $data->sub_awam }}">
          <option @if($data->sub_awam == 'Pembersihan Longkang') selected @endif value="Pembersihan
            Longkang">Pembersihan Longkang</option>
          <option @if($data->sub_awam == 'Pembersihan Jalan') selected @endif value="Pembersihan Jalan">Pembersihan
            Jalan</option>
          <option @if($data->sub_awam == 'Pemotongan Rumput') selected @endif value="Pemotongan Rumput">Pemotongan
            Rumput</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jenis">Jenis Sub Kategori</label>
        <select id="jenis" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
          value="{{ $data->jenis }}">
          <option @if($data->jenis == 'Longkang Terbuka (Lebar450mm) Panjang(m)') selected @endif value="Longkang
            Terbuka (Lebar450mm) Panjang(m)">Longkang Terbuka (Lebar450mm) Panjang(m)</option>
          <option @if($data->jenis == 'Longkang Terbuka (450mm:Lebar:1000mm) Panjang(m)') selected @endif
            value="Longkang Terbuka (450mm:Lebar:1000mm) Panjang(m)">Longkang Terbuka (450mm:Lebar:1000mm) Panjang(m)
          </option>
          <option @if($data->jenis == 'Longkang Terbuka (10000mm:Lebar:2000mm) Panjang(m)') selected @endif
            value="Longkang Terbuka (10000mm:Lebar:2000mm) Panjang(m)">Longkang Terbuka (10000mm:Lebar:2000mm)
            Panjang(m)</option>
          <option @if($data->jenis == 'Longkang Tertutup (Lebar:450mm) Panjang (m)') selected @endif value="Longkang
            Tertutup (Lebar:450mm) Panjang (m)">Longkang Tertutup (Lebar:450mm) Panjang (m)</option>
          <option @if($data->jenis == 'Perangkap Sampah Longkang (Unit)') selected @endif value="Perangkap Sampah
            Longkang (Unit)">Perangkap Sampah Longkang (Unit)</option>
        </select>
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="unit">Unit/Panjang/Keluasan:</label>
        <input class="form-control @error('unit') is-invalid @enderror" type="text" required name="unit"
          value="{{ $data->unit }}" />
        @error('unit')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jenis_sub">Jenis</label>
        <select id="jenis_sub" class="form-control @error('jenis_sub') is-invalid @enderror" name="jenis_sub"
          value="{{ $data->jenis_sub }}">
          <option @if($data->jenis_sub == 'Tanpa Median') selected @endif value="Tanpa Median">Tanpa Median</option>
          <option @if($data->jenis_sub == 'Median') selected @endif value="Median">Median</option>
          <option @if($data->jenis_sub == 'Parkir Awam') selected @endif value="Parkir Awam">Parkir Awam</option>
        </select>
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="frekuensi">Frekuensi</label>
        <select id="frekuensi" class="form-control @error('jenis') is-invalid @enderror" name="frekuensi"
          value="{{ $data->frekuensi }}">
          <option @if($data->frekuensi == '6 Kali Seminggu') selected @endif value="6 Kali Seminggu">6 Kali Seminggu
          </option>
          <option @if($data->frekuensi == '1 Kali Sebulan') selected @endif value="1 Kali Sebulan">1 Kali Sebulan
          </option>
          <option @if($data->frekuensi == '2 Kali Sebulan') selected @endif value="2 Kali Sebulan">2 Kali Sebulan
          </option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="catatan">Catatan:</label>
        <textarea class="form-control @error('catatan') is-invalid @enderror" type="text" required
          name="catatan"> {{ $data->catatan }}</textarea>
        @error('catatan')
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
@endsection