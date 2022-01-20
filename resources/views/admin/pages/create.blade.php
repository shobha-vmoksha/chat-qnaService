@extends('admin.layouts.default')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-3">
        <h3>Add Your Input Here</h3>
    </div>


</div>

<div class="container-fluid">
    <form method="post" action="">

        <div class="row">
            <div class="col-lg-12">
                <div id="inputFormRow">
                    <label class="label">Post Answer: </label>
                    <div class="input-group mb-3">
                        <input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off" id="inp">
                        <div class="input-group-append">
                            <!-- <button id="removeRow" type="button" class="btn btn-danger">Remove</button> -->
                            <button type="button" id="removeRow" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="newRow"></div>
                <button id="addRow" type="button" class="btn btn-info">Add Row</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    // add row
    $("#addRow").click(function() {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
        html += '<div class="input-group-append">';
        // html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '<button type="button"  id="removeRow" class="btn btn-danger" ><i class="fa fa-trash"></i></button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    //remove row
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });


   //hide delete button
    $("#removeRow").hide()
    $("#inputFormRow").mouseover(function() {
        $('#removeRow').show();
    }).mouseout(function() {
        $('#removeRow').hide();
    });
    

//     $(document).ready(function(){
//   $("inputFormRow").dblclick(function(){
//     $(this).hide();
//   });
// });

    // $('#inputFormRow').hover(function() {
    //         $(this).find('#removeRow').show();
    //     },
    //     function () {
    //         $(this).find('#removeRow').hide();
    //     }
    //);
    
</script>
@stop