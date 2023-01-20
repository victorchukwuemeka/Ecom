@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!--<div class="card">
    <div class="card-header">
        Products in Cart
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>@foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>${{ $product->getPrice() }}</td>
                    <td>{{ session('products')[$product->getId()] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2">
                    <b>Total to pay:</b> ${{ $viewData["total"] }}
                </a>
                @if (count($viewData["products"]) > 0)
                <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">
                    Purchase
                </a>
                <a class="btn bg-primary text-white mb-2">Purchase</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Remove all products from Cart
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div> -->

 <div class="bg-white rounded-lg shadow-md">
  <div class="p-6 bg-gray-100 text-center text-xl font-bold uppercase">
    Products in Cart
  </div>
  <div class="p-6">
    <table class="w-full text-center table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Price</th>
          <th class="px-4 py-2">Quantity</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td class="px-4 py-2">{{ $product->getId() }}</td>
          <td class="px-4 py-2">{{ $product->getName() }}</td>
          <td class="px-4 py-2">${{ $product->getPrice() }}</td>
          <td class="px-4 py-2">{{ session('products')[$product->getId()] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="flex justify-end">
      <a class="btn-secondary mb-2">
        <b>Total to pay:</b> ${{ $viewData["total"] }}
      </a>
      @if (count($viewData["products"]) > 0)

      <a href="{{ route('cart.purchase') }}" class="">
        Purchase
      </a>
      _---
      <a href="{{ route('cart.delete') }}" class="">
        Remove all products from Cart
      </a>
      @endif
    </div>
  </div>
</div>




@endsection
