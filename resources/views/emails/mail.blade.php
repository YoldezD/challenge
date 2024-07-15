@component('mail::message')
# New Product Added

A new product "{{ $product->name }}" has been added in the category "{{ $product->category->name }}" by one of our suggested suppliers.

Thank you,
{{ config('app.name') }}
@endcomponent
