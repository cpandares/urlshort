@extends('layouts.example')

@section('title', 'Home')

@section('content')


   <div >

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('stats') }}">Stats</a>
                 
        </nav>
    
        <div class="container mt-5">
           <div class="row">
               <div class="col-md-10 card shadow-lg p-5">

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
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
                            <script>
                               let timerInterval
                                Swal.fire({
                                    title: 'This url is not safe for work, please wait',
                                    html: 'I will close in 10 seconds.',
                                    timer: 10000,
                                    showCancelButton: true,                                  
                                    timerProgressBar: true,
                                    showCancelButton: true,
                                    allowOutsideClick: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer().querySelector('b')
                                        timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                    }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.cancel) {
                                       location.reload()
                                    }
                                    })
                            </script>

                            <p class="mt-5 alert {{ Session::get('alert-class', 'alert-primary') }}">
                                <a href="{{ route('redirection') }}" > {{ route('redirection') }} </a>                         

                            </p>
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
 
