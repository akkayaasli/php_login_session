<?php

$sunucu_adi="localhost";
$kullanici_adi="root";
$sifre="";
$vt="final";

$baglanti=new mysqli($sunucu_adi,$kullanici_adi,$sifre,$vt);

mysqli_set_charset($baglanti,"utf8");
if($baglanti->connect_error)
	die("bağlantı sağlanamadı:".$baglanti->connect_error);

//sessionları ekle

session_start();
	//echo 'Ürün CRUD İşlemleri Sayfasındasınız ' . $_SESSION['eposta'];
if($_SESSION["eposta"]==""||$_SESSION["sifre"]=="")
{
	header('Location:201613709004_1.php');
}

?>



<!doctype html>
<html lang="en">
  <head>
   

    <title>ASLI AKKAYA-CRUD</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    	
    	.h1
    	{
    		font-family: Verdana, Geneva, Tahoma, sans-serif;
    		font-size: :45pt;
    		color: gray;
    		background-color: transparent; 
    	}

    	.design
    	{
    		font-family: sans-serif;
    		font-size: :10pt;
    		color: gray;
    		background-color: transparent;
    	}

    	.inputDesign {
       
        text-align: center;
        vertical-align: middle;
    }
    </style>
  </head>

  <body class="bg-light">
  
  
  

  
 
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="h1"><i>ÜRÜN CRUD İŞLEMLERİ</i></h2>
		</div>
		<div class="row">
		<div class="col-md-12 order-md-2">
		
		<?php
			//düzenleme kodları yazılacak güncelleme butonu eklenecek.
			if(isset($_POST["aa_duzenle"]))
			{
				$sorgu_duzenle="SELECT * FROM urun WHERE id=".$_POST["aa_duzenle"];
				$sonuc=$baglanti->query($sorgu_duzenle);
				$kayit=$sonuc->fetch_assoc();
			
		?>






        <form class="needs-validation " method="POST" action="" >
            <div class="row">
              <div class="col-md-6 mb-3">


                <label  for="firstName" class="design  "><i> Ürün Adı</i></label>
                <input type="text" name="aa_urun_adi" class="form-control " id="firstName" placeholder="" value="<?=$kayit["urun_adi"]?>" >

                <label for="firstName" class="design"> <i>Adet</i></label>
                <input type="text" name="aa_adet" class="form-control" id="secondName" placeholder="" value="<?=$kayit["adet"]?>" >

                  <label for="firstName" class="design "><i> Fiyat</i></label>
                <input type="text" name="aa_fiyat" class="form-control" id="thirdName" placeholder="" value="<?=$kayit["fiyat"]?>" >


				<input type="hidden" name="aa_id" class="form-control" id="firstName" placeholder="" value="<?=$kayit["id"]?>" >


              </div>
            
            </div>
			
           <!-- <button class="btn btn-primary btn-lg btn-block" name="guncelle" type="submit">Ürün Bilgilerini Güncelle</button>-->
             <button class="btn btn-outline-danger btn-lg btn-block" name="aa_guncelle" type="submit" ><i>Ürün Bilgilerini Güncelle</i></button>
        </form>
		





		<?php
			
			}
			else
			{
		?>
		


		<form class="needs-validation" method="POST" action="" >
            <div class="row">
              <div class="col-md-6 mb-3">


                <label for="firstName" class="design"><i><b> Ürün Adı</b></i></label>
                <input type="text" name="aa_urun_adi" class="form-control" id="firstName" placeholder="" value="" >


                 <label for="firstName" class="design"> <i><b>Adet</b></i></label>
                <input type="text" name="aa_adet" class="form-control" id="secondName" placeholder="" value="" >

                 <label for="firstName" class="design"><i><b> Fiyat</b></i></label>
                <input type="text" name="aa_fiyat" class="form-control" id="thirdName" placeholder="" value="" >


              </div>
            
            </div>
			
           <!-- <button class="btn btn-primary btn-lg btn-block" name="urun_kaydet" type="submit">Ürünü Kaydet</button>-->

            <button class="btn btn-outline-danger btn-lg btn-block" name="aa_urun_kaydet" type="submit" ><i>Ürün Kaydet</i></button>

        </form>
		  
        </div>
      </div>
	  
	  <?php
			}
	  ?>
	  
	  
       
	   
	   <?php
			if(isset($_POST["aa_urun_kaydet"]))
			{
				$sorgu_urun_kayıt="INSERT INTO `urun` (`id`, `urun_adi`,`adet`,`fiyat`)

				 VALUES (NULL, '".$_POST["aa_urun_adi"]."','".$_POST["aa_adet"]."','".$_POST["aa_fiyat"]."');";

				$baglanti->query($sorgu_urun_kayıt);

			}





			if(isset($_POST["aa_sil"]))
			{
				$sorgu_sil="DELETE FROM `urun` WHERE `urun`.`id` =".$_POST["aa_sil"];
				$baglanti->query($sorgu_sil);
				
			}

			if(isset($_POST["aa_cikis"]))
	
			{
				header("Location:201613709004_1.php");
				die();
			}
			
			if(isset($_POST["aa_guncelle"]))
			{
				$sorgu_guncelle="UPDATE `urun` 

				SET `urun_adi` = '".$_POST["aa_urun_adi"]."',
				`adet` = '".$_POST["aa_adet"]."',

				`fiyat` = '".$_POST["aa_fiyat"]."'


				 WHERE `urun`.`id` =".$_POST["aa_id"];

				$baglanti->query($sorgu_guncelle);
				
			}
	   ?>
      
      
          
        <form method="POST" action="">
			<div class="container">
			<div class="py-5 text-center">				
			</div>
			
		
			<div class="row">
				<table class="table table-bordered table-dark">
					<thead>
					<tr>
						<th><i>ID</i></th>
						<th><i>ÜRÜN ADI</i></th>
						<th><i>ADET</i></th>
						<th><i>FİYAT</i></th>
						<th><i>İŞLEM</i></th>
					</tr>
					</thead>
					<tbody>
					
					<?php
						$sorgu_listele="SELECT * FROM urun";
						$sonuc=$baglanti->query($sorgu_listele);
						while($kayit=$sonuc->fetch_assoc())
						{
					?>
					<tr>
						<td><?=$kayit["id"]?></td>
						<td><?=$kayit["urun_adi"]?></td>
						<td><?=$kayit["adet"]?></td>
						<td><?=$kayit["fiyat"]?></td>

						<td>
							<button class="btn btn-outline-info" name="aa_duzenle" type="submit" value="<?=$kayit["id"]?>"><i>Düzenle</i></button>
							<button  class="btn btn-outline-warning" name="aa_sil" type="submit" value="<?=$kayit["id"]?>"><i>Sil</i></button>
						</td>
					</tr>
					<?php
						}
					?>
					</tbody>
				</table>				 

				 <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="aa_cikis"><i>Çıkış</i></button>
			</div>
			</div>
		</form>                                  			      
                           
                                            
      <footer class="my-5 pt-5 text-muted text-center text-small">
       
        <ul class="list-inline">
        </ul>
      </footer>
    </div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>













