@extends('layouts.app')

@section('content')

<!-- Department Dropdown -->
Department : <select id='sel_depart' name='sel_depart'>
    <option value='0'>-- Select department --</option>

    <!-- Read Departments -->
    @foreach($departments as $department)
        <option value='{{ $department->id }}'>{{ $department->name }}</option>
    @endforeach

</select>

<br><br>
<!-- Department Employees Dropdown -->
Employee : <select id='sel_emp' name='sel_emp'>
    <option value='0'>-- Select Employee --</option>
</select>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){

    // Department Change
    $('#sel_depart').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#sel_emp').find('option').not(':first').remove();

         // AJAX request 
         $.ajax({
             url: 'getEmployees/'+id,
             type: 'get',
             dataType: 'json',
             success: function(response){

                 var len = 0;
                 if(response != null){
                      len = response.length;
                 }

                 if(len > 0){
                      // Read data and create <option >
                      for(var i=0; i<len; i++){

                           var id = response[i].id;
                           var name = response[i].name;

                           var option = "<option value='"+id+"'>"+name+"</option>";

                           $("#sel_emp").append(option); 
                      }
                 }

             }
         });
    });
});
</script>
    
@endsection