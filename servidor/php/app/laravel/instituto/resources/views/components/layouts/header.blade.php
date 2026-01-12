<header class="h-header bg-header flex justify-between px-5 items-center">
  <img src="{{ asset("img/logo.png") }}" alt="logo" class="max-h-full">
  <h1 class="text-4xl text-blue-900">{{__("GESTION DE INSTITUTO")}}</h1>
  <div>
    @auth
    <p class="text-black">hola {{auth()->user()->name}}</p>
    <form action="/logout" method="post">
      @csrf
      <button type="submit" class="btn btn-primary cursor-pointer">Logout</button>
    </form>
    @endauth
    <div class="flex flex-col gap-2">
      @guest
      <div class="text-black">
        <button class="btn"><a href="{{ route("login") }}">{{__("Login")}}</a></button>
        <button class="btn"><a href="{{ route("register") }}">{{__("Register")}}</a></button>
      </div>
      @endguest
      <x-lang/>
    </div>
  </div>
</header>