@extends('layouts.app')

@section('content')
<!-- Akshay Waghela -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Create Group') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                            @csrf

                            <div class="pl-lg-4">
                                
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-groupname">{{ __('Group Name') }}</label>
                                    <input type="tel" name="phone" id="input-groupname" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Group Name') }}" required>
                                    
                                </div>

                               
                            </div>


                           <!-- Below code needs to be added in group.blade.php -->
      <!-- <div class="card-header">
     
        <h4 class="card-title"> User Details</h4>
      </div>
      <div class="card-body">
      @include('alerts.success')
        <div class="table-responsive">
       <form method="post" action ="/adduser">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <table class="table tablesorter " id="">
          <thead class=" text-primary">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Add</th>
            </tr>
       
            </thead>

            <tbody>
          
           
            </tbody>
          </table>

        </form>

        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection


