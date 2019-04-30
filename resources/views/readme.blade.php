@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h2>Readme</h2><br>
                    Author: Agustin Emanuel Garcia
                </div>
                
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Page</td>
                                <td>Performance</td>
                                <td>Accessibility</td>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>Welcome</td>
                                    <td>99</td>
                                    <td>71</td>
                                </tr>
                                <tr>
                                    <td>Explore</td>
                                    <td>85</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td>Readme</td>
                                    <td>85</td>
                                    <td>84</td>
                                </tr>
                                <tr>
                                    <td>Login</td>
                                    <td>80</td>
                                    <td>87</td>
                                </tr>
                                <tr>
                                    <td>Register</td>
                                    <td>87</td>
                                    <td>85</td>
                                </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
