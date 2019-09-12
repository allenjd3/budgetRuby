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
				<budget-component class="p-4":budget_first="false" :budget_month="budget_month" :budget_year="budget_year"></budget-component>
            </div>

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<item-component class="p-4" 
						v-bind:all-items="allItems"
				></item-component>
            </div>
			<div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<transaction-component class="p-4" v-bind:transactions="transactions"></transaction-component>
			</div>
			<div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<item-creation-component class="p-4"> </item-creation-component>
			</div>
			<div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<transaction-creation-component class="p-4"> </transaction-creation-component>
			</div>
			<div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
				<budget-creation-component class="p-4"> </budget-creation-component>
			</div>
        </div>
    </div>
@endsection
