@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div class="col-sm-12">
    <h1 class="display-3">Mahasiswa</h1> 
    <br>
    <a href="{{ route('mahasiswas.create')}}" class="btn btn-primary">New Mahasiswa</a>
      
  <table class="table table-striped">
    <thead>
        <tr>
          <td>NIK</td>
          <td>Nama</td>
          <td>Jurusan</td>
          <td>Alamat</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswas as $data)
        <tr>
            <td>{{$data->nik}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->jurusan}}</td>
            <td>{{$data->alamat}}</td>
            <td>
                <a href="{{ route('mahasiswas.edit',$data->nik)}}" class="btn btn-primary">Edit</a>
               </td><td> <form action="{{ route('mahasiswas.destroy', $data->nik)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection