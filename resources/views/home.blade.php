@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    You can add some item to your stock
                    <hr>
                    <form method="POST" action="{{ route('addItem')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input name="cod" id="cod" type="number" min="1" class="form-control" placeholder="Code" required>
                        </div>
                        <div class="col">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="col">
                            <input name="quantity" id="quantity" type="number" min="1" class="form-control" placeholder="Quantity" required>
                        </div>
                        <div class="col">
                            <select id="privacy" name="privacy" class="form-control">
                                <option selected>Public</option>
                                <option>Private</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Submit</button>
                    </div>
                    </form>
                    <hr>
                
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




