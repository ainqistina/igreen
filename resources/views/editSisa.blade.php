@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Kemaskini: Pengurusan Sisa Pepejal</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('updateSisa.id', [ 'id' => $data->id ]) }}">
    @method('PUT')
    @csrf
    <h2 class="h3 mb-0 text-gray-800"><b>A. INFO SERAHAN</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="serahan">Tarikh Serahan:</label>
        <input type="date" class="form-control" id="datepicker" name="serahan" value="{{ $data->serahan }}" />
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="jumlah_serahan">Jumlah Serahan:</label>
        <input type="text" class="form-control @error('jumlah_serahan') is-invalid @enderror" type="text" required
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
        <input type="text" class="form-control @error('jumlah_terima') is-invalid @enderror" type="text" required
          name="jumlah_terima" value="{{ $data->jumlah_terima }}" />
        @error('jumlah_terima')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <h2 class="h3 mb-0 text-gray-800"><b>C. MAKLUMAT SISA PEPEJAL</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <select id="taman" class="form-control @error('taman') is-invalid @enderror" required name="taman" onchange="jalanSearch(value)">
          @foreach ($dataTaman as $taman)
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
          @foreach ($dataJalan as $jalan)
          <option value="{{ $jalan->id }}" @if ($data->jalanid == $jalan->id) selected @endif>{{ $jalan->jalan }}</option>
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
        <label class="small mb-1" for="sub_sisa">Sub Kategori:</label>
        <select id="sub_sisa" class="form-control @error('sub_sisa') is-invalid @enderror" required name="sub_sisa">
          <option>--Pilihan--</option>
          <option @if($data->sub_sisa == 'Premis Kediaman') selected @endif value="Premis Kediaman">Premis Kediaman
          </option>
          <option @if($data->sub_sisa == 'Premis Perniagaan') selected @endif value="Premis Perniagaan">Premis
            Perniagaan</option>
          <option @if($data->sub_sisa == 'CBK') selected @endif value="CBK">CBK</option>
        </select>
        @error('sub_sisa')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="frekuensi">Frekuensi:</label>
        <select id="frekuensi" class="form-control @error('frekuensi') is-invalid @enderror" required name="frekuensi">
          <option>--Pilihan--</option>
          <option @if($data->frekuensi == '6 Kali Seminggu') selected @endif value="6 Kali Seminggu">6 Kali Seminggu
          </option>
          <option @if($data->frekuensi == '2 Kali Seminggu') selected @endif value="2 Kali Seminggu">2 Kali Seminggu
          </option>
          <option @if($data->frekuensi == '1 Kali Seminggu') selected @endif value="1 Kali Seminggu">1 Kali Seminggu
          </option>
        </select>
        @error('frekuensi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="hari">Hari:</label>
        <select id="hari" class="form-control @error('hari') is-invalid @enderror" required name="hari">
          <option>--Pilihan--</option>
          <option @if($data->hari == 'Isnin') selected @endif value="Isnin">Isnin</option>
          <option @if($data->hari == 'Selasa') selected @endif value="Selasa">Selasa</option>
          <option @if($data->hari == 'Rabu') selected @endif value="Rabu">Rabu</option>
          <option @if($data->hari == 'Khamis') selected @endif value="Khamis">Khamis</option>
          <option @if($data->hari == 'Jumaat') selected @endif value="Jumaat">Jumaat</option>
          <option @if($data->hari == 'Sabtu') selected @endif value="Sabtu">Sabtu</option>
          <option @if($data->hari == 'Ahad') selected @endif value="Ahad">Ahad</option>
        </select>
        @error('hari')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="lokasi">Lokasi:</label>
        <select id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" required name="lokasi">
          <option>--Pilihan--</option>
          <option @if($data->lokasi == 'Rumah Kediaman') selected @endif value="Rumah Kediaman">Rumah Kediaman</option>
          <option @if($data->lokasi == 'Komersial Bertingkat') selected @endif value="Komersial Bertingkat">Komersial
            Bertingkat</option>
        </select>
        @error('lokasi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="jenis_lokasi">Jenis Lokasi:</label>
        <select id="jenis_lokasi" class="form-control @error('jenis_lokasi') is-invalid @enderror" required name="jenis_lokasi">
          <option></option>
          <option @if($data->jenis_lokasi == 'Rumah Kerbide (Landed)') selected @endif value="Rumah Kerbide (Landed)">Rumah Kerbide (Landed)</option>
          <option @if($data->jenis_lokasi == 'Rumah Pangsa/Rumah Kampung (Non-landed)') selected @endif value="Rumah Pangsa/Rumah Kampung (Non-landed)">Rumah Pangsa/Rumah Kampung (Non-landed)</option>
          <option @if($data->jenis_lokasi == 'Komersial Bulk') selected @endif value="Komersial Bulk">Komersial Bulk</option>
          <option @if($data->jenis_lokasi == 'Institusi') selected @endif value="Institusi">Institusi</option>
        </select>
        @error('jenis_lokasi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="unit">Unit:</label>
        <input class="form-control @error('unit') is-invalid @enderror" type="text" required name="unit"
          value="{{ $data->unit }}" />
        @error('unit')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="saiz_bin">Saiz Bin:</label>
        <select id="saiz_bin" class="form-control @error('saiz_bin') is-invalid @enderror" required name="saiz_bin"
          value="{{ $data->saiz_bin }}">
          <option>--Pilihan--</option>
          <option @if($data->saiz_bin == '120 L') selected @endif value="120 L">120 L</option>
          <option @if($data->saiz_bin == '240 L') selected @endif value="240 L">240 L</option>
          <option @if($data->saiz_bin == '1100 L') selected @endif value="1100 L">1100 L</option>
        </select>
        @error('saiz_bin')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="bil_tong">Bilangan Tong:</label>
        <input class="form-control @error('bil_tong') is-invalid @enderror" type="text" required name="bil_tong"
          value="{{ $data->bil_tong }}" />
        @error('bil_tong')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="catatan">Catatan:</label>
        <textarea class="form-control @error('catatan') is-invalid @enderror" type="text"
          name="catatan">{{ $data->catatan }}</textarea>
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