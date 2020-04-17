@extends('layouts.admin')

@section('content')
<h3 class="text-gray-800">Dish Ingredients</h3>
          <p class="mb-4">Fill out all the informations.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add New Ingredient</h6>
            </div>
            <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'IngredientsTypesController@store', 'class'=>'user' ]) !!}
                            <div class="form-group row">


                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        {!! Form::text('name', null, ['class'=>'form-control form-control-user', 'placeholder'=>'New Type Name', 'id'=>'exampleFirstName']) !!}
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <br>
                                    </div>
                                    

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <br>
                                    </div>
                                    
                                    <hr>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    {!! Form::submit('Add Now.', ['class'=>'btn btn-primary btn-user btn-block']) !!}
                                    </div>

                                    <div class="col-sm-6">
                                        <button class="btn btn-danger btn-user btn-block" type="button" onclick="window.location='{{ route("ingredients.index") }}'">Cancel</button>
                                    </div>


                            </div>
                            {!! Form::close() !!}




@endsection
