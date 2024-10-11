<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #FFFFFF;
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 30px;
            background-color: #1E1E1E;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 100px;
            color: #FF6363;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #FFFFFF;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #BBBBBB;
        }

        a {
            text-decoration: none;
            font-size: 18px;
            padding: 10px 25px;
            background-color: #FF6363;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #FF3D3D;
        }

        .glitch {
            position: relative;
            display: inline-block;
            color: #FF6363;
            font-size: 100px;
            font-weight: bold;
            animation: glitch 1s infinite;
        }

        .glitch:before, .glitch:after {
            content: '404';
            position: absolute;
            left: 0;
            width: 100%;
            height: 100%;
            top: 0;
            background: transparent;
        }

        .glitch:before {
            left: 2px;
            text-shadow: -2px 0 red;
            clip: rect(24px, 550px, 90px, 0);
            animation: glitch 1s infinite linear reverse;
        }

        .glitch:after {
            left: -2px;
            text-shadow: -2px 0 blue;
            clip: rect(85px, 550px, 140px, 0);
            animation: glitch 1.5s infinite linear reverse;
        }

        @keyframes glitch {
            0% {
                transform: translate(0);
            }
            20% {
                transform: translate(-2px, 2px);
            }
            40% {
                transform: translate(-2px, -2px);
            }
            60% {
                transform: translate(2px, 2px);
            }
            80% {
                transform: translate(2px, -2px);
            }
            100% {
                transform: translate(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="glitch">404</div>
        <h2>Ops! Página Não Encontrada</h2>
        <p>Desculpe, mas a página que você está tentando acessar não existe.</p>
    </div>
</body>
</html>
