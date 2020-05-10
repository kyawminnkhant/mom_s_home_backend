@extends('layouts.admin')

@section('content')
<h3 class="text-gray-800">Dish Types</h3>
<a href="{{ route('types.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add New Dish Types</a>
<hr class="sidebar-divider d-none d-md-block">

{{-- Card Style --}}

<div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Dish Types List</h6>
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
                      @if ($dTypes)

                      @foreach ($dTypes as $dType)
                      <tr>
                            <td>{{ $dType->id }}</td>
                            <td>{{ $dType->name }}</td>
                            <td>
                              <a href="{{ route('types.edit', $dType->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{ route('types.destroy', $dType->id) }}" class="btn btn-danger">
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
