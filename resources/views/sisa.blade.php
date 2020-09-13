@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Pengurusan Sisa Pepejal</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('addsisa') }}">
    @csrf
    <h2 class="h3 mb-0 text-gray-800"><b>A. INFO SERAHAN</b></h2><br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="serahan">Tarikh Serahan:</label>
        <input type="date" class="form-control @error('serahan') is-invalid @enderror" id="datepicker" name="serahan" required/>
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
        <input type="date" class="form-control" id="datepicker2" name="terima" required/>
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
    <h2 class="h3 mb-0 text-gray-800"><b>C. MAKLUMAT SISA PEPEJAL</b></h2><br>
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
        <label class="small mb-1" for="sub_sisa">Sub Kategori:</label>
        <select id="sub_sisa" class="form-control @error('sub_sisa') is-invalid @enderror" required name="sub_sisa">
          <option></option>
          <option value="Premis Kediaman">Premis Kediaman</option>
          <option value="Premis Perniagaan">Premis Perniagaan</option>
          <option value="CBK">CBK</option>
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
          <option></option>
          <option value="6 Kali Seminggu">6 Kali Seminggu</option>
          <option value="2 Kali Seminggu">2 Kali Seminggu</option>
          <option value="1 Kali Seminggu">1 Kali Seminggu</option>
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
          <option></option>
          <option value="Isnin">Isnin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Khamis">Khamis</option>
          <option value="Jumaat">Jumaat</option>
          <option value="Sabtu">Sabtu</option>
          <option value="Ahad">Ahad</option>
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
          <option></option>
          <option value="Rumah Kediaman">Rumah Kediaman</option>
          <option value="Komersial Bertingkat">Komersial Bertingkat</option>
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
          <option value="Rumah Kerbide (Landed)">Rumah Kerbide (Landed)</option>
          <option value="Rumah Pangsa/Rumah Kampung (Non-landed)">Rumah Pangsa/Rumah Kampung (Non-landed)</option>
          <option value="Komersial Bulk">Komersial Bulk</option>
          <option value="Institusi">Institusi</option>
        </select>
        @error('jenis_lokasi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="unit">Unit:</label>
        <input class="form-control @error('unit') is-invalid @enderror" type="text" required name="unit" />
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
        <select id="saiz_bin" class="form-control @error('saiz_bin') is-invalid @enderror" required name="saiz_bin">
          <option></option>
          <option value="120 L">120 L</option>
          <option value="240 L">240 L</option>
          <option value="1100 L">1100 L</option>
        </select>
        @error('saiz_bin')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="small mb-1" for="bil_tong">Bilangan Tong:</label>
        <input class="form-control @error('bil_tong') is-invalid @enderror" type="text" required name="bil_tong" />
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
<!-- /.container-fluid -->
@endsection