@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="content-wrapper">

        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Desc</th>
                                            <th>Price </th>
                                            <th>Image </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($allCakes) > 0)
                                            @foreach ($allCakes as $key => $cake)
                                                <tr>
                                                    <th>{{ $key + 1 }}</th>
                                                    <th>{{ $cake->name }}</th>
                                                    <th>{{ $cake->description }}</th>
                                                    <th>{{ $cake->price }} </th>

                                                    <th><img src="{{ Storage::url($cake->image) }}" width="100"></th>
                                                    <th>
                                                        <a href='{{ route('cake.edit', $cake->id) }}'
                                                            class='btn btn-primary'>Edit</a>
                                                        <!-- Button to Open the Modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#myModal{{ $cake->id }}">
                                                            Delete
                                                        </button>
                                                    </th>
                                                </tr>


                                                <!-- The Modal -->
                                                <div class="modal" id="myModal{{ $cake->id }}">
                                                    <form action="{{ route('cake.delete', $cake->id) }}" method="post">
                                                        @csrf @method('DELETE')
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Are you sure</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>

                                                                {{-- <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div> --}}

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Nothing to show</p>
                                        @endif
                                    </tbody>
                                </table>

                                {{ $allCakes->links() }}


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
