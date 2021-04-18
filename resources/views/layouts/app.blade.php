<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <script src="{{ asset('js/app.js) }}" defer></script>
    
</head>
<body>
     <div id="app">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
             <div class="container">
               <a class="nav-brand" href="">
               
               </a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                  <span class="nabar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto"></ul>
                  <ul class="navbar-nav ml-auto">
                      @guest
                      <li class="nav-item">
                        <a class="nav-link" href=""></a>
                      </li>
                      @if (Route::has("register"))
                        <li class="nav-item">
                           <a class="nav-link" href=""></a>
                        </li>
                      @endif
                      @else
                        <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->nome }}<span class="caret"></span>
                           </a>

                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="" 
                                onclick="">
                                    
                              </a>
                              <form id="logout-form" action="" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li> 
                     @endguest    
                  </ul>
               </div>
             </div>
         </nav>
         <main class="py-4">
            
         </main>
     </div>
</body>
</html>