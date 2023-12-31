<?php
$invalid = '';
$my_email = 'info@607.com';

// Validate input:
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $invalid.= "\n Remplir tous les champs obligatoires";
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Validate email:
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email))
{
    $invalid .= "\n Adresse incorrecte";
}

// Send email if no errors detected:
if( empty($invalid))
{
$to = $my_email;
$subject = "Soumission demandé par $name";
$body = "Voici le message:\n Nom: $name \n ".
"Email: $email\n Phone: $phone\n Message:\n $message";
$headers = "From: $my_email\n";
$headers .= "Reply-To: $email";
mail($to,$subject,$body,$headers);

//redirect to the thank you page:
header('Location: merci.html');


}

//echo $invalid;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset=utf-8 />
    <meta name=author content="Lucas Enns" />
    <title>Contact</title>
    <link rel=icon href=favicon.ico />
    <link href=index.html hreflang=fr>
    <link rel="stylesheet" type="text/css" href="css/page.css" />
</head>
<body>
        <div class="section" id="section3">
            <div id="quote">
                 <?php
                    echo '<h4>ERREUR: '. ($invalid) . "</h5>";
                ?>
                <form action="<?php echo basename(__FILE__); ?>" method="post">
                    <div class=form>
                        <label for=name>Nom*</label>
                        <input type=text id=name name=name placeholder=*requis maxlength=50>
                    </div>
                    <div class=form>
                        <label for=email>Email*</label>
                        <input type=text id=email name=email placeholder=*requis maxlength=80>
                    </div>
                    <div class=form>
                        <label for=phone>Numéro</label>
                        <input type=text name=phone placeholder maxlength=15>
                    </div>
                    <div class=form>
                        <label for=message>Décrire votre projet*</label>
                        <textarea id=message name=message placeholder=*requis maxlength=1000 rows=4></textarea>
                    </div>
                    <div>
                        <input id=submit type=submit value=Envoyer>
                    </div>
                </form>
            </div>
            <div id=contact-content class="aL">
                <h6>Lucas Enns</h6>
                <b>Gars dans l'Atelier</b>
                <h6>Sophie Lessard</h6>
                <b>Fille qui parle au monde</b>
                <h5><a href=tel:+14181234567>418&nbsp;123&nbsp;4567</a></h5>
                <a href=mailto:a607&#64;gmail.com>a607#64;gmail.com</a>
            </div>
        </div>
</body>
</html>
