@extends('layouts.example')

@section('title', 'Home')

@section('content')


   <div >

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                 
        </nav>
    
       <div class="container mt-5 shadow-lg p-1 card">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name Page</th>
                        <th scope="col">Times short</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $visit)
                        
                        <tr>

                            <th scope="row">{{ $visit->to_url }}</th>
                            <td>{{ $visit->visited }}</td>
                            
                          
                        </tr>
                    
                    @endforeach
                   
                </tbody>
            </table>
          

       </div>
       
      {{-- Pagination --}}
      <div class="d-flex justify-content-center mt-5">
        {!! $visits->links() !!}
    </div>
         

   </div>


@endsection
 
