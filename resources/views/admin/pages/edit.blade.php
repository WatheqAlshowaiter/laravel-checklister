@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Edit page') }}</div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.pages.update', [$page]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('Title') }}</label>
                                            <input class="form-control" id="title" type="text" name="title"
                                                value="{{ $page->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="content-textarea">{{ __('Content') }}</label>
                                            <textarea class="form-control" id="content-textarea" type="text"
                                                name="content" rows="5">{{ $page->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }}</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    @include('admin.ckeditor')
@endSection
