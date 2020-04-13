@extends('layouts.admin')

@section('content')
<h3 class="text-gray-800">Recipes</h3>
<a href="{{ route('recipes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add New Recipe</a>
<hr class="sidebar-divider d-none d-md-block">

{{-- Card Style --}}

<div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Recipes List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Minutes</th>
                        <th>Categories</th>
                        <th>Types</th>
                        <th>Costs</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($recipes)

                      @foreach ($recipes as $recipe)
                      <tr>
                            <td>{{ $recipe->id }}</td>
                            <td>{{ $recipe->title }}</td>
                            <td>{{ $recipe->readyInMinutes }} mins</td>
                            <td>{{ $recipe->categories_id }}</td>
                            <td>{{ $recipe->dish_types_id }}</td>
                            <td>{{ $recipe->totalCosts }}</td>
                            <td>
                              <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger">
                                Delete
                            </a>
                            </td>
                          </tr>
                      @endforeach

                      @endif


                  </tbody>
                </table>

              </div>

@endsection
