@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="align-items-center justify-content-between">
    <center>
      <br><br><br><br><br>
      <a href="{{ route('sisa') }}"><img src="../img/sisa1.png" width="23%" /></a>
      <a href="{{ route('awam') }}"><img src="../img/awam1.png" width="23%" /></a>
      <a href="{{ route('rekod') }}"><img src="../img/rekod1.png" width="23%" /></a>
    </center>
  </div>
</div>
@endsection