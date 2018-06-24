@include('includes.header')

<style type="text/css">
		body{
			background-image: url('assets/images/humanresource.jpg');
		}
		h1{
				text-align: center;
				font-size: xx-large 3em;
			}
	</style>

		<h1>WELCOME TO HUMAN RESOURCE APPLICATION</h1>
		<div class="justify-content-md-center">
			<a class="btn btn-success btn-block" href="{{ url('/login') }}">Click Here To Go To Login Page</a>
		</div>

@include('includes.footer');