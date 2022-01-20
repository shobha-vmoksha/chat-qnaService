@extends('admin.layouts.default')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Post Your Comment here</h3>
                    <br/>
                    <h2>{{ $question->title }}</h2>
                    <p>
                        {{ $question->body }}
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@stop