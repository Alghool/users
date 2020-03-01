@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('edit group') }}: {{ $name }} </div>
                    <div class="card-body">
                        <form action="{{ route('group.update', $id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')?? $name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="permissions[]" class="col-md-4 col-form-label text-md-right">{{ __('permission') }}</label>

                                <div class="col-md-6">
                                    @foreach($permissions as $permission)
                                        <div  class="col-md-8 text-md-right"></div>
                                        <input type="checkbox" name="permissions[]"  value="{{ $permission->id }}" {{ in_array($permission->id, $myPermissions) ? 'checked' :'' }}> {{ $permission->name }}
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection