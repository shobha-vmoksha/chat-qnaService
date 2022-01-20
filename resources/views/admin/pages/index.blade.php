@extends('admin.layouts.default')
@section('content')

<section class="content">
<div class="container-fluid">

  <div class="row mt-4" style="  margin-left: 30%;">

    <div class="col-6">
      <h1>Questionary Table</h1>
    </div>

    <div class="col-6">
      <div class="float-right">
        <a href="{{ route('add')  }}" class="btn btn-primary resmb redbutton p-2">Add Questionnaire</a>
      </div>
    </div>

  </div>

  <div class="col-md-12">
    <div class="row">
      <table class="table table-hover text-nowrap table-bordered">
        <thead>
          <tr>
            <th>Unique Id</th>
            <th>Question</th>
            <th>Answer</th>
          
            <th style="width:20px;">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($questionlist as $ques)
        <tr>
          <td>{{$ques['id']}}</td>
          <td>{{$ques['title']}}</td>
          <td>{{$ques['body']}}</td>
          <td>
          <a href={{"viewquestion/".$ques['id']}} class="btn btn-primary" type="button" > <i class="fa fa-eye" aria-hidden="true"></i></a>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
                <i class="fa fa-edit"></I>
              </button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">
                <i class="fa fa-trash"></i>
              </button>

          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>


    </div>
</div>
</section>

<!--modal section-->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--delete modal-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Are You Sure You want to Delete</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary   redoutlinebutton" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary currentdelete redbutton" id="" onclick="delete_user(this.id)" data-dismiss="modal">DELETE</button>
      </div>
    </div>
  </div>
</div>




@stop