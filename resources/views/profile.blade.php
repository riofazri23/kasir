@extends('layout.layout')
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @foreach ($data_profile as $d)
                            <form action="/profile/update/{{ $d->id }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">{{ $title }}</h4>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{ $d->name }}"
                                            placeholder="Nama Lengkap..." required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" value="{{ $d->name }}"
                                                    placeholder="Nama Lengkap..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" value="{{ $d->password }}"
                                                    placeholder="Password..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                        Changes</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalCreate">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/jenisbarang/store">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Jenis</label>
                            <input type="text" class="form-control" name="nama_jenis" placeholder="Nama Jenis...."
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($data_diskon as $d)
        <div class="modal fade bd-example-modal-lg" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/jenisbarang/update/{{ $d->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Jenis</label>
                                <input type="text" value="{{ $d->nama_jenis }}" class="form-control" name="nama_jenis"
                                    placeholder="Nama Jenis...." required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                                Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
