@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData["subtitle"])
@section('content')

<!--<div class="grid  box-border space-y-4 space-x-4  mx-4 px-4 md:px-auto  md:mx-auto  md:space-y-12  ">-->
<div class="grid md:grid-cols-3  box-border space-y-4 space-x-4 ">
  @foreach($viewData["products"] as $product)
            <div class="grid  gap-4 justify-center ">
              <div >
                    <img src= "{{ asset('/storage/'.$product->getImage())}}"
                    class="w-80 h-96 rounded-lgs">

                    <a href="{{ route('product.show', ['id'=> $product->getId() ]) }}">
                      <span>
                         {{ $product->getName() }}
                      </span>

                    </a>
                </div>
            </div>

     @endforeach
</div>




@endsection
