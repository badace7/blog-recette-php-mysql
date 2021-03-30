<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <form action='test.php' method='post'>
            <label for='n1'>Numérateur :</label>
            <input type='number' id='n1' name='n1'><br><br>
            <label for='n2'>Dénominateur :</label>
            <input type='number' id='n2' name='n2'><br>
            <input type='submit' value='Envoyer'><br><br>
        </form>
        <?php
            function division($x, $y){
                if($y == 0){
                    throw new Exception('Division par zéro impossible');
                } else {
                    echo '<br>Résultat de' .$x. '/' .$y. ' : ' .($x / $y);
                }
            }
            
            //En pratique, il faudrait vérifier les données envoyées
            if(isset($_POST['n1']) && isset($_POST['n2'])){
                try {
                    division($_POST['n1'], $_POST['n2']);
                } catch (Exception $e) {
                   echo '<h1>'.$e->getMessage().' bro</h1>';
                }
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>