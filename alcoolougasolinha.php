<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Comparação de Combustíveis</title>
    <style>
        body {
            background-color: #fff0f6;
            color: #d6336c;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #ffe6f0;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px #d6336c88;
            width: 320px;
        }
        input[type="number"] {
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #d6336c;
            border-radius: 5px;
            width: 80%;
            font-size: 16px;
            color: #d6336c;
            background: #fff0f6;
        }
        input[type="submit"] {
            background-color: #d6336c;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #a1274b;
        }
        h1, h2 {
            margin-bottom: 20px;
        }
        .resultado {
            margin-top: 25px;
            font-weight: bold;
            font-size: 18px;
        }
        .assinatura {
            margin-top: 40px;
            font-style: italic;
            font-size: 14px;
            color: #a1274b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Comparar Combustíveis</h1>
        <form method="post" action="">
            <input type="number" step="0.01" name="etanol" placeholder="Preço do Etanol (R$)" required />
            <br />
            <input type="number" step="0.01" name="gasolina" placeholder="Preço da Gasolina (R$)" required />
            <br />
            <input type="submit" value="Calcular" />
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $etanol = floatval($_POST["etanol"]);
            $gasolina = floatval($_POST["gasolina"]);
            $setenta_por_cento = $gasolina * 0.7;

            echo "<div class='resultado'>";
            echo "70% do preço da gasolina: R$ " . number_format($setenta_por_cento, 2, ",", ".") . "<br>";

            if ($etanol <= $setenta_por_cento) {
                echo "É mais vantajoso usar <strong>Etanol</strong>.";
            } else {
                echo "É mais vantajoso usar <strong>Gasolina</strong>.";
            }
            echo "</div>";
        }
        ?>

        <div class="assinatura">
            Anah Melissa / 3-A
        </div>
    </div>
</body>
</html>
