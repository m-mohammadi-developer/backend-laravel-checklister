@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('admin.checklist_groups.store') }}" method="post">
                        @csrf
                        <div class="card">



                            <div class="card-header">{{ __('Create Checklist Group') }}</div>

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
                                                placeholder="{{ __('Checklist group name') }}" name="name">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-block btn-primary" type="submit"> Save</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
