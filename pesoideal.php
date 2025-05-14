<?php
// Variáveis para armazenar o resultado e a classificação
$imc = $classificacao = "";
$peso = $altura = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os valores de peso e altura
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    // Verificar se os valores são válidos
    if (is_numeric($peso) && is_numeric($altura) && $peso > 0 && $altura > 0) {
        // Calcular o IMC
        $imc = $peso / ($altura * $altura);

        // Classificação de acordo com o IMC
        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            $classificacao = "Peso normal";
        } elseif ($imc >= 25 && $imc <= 29.9) {
            $classificacao = "Sobrepeso";
        } else {
            $classificacao = "Obesidade";
        }
    } else {
        $erro = "Por favor, insira valores válidos para peso e altura!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec; /* Fundo Rosa Claro */
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #ec407a; /* Rosa mais forte para o topo */
            color: white;
            text-align: right;
            padding: 15px;
            font-size: 1.1em;
        }

        .header span {
            font-weight: bold;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #ec407a;
            font-size: 2.2em;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            color: #333;
            outline: none;
        }

        input[type="number"]:focus {
            border-color: #ec407a;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #ec407a;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #d81b60;
        }

        .result, .error {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            font-size: 1.2em;
            text-align: center;
        }

        .result {
            background-color: #fce4ec;
            color: #ec407a;
            border: 1px solid #f8bbd0;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

    </style>
</head>
<body>

<!-- Cabeçalho com seu nome -->
<div class="header">
    Anah Melissa, 3°A
</div>

<div class="container">
    <h1>Calculadora de IMC</h1>
    
    <form method="POST" action="">
        <div>
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" step="0.1" value="<?php echo isset($peso) ? $peso : ''; ?>" required>
        </div>
        
        <div>
            <label for="altura">Altura (m):</label>
            <input type="number" id="altura" name="altura" step="0.01" value="<?php echo isset($altura) ? $altura : ''; ?>" required>
        </div>
        
        <button type="submit" class="btn">Calcular IMC</button>
    </form>

    <!-- Exibindo erro caso os valores estejam incorretos -->
    <?php if (isset($erro)) { ?>
        <div class="error">
            <?php echo $erro; ?>
        </div>
    <?php } ?>

    <!-- Exibindo o resultado do IMC e a classificação -->
    <?php if (!empty($imc)) { ?>
        <div class="result">
            <p><strong>IMC:</strong> <?php echo number_format($imc, 2); ?></p>
            <p><strong>Classificação:</strong> <?php echo $classificacao; ?></p>
        </div>
    <?php } ?>
</div>

</body>
</html>