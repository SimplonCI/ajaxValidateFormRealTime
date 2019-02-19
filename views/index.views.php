<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="assets/style.css">
    
</head>
<body>
    <?php if(isset($errors) && count($errors)>0): ?>
        <div class="alert">
            <?php foreach ($errors as $error): ?>
                    <?php echo $error ?> <br>
            <?php endforeach; ?>
        </div>
    <?php endif ?>
    <form action="index.php" method="post">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class='form-fields' onBlur="checkNom()">
            <span id="nom-availability-status"></span> 
        </div>
        <div>
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom" class='form-fields' onBlur="checkPrenom()">
            <span id="prenom-availability-status"></span> 
        </div>
        
        <div>
            <input type="submit" id="submit" value="enregistrer" name="submit"  />
        </div>
    </form>


   

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
   
   
    <script>

        // fonction permettant d'engrise de button soumettre si tout les champs sont vide
        function doCheck() {
            var allFilled = true;
            $('.form-fields').each(function() {
                if ($(this).val() == '') {
                    allFilled = false;
                }
            });

            $('input[type=submit]').prop('disabled', !allFilled);
            if (allFilled) {
                $('input[type=submit]').removeAttr('disabled');
            }
        }

        $(document).ready(function() {
            doCheck();
            $('.form-fields').keyup(doCheck);
        });


        // fonction permettant de verifier si le nom existe
        function checkNom() {
            jQuery.ajax({
            url: "http://localhost:8000/check_data.php",
            data:'nom='+$("#nom").val(),
            type: "POST",
            success:function(data){
                console.log(data);
                $("#nom-availability-status").html(data);
            
            },
            error:function (){}
            });
        }

        // fonction permettant de verifier si le prenom existe
        function checkPrenom() {
            jQuery.ajax({
            url: "http://localhost:8000/check_data.php",
            data:'prenom='+$("#prenom").val(),
            type: "POST",
            success:function(data){
                $("#prenom-availability-status").html(data);
            },
            error:function (){}
            });
        }

    
    </script>
        
        

  
</body>
</html>