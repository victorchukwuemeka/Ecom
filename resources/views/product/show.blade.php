  @extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="flex justify-center items-center h-screen bg-blue-lightest">
    <div class="bg-white w-128 h-60 rounded shadow-md flex card text-grey-darkest">
            <img src="{{ asset('/storage/'.$viewData['product']['image']) }}"
            class="w-1/2 h-full rounded-l-sm">

         <div class="w-full flex flex-col">
           <div class="p-4 pb-0 flex-1">
             <h2 class="font-light mb-1 text-grey-darkest">
               {{ $viewData["product"]->getName() }}
             </h2>
             <div class="text-xs flex items-center mb-4">
               <i class="fas fa-map-marker-alt mr-1 text-grey-dark"></i>
                (${{ $viewData["product"]->getPrice() }})
             </div>


         <p class="">
             {{ $viewData["product"]->getDescription() }}
         </p>
         <p class="">
             <form method="POST"
             action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                 <div class="">
                     @csrf
                     <div class="">
                         <div class="">
                             <div class="">Quantity</div>
                             <input type="number" min="1" max="10"
                             class=""
                             name="quantity" value="1">
                         </div>
                     </div>
                     <div class="">
                         <button class="" type="submit">
                             Add to cart
                         </button>
                     </div>
                 </div>
             </form>
         </p>


           </div>
         </div>
    </div>
</div>
@endsection
