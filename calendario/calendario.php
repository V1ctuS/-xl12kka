<!DOCTYPE html>
<html>
<head>
    <title>Calendario</title>
    <style>
        /* Estilos CSS para el calendario */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        
        @media (max-width: 600px) {
            /* Estilos responsivos para pantallas pequeñas */
            table {
                font-size: 12px;
            }
        }
    </style>
    <script>
        // Código JavaScript para el calendario (opcional)
        // ...
    </script>
</head>
<body>
    <h1>Calendario</h1>
    <form method="POST" action="">
        <label for="start_day">Día de inicio del marcado:</label>
        <input type="number" name="start_day" min="1" max="31" required>
        <br>
        <label for="work_days">Días de trabajo:</label>
        <input type="number" name="work_days" min="1" max="31" required>
        <br>
        <label for="rest_days">Días de descanso:</label>
        <input type="number" name="rest_days" min="1" max="31" required>
        <br>
        <label for="work_color">Color de marcado para días de trabajo:</label>
        <input type="color" name="work_color" required>
        <br>
        <label for="rest_color">Color de marcado para días de descanso:</label>
        <input type="color" name="rest_color" required>
        <br>
        <label for="month">Mes:</label>
        <select name="month">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <br>
        <label for="year">Año:</label>
        <select name="year">
            <?php
            for ($i = 2023; $i <= 2099; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Generar calendario">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $startDay = $_POST['start_day'];
        $workDays = $_POST['work_days'];
        $restDays = $_POST['rest_days'];
        $workColor = $_POST['work_color'];
        $restColor = $_POST['rest_color'];
        $month = $_POST['month'];
        $year = $_POST['year'];

        // Obtener el número de días en el mes y el día de la semana del primer día
        $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDay = date('N', strtotime("$year-$month-01"));

        // Generar el calendario
        $calendar = '<table>';
        $calendar .= '<tr><th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th></tr>';

        // Agregar celdas vacías para el primer día
        $calendar .= '<tr>';
        for ($i = 1; $i < $firstDay; $i++) {
            $calendar .= '<td></td>';
        }

        // Marcar los días de trabajo y descanso
        $dayCounter = 1;
        $isWorkDay = true;
        while ($dayCounter <= $numDays) {
            $calendar .= '<td>';
            for ($i = 1; $i <= 7; $i++) {
                if ($dayCounter <= $numDays) {
                    if ($isWorkDay) {
                        if ($dayCounter <= $workDays) {
                            $calendar .= "<div style='background-color: $workColor;'>$dayCounter</div>";
                        } else {
                            $isWorkDay = false;
                            $calendar .= "<div style='background-color: $restColor;'>$dayCounter</div>";
                        }
                    } else {
                        if ($dayCounter <= $restDays) {
                            $calendar .= "<div style='background-color: $restColor;'>$dayCounter</div>";
                        } else {
                            $isWorkDay = true;
                            $calendar .= "<div style='background-color: $workColor;'>$dayCounter</div>";
                        }
                    }
                } else {
                    $calendar .= '<div></div>';
                }
                $dayCounter++;
            }
            $calendar .= '</td>';
        }

        $calendar .= '</tr>';
        $calendar .= '</table>';

        echo $calendar;
    }
    ?>
</body>
</html>