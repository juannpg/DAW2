<?php
  namespace class\plantilla;

  class Plantilla {
    public static function crearPlantilla(array $campos, array $array): string {
      if (empty($array)) {
        return "<p class='no-data'>No hay datos para mostrar</p>";
      }

      $html = "<table class='data-table'>";
      
      // Encabezado de la tabla
      $html .= "<thead>";
      $html .= "<tr class='table-header'>";
      foreach ($campos as $campo) {
        $html .= "<th>" . htmlspecialchars($campo ?? '') . "</th>";
      }
      $html .= "<th class='actions-header'>Acciones</th>";
      $html .= "</tr>";
      $html .= "</thead>";
      
      // Cuerpo de la tabla
      $html .= "<tbody>";
      $isEven = false;
      foreach ($array as $fila) {
        $rowClass = $isEven ? 'even' : 'odd';
        $html .= "<tr class='{$rowClass}'>";
        
        // Datos de la fila
        foreach ($fila as $columna) {
          $html .= "<td>" . htmlspecialchars($columna ?? '') . "</td>";
        }
        
        // Botones de acción
        $html .= "<td class='actions-cell'>";
        $html .= "<button class='btn-edit'>Editar</button>";
        // tiene que se un submit. igual así puedo llamar a la función
        $html .= "<button class='btn-delete' id='{$fila[0]}'>Eliminar</button>";
        $html .= "</td>";
        
        $html .= "</tr>";
        $isEven = !$isEven;
      }
      $html .= "</tbody>";
      
      $html .= "</table>";
      return $html;
    }
  }
?>