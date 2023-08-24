@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-5">
                    <div>
                        <h1>{{ $project->titolo }}</h1>
                    </div>
                    <div>
                        <a href="{{ route('admin.project.index') }}" class="btn btn-success">Proggetti</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p>{{ $project->descrizione }}</p>
            </div>
            <div class="col-12">
                <!-- VINCOLATO DAL NOME DELLA MODEL -->
                <div class="my-5">
                    @if(empty($project->type->name))
                        <h3>Tipologia non disponibile</h3>
                    @else
                        <label class="fw-bold">Tipologia:</label>
                        <h3>{{ $project->type->name }}</h3>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="container-img">
                    <img src="{{ asset('storage/'. $project->image) }}" height="100%" width="100%">
                </div>
            </div>
        </div>
    </div>
@endsection