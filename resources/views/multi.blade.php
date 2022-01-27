@extends('admin.layouts.default')
@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Add Questions </div>
    <div class="panel-body">

      <!-- <form action="action.php" >  
  
        <div class="input-group control-group after-add-more">  
          <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here" id="gfg_field"  oninput="gfg_check_duplicates()">  
          <div class="input-group-btn">   
            <button class="btn btn-success add-more" type="button"  ><i class="glyphicon glyphicon-plus"></i> Add</button>  
          </div>  
        </div>  
  
        </form>   -->

      <!-- Copy Fields -->
      <!-- <div class="copy hide">  
          <div class="control-group input-group" style="margin-top:10px">  
            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here" id="gfg_field"  oninput="gfg_check_duplicates()">  
            <div class="input-group-btn">   
              <button class="btn btn-danger remove" type="button" ><i class="glyphicon glyphicon-remove"></i> Remove</button>  
            </div>  
          </div>  
        </div>   -->
      <div class="input_fields_wrap">
        <div class="input-group control-group">
          <input type="text" name="addmore[]" class="form-control alldifferent" placeholder="Enter Question Here" value="">
          <div class="input-group-btn">
            <button class="btn btn-warning add_field_button " type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  // $(document).ready(function() {  

  //   $(".add-more").click(function(){   
  //       var html = $(".copy").html();  
  //       $(".after-add-more").after(html);  
  //   });  

  //   $("body").on("click",".remove",function(){   
  //       $(this).parents(".control-group").remove();  
  //   });  

  // });  
  // function gfg_check_duplicates() {
  //    var myarray = [];
  //    for (i = 0; i < 4; i++) {
  //      myarray[i] = 
  //       document.getElementById("gfg_field" + i).value;
  //             }
  //      for (i = 0; i < 4; i++) {
  //         for (j = i + 1; j < 4; j++) {
  //            if (i == j || myarray[i] == "" || myarray[j] == "") 
  //                 continue;
  //                if (myarray[i] == myarray[j]) {
  //                document.getElementById("status" + i)
  //                  .innerHTML = "duplicated values!";
  //                document.getElementById("status" + j)
  //                 .innerHTML = "duplicated values!";
  //                     }
  //                 }
  //             }
  //         }


  //     $(document).ready('blur','#gfg_field',function () {
  //     var current_value = $(this).val();
  //   $(this).attr('value',current_value);
  // console.log(current_value);
  //     if ($('.selector[value="' + current_value + '"]').not($(this)).length > 0 || current_value.length == 0 ) {
  //       $(this).focus();
  //         alert('You cannot use this');
  //     }
  // });

  $(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
      e.preventDefault();
      if (x < max_fields) { //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="input-group control-group"><input type="text" name="addmore[]" class="form-control alldifferent" placeholder="Enter Question Here"  value="" id="" ><div class="input-group-btn"><button class="btn btn-success remove_button" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); //add input box
      }
    });

    // $(wrapper).on("click", ".remove_button", function(e) { //user click on remove text
    //     e.preventDefault();
    //     $(this).parent('div').remove();
    //     x--;
    // })


    $("body").on("click", ".remove_button", function() {
      // e.preventDefault();
      $(this).parents(".control-group").remove();
      X--;
    });
  });

  $(".alldifferent").keyup(function() {
    var $this = $(this);
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


  // timer function to be used with keyup
  var keyupDelay = (function() {
    var timer = 0;
    return function(callback, ms) {
      clearTimeout(timer);
      timer = setTimeout(callback, ms);
    };
  })();


  // function InputDuplicates()
  // {
  //     var multipleinput = [];//collect array
  //     $(".muinput").removeClass[muinput];//clear input on add
  //     var $input = $('input[class="alldifferent"]');  //collecting input from multiple i/p
  //     $input.each(function()
  //     {
  //         var v= this.value;
  //         if(!v) return true;
  //         if(multipleinput.includes(v))
  //         $inputs.filter(function()
  //         {
  //             return this.value == v
  //         }).addClass("muinput");
  //         multipleinput.push(v);
  //     });

  // };
</script>
<style>
  .muinput {
    color: white;
    background-color: red;
  }
</style>


@stop