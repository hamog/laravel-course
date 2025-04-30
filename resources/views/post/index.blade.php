<h1>Hello, {!! $name !!}</h1>
<h1>Hello, {{ $name . ' ' . $family }}</h1>
<p>{{ $language }}</p>
<p>Title: {{ $title }}</p>

<hr>
<h1>Conditions: </h1>
@if($name == 'John')
  <p>Hello,{{ $name }}</p>
@else
    <p>Hello, else</p>
@endif

@if($name != 'John')
    <p>Hello,{{ $name }}</p>
@endif

@unless($name == 'John')
    <p>Hello, Another</p>
@endunless

<hr>
<h1>Loops:</h1>
@for ($i = 1; $i < count($numbers); $i++)
    <p>The current value is {{ $i }}</p>
@endfor

@foreach ($users as $user)
    <p>{{ $loop->index }}: This is user {{ $user['name'] }}</p>
@endforeach

@forelse ($users2 as $user2)
    <p>This is user {{ $user2['name'] }}</p>
@empty
    <p style="color: red">No users</p>
@endforelse



