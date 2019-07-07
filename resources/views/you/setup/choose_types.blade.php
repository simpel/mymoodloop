@extends('layouts.app')

@section('content')
	@include('partials.headers.menu', [
		'color' => 'black',
	])

		<div class="max-w-xl mx-auto px-6 pb-6 ">
			<div class="md:flex md:flex-row-reverse md:justify-between md:items-center">
				<span class="status mb-2 md:mb-0 inline-block flex-no-grow">1/3</span>
				<h1>👋 Hello {{ $user->firstname}}, let's get you started!</h1>
			</div>
			<p class="lg:w-3/4 text-xl leading-loose">
				Begin by picking the areas<span class="text-sm text-cta">(1)</span> that you'd like to track and try to define some traits<span class="text-sm text-cta">(2)</span> that you want to change over time. Later on we'll configure how often<span class="text-sm text-cta">(3)</span> you want to us to give you feedback on your progression towards a healthier mood.
			</p>

			@if ($errors->any())
			   	<div class="shadow-md bg-secondary w-full p-8 mb-8 text-white text-lg rounded">

			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<form method="POST" action="{{route('you.setup', ['step' => 'choose_types'])}}">

				@csrf

				<div class="flex flex-wrap justify-between -mx-4">

					@foreach ($mood_types as $type)
						<div class="w-1/2 p-4 my-4">



								<div class="checkbox">
									<input type="checkbox" name="mood_types[]" value="{{ $type->id }}" id="toggle_{{ $type->id }}"/>
									<label for="toggle_{{ $type->id }}">

										<div class="box">
											<h2 class="mt-0">{{ $type->label }}</h2>
											<p class="flex-grow">{{ $type->desc }}</p>

											<div class="selector">
												<i data-feather="square" class="on"></i>
												<i data-feather="check-square" class="off"></i>
												<span>Track this</span>
											</div>
										</div>
									</label>

							</div>
						</div>


					@endforeach
				</div>

				<button type="submit" class="btn btn-large btn-shadow w-full mb-8">
					{{ __("Let's create a desired state for you") }} <i data-feather="arrow-right" class="align-middle mr-2"></i>
				</button>

			</form>

		</div>

@endsection
