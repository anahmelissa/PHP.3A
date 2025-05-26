<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Combustível</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            color: #5a005a;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #cc0077;
            text-align: center;
        }

        form {
            background-color: #fff0f5;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.3);
        }

        input[type="text"], input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ff99cc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #ff66b2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #e0559e;
        }

        .resultado {
            background-color: #fff0f5;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            width: 400px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.3);
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-style: italic;
            color: #cc0077;
        }
    </style>
</head>
<body>
    <h2>Calculadora de Combustível</h2>

    <form method="post">
        Nome do Condutor: <input type="text" name="nome_condutor" required><br>
        Distância percorrida (km): <input type="number" name="distancia_percorrida" step="0.1" required><br>
        Combustível gasto (litros): <input type="number" name="combustivel_gasto" step="0.1" required><br>
        <input type="submit" value="Calcular Consumo Médio">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_condutor = $_POST["nome_condutor"];
        $distancia_percorrida = $_POST["distancia_percorrida"];
        $combustivel_gasto = $_POST["combustivel_gasto"];

        if ($distancia_percorrida > 0 && $combustivel_gasto > 0) {
            $consumo_medio = $distancia_percorrida / $combustivel_gasto;

            if ($consumo_medio <= 8) {
                $classificacao = "Alto consumo";
            } elseif ($consumo_medio > 8 && $consumo_medio <= 14) {
                $classificacao = "Consumo moderado";
            } else {
                $classificacao = "Bom consumo";
            }

            echo "<div class='resultado'>";
            echo "<p>Nome do Condutor: <strong>" . htmlspecialchars($nome_condutor) . "</strong></p>";
            echo "<p>Distância percorrida: <strong>" . number_format($distancia_percorrida, 2) . " km</strong></p>";
            echo "<p>Combustível gasto: <strong>" . number_format($combustivel_gasto, 2) . " litros</strong></p>";
            echo "<p>Consumo médio: <strong>" . number_format($consumo_medio, 2) . " km/l</strong></p>";
            echo "<p>Classificação de consumo: <strong>" . $classificacao . "</strong></p>";
            echo "</div>";
        } else {
            echo "<div class='resultado'><p>Por favor, insira valores válidos para distância e combustível.</p></div>";
        }
    }
    ?>

    <footer>
         <strong>Anah Melissa</strong>
    </footer>
</body>
</html>
