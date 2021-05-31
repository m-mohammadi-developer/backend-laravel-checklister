@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">



                <div class="col-md-12">



                    <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="card">



                            <div class="card-header">{{ __('Edit Checklist in ') }}</div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="">
                                                    @foreach ($errors->all() as $error)
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
                                                placeholder="{{ __('Checklist name') }}" name="name"
                                                value="{{ $checklist->name }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-block btn-primary"
                                    type="submit">{{ __('Save Checklist') }}</button>
                            </div>
                        </div>
                    </form>

                    <form id="delete-checklist-group"
                        action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-block btn-danger" type="submit"
                            onClick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete This Checklist') }}</button>
                    </form>

                    <hr />

                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>{{ __('List Of Tasks') }}</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <tbody>
                                    @foreach ($checklist->tasks as $task)
                                        <tr>
                                            <td>{{ $task->name }}</td>
                                            <td>
                                                <a class="btn btn-small btn-info"href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">{{  __('Edit') }}</a>
                                                <form style="display: inline-block;"
                                                    action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-small btn-danger" type="submit"
                                                        onClick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="post">
                        @csrf

                        <div class="card">


                            <div class="card-header">{{ __('New Task') }}</div>

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
                                            <input class="form-control" id="name" type="text"
                                                placeholder="{{ __('Task name') }}" name="name"
                                                value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description"
                                                rows="5">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-block btn-primary" type="submit">{{ __('Save Task') }}</button>
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection
