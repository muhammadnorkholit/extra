@extends('template.template')

@section('main')

    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>


<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="card-content">
                                <h5 class="card-title activator">Basic Form<i class="material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Get Code">more_vert</i></h5>
                                <form action="/dataextrakulikuler" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" name="nama_extra" type="text">
                                            <label for="name">Nama Extra : </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="desc" name="desc" type="text">
                                            <label for="desc">Deskripsi</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="f" name="file" class="form-control" type="file">
                                           
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="pg" name="pg" class="materialize-textarea" style="height: 46px;"></textarea>
                                            <label for="pg">penanggung jawab</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <select class="form-control" name="category">
                                        <option>Pilih Kategory</option>
                                        @foreach ($category as $d)
                                            <option value="{{$d->id}}">{{$d->nama_category}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    
                                    <button class="modal-action modal-close btn" type="button">close</button>
                                    <button class="btn" type="submit">simpan</button>
                                </form>
                            </div>
    </div>

    </div>

    <table id="file_export" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Penganggung Jawab</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extra as $a)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{  $a->nama_extra }}</td>
                <td>{{ $a->penanggung_jawab }}</td>
                <td>{{ $a->nama_category }}</td>
                <td>
                    <a href="/dataextrakulikuler/{{ $a->id }}" style="color: yellow; margin-right: 20px;"><i class="fas fa-eye"></i></a>
                    <a href="/deleteextra/{{ $a->id }}" style="color: red;"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection