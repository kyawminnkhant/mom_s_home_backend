@extends('layouts.admin')

@section('content')

<h3 class="text-gray-800">Recipes</h3>
          <p class="mb-4">Fill out all the informations.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add New Recipe</h6>
            </div>
            <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'RecipeController@store', 'class'=>'user', 'files' => 'true' ]) !!}
                            <div class="form-group row">

                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    {!! Form::label('title', 'Recipe Information*', ['style' => 'color:red;']) !!}
                                </div>


                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        {!! Form::text('title', null, ['class'=>'form-control form-control-user', 'placeholder'=>'New Recipe Name', 'id'=>'exampleFirstName']) !!}
                                    </div>

                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <select name="isSetMeals" id="setMeals"><option value="">Is Set Meals?</option><option value="0">No</option><option value="1">Yes</option></select>
                                    </div>

                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        {!! Form::select('set_meals_id', array(''=>'Choose Set') + $sets, null , ['class'=>'form-control form-control-user', 'id'=>'setMealsSelect']) !!}
                                    </div>

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <br>
                                    </div>

                                    <div class="col-sm-6">
                                            {!! Form::number('totalCosts', null, ['class' => 'form-control form-control-user', 'placeholder' => 'Total costs']) !!}
                                    </div>

                                    <div class="col-sm-6">
                                        {!! Form::number('readyInMinutes', null, ['class'=>'form-control form-control-user', 'placeholder'=>'Total time', 'id'=>'exampleFirstName']) !!}

                                    </div>

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <hr>
                                    </div>

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        {!! Form::label('image_label', 'Recipe Photo*', ['style' => 'color:red;']) !!}
                                        <br>
                                        {!! Form::file('image') !!}
                                    </div>

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <hr>
                                    </div>



                                    <div class="col-sm-6">
                                        {!! Form::select('categories_id', array(''=>'Choose Category') + $categories, null , ['class'=>'form-control form-control-user', 'id'=>'exampleFirstName']) !!}
                                    </div>

                                    <div class="col-sm-6">
                                        {!! Form::select('dish_types_id', array(''=>'Choose Type') + $types, null , ['class'=>'form-control form-control-user', 'id'=>'exampleFirstName']) !!}
                                    </div>

                                    <div class="col-sm-12">
                                       <br>
                                    </div>


                                    <div class="col-sm-12">
                                        {!! Form::label('descriptions', 'Descriptions*', ['style' => 'color:red']) !!}
                                        {!! Form::textarea('descriptions', null, ['class'=>'form-control', 'placeholder'=>'Write descriptions.', 'id'=>'exampleFirstName', 'row'=> 3]) !!}
                                    </div>



                                    <div class="col-sm-12">
                                        {!! Form::label('instructions', 'Instructions*', ['style' => 'color:red']) !!}
                                        {!! Form::textarea('instructions', null, ['class'=>'form-control', 'placeholder'=>'Write instructions.', 'id'=>'exampleFirstName', 'row'=> 5]) !!}
                                    </div>

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <br>
                                    </div>

                                    <div class="col-sm-12">
                                        {!! Form::label('instructions', 'Ingredients List*', ['style' => 'color:red']) !!}

                                    </div>



                                    <div class="col-sm-4">
                                    <select name="ingredients[1]" class="form-control"><option value="">Choose Ingredients</option> @foreach ($ingredients as $ingre)<option value="{{ $ingre->id }}">{{ $ingre->name }}</option>@endforeach</select>
                                    </div>

                                    <div class="col-sm-3">
                                        {!! Form::number('amount[1]', null, ['class'=>'form-control', 'placeholder'=>'Enter amount', 'id'=>'exampleFirstName']) !!}
                                    </div>

                                    <div class="col-sm-4">
                                        {!! Form::text('unit[1]', null, ['class'=>'form-control', 'placeholder'=>'Enter Unit', 'id'=>'exampleFirstName']) !!}

                                    </div>

                                    <div class="card-body">

                                    <div class="form-group add-new-component">

                                    </div>
                                </div>

                                    <div class="col-sm-12">
                                        <button class="btn btn-warning btn-user btn-block add_more_button">Create</button>
                                    </div>






                                    <div class="col-sm-12">
                                        <br>
                                    </div>

                                    <hr>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    {!! Form::submit('Add Now.', ['class'=>'btn btn-primary btn-user btn-block']) !!}
                                    </div>

                                    <div class="col-sm-6">
                                        <button class="btn btn-danger btn-user btn-block" type="button" onclick="window.location='{{ route("recipes.index") }}'">Cancel</button>
                                    </div>


                            </div>
                            {!! Form::close() !!}




@endsection

@section('footer')
<script>
$(document).ready(function() {
    var max_fields_limit = 50; //set limit for maximum input fields
    var x = 2; //initialize counter for text box

    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
    e.preventDefault();
    if(x < max_fields_limit){ //check conditions
    var ingredient = '<div class="col-sm-4"><select name="ingredients['+x+']" class="form-control"><option value="">Choose Ingredients</option> @foreach ($ingredients as $ingre)<option value="{{ $ingre->id }}">{{ $ingre->name }}</option>@endforeach</select></div>';
    var amount = '<div class="col-sm-3"><input type="number" name="amount['+x+']" class="form-control" placeholder="Enter amount"></div>';
    var unit = '<div class="col-sm-4"><input type="text" name="unit['+x+']" class="form-control" placeholder="Enter unit"></div>';
    x++; //counter increment
    $('.add-new-component').append($('<div class="row" style="margin-top:10px;">'+ingredient+amount+unit+'<a href="#" class="remove_field" style="margin-left:10px;"><i class="fas fa-times" style="color:red;"></i></a></div>'));
    }
    });
    $('.add-new-component').on("click",".remove_field", function(e){ //user click on remove text links
    e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    });


$(function () {
    $("#setMeals").change(function() {
        var val = $(this).val();
        if(val == 1) {
            $("#setMealsSelect").show();
        } else {
            $("#setMealsSelect").hide();
        }
    })
})

</script>

@endsection
