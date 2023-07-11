@extends('administrador.admin')
@section('content')
<div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ Storage::url($product->thumbnail) }}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                    <div class="card-body">
                        <h1 class="font-bold tracking-tight text-gray-900 dark:text-dark" style="font-size: 24px">{{ $product->name }}</h1>
                        <h2 class="mt-3 font-normal text-gray-700 dark:text-gray-600">RD$ {{number_format($product->precio_oferta,2)}}</h2>
                        <p class="mt-4 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush
