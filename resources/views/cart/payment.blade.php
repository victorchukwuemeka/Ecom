@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')


<form method="POST" action="{{ route('pay') }}"
 accept-charset="UTF-8" class="form-horizontal d-none" role="form">


<!--<input type="hidden" name="metadata"
value="{{ json_encode($array = ['invoiceId' => 2]) }}" >-->


<input type="hidden" name="email" value="{{ $viewData['userEmail']}}">
{{-- required --}}

<input type="hidden" name="orderId" value="{{ $viewData['orderId']}}">


<input type="hidden" name="amount" value="{{ $viewData['total'] }}">
 {{-- required in kobo --}}

<input type="hidden" name="currency"
   value="{{ $viewData['currency']}}">

<input type="hidden" name="reference"
       value="{{ Paystack::genTranxRef() }}">
                                                            {{ csrf_field() }}


 <button class="btn btn-success btn-lg btn-block"
          type="submit" value="Pay Now!">

<i class="fa fa-plus-circle fa-lg"></i> Pay Now!</button>
</form>


@endsection
