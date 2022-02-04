@extends('admin.layouts.default')
@section('content')

<div class="container-fluid">
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row mb-5">
                    <button type="button" class="btn btn-secondary btn-lg"> <i class="fa fa-question-circle" aria-hidden="true"> User Says</i></button>
                </div>


                <div class="container">
                    <div class="panel panel-default">
                        <div class="panel-heading">Post Your Question Here...</div>
                        <div class="panel-body">


                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="title[]" class="form-control m-input title" placeholder="Enter Question" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button id="addRow" type="button" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="newRow"></div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var i = 0;

    function changeValidator($event) {
        var element = $(event.target);
        var val = $(event.target).val();
        console.log($(event.target).attr('id'))
        var eleId = $(event.target).attr('id');
        $('input[name^="title"]').each(function(ele) {
            console.log($(this).attr('id'), 'ele', eleId)
            if ($(this).attr('id') !== (eleId)) {
                if ($(this).val() == val) {
                    alert('Duplicate Value')
                    $(element).val('')
                    return false;
                }
            }

        })
    }
    
    $("#addRow").click(function() {
        i++;
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input id=id' + i + ' type="text" name="title[]" class="form-control m-input title" placeholder="Enter Question" autocomplete="off" onchange="changeValidator(event)" onfocus="showButton(event)">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger overout"><i class="fa fa-minus" aria-hidden="true"></i></button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });
    //hide row
//     function showButton($event) {
//         var element = $(event.target);
//         var val = $(event.target).val();

//   var x = document.getElementById("val");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     x.style.display = "none";
//   }
// }



    //    function showButton($event){
    //     var element = $(event.srcElement);
    //    var id = $(event.srcElement).attr('id');
    //    console.log(id)
    //     $("#inputFormRow").mouseover(function() {
    //     $('#removeRow #id').show();

    //      }).mouseout(function() {
    //     $('#removeRow  #id').hide();
    // });
    // $("#removeRow").hide()
    //      $("#newRow").mouseover(function() {
    //     $('#removeRow').show();

    //      }).mouseout(function() {
    //     $('#removeRow').hide();
    // });
    // }






    // $(document).ready(function() {
    //     $(".title").click(function(event) {
    //         $("#removeRow").show();
    //         var id = $(event.target).attr('id');
    //         $("#div" + id).hide();
    //     });
    // });

    // function showButton($event) {
    //     var element = $(event.target);
    //    // console.log(element);
    //     var val = $(event.target).val();
    //     var eleId = $(event.target).attr('id');
    //    // console.log(eleId);
    //    $("#removeRow").hide()
    //      $("val").mouseover(function() {
    //     $('#removeRow').show();

    //      }).mouseout(function() {
    //     $('#removeRow').hide();
    // });
    // }

        
       
    



  
</script>
<style>

</style>


@stop