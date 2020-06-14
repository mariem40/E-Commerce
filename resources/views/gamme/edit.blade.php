@extends('categories.layout')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'une marque</p>
        </header>
		 @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-content">
            <div class="content">
                <form action="{{ route('gammes.update', $gamme->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <strong>Name</strong>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $gamme->name) }}" placeholder="Nom du gamme">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    
                    <div class="field">
                        <div class="control">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection