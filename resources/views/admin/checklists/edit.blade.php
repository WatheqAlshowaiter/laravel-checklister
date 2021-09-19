@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Checklist') }}</div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                value="{{ $checklist->name }}">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Checklist') }}</button>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are You Sure to Delete this checklist?') }}')">
                            {{ __('Delete This Checklist') }}
                        </button>
                    </form>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ __('List of tasks') }}</h3>
                        </div>
                        <div class="card-body">
                            @livewire('tasks-table', ['checklist'=>$checklist])

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">{{ __('Add Tasks') }}</div>
                        @if ($errors->task->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->task->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                value="{{ old('name') }}">
                                        </div>
                                        <div class=" form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" id="description" type="text" name="description"
                                                rows="5">{{ old('description') }}</textarea>
                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
