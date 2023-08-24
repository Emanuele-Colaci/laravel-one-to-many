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
            <div class="my-12">
            @if($project->type)
                <h5 class="my-5">{{ $project->type_id->name }}</h5>
            @else
                <h5 class="my-5">Tipologia non disponibile</h5>
            @endif
            </div>
        </div>
    </div>
@endsection