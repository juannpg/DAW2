<select onchange="window.location.href=this.value??'es'" class="text-black p-2 border border-gray-300 rounded" name="lang" id="lang">
  <option value="" disabled selected>{{__("Selecciona un idioma")}}</option>
  @foreach (config("languages") as $lang => $_)
    <option value="{{ route("setLang", $lang) }}">{{ $_["name"] }}</option>
  @endforeach
</select>