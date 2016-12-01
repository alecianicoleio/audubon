@forelse($helloWorlds as $helloWorld)
    <h1>Hello {{$helloWorld->getName()}}</h1>
@empty
    <h1>No one to say hello to.  =(</h1>
@endforelse