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


                @if(count($errors->all()) > 0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif



                <form action="{{route('cake.update', $onerow->id)}} " method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Name of Cake</label>
                                <input type="text" class="form-control" name="name" value="{{$onerow->name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description of Cake</label>
                                <textarea class="form-control" name="description">{{$onerow->name}}</textarea>
                            </div>
                            <div class="form-inline mb-4">
                                <label>Cake price(rs)</label>
                                <div class="d-flex">
                                <input type="text" name="price" class="form-control"
                                    value="{{$onerow->price}}">
                                    </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" name="image">
                                <img src="{{Storage::url($onerow->image)}} " width="100">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-danger" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
