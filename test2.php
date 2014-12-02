<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
        <script type="text/javascript">
            window.onload = function () {
                var img = document.getElementById('embedImage');
                var button = document.getElementById('saveImage');
                img.src = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUA'+
                'AAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO'+
                '9TXL0Y4OHwAAAABJRU5ErkJggg==';
                img.onload = function () {
                    button.removeAttribute('disabled');
                };
                button.onclick = function () {
                    window.location.href = img.src.replace('image/png', 'image/octet-stream');
                };
            };
        </script>
    </head>
    <body>
        <img id="embedImage" alt="Red dot"/>
        <input id="saveImage" type="button" value="save image" disabled="disabled"/>
    </body>
</html>