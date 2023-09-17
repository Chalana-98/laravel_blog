@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Post Title" required>
                        </div>

                        <div class="mb-3">
                            <label>Post Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Post Description" rows="10" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection