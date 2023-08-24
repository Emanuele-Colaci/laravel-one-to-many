@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 d-flex justify-content-between">
                <div>
                    <h1>Tipologia</h1>
                </div>
                <div>
                    <a href="{{ route('admin.types.create') }}" class="btn btn-success">Crea</a>
                </div>
            </div>
            <div class="col-12 mt-5">
                @if($message != '')
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr class="text-center">
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-info mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning mx-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="d-inline-block mx-1 delete-post-form" action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button data-project-title="{{ $type->titolo }}" type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.partials.modal_delete')
@endsection