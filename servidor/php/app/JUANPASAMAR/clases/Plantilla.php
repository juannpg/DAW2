<?php
namespace clases;

class Plantilla {
  private static function obtenerClaseColor($color): string {
    return match($color) {
      "Azul" => "bg-blue-600",
      "Rojo" => "bg-red-600",
      "Naranja" => "bg-orange-600",
      "Verde" => "bg-green-600",
      "Violeta" => "bg-purple-600",
      "Amarillo" => "bg-yellow-600",
      "Marrón" => "bg-amber-600",
      "Rosa" => "bg-pink-600",
      default => "bg-gray-200 text-gray-800"
    };
  }

  private static function mostrarColores($colores): string {
    $html = "";
    $html .= "<div class='flex gap-2 justify-center py-2'>";
    foreach($colores as $valor){
      $claseColor = self::obtenerClaseColor($valor);
      $html .= "<div class='w-10 h-10 rounded-full flex items-center justify-center text-xs font-bold shadow-lg transform hover:scale-110 transition-transform duration-200 $claseColor' title='$valor'>";
      $html .= substr($valor ?? '', 0, 1);
      $html .= "</div>";
    }
    $html .= "</div>";

    return $html;
  }

  public static function mostrarCabecera($usuario, $nombreFichero): string{
    $html = "";

    $html .= "<nav class='bg-slate-900 text-white shadow-md sticky top-0 z-50'>";
    $html .= "<div class='container mx-auto px-4 py-3 flex justify-between items-center'>";
    $html .= "<div class='flex items-center gap-2'>";
    $html .= "<span class='font-bold text-lg tracking-wide hidden sm:block'>Mastermind</span>";
    $html .= "</div>";
    
    $html .= "<div class='flex items-center gap-4'>";
    $html .= "<div class='flex items-center gap-2 px-3 py-1 bg-slate-800 rounded-full border border-slate-700'>";
    $html .= "<span class='text-slate-400 text-sm'>Usuario</span>";
    $html .= "<span class='font-medium text-blue-400'>$usuario</span>";
    $html .= "</div>";
    
    $html .= "<form action='$nombreFichero' method='POST' class='m-0'>";
    $html .= "<input type='submit' name='submit' value='Cerrar Sesión' class='px-4 py-1.5 text-sm font-medium bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors cursor-pointer'>";
    $html .= "</form>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "</nav>";

    return $html;
  }

  public static function mostrarFormularioAcciones(bool $botonMostrarClave, string $nombreFichero): string {
    $html = "";

    $html .= "<div class='bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200'>";
    $html .= "<div class='bg-slate-50 px-6 py-4 border-b border-slate-200'>";
    $html .= "<h3 class='font-semibold text-slate-800 text-lg flex items-center gap-2'>Acciones</h3>";
    $html .= "</div>";
    
    $html .= "<form method='post' action='$nombreFichero' class='p-6 flex flex-col gap-3'>";
    
    if($botonMostrarClave){
      $html .= "<input type='submit' name='submit' value='Mostrar Clave' class='w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition-all cursor-pointer'>";
    } else {
      $html .= "<input type='submit' name='submit' value='Ocultar Clave' class='w-full py-2.5 px-4 bg-slate-600 hover:bg-slate-700 text-white font-medium rounded-lg shadow-sm transition-all cursor-pointer'>";
    }
    
    $html .= "<input type='submit' name='submit' value='Resetear la Clave' class='w-full py-2.5 px-4 bg-white border-2 border-slate-200 hover:border-blue-500 hover:text-blue-600 text-slate-600 font-medium rounded-lg transition-all cursor-pointer'>";
    
    $html .= "</form>";
    $html .= "</div>";

      return $html;
  }

  public static function mostrarFormularioJugar(array $coloresJugadaAnterior, string $mensaje, string $nombreFichero): string {
    $colores = Colores::obtenerColores();
    $html = "";

    $html .= "<div class='bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200 mt-6'>";
    $html .= "<div class='bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4'>";
    $html .= "<h3 class='font-bold text-white text-lg flex items-center gap-2'>Nueva Jugada</h3>";
    $html .= "</div>";

    $html .= "<form method='post' action='$nombreFichero' class='p-6'>";

    if (!empty($mensaje)) {
      $isError = strpos($mensaje, 'mensajeError') !== false;
      $bgClass = $isError ? "bg-red-50 text-red-700 border-red-200" : "bg-blue-50 text-blue-700 border-blue-200";
      $icon = $isError ? "⚠️" : "ℹ️";
      $cleanMsg = strip_tags($mensaje);
      $html .= "<div class='mb-6 p-4 rounded-lg border flex items-center gap-3 $bgClass'>";
      $html .= "<span class='text-xl'>$icon</span>";
      $html .= "<p class='font-medium text-sm'>$cleanMsg</p>";
      $html .= "</div>";
    }

    $html .= "<div class='grid grid-cols-2 gap-4 mb-6'>";
    for($i = 0; $i < 4; ++$i){
      $html .= "<div class='relative'>";
      $html .= "<select name='colores[]' class='w-full appearance-none bg-slate-50 border border-slate-300 text-slate-700 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all cursor-pointer'>";
      
      $html .= "<option selected hidden>Color ".($i+1)."</option>";

      foreach($colores as $color){
          $selected = ($color == ($coloresJugadaAnterior[$i]??null)) ? "selected" : "";
          $html .= "<option value='$color' $selected>$color</option>";
      }
      $html .= "</select>";
      $html .= "<div class='pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-500'>";
      $html .= "<svg class='fill-current h-4 w-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z'/></svg>";
      $html .= "</div>";
      $html .= "</div>";
    }
    $html .= "</div>";

    $html .= "<input type='submit' name='submit' value='Jugar' class='w-full py-4 text-lg bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 transform hover:-translate-y-1 transition-all duration-200 cursor-pointer tracking-wide'>";

    $html .= "</form>";
    $html .= "</div>";

    return $html;
  }

  public static function mostrarClave($clave): string{
    $html = "";
    $html .= "<div class='bg-slate-800 rounded-xl p-6 shadow-xl border border-slate-700 mb-6'>";
    $html .= "<h2 class='text-white text-center text-sm font-semibold uppercase tracking-widest mb-4 opacity-70'>Clave Secreta</h2>";
    $html .= self::mostrarColores($clave);
    $html .= "</div>";
    return $html;
  }

  public static function mostrarJugadasAnterioresYActual($jugadas): string {
    $jugadas = array_reverse($jugadas);
    $html = "";

    $html .= "<div class='space-y-4'>";
      
    if(sizeof($jugadas) > 0){
      $ultimo = $jugadas[0];
      $aciertos = sizeof($ultimo->getPosiciones()[0]); 
      $casi = sizeof($ultimo->getPosiciones()[1]);
      
      $html .= "<div class='bg-blue-600 rounded-xl p-6 shadow-lg shadow-blue-500/20 text-white mb-8 relative overflow-hidden'>";
      $html .= "<div class='absolute top-0 right-0 p-4 opacity-10 text-6xl font-bold'>#".sizeof($jugadas)."</div>";
      $html .= "<p class='font-bold text-lg mb-1'>Resultados Jugada Actual</p>";
      $html .= "<p class='opacity-90 flex items-center gap-4 text-sm'>";
      $html .= "<span class='flex items-center gap-1'><span class='w-3 h-3 rounded-full bg-black border border-white'></span> $aciertos Posición/Color</span>";
      $html .= "<span class='flex items-center gap-1'><span class='w-3 h-3 rounded-full bg-white'></span> $casi Solo Color</span>";
      $html .= "</p>";
      $html .= "</div>";
    } else {
      $html .= "<div class='bg-slate-100 rounded-xl p-8 border-2 border-dashed border-slate-300 text-center'>";
      $html .= "<p class='text-slate-400 font-medium'>Aún no hay jugadas registradas</p>";
      $html .= "</div>";
    }

    $html .= self::mostrarJugadasAnteriores($jugadas);
    $html .= "</div>";

    return $html;
  }

  public static function mostrarJugadasAnteriores($jugadas): string{
    $html = "";
    
    $html .= "<div class='grid gap-4'>";
    
    if (empty($jugadas)) {
      return $html . "</div>";
    }
    
    $html .= "<div class='flex items-center justify-between px-2 mb-2'>";
    $html .= "<h2 class='text-slate-700 font-bold'>Historial</h2>";
    $html .= "<span class='bg-slate-200 text-slate-600 px-2 py-1 rounded text-xs font-bold'>".count($jugadas)."</span>";
    $html .= "</div>";

    foreach($jugadas as $jugada){
      $html .= "<div class='bg-white rounded-lg p-4 shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow'>";

      $html .= "<div class='flex flex-col items-center mr-4 min-w-[3rem]'>";
      $html .= "<span class='text-xs font-bold text-slate-400 uppercase'>Jugada</span>";
      $html .= "<span class='text-2xl font-black text-slate-700'>".$jugada->getNumero()."</span>";
      $html .= "</div>";

      $html .= "<div class='flex-1'>";
      $html .= "<div class='mb-2'>";
      $html .= self::mostrarColores($jugada->getCombinacionColores());
      $html .= "</div>";
      $html .= "</div>";

      $html .= "<div class='pl-4 border-l border-slate-100 min-w-[6rem] flex justify-center'>";
      $html .= self::mostrarPosiciones($jugada);
      $html .= "</div>";

      $html .= "</div>";
    }

    $html .= "</div>";

    return $html;
  }

  private static function mostrarPosiciones($jugada): string{
    $html = "";
    $html .= "<div class='flex flex-wrap gap-1 w-16 justify-center content-center'>";

    foreach($jugada->getPosiciones()[0] as $clave => $valor){
      $html .= "<div class='w-3 h-3 rounded-full bg-slate-900 border border-slate-700 shadow-sm' title='Posición y Color'></div>";
    }
    foreach($jugada->getPosiciones()[1] as $clave => $valor){
      $html .= "<div class='w-3 h-3 rounded-full bg-white border border-slate-400 shadow-sm' title='Solo Color'></div>";
    }
    
    $html .= "</div>";
    return $html;
  }

  public static function mostrarResultadoPartida($clave, $jugadas): string{
    $html = "";

    $html .= "<div class='min-h-screen flex items-center justify-center p-4 bg-slate-100'>";
    $html .= "<div class='bg-white rounded-2xl shadow-2xl overflow-hidden max-w-2xl w-full text-center'>";
    
    $limitExceeded = $jugadas >= 10;
    
    $headerBg = $limitExceeded ? "bg-red-600" : "bg-emerald-600";
    $headerTitle = $limitExceeded ? "¡Juego Terminado!" : "¡Victoria!";
    $headerMsg = $limitExceeded 
      ? "Has agotado tus 10 intentos."
      : "¡Has adivinado la clave secreta!";
      
    $html .= "<div class='$headerBg p-8 text-white'>";
    $html .= "<h1 class='text-4xl font-extrabold mb-2'>$headerTitle</h1>";
    $html .= "<p class='text-white/90 text-lg'>$headerMsg</p>";
    $html .= "</div>";

    $html .= "<div class='p-8'>";
    
    $html .= "<div class='mb-8'>";
    $html .= "<p class='text-slate-500 font-semibold mb-4 uppercase tracking-widest text-sm'>La clave era</p>";
    $html .= "<div class='flex justify-center scale-125'>";
    $html .= self::mostrarColores($clave);
    $html .= "</div>";
    $html .= "</div>";

    $html .= "<form action='finJuego.php' method='post' class='mb-8'>";
    $html .= "<input type='submit' name='submit' value='Volver a jugar' class='px-8 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1 cursor-pointer'>";
    $html .= "</form>";

    $html .= "<div class='border-t border-slate-100 pt-8'>";
    $html .= "<h3 class='text-slate-400 font-bold mb-4'>Tu historial de jugadas</h3>";
    $html .= self::mostrarJugadasAnteriores($jugadas);
    $html .= "</div>";

    $html .= "</div>";
    $html .= "</div>";
    $html .= "</div>";

    return $html;
  }
}
?>
