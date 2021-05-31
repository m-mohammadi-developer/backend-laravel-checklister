@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">



                <div class="col-md-12">



                    <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">



                            <div class="card-header">{{ __('Edit Task') }}</div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($errors->storetask->any())
                                            <div class="alert alert-danger">
                                                <ul class="">
                                                    @foreach ($errors->storetask->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" type="text"
                                                placeholder="{{ __('Task name') }}" name="name"
                                                value="{{ $task->name ?: old('name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" rows="5">{{ $task->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-block btn-primary"
                                    type="submit">{{ __('Save Task') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
