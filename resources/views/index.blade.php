
  

@extends('layouts.default')
@section('contenu')
        <div class="container-fluid">
 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bienvenue</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

           <strong>Admin </strong>

        </div>
		</div>
        @endsection
