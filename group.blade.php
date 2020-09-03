@extends('layouts.app', ['page' => __('Group'), 'pageSlug' => 'group'])

@section('content')

<!-- Akshay Waghela -->

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Groups') }}</h4>
                        </div>
                        <form method="get" action="{{route('addgroup')}}">
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </div>
                </div>

                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-groupname">{{ __('Group Name') }}</label>
                        <input type="text" name="groupname" id="input-groupname" class="form-control form-control-alternative" placeholder="{{ __('Group Name') }}" required>
                        @include('alerts.feedback', ['field' => 'groupname'])
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">{{ __('Add Members to Group') }}</label>
                        <select name="name[]" id="input-name" multiple class="form-control form-control-alternative" data-size="7" data-style="btn btn-primary"  tabindex="-98"></select>   
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
                
                </form>
                <div class="card-body">
                    @include('alerts.success')
               
                    <div class="">
                    <!-- <form method="post" action ="/addgroupmembers"> -->
                    <h6 class="heading-small text-muted mb-4">{{ __('Group information') }}</h6>
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>{{ __('Group Name') }}</th>
                                <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td><h4 class="text">{{ $user->groupName }}</h4></td>
                                        <td><a href="{{url('addgroupexpense/'.$user->groupID.'/')}}" class="btn btn-primary btn-lg btn-block mb-3">Add Expense</a></td>
                                        <td><a href="{{url('viewgroupexpense/'.$user->groupID.'/')}}" class="btn btn-primary btn-lg btn-block mb-3">View Expense</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </form> -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection