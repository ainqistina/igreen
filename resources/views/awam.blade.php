@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Pembersihan Awam</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('addawam') }}">
    @csrf
    <h2 class="h3 mb-0 text-gray-800"><b>A. INFO SERAHAN</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="serahan">Tarikh Serahan:</label>
        <input class="form-control @error('serahan') is-invalid @enderror" id="datepicker" name="serahan" type="date" required/>
        @error('serahan')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jumlah_serahan">Jumlah Serahan:</label>
        <input class="form-control @error('jumlah_serahan') is-invalid @enderror" type="text" required name="jumlah_serahan" />
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
        <input class="form-control @error('terima') is-invalid @enderror" id="datepicker" name="terima" type="date" required/>
        @error('terima')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jumlah_terima">Jumlah Terima:</label>
        <input class="form-control @error('jumlah_terima') is-invalid @enderror" type="text" required name="jumlah_terima" />
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
        <select id="taman" class="form-control @error('taman') is-invalid @enderror" required name="taman" oninput="jalanSearch(value)">
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
        <label class="small mb-1" for="jalan">Jalan:</label>
        <select id="jalan" class="form-control @error('jalan') is-invalid @enderror" required name="jalan"></select>
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
        <label class="small mb-1" for="sub_awam">Sub Kategori:</label>
        <select id="sub_awam" class="form-control @error('sub_awam') is-invalid @enderror" name="sub_awam">
          <option></option>
          <option value="Pembersihan Longkang">Pembersihan Longkang</option>
          <option value="Pembersihan Jalan">Pembersihan Jalan</option>
          <option value="Pemotongan Rumput">Pemotongan Rumput</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jenis">Jenis Sub Kategori:</label>
        <select id="jenis" class="form-control @error('jenis') is-invalid @enderror" name="jenis">
          <option></option>
          <option value="Longkang Terbuka (Lebar450mm) Panjang(m)">Longkang Terbuka (Lebar450mm) Panjang(m)</option>
          <option value="Longkang Terbuka (450mm:Lebar:1000mm) Panjang(m)">Longkang Terbuka (450mm:Lebar:1000mm) Panjang(m)</option>
          <option value="Longkang Terbuka (10000mm:Lebar:2000mm) Panjang(m)">Longkang Terbuka (10000mm:Lebar:2000mm) Panjang(m)</option>
          <option value="Longkang Tertutup (Lebar:450mm) Panjang (m)">Longkang Tertutup (Lebar:450mm) Panjang (m)</option>
          <option value="Perangkap Sampah Longkang (Unit)">Perangkap Sampah Longkang (Unit)</option>
        </select>
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="unit">Unit/Panjang/Keluasan:</label>
        <input class="form-control @error('unit') is-invalid @enderror" type="text" required name="unit" />
        @error('unit')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jenis_sub">Jenis:</label>
        <select id="jenis_sub" class="form-control @error('jenis_sub') is-invalid @enderror" name="jenis_sub">
          <option></option>
          <option value="Tanpa Median">Tanpa Median</option>
          <option value="Median">Median</option>
          <option value="Parkir Awam">Parkir Awam</option>
        </select>
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="frekuensi">Frekuensi:</label>
        <select id="frekuensi" class="form-control @error('jenis') is-invalid @enderror" name="frekuensi">
          <option></option>
          <option value="6 Kali Seminggu">6 Kali Seminggu</option>
          <option value="1 Kali Sebulan">1 Kali Sebulan</option>
          <option value="2 Kali Sebulan">2 Kali Sebulan</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="catatan">Catatan:</label>
        <textarea class="form-control @error('catatan') is-invalid @enderror" type="text"
          name="catatan"></textarea>
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