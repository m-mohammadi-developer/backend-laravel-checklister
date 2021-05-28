@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('admin.checklist_groups.update', $checklistGroup) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">



                            <div class="card-header">{{ __('Edit Checklist Group') }}</div>

                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text"
                                                placeholder="{{ __('Checklist group name') }}" name="name"
                                                value="{{ $checklistGroup->name }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-block btn-primary" type="submit"> Save</button>

                            </div>
                    </form>
                </div>

                <form id="delete-checklist-group"
                    action="{{ route('admin.checklist_groups.destroy', $checklistGroup->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-block btn-danger" type="submit"
                        onClick="return confirm('{{ __('Are you sure?') }}')"
                        >{{ __('Delete This Checklist Group') }}</button>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection
