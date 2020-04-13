@extends('layouts.admin')

@section('content')
<h3 class="text-gray-800">Category</h3>
<a href="{{ route('categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add New category</a>
<hr class="sidebar-divider d-none d-md-block">

{{-- Card Style --}}

<div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
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
                      @if ($categories)

                      @foreach ($categories as $category)
                      <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                              <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger">
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
