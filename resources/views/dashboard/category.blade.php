@extends('template.template')

@section('main')

    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>


<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="card-content">
                                {{--  <h5 class="card-title activator">Basic Form<i class="material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Get Code">more_vert</i></h5>  --}}
                                <form action="/category" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" name="nama_category" type="text">
                                            <label for="name">Nama Category : </label>

                                            @error('nama_category')
                                                <small>{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="modal-action modal-close btn btn-danger">close</button>
                                    <button type="submit" class="btn btn-primary">simpan</button>
                                </form>
                            </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close ">Agree</a>
        <a href="#!" class="modal-action modal-close ">Agree</a>
    </div>
    </div>

    <table id="file_export" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $a)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{  $a->nama_category }}</td>

                <td>
                    <a href="/deleteextra/{{ $a->id }}" style="color: red;"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection