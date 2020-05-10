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
                        <th>Image</th>
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
                            <td><img src="{{ asset($recipe->imageUrl) }}" width="240" height="160"></td>
                            <td>{{ $recipe->title }}</td>
                            <td>{{ $recipe->readyInMinutes }} mins</td>
                            <td>{{ $recipe->categories->name}}</td>
                            <td>{{ $recipe->type->name}}</td>
                            <td>{{ $recipe->totalCosts }}</td>
                            <td>
                              <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form method="POST" action="{{ route("recipes.destroy", $recipe->id) }}" accept-charset="UTF-8">
                              <input name="_method" type="hidden" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" value="Delete">
                          </form>
                            {{-- <a onclick="return confirm('Are you sure?')" href="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger">
                                Delete
                            </a> --}}
                            </td>
                          </tr>
                      @endforeach

                      @endif


                  </tbody>
                </table>

              </div>

@endsection
