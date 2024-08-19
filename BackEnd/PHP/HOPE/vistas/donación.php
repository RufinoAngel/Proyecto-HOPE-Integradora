
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/login.css" />
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <img src="/HOPE/Assets/logo-removebg-preview.png" alt="" width="90px" height="85px">
        <h1 id="HP">H</h1>
        <h1 id="OE">O</h1>
        <h1 id="HP">P</h1>
        <h1 id="OE">E</h1>
    </header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Hogar Esperanza</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/HOPE/vistas/user.php">Home</a></li>
                <li><a href="/HOPE/vistas/Nosotros.php">Nosotros</a></li>
                <li><a href="/HOPE/vistas/servicios.php">Servicios</a></li>
                <li class="active"><a href="#">Donación</a></li>
                <li><a href="/HOPE/vistas/contacto.php">Calendario</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/HOPE/vistas/usuario.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
                <li><a href="includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav> 

    <div class="tit">
        <h2 id="Sobre">Donación </h2>
    </div>
    <h2 style="text-align: justify;">‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Como Hacerlo:</h2>
    <div class="donacion">
        <h4>1.- Selecciona el tipo de donación que deseas realizar</h4>
        <h4>2.-Si seleccionaste donación monetaria <br>
          ● Selecciona el monto que deseas donar <br>
          ● Introduce el número de cuenta <br>
          ● Introduce el cvv <br>
          ● Introduce la vigencia <br>
          ● Nombre Completo <br>
          ● Da click en Donar Ahora <br>  
         </h4>
        <h4>3.- Si seleccionaste donación Alimenticia o Medicamento <br>
          ● Introduce tu Nombre completo <br> 
          ●Selecciona los productos a donar <br>
          ● Introduce el albergue <br>
          ● Dirección para recolección de la donación <br>
          ● Da click en Donar Ahora <br>
          </h4>
        <h4>4.- Si seleccionaste donación para Vestimenta <br>
          ● Introduce tu nombre completo <br>
          ● Selecciona el tipo de ropa a donar <br>
          ● Introduce el albergue a donde deseas donar <br> 
          ● Dirección para recolección de la donación <br>
          ●   Da click en Donar Ahora </h4>
    </div>
    <br><br>
    <?php include '../includes/registerph.php'; ?>
    <h2 style="text-align: justify;">‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Tipo de Donación:</h2>
    <div class="tipdon">
        <form id="donation-form">
            <label for="dona">Tipo de Donación</label>
            <select name="donacion" id="dona">
                <option value="monetario">Monetario</option>
                <option value="alimentario">Alimenticia o Medicamento</option>
                <option value="ropa">Vestimenta</option>
            </select>
            <div class="donar-btn-container">
                <button type="button" class="donar-btn">Seleccionar</button>
            </div>
            
        </form>
    </div>

    <div id="form-monetario" class="form-container" style="display: none;">
        <h4>2.- Donación Monetaria</h4>
        <form method="post" action="">
            <input type="hidden" name="donacion" value="monetario">
            <label for="monto">Monto</label>
            <input type="number" id="monto" name="monto">
            <label for="cuenta">Número de cuenta</label>
            <input type="text" id="cuenta" name="cuenta">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv">
            <label for="vigencia">Vigencia</label>
            <input type="text" id="vigencia" name="vigencia">
            <label for="nombre">Nombre Completo</label>
            <input type="text" id="nombre" name="nombre">
            <button type="submit" class="donar-ahora-btn">Donar Ahora</button>
        </form>
    </div>

    <div id="form-alimentario" class="form-container" style="display: none;">
        <h4>3.- Donación Alimenticia o Medicamento</h4>
        <form method="post" action="">
            <input type="hidden" name="donacion" value="alimentario">
            <label for="nombre">Nombre Completo</label>
            <input type="text" id="nombre" name="nombre">
            <label for="productos">Selecciona los productos a donar</label>
            <input type="text" id="productos" name="productos">
            <label for="albergue">Introduce el albergue</label>
            <input type="text" id="albergue" name="albergue">
            <label for="direccion">Dirección para recolección de la donación</label>
            <input type="text" id="direccion" name="direccion">
            <button type="submit" class="donar-ahora-btn">Donar Ahora</button>
        </form>
    </div>

    <div id="form-ropa" class="form-container" style="display: none;">
        <h4>4.- Donación para Vestimenta</h4>
        <form method="post" action="">
            <input type="hidden" name="donacion" value="ropa">
            <label for="nombre">Nombre Completo</label>
            <input type="text" id="nombre" name="nombre">
            <label for="tipoRopa">Selecciona el tipo de ropa a donar</label>
            <input type="text" id="tipoRopa" name="tipoRopa">
            <label for="albergue">Introduce el albergue</label>
            <input type="text" id="albergue" name="albergue">
            <label for="direccion">Dirección para recolección de la donación</label>
            <input type="text" id="direccion" name="direccion">
            <button type="submit" class="donar-ahora-btn">Donar Ahora</button>
        </form>
    </div>

    <footer class="footer">
        <div class="footer-section">
            <h3>Apoya nuestro trabajo</h3>
            <p>Ayuda a las personas refugiadas</p>
            <button>Donar ahora</button>
        </div>
        <div class="footer-section">
            <h3>Síguenos en las redes sociales</h3>
            <div class="social-icons">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-twitter"></i>
            </div>
        </div>
        <div class="footer-section">
            <h3>Infórmate</h3>
            <p>Si necesitas ayuda no olvides contactarnos o regístrate</p>
            <button>Registrarme</button>
        </div>
        <div class="footer-section">
            <h3>Contáctanos</h3>
            <p><i class="bi bi-telephone-plus"></i> 221 729 0005</p>
            <p><i class="bi bi-telephone-plus"></i> 881 900 1990</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('dona');
            const donateButton = document.querySelector('.donar-btn');
            const forms = {
                monetario: document.getElementById('form-monetario'),
                alimentario: document.getElementById('form-alimentario'),
                ropa: document.getElementById('form-ropa')
            };

            donateButton.addEventListener('click', () => {
                const selectedValue = select.value;
                Object.keys(forms).forEach(key => {
                    forms[key].style.display = 'none';
                });
                if (forms[selectedValue]) {
                    forms[selectedValue].style.display = 'block';
                }
            });
        });
    </script> 
</body>
</html>
