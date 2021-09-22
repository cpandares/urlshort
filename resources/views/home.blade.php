@extends('layouts.example')

@section('title', 'Home')

@section('content')


   <div >

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('stats') }}">Stats</a>
                 
        </nav>
    
        <div class="container mt-5">
           <div class="row">
               <div class="col-md-6 card shadow-lg p-5">

                    <form  id="formShort" >
                    
                        <input type="text"  name="to_url" class="form-control" placeholder="Url Here" id="toUrl">
                        
                        <input type="checkbox" name="nsfw" value="0" id="nsfw"> Url NFSW (Not Save for Work)
                    
                        <button type="submit"  class="btn btn-outline-dark rounded-pill btn-block mt-2" >
                            Shorten
                        </button>

                    </form>

                    <div id="showLink">

                      {{--   <a href="{{ route('redirection') }}" target="_blank" onchange="">{{  route('redirection')  }} </a> --}}
                       
                 
                        @if(Session::has('message'))

                            <p class="mt-5 alert {{ Session::get('alert-class', 'alert-info') }}">

                                <a href="{{ route('redirection') }}" > {{ route('redirection') }} </a> 
                        

                            </p>

                        @endif

                        @if(Session::has('nsfw'))
                            <p class="mt-5 alert {{ Session::get('alert-class', 'alert-info') }}">{{ route('redirection') }}</p>
                        @endif 

                        @if(Session::has('error'))
                            <p class="mt-5 alert {{ Session::get('alert-class', 'alert-danger') }}">Url Not valid</p>
                        @endif 

                    </div>

               </div>
           </div>
        </div>      

   </div>


@endsection
 
