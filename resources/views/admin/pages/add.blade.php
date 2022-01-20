@extends('admin.layouts.default')
@section('content')
 

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">Create New Question</div>
                <div class="card-body">
                    <form action="{{url('question.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label class="label">Question Title: </label>
                            <input type="text" name="title" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="label">Post Question: </label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                        </div>

                       
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop