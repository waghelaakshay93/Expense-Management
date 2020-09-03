@extends('layouts.app',['page' => __('Add Expense'), 'pageSlug' => 'addexpense'])

@section('content')
   
<!-- Akshay Waghela -->
<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Group Expenses') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                                <a href="{{ route('group') }}" class="btn btn-sm btn-primary">{{ __('Back to group list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    @foreach ($data as $exp)
                                @if($loop->first)
                                <h1 class="card-title" style="text-align:center" >{{ strtoupper($exp -> groupName) }}</h1>
                                @endif
                                @endforeach          
                    <h1 class="card-title"> </h1>
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Items') }}</th>
                                <th scope="col">{{ __('Amount') }}</th>
                               
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                              
                            @foreach ($data as $exp)
                                    <tr>
                                        <td><a href="{{url('viewitemexpense/'.$exp->expense_id.'/')}}"> {{ $exp->ename}} </a></td>
                                        <td>$ {{ number_format($exp->amount,2) }} </td>
                                       
                                    </tr>
                                    @if($loop->first)
                                    
                                    @endif
                                

                                @endforeach
                            </tbody>
                        </table>
                      
                    </div>
                  
                </div>
                
            </div>
        </div>
    </div>
    @endsection