@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Rekod CCC</b></h1>
  </div>
  <form class="user" method="POST" action="{{ route('addrekod') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="taman">Taman:</label>
        <select id="taman" class="form-control @error('taman') is-invalid @enderror" name="taman" oninput="jalanSearch(value)" required>
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
        <select id="jalan" class="form-control @error('jalan') is-invalid @enderror" name="jalan" required>
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
        <label class="small mb-1" for="terima_ccc">Tarikh Terima CCC:</label>
        <input type="date" class="form-control @error('terima_ccc') is-invalid @enderror" id="terima_acc" name="terima_ccc" required/>
        @error('terima_ccc')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="tamat_ccc">Tarikh Tamat CCC:</label>
        <input type="date" class="form-control @error('tamat_ccc') is-invalid @enderror" id="tamat_ccc" name="tamat_ccc" required/>
        @error('tamat_ccc')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <br>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="notis">Tarikh Pemberitahuan:</label>
        <input type="date" class="form-control @error('notis') is-invalid @enderror" id="notis" name="notis" required/>
        @error('notis')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="status_sisa">Pengurusan Sisa Pepejal:</label>
        <select id="status_sisa" class="form-control @error('status_sisa') is-invalid @enderror" name="status_sisa" required>
          <option></option>
          <option value="Dalam tindakan">Dalam tindakan</option>
          <option value="Belum diserah">Belum diserah</option>
          <option value="Telah diserah">Telah diserah</option>
        </select>
        @error('status_sisa')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label class="small mb-1" for="status_rumput">Pemotongan Rumput:</label>
        <select id="status_rumput" class="form-control @error('status_rumput') is-invalid @enderror" name="status_rumput" required>
          <option></option>
          <option value="Dalam tindakan">Dalam tindakan</option>
          <option value="Belum diserah">Belum diserah</option>
          <option value="Telah diserah">Telah diserah</option>
        </select>
        @error('status_rumput')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label class="small mb-1" for="status_longkang">Pembersihan Longkang:</label>
        <select id="status_longkang" class="form-control @error('status_longkang') is-invalid @enderror" name="status_longkang" required>
          <option></option>
          <option value="Dalam tindakan">Dalam tindakan</option>
          <option value="Belum diserah">Belum diserah</option>
          <option value="Telah diserah">Telah diserah</option>
        </select>
        @error('status_longkang')
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