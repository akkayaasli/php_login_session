<?php



$sunucu_adi="localhost";
$kullanici_adi="root";
$sifre="";
$vt="final";
$baglanti=new mysqli($sunucu_adi,$kullanici_adi,$sifre,$vt);
mysqli_set_charset($baglanti,"utf8");
if($baglanti->connect_error)
  die("bağlantı sağlanamadı:".$baglanti->connect_error);



session_start();

	if(isset($_POST["aa_giris_yap"]))
			{		
			$_SESSION["eposta"] = $_POST["aa_eposta"];
			$_SESSION["sifre"]=$_POST["aa_sifre"];
	

				$sorgu="SELECT * FROM kullanici where eposta='".@$_POST["aa_eposta"]."'";
				$sonuc=$baglanti->query($sorgu);
				$kayit=$sonuc->fetch_assoc();

				if($kayit["eposta"]==@$_POST["aa_eposta"] && $kayit["sifre"]==@$_POST["aa_sifre"])
				{
					$_SESSION["aa_giris_yap"]=true;
					header('Location:201613709004_2.php');
					
				}
				else
				{
					echo "Yönetici Kaydınız Bulunmamaktadır.";
				}
				
			}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GİRİŞ SAYFASI</title>
    <!-- Bootstrap core CSS -->
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  </head>


  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">


       
        <svg class="bi bi-bootstrap-fill" width="8em" height="8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"/>
        </svg>


      <h2>GİRİŞ</h2>
        <p class="lead">Lütfen Giriş Yapınız</p>
      </div>
      <div class="row">        
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Kullanıcı Giriş Sayfası</h4>



          <form class="needs-validation" action="" method="post">		


		        <div class="mb-3">   
              <div class="input-group">                
                <input type="text" class="form-control" id="epostaTxt" placeholder="E-posta Adresi" name="aa_eposta" required="">        

              </div>
            </div>




            <div class="mb-3">             
              <div class="input-group">                
                <input type="password" class="form-control" id="sifreTxt" placeholder="Şifre" name="aa_sifre" required="Lütfen şifrenizi giriniz">                
              </div>
            </div>    
           	
             <button class="btn btn-outline-danger btn-lg btn-block" name="aa_giris_yap" type="submit" ><i>Giriş Yap</i></button>

          </form>



        </div>
      </div>
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Final Sınavı</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>



</html>




















