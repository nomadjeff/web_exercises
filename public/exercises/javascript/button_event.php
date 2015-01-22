<?php

if (!empty($_POST)) {
    $something="Form submitted";
}
else {
    $something="Form not submitted";
}

?>
<html>
<head>
    <title></title>
</head>
<body>
<form action="button_event.php" method="post">
    <input type="hidden" name="something" value="BAM!">
    <button id="btn1">Click Me!</button>
    <script>

        // create a handler function
        var listener = function (event) {
            alert('You clicked the button!');
        }

        // register the listener to handle clicks on btn1
        document.getElementById('btn1').addEventListener('click', listener, false);

    </script>
    <input type="submit">
</form>
<?=$something?>
</body>
</html>