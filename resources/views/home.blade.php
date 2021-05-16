@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row text-center">

                           <div  class="col " >
                               <a href="{{route('management.index')}}">
                               <h4>management</h4>
                               <img  width="75px" src="{{asset('images/dashboard.svg')}}">
                               </a>
                           </div>


                           <div class="col col-sm-4">
                               <a href="{{route('cashier.index')}}">
                               <h4>cashier</h4>
                               <img  width="75px" src="{{asset('images/cashier.svg')}}">
                               </a>
                           </div>


                           <div  class="col col-sm-4" >
                               <a href="#">
                               <h4>Report</h4>
                               <img  width="75px" src="{{asset('images/statistics.svg')}}">
                               </a>
                           </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
