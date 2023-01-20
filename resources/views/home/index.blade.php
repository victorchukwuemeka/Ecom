@extends('layouts.app')
@section('title', $viewData["title"])
@section('products', $viewData["products"])
@section('body', $viewData["body"])
@section('role', $viewData["role"])
@section('content')



<div id="hero">
    <!--<div class="flex items-center flex-col-reverse md:flex-row ">-->
     <div class="grid  md:grid-cols-3 gap-6">
       @foreach($viewData["products"] as $product)
       <div class="grid p-8  justify-center ">
         <img src= "{{ asset('/storage/'.$product->getImage())}}"
            class="w-80 h-96 rounded-lg ">
            <a href="{{ route('product.show', ['id'=> $product->getId() ]) }}">
              <span>
               {{ $product->getName() }}
             </span>
           </a>
         </div>
         @endforeach
       </div>
   </div>

{{-- $viewData['body']  --}}
{{-- $viewData['role'] --}}


@if($viewData["role"] === "admin")
 <a href="{{ route('admin.home.index')}}">
   <span>
     Admin 
   </span>
 </a>

@endif



@endsection
