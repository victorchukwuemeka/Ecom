@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@forelse ($viewData["order"] as $order)
<div class="flex justify-center">
  <div class="max-w-xs rounded overflow-hidden shadow-lg mb-4">
    <div class="px-6 py-4 text-xl font-bold text-gray-700 bg-gray-200 rounded-t">
      Order #{{ $order->getId() }}
    </div>
    <div class="px-6 py-4 text-sm leading-5 text-gray-700">
      <p>
       <span class="font-bold">Date:</span> {{ $order->getCreatedAt() }}
     </p>
     <p>
       <span class="font-bold">Total:</span> ${{ $order->getTotal() }}
     </p>
    </div>
      <table class="w-full mt-4 text-sm leading-5 text-center border-collapse">
        <thead>
          <tr class="bg-gray-200 text-gray-600">
            <th class="px-4 py-3 border-b-2 border-gray-300 font-bold text-sm uppercase tracking-wide">
              Item ID
            </th>
            <th class="px-4 py-3  border-b-2 border-gray-300 font-bold text-sm uppercase tracking-wide" >
              Product Name
            </th>
            <th class="px-4 py-3 border-b-2 border-gray-300 font-bold text-sm uppercase tracking-wide">
              Price
            </th>
            <th class="px-4 py-3  border-b-2 border-gray-300 font-bold text-sm uppercase tracking-wide">
              Quantity
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->getItems() as $item)
          <tr>
            <td class="px-4 py-3 border-b border-gray-300 font-medium text-gray-700">
              {{ $item->getId() }}
            </td>
            <td class="px-4 py-3 border-b border-gray-300 font-medium text-gray-700">

              <a class="link-success"
                 href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
                {{ $item->getProduct()->getName() }}
              </a>
            </td>
            <td class="px-4 py-3 border-b border-gray-300 font-medium text-gray-700">
              ${{ $item->getPrice() }}
            </td>
            <td class="px-4 py-3 border-b border-gray-300 font-medium text-gray-700">
              {{ $item->getQuantity() }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@empty
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <span class="block sm:inline">
    Seems to be that you have not purchased anything in our store =(.
  </span>
@endforelse
@endsection
