@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')

<!--<div class="card">
    <div class="card-header">
        Admin Panel - Home Page
    </div>
    <div class="card-body">
        Welcome to the Admin Panel, use the sidebar to navigate between the different options.
    </div>
<----/div> -->

<div class="bg-white rounded-lg shadow-lg p-6">
  <div class="text-lg font-bold text-gray-700 uppercase tracking-wide mb-3">
    Admin Panel - Home Page
  </div>
  <div class="text-xl font-bold text-gray-800 p-6">
    Welcome to the Admin Panel, use the sidebar to navigate between the different options.
  </div>
</div>

@endsection
