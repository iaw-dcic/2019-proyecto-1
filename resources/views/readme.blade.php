@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Read Me</div>

                <div class="card-body">                    
                     <p style="text-align: center;">Autor: Montero Alvarez Mario Joaquin</p>
                     <p style="text-align: center;">Audits:</p>
                    
                        <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">pagina</th>
                          <th scope="col">Performance</th>
                          <th scope="col">Accessibility</th>
                          <th scope="col">BestPractices</th>
                          <th scope="col">SEO</th>
                          <th scope="col">mobile/desktop</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                            <tr>
                                <th scope="row">/</th>
                                <td>71</td>
                                <td>85</td> 
                                <td>93</td>
                                <td>90</td>
                                <td>mobile</td>
                                 </tr>
                               <tr>  
                                <th scope="row">/lista/get/1</th>
                                <td>76</td>
                                <td>88</td> 
                                <td>93</td>
                                <td>90</td>
                                <td>desktop</td>
                              </tr>
                               <tr>
                                <th scope="row">/miperfil</th>
                                <td>76</td>
                                <td>82</td> 
                                <td>93</td>
                                <td>90</td>
                                <td>desktop</td>

                            </tr>
                       
                        
                        
                      </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection