<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Värske teade</title>
</head>
<body>

<h1>Värske teade</h1>

<div style="text-align:center; margin-top:20px;">
    <?php
    echo nl2br(file_get_contents("teade.txt"));
    ?>
</div>

<div style="text-align:right; margin-top:40px;">
    <?php
    echo file_get_contents("autor.txt");
    ?>
</div>

</body>
</html>
