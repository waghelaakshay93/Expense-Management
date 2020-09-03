@extends('layouts.app',['page' => __('Add Expense'), 'pageSlug' => 'addexpense'])

@section('content')
   

<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Expense Details') }}</h4>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    @foreach ($data as $exp)
                                @if($loop->first)
                                <h1 class="card-title" style="text-align:center" >{{ strtoupper($exp -> ename) }}</h1>
                                @endif
                                @endforeach          
                    <h1 class="card-title"> </h1>
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Amount') }}</th>
                               
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                              
                            @foreach ($data as $exp)
                                    <tr>
                                        <td> {{ $exp->name}} </td>
                                        <td>$ {{ number_format($exp->iamount,2) }} </td>
                                       
                                    </tr>
                                    @if($loop->first)
                                    
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
                      
                    </div>
                    @foreach ($data as $exp)
                                @if($loop->first)
                                <p style="text-align:center;font-size:20px"> The total amount of this expense is $ <b>{{ $exp->amount }}</b> </p>
                                <p style="text-align:center;font-size:20px">  {{ $exp->name}} owes $ <b>{{ number_format($exp->amount - $exp->iamount,2) }} from </b> </p>
                                @endif
                                @endforeach 
                </div>
                
            </div>
        </div>
    </div>
    @endsection