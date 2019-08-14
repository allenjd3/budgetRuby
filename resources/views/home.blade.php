@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="w-full">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<item-component class="p-4" v-bind:bitems="bitems"></item-component>
            </div>
			<div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<transaction-component class="p-4" v-bind:transactions="transactions"></transaction-component>
			</div>
        </div>
    </div>
@endsection
