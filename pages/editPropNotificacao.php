<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<title>Editar Proposta</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
		<style>
input[type=text], select {
      font-family: "Roboto", sans-serif;
  outline: 0;
  background: #D3D3D3;
  width: 100%;
  border: 0;
  margin: 0 0 10px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

input[type=date], select {
      font-family: "Roboto", sans-serif;
  outline: 0;
  background: #D3D3D3;
  width: 100%;
  border: 0;
  margin: 0 0 10px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

input[type=submit] {
      font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

textarea {
	font-family: "Roboto", sans-serif;
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #D3D3D3;
    font-size: 16px;
    resize: none;
}

#short_text{
	text-align: left;
	font-family: "Roboto", sans-serif;
	color: #4CAF50;
}

.red {
    background-color: red;
}

.green {
    background-color: green;
}

</style>

<script>
$("#color_me").change(function(){
    var color = $("option:selected", this).attr("class");
    $("#color_me").attr("class", color);
});
</script>



		
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
	
		 <div class="pagina">
		 
		 <div class="caixa_branca">
		
		 <a href="notificacao.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		 
		 
		<h1 align='center'> Editar Proposta </h1>
		
		
		<form name="editarProp" action="editarPropostaNotificacao.php?id=<?php echo($_GET['id']) ?>" method="POST">
		
		<?php
		
		
		$id = $_GET['id'];
		
		
		$error = "Unable to connect.";
		$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
		mysqli_select_db($connection,"pap") or die ($error);

		
		$query = mysqli_query($connection, "SELECT * FROM propostas WHERE idpropostas = '$id' ") or die("Error: ".mysqli_error($connection));
		
		
		$ob = mysqli_fetch_object($query);
		
		//<textarea name='texto' value='$ob->texto'></textarea>
		echo "
		
		<br>
		<center>
	  <input type='text' name='titulo' value='$ob->titulo'/>
	  <br>
	 
	 <textarea placeholder='Insira algum texto...' name='texto' required> $ob->texto </textarea>
	
	  <br><br>
	 
	 <div id='short_text'> Data de expira????o:</div><br>
	  <input type='date'  name='expiracao' value='$ob->expiracao'>
	  <br>
	 "; 
		echo "<select class='' name='vinculo' >";
		switch ('vinculo'){
				case $ob->vinculo == 'Est??gio Curricular'; 
				echo"
				<option value='Est??gio Curricular'>Est??gio Curricular</option>
				<option value='Est??gio Profissional'>Est??gio Profissional</option>
				<option value='Presta????o de Servi??os'>Presta????o de Servi??os</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				";break;
				case $ob->vinculo == 'Est??gio Profissional'; 
				echo"
				<option value='Est??gio Profissional'>Est??gio Profissional</option>
				<option value='Presta????o de Servi??os'>Presta????o de Servi??os</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Est??gio Curricular'>Est??gio Curricular</option>
				
				";break;
				case $ob->vinculo == 'Presta????o de Servi??os'; 
				echo"
				<option value='Presta????o de Servi??os'>Presta????o de Servi??os</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Est??gio Curricular'>Est??gio Curricular</option>
				<option value='Est??gio Profissional'>Est??gio Profissional</option>
				
				";break;
				case $ob->vinculo == 'Contrato a Termo'; 
				echo"
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Est??gio Curricular'>Est??gio Curricular</option>
				<option value='Est??gio Profissional'>Est??gio Profissional</option>
				<option value='Presta????o de Servi??os'>Presta????o de Servi??os</option>
				
				";break;
				case $ob->vinculo == 'Contrato Sem Termo'; 
				echo"
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Est??gio Curricular'>Est??gio Curricular</option>
				<option value='Est??gio Profissional'>Est??gio Profissional</option>
				<option value='Presta????o de Servi??os'>Presta????o de Servi??os</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				
				";break;
				
				default: echo "
				<option selected disabled>V??nculo</option>
				<option value='Est??gio Curricular'>Est??gio Curricular</option>
				<option value='Est??gio Profissional'>Est??gio Profissional</option>
				<option value='Presta????o de Servi??os'>Presta????o de Servi??os</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				";
				
		}
		echo "</select> <br>";
	  
		echo "
		<select id='color_me' class='' name='estado' >";
		
		switch('estado'){
		
		case $ob->estado == 'ativa'; echo"
			<option class='green' value='ativa' selected>Ativada</option>
			<option class='red' value='desativada'>Desativada</option>
			"; break;
		
		case $ob->estado == "desativada"; echo"
			<option class='red' value='desativada' selected>Desativada</option>
			<option class='green' value='ativa'>Ativada</option>
			"; break;
	
		
		} echo"</select>";
		
		
		echo "<select id='color_me' class='' name='curso' >";
		
		switch ('curso'){
				case $ob->curso == 'IG'; echo"
				
				<option value='IG'>Inform??tica de Gest??o</option>
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gest??o</option>
				
				"; break;
				case $ob->curso == 'MEC'; echo"
				
				
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='IG'>Inform??tica de Gest??o</option>
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gest??o</option>
				
				"; break;
				
				case $ob->curso == 'EAC'; echo"
				
				
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='IG'>Inform??tica de Gest??o</option>
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gest??o</option>
				
			
				"; break;
				
				
				case $ob->curso == 'GPSI'; echo"
				
				
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='IG'>Inform??tica de Gest??o</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gest??o</option>
				
				
				"; break;
				
				case $ob->curso == 'TUR'; echo"
				
				
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gest??o</option>
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='IG'>Inform??tica de Gest??o</option>
				
				"; break;
				
				case $ob->curso == 'GEST'; echo"
				
				<option value='GEST'>Gest??o</option>
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='IG'>Inform??tica de Gest??o</option>
				<option value='TUR'>Turismo</option>
				
				"; break;
				
				default: echo "
				<option selected disabled>Selecione o curso</option>
				<option value='IG'>Inform??tica de Gest??o</option>
				<option value='MEC'>Manuten????o Industrial/Mecatr??nica</option>
				<option value='EAC'>Eletr??nica, Automa????o e Comando</option>
				<option value='GPSI'>Gest??o e Programa????o de Sistemas Inform??ticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gest??o</option>
				";
		
		
		}echo"</select>
	 
	  					
	<input type='submit' value='Guardar' name='guardar'>
	  <br>				
		<center>
							
		
		
		";
		
		?></form>
		
		 </div>
		 
		 
		 </div>
		
		
		
		</div>
		<?php include 'footer.php';?>
		</div>
		
		</body>
		
	</html>
	
<?php

	}else{
	echo "<script>alert('Inicie Sess??o primeiro!');top.location.href='../index.html';</script>";
	}
?>

