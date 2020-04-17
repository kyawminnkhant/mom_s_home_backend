@extends('layouts.admin')

@section('content')
<h3 class="text-gray-800">Dish Ingredients</h3>
<a href="{{ route('ingretypes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add New Dish Ingredients</a>
<hr class="sidebar-divider d-none d-md-block">

{{-- Card Style --}}

<div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Dish Ingredientss List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($ingredients)

                      @foreach ($ingredients as $ingredient)
                      <tr>
                            <td>{{ $ingredient->id }}</td>
                            <td>{{ $ingredient->name }}</td>
                            <td>
                              <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('ingredients.destroy', $ingredient->id) }}" class="btn btn-danger">
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
