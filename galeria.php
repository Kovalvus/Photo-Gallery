<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
    <select onchange="shape()" id="ShapeChange">    <!-- choosing shapes -->
        <option value="rectangle">Prostokąt</option>
        <option value="rounded">Zaokrąglony</option>
        <option value="circle">Koło</option>
    </select>
    <select onchange="filter()" id="FilterChange">  <!-- choosing filters -->
        <option value="default">Bez filtru</option>
        <option value="grayscale">Czarno-biały</option>
        <option value="blur">Blur</option>
        <option value="HighBrightness">Jasny</option>
        <option value="LowBrightness">Ciemny</option>
        <option value="contrast">Wysoki kontrast</option>
        <option value="inverted">Odwrócone kolory</option>
        <option value="saturation">Wysoka saturacja</option>
        <option value="sepia">Sepia</option>
    </select>
    <select onchange="border()" id="BorderStyleChange">  <!-- choosing border styles -->
        <option value="solid">Pełna</option>
        <option value="dotted">Kropkowana</option>
        <option value="dashed">Kreskowana</option>
        <option value="double">Podwójna</option>
    </select>

    <input type="range" min="7" max="20" value="7" id="BorderWidthChange" onchange="border()"> <!-- choosing border width -->

    <input type="color" id="BorderColorChange" onchange="border()" value="#a52a2a">

    <script>    // Shapes

        window.onload = function() {    // default shape set to rectangle
            document.getElementById('ShapeChange').value = 'rectangle';
        }

        function shape() {  // function changing the shapes based on what's chosen in select form
            ksztalt = document.getElementById("ShapeChange").value;
            const images = document.querySelectorAll('.imgbutton');
            if(ksztalt == "rectangle"){
                images.forEach(img => {
                    img.style.borderRadius = '0%';
                })
            }
            
            if(ksztalt == "rounded"){
                images.forEach(img => {
                    img.style.borderRadius = '10%';
                })
            }

            if(ksztalt == "circle"){
                images.forEach(img => {
                    img.style.borderRadius = '50%';
                })
            }
        }
        
    </script>

    <script>    // Filters
        window.onload=function() {  // default filter set to grayscale
            document.getElementById("FilterChange").value = 'default';
        }

        function filter() { // function changing the filters based on what's chosen in select form
            filtr = document.getElementById("FilterChange").value;
            const images = document.querySelectorAll('.imgbutton');

            if(filtr == 'default') {
                images.forEach(img => {
                    img.style.filter = "";
                })
            }
            if(filtr == 'grayscale') {
                images.forEach(img => {
                    img.style.filter = "grayscale(100%)";
                })
            }
            if(filtr == 'blur') {
                images.forEach(img => {
                    img.style.filter = "blur(2px)";
                })
            }
            if(filtr == 'HighBrightness') {
                images.forEach(img => {
                    img.style.filter = "brightness(300%)";
                })
            }
            if(filtr == 'LowBrightness') {
                images.forEach(img => {
                    img.style.filter = "brightness(15%)";
                })
            }
            if(filtr == 'contrast') {
                images.forEach(img => {
                    img.style.filter = "contrast(300%)";
                })
            }
            if(filtr == 'inverted') {
                images.forEach(img => {
                    img.style.filter = "invert(100%)";
                })
            }
            if(filtr == 'saturation') {
                images.forEach(img => {
                    img.style.filter = "saturate(300%)";
                })
            }
            if(filtr == 'sepia') {
                images.forEach(img => {
                    img.style.filter = "sepia(100%)";
                })
            }
        }
    </script>

    <script>    // Borders
        window.onload = function() {
            document.getElementById('BorderStyleChange').value = 'solid';
            document.getElementById('BorderWidthChange').value = 7;
            document.getElementById('BorderColorChange').value ="#a52a2a";
        }

        function border() {
            BorderStyle = document.getElementById('BorderStyleChange').value;
            BorderWidth = document.getElementById('BorderWidthChange').value;
            BorderColor = document.getElementById('BorderColorChange').value;

            const images = document.querySelectorAll('.imgbutton');

            images.forEach(img => {
                img.style.border = BorderWidth+"px "+BorderStyle+" "+BorderColor;
        })
    }
    </script>
    </section>

    <?php
    $con = mysqli_connect('localhost','root','','galeria_zdjec');   
    $obraz = mysqli_query($con, "SELECT nazwa, opis FROM zdjecia");

    while($ans = mysqli_fetch_array($obraz)){   // getting image source names from database
        echo "<input type='image' src='".$ans[0]."' alt='".$ans[1]."' class='imgbutton' />";    // showing the images    
    }
    mysqli_close($con);
    ?>
</body>
</html>