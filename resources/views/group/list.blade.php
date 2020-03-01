@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('list Groups') }}</div>

                    <div class="card-body">
                        <ul>
                            @foreach($groups as $group)
                                <li>{{$group->is_core ? 'core' : 'additional' }}: {{$group->name}}
                                    @if($group->is_default) <span style="color: green">{{  __('default') }}</span> @endif
                                    @if(!$group->is_core)
                                        @can('edit_group')
                                            <span><a href="{{ route('group.edit', $group->id) }}"><i class=""></i>{{ __('edit')}}</a></span>
                                        @endcan
                                    @endif
                                    @can('remove_group')
                                        @if(! $group->is_core)
                                            <form action="{{ route('group.destroy', $group->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" >{{ __('delete')  }}</button>
                                            </form>
                                        @endif
                                    @endcan
                                </li>
                            @endforeach
                        </ul>
                        @can('edit_user')
                            <a href="{{ route('group.create') }}" class="btn btn-primary">{{  __('add') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection