@extends('layouts.admin.master')

@section('title', 'States Management')

@section('content')

    @if (\Session::has('success'))
        @javascript('success', session('success'))
        @javascript('type', 'success')
    @elseif(\Session::has('info'))
        @javascript('info', session('info'))
        @javascript('type', 'info')
    @elseif(\Session::has('warning'))
        @javascript('warning', session('warning'))
        @javascript('type', 'warning')
    @elseif(\Session::has('error'))
        @javascript('error', session('error'))
        @javascript('type', 'error')
    @endif

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="mdi mdi-city"></i> 
                                Canadian Provinces & Territories Management
                            </h4>
                            <div class="card-tools">
                                <span class="badge bg-primary">{{ $states->count() ?? 0 }} Total States</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th width="8%">
                                                <i class="mdi mdi-flag"></i> 
                                                Symbol
                                            </th>
                                            <th width="20%">
                                                <i class="mdi mdi-map-marker"></i> 
                                                Province/Territory
                                            </th>
                                            <th width="12%">
                                                <i class="mdi mdi-briefcase"></i> 
                                                Investment
                                            </th>
                                            <th width="10%">
                                                <i class="mdi mdi-school"></i> 
                                                Education
                                            </th>
                                            <th width="12%">
                                                <i class="mdi mdi-camera"></i> 
                                                Tourism
                                            </th>
                                            <th width="12%">
                                                <i class="mdi mdi-account-group"></i> 
                                                Jobs
                                            </th>
                                            <th width="12%">
                                                <i class="mdi mdi-home"></i> 
                                                Accommodation
                                            </th>
                                            <th width="8%">
                                                <i class="mdi mdi-check-circle"></i> 
                                                Status
                                            </th>
                                            <th width="6%">
                                                <i class="mdi mdi-cog"></i> 
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($states)
                                            @forelse ($states as $state)
                                                @if($state->name == 'general-en' || $state->name == 'general-fa')
                                                    @continue
                                                @endif
                                                <tr>
                                                    <td>
                                                        <span class="badge bg-info text-dark fs-6">
                                                            {{ $state->symbol }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="{{ asset('assets/img/flag/CA.png') }}" 
                                                                     alt="Canada Flag" 
                                                                     width="20" 
                                                                     class="rounded">
                                                            </div>
                                                            <div>
                                                                <a href="{{route('admin.state.edit' , $state->id)}}" 
                                                                   class="text-decoration-none fw-bold text-primary">
                                                                    {{ $state->name }}
                                                                </a>
                                                                <br>
                                                                <small class="text-muted">
                                                                    {{ $state->symbol }} Province
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress" style="height: 20px;">
                                                            <div class="progress-bar bg-success" 
                                                                 role="progressbar" 
                                                                 style="width: {{ $state->investment_facilities ?? 0 }}%"
                                                                 aria-valuenow="{{ $state->investment_facilities ?? 0 }}" 
                                                                 aria-valuemin="0" 
                                                                 aria-valuemax="100">
                                                                {{ $state->investment_facilities ?? 0 }}%
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-warning text-dark me-2">
                                                                Rank {{ $state->education_rank ?? 'N/A' }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress" style="height: 20px;">
                                                            <div class="progress-bar bg-info" 
                                                                 role="progressbar" 
                                                                 style="width: {{ $state->tourism ?? 0 }}%"
                                                                 aria-valuenow="{{ $state->tourism ?? 0 }}" 
                                                                 aria-valuemin="0" 
                                                                 aria-valuemax="100">
                                                                {{ $state->tourism ?? 0 }}%
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress" style="height: 20px;">
                                                            <div class="progress-bar bg-primary" 
                                                                 role="progressbar" 
                                                                 style="width: {{ $state->jobs_and_business ?? 0 }}%"
                                                                 aria-valuenow="{{ $state->jobs_and_business ?? 0 }}" 
                                                                 aria-valuemin="0" 
                                                                 aria-valuemax="100">
                                                                {{ $state->jobs_and_business ?? 0 }}%
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress" style="height: 20px;">
                                                            <div class="progress-bar bg-secondary" 
                                                                 role="progressbar" 
                                                                 style="width: {{ $state->accommodation ?? 0 }}%"
                                                                 aria-valuenow="{{ $state->accommodation ?? 0 }}" 
                                                                 aria-valuemin="0" 
                                                                 aria-valuemax="100">
                                                                {{ $state->accommodation ?? 0 }}%
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($state->is_active)
                                                            <span class="badge bg-success">
                                                                <i class="mdi mdi-check-circle"></i> Active
                                                            </span>
                                                        @else 
                                                            <span class="badge bg-danger">
                                                                <i class="mdi mdi-close-circle"></i> Inactive
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{route('admin.state.edit' , $state->id)}}" 
                                                               class="btn btn-sm btn-outline-primary" 
                                                               title="Edit State">
                                                                <i class="mdi mdi-pencil"></i>
                                                            </a>
                                                            <a href="{{route('guest.blog.index', $state->id)}}" 
                                                               class="btn btn-sm btn-outline-info" 
                                                               title="View State Blog"
                                                               target="_blank">
                                                                <i class="mdi mdi-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center py-4">
                                                        <div class="text-muted">
                                                            <i class="mdi mdi-information-outline fs-1"></i>
                                                            <p class="mt-2">No states found</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @else
                                            <tr>
                                                <td colspan="9" class="text-center py-4">
                                                    <div class="text-muted">
                                                        <i class="mdi mdi-alert-circle-outline fs-1"></i>
                                                        <p class="mt-2">Unable to load states data</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                            
                            @if(isset($states) && $states->count() > 0)
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="text-muted">
                                        Showing {{ $states->count() }} states
                                    </div>
                                    <div>
                                        <small class="text-muted">
                                            Last updated: {{ now()->format('M d, Y H:i') }}
                                        </small>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table th {
            border-top: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .table td {
            vertical-align: middle;
        }
        
        .progress {
            border-radius: 10px;
        }
        
        .progress-bar {
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .btn-group .btn {
            border-radius: 6px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom: none;
        }
        
        .card-header h4 {
            margin: 0;
            font-weight: 600;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }
    </style>

@endsection
