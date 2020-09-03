@extends('layouts.app', ['page' => __('Add Expense'), 'pageSlug' => 'addexpense'])

@section('content')
<!-- Swapnil Phanse -->

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Expense') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    @include('alerts.success')
                        <form method="post" action="{{route('sexpense')}}" autocomplete="off">
                            @csrf
                            
                         <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Add name') }}</label>
                                    <select name="name[]" id="input-name" multiple class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary"  tabindex="-98"></select>   
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="form-group{{ $errors->has('ename') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-ename">{{ __('Expense Name') }}</label>
                                    <input type="test" name="ename" id="input-ename" class="form-control form-control-alternative{{ $errors->has('ename') ? ' is-invalid' : '' }}" placeholder="{{ __('Expense Name') }}">
                                    @include('alerts.feedback', ['field' => 'ename'])
                                </div>

                                <div class="form-group {{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('$0.00') }}">
                                    @include('alerts.feedback', ['field' => 'amount'])
                                </div>
                                



                               
                    <div class="form-group {{ $errors->has('split') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-split">{{ __('Split') }}</label>
                      
                    <select class="form-control form-control-alternative{{ $errors->has('split') ? ' is-invalid' : '' }}" data-size="7" data-style="btn btn-primary" title="Single Select" tabindex="-98" name="split">
                    
                    <option class="bs-title-option" value=""> Select one option</option>
                      <option value="50%">Split Equally</option>
                      <option value="100%">The other person ows the full amount</option>
                    </select>
                    @include('alerts.feedback', ['field' => 'split'])
                  

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    @endsection
