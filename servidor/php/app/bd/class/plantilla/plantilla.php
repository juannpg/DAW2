<?php
  namespace class\plantilla;

  class Plantilla {
    public static function crearPlantilla(array $array): string {
      if (empty($array)) {
        return "<p style='color: #666; font-style: italic;'>No hay datos para mostrar</p>";
      }

      $html = "<table style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'>";
      
      // Encabezados (primera fila)
      $html .= "<thead><tr style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;'>";
      $primeraFila = array_shift($array);
      foreach ($primeraFila as $columna) {
        $html .= "<th style='padding: 12px 15px; text-align: left; font-weight: 600;'>" . htmlspecialchars($columna ?? '') . "</th>";
      }
      $html .= "</tr></thead>";
      
      // Datos
      $html .= "<tbody>";
      $isEven = false;
      foreach ($array as $fila) {
        $bgColor = $isEven ? '#f8f9fa' : '#ffffff';
        $html .= "<tr style='background-color: {$bgColor}; transition: background-color 0.2s;' onmouseover=\"this.style.backgroundColor='#e9ecef'\" onmouseout=\"this.style.backgroundColor='{$bgColor}'\">";
        foreach ($fila as $columna) {
          $html .= "<td style='padding: 10px 15px; border-bottom: 1px solid #dee2e6;'>" . htmlspecialchars($columna ?? '') . "</td>";
        }
        $html .= "</tr>";
        $isEven = !$isEven;
      }
      $html .= "</tbody>";
      
      $html .= "</table>";
      return $html;
    }
  }
?>