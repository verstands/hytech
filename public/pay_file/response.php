<?php
/*
    session_start();
    $localhost = "localhost";
    $dbname = "eglise";
    $user = "root";
    $password = "";
    try {
        $con = new PDO('mysql:host='.$localhost.';dbname='.$dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (Exception $e) {
        die("erreur est souvenue lores de la connexion a la base de donnee");
    }
    $phone = htmlspecialchars($_SESSION['phone']);
    $montant = htmlspecialchars($_SESSION['amount']);
    $devise = htmlspecialchars($_SESSION['devise']);
    $id = htmlspecialchars($_SESSION['id']);
    $t = htmlspecialchars($_SESSION['t']);
    $p = htmlspecialchars($_SESSION['p']);
    $tableau = array(
        'user' => $phone,
        'montant' => $montant,
        'id_devise' => $devise,
        'id_eg' => $id,
        'id_off' => $t,
        'id_paiement' => $p,
    );
    $req = $con->prepare("INSERT INTO transaction(user, montant, id_devise, id_eg, id_off, id_paiement,date_t)VALUES(:user, :montant, :id_devise, :id_eg, :id_off, :id_paiement, NOW())");
    $req->execute($tableau);*/
    $lien = "https://frobill.cloud/pay/";
    $sujet = " 
               User : ".$_SESSION['phone']."\r\n
               Type offrande : ". $_SESSION['t']. "\r\n
               Paiement : ".$_SESSION['p']. "\r\n
               Montant : ".$_SESSION['amount'] ."\r\n
               Devise : ".$_SESSION['devise']. "\r\n" ;            
    $to = 'rabbymbamu@gmail.com';
    $subject = $sujet;   
    $message = "<html>
    
   <head>
   <title>$sujet.</title>
   </head>
   <body>
   <pre style='color:white;padding:10px;font-family:Montserrat,sans-serif';font-size:17px;>
   
   .</pre>
   <br>
   <b><a href='$lien' style='text-decoration:none;padding:10px;background-color:#0361b3;color:white;font-family:Montserrat,sans-serif';font-size:15px;'>Visiter le site</a></b>
   </body>
   </html>";
    $header = "From:\"FROBILL\"<rabbymbamu@gmail.com>\r\n";
    $header = "Cc:rabbymbamu@gmail.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    $retval = mail ($to,$subject,$message,$header); 
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etrapps</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <style type="text/css">
        .button{
    display: inline-block;
              font-weight: 400;
              color: #858796;
              text-align: center;
              vertical-align: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
              background-color: transparent;
              border: 1px solid transparent;
              padding: 0.375rem 0.75rem;
              font-size: 1rem;
              line-height: 1.5;
              border-radius: 2.35rem;
              transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
                .button.button-primary {
                color: #fff; }
                .button-primary {
          color: #fff;
          background-color: #4e73df;
          border-color: #4e73df;
        }

        .button-primary:hover {
          color: #fff;
          background-color: #2e59d9;
          border-color: #2653d4;
        }

        .button-primary:focus, .button-primary.focus {
          box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }

        .button-primary.disabled, .button-primary:disabled {
          color: #fff;
          background-color: #4e73df;
          border-color: #4e73df;
        }

        .button-primary:not(:disabled):not(.disabled):active, .button-primary:not(:disabled):not(.disabled).active,
        .show > .button-primary.dropdown-toggle {
          color: #fff;
          background-color: #2653d4;
          border-color: #244ec9;
        }

        .button-primary:not(:disabled):not(.disabled):active:focus, .button-primary:not(:disabled):not(.disabled).active:focus,
        .show > .button-primary.dropdown-toggle:focus {
          box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }
        .button-user {
          font-size: 0.8rem;
          border-radius: 10rem;
          padding: 0.75rem 1rem;
        }
    </style>
</head>


<body style="background-color: #222831;">
    <div style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;">
        <div style="text-align: center;">
            <h3 style="font-family: sans-serif;color:white">PAIEMENT EFFECTUEZ AVEC SUCCES</h3>
            <img src="10355-loading-success.gif" alt="" srcset="">
            <a class="button button-primary btn-user btn-block" href="../../index.php?page=pupop&amp;Qw=<?=$_SESSION['Qw'];?>&amp;v=<?=$_SESSION['v'];?>&amp;S=<?=$_SESSION['id'];?>">Retour a la page d'accueil</a>
        </div>
    </div>
</body>
      </htm       n  nb    nb n                                                                                                                                                            nn                                                                                                                                                                                                                                                                                                                                             n     