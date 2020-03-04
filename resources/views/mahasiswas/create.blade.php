@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add Mahasiswa</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('mahasiswas.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nama">Nama Mahasiswa</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select name=jurusan class="form-control">
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Sistem Informasi">Teknik Informatika</option>
                <option value="Sistem Informasi">Teknik Mesin</option>
                <option value="Sistem Informasi">Sastra Inggris</option>
                <option value="Sistem Informasi">Teknik Elektro</option>
              </select>
          </div>

          <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text-area" class="form-control" name="alamat" maxlength=50/>
          </div>                       
          <button type="submit" class="btn btn-primary">Add Mahasiswa</button>
      </form>
  </div>
</div>
</div>
@endsection