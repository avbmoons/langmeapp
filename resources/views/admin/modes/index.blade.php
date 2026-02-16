@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Modes</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                {{-- <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button> --}}
              </div>
            </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mode</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($modesList as $mode)
                <tr>
                    <td>{{ $mode->id}}</td>
                    <td>{{ $mode->mode}}</td>
                    <td>{{ $mode->description}}</td>
                    <td>{{ $mode->status}}</td>
                    <td>{{ $mode->updated_at}}</td>
                    <td><a href="#">Edit</a>&nbsp;<a href="#" style="color: red">Delete</a></td>                    
                </tr>
                @empty
                    <tr>
                        <td colspan="?">No modes</td>
                    </tr>                    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
Modes list here