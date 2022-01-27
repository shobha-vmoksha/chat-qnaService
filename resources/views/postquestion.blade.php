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
                        <div class="panel-heading">Post Your Question Here</div>
                        <div class="panel-body">


                            <form action="">


                                <div class="input-group control-group after-add-more ">
                                    <input type="text" name="addmore[]" class="form-control alldifferent" placeholder="Enter Question Here" value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success add-more " type="button"><i class="fa fa-plus" aria-hidden="true"></i> </button>
                                    </div>
                                </div>


                            </form>


                            <!-- Copy Fields -->
                            <div class="copy hide">
                                <div class="control-group input-group " style="margin-top:10px">
                                    <input type="text" name="addmore[]" class="form-control alldifferent " placeholder="Enter Question Here" value="">
                                    <div class="input-group-btn">
                                        <!-- <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button> -->
                                        <button class="btn btn-danger remove" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <!-- <div class="duplicate-div" ></div> -->
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<input type="hidden" name="hiddenvalue" class="hiddenvalue" value="1">


<script type="text/javascript">
    function removeclass(id) {
        $(".removeclass" + id).remove();
    }

    $(document).ready(function() {

        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });


        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });


        // $(".remove").hide()
        // $(".copy").mouseover(function() {
        //     $('.remove').show();

        // }).mouseout(function() {
        //     $('.remove').hide();
        // });


        //         $('.copy').hover(function() {
        //         $(this).find('.remove').show();
        //     },
        //     function () {
        //         $(this).find('.remove').hide();
        //     }
        // );









        // $("input").change(function() {
        //     var x = $(this).val();
        //     var z = 0;
        //     $("input").each(function() {
        //         var y = $(this).val();
        //         if (x == y) {
        //             z = z + 1;
        //         }
        //     });
        //     if (z > 1)  {
        //         alert(" You Have Entered Dulpicate Value");
        //     }
        // })



        $(".alldifferent").keyup(function() {
            var $this = $(this);
            //\\var value = $("#alldifferent").val();
            keyupDelay(function() {
                var val = $this.val();
                //console.log(val);
                $this.attr('value', val);
                if (val != '') {
                    // get all inputs with this value and and index greater than 0 ( the duplicates ) setting all to ''
                    var $dupes = $('input[value="' + val + '"]:gt(0)').val('');
                    // if we had to empty any, alert the user
                    if ($dupes.length > 0) alert('Duplicates are not allowed!');
                }
            }, 400); // delay, adjust as needed
        });


        var keyupDelay = (function() {
            var timer = 0;
            return function(callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();


    });














    // $(".alldifferent").keyup(function() {
    //     var $this = $(this);
    //    // alert('gg')
    //     //\\var value = $("#alldifferent").valn();
    //     keyupDelay(function() {
    //         var val = $this.val();
    //     //console.log(val);
    //         $this.attr('value', val);
    //         if (val != '') {
    //             // get all inputs with this value and and index greater than 0 ( the duplicates ) setting all to ''
    //             // var $dupes = $('input[value="' + val + '"]:gt(0)').val('');

    //             // if we had to empty any, alert the user
    //             // if ($dupes.length > 0) alert('Duplicates are not allowed!');
    //             var element = "";
    //             var z = 0;
    //         $("input").each(function() {
    //             var y = $(this).val();
    //             element =  $(this);
    //            // console.log(element);
    //             if (val == y) {
    //                 z = z + 1;
    //                 if (z > 1)  {
    //                    // console.log(element)
    //                     //$(element).remove()
    //                     removeElement(element)
    //                     alert(" You Have Entered Dulpicate ");
    //                     return false;
    //                 }
    //             }
    //         });


    //         }

    //     }, 400); // delay, adjust as needed
    // });



    // timer function to be used with keyup


    // function inputsHaveDuplicateValues() {
    //     var hasDuplicates = false;
    //     $('input').each(function() {
    //         var $inputsWithSameValue = $('input[value=' + $(this).val() + ']');
    //         hasDuplicates = ($inputsWithSameValue.length > 1);
    //         if (hasDuplicates === true) {
    //             return hasDuplicates;
    //         }
    //         return hasDuplicates;
    //     });
    //     return hasDuplicates;
    // }


    // function CheckDuplicate()
    // {
    //     var userinput = [];
    //     $(".email").removeClass("email");//clearning textbox
    //     var $input = $('input[class="usertext"]');
    //     $input.each(function(){
    //         var v=this.value;
    //         if(!v)return true;
    //         if(userinput.includes(v))
    //         $input.filter(function()
    //         {
    //             return this.value == v
    //         }).addClass(email);
    //         userinput.push(v);
    //     });

    // };
</script>





@stop