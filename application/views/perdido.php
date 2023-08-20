<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">

    <title>OOOPS AL PARECER TE PERDISTE</title>
    <style>
        body {
            /* background-color: orange; */
            background: linear-gradient(to top, white, orange);
            display: flex;

            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message {
            color: white;
            font-size: 24px;
            text-align: center;
        }
        .line {
            width: 200px;
            height: 3px;
            background-color: white;
            margin: 20px auto;
        }

        .texto{
            font-family: 'Baloo 2' ;
        }
    </style>
</head>
<body>
    <div class="message">
        <h1>"OOOPS AL PARECER TE PERDISTE"</h1>
        <div class="line"></div>
        <img src="<?php echo base_url(); ?>iconos/triste.png" width="200" height="200" alt="Icono" />
    </div>
</body>

</html>
