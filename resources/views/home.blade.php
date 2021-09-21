@extends('layouts.example')

@section('title', 'Home')

@section('content')


   <div >

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>        
        </nav>
    
        <div class="container mt-5">
           <div class="row">
               <div class="col-md-6 card shadow-lg p-5">

                    <form  id="formShort" >
                    
                        <input type="text"  name="to_url" class="form-control" placeholder="Url Here" id="toUrl">
            
                    
                        <button type="submit"  class="btn btn-outline-dark rounded-pill btn-block mt-2" >
                            Shorten
                        </button>
                    </form>

                    <div id="showLink">

                      {{--   <a href="{{ route('redirection') }}" target="_blank" onchange="">{{  route('redirection')  }} </a> --}}
                       
                        @if(Session::has('message'))
                            <p class="mt-5 alert {{ Session::get('alert-class', 'alert-info') }}"><a href="{{ route('redirection') }}" target="_blank" onchange="">{{  route('redirection')  }} </a></p>
                        @endif

                    </div>

               </div>
           </div>
        </div>      

   </div>


@endsection
 
