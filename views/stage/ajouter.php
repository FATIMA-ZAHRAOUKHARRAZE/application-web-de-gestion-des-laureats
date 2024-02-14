<?php

if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $id=$_POST['txtid'];
        $intitulé=$_POST["txtintitulé"];
        $datedebut=$_POST["txtdatedebut"];
        $datefin=$_POST["txtdatefin"];
        $note=$_POST["txtnote"];
        $idsociete=$_POST["txtidso"];
        $idencadreur=$_POST["txtiden"];
        $idlaureat=$_POST["txtidla"];
        $values=[$id, $intitulé, $datedebut, $datefin,$note,$idsociete,$idencadreur,$idlaureat];
        $m=new StageModel();
        $m->insertstage($values);
        header('Location:index.php?page=stage/index');
    }
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ajouter Stage</title>
    <style type="text/css">
        .btn{
                background-color: #337ab7;
                color: white;
        }                   
      </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top: 90px;">
        <div class="container">
                <div class="row g-1 align-items-center" >
                        <div class="col-5">
                                <label for="txtid" id="lblid" name="lblid" class="form-label">id:</label>
                                <input type="text"  class="form-control" name="txtid"  placeholder="saisir le id">

                                <label for="txtintitulé" id="lblintitulé" name="lblintitulé" class="form-label" > intitulé : </label>
                                <input type="text"  class="form-control" name="txtintitulé" placeholder="saisir le intitulé">

                                <label for="txtdatedebut" id="lbldatedebut" name="lbldatedebut" class="form-label"> date debut:</label>
                                <input type="date" class="form-control" name="txtdatedebut" placeholder="saisir le date debut">    

                                <label for="txtdatefin" id="lbldatefin" name="lbldatefin"  class="form-label"> date fin: </label>
                                <input type="date" class="form-control" name="txtdatefin" placeholder="saisir le  date fin">
                        </div>
                        <div class="col-2"> 
                        </div>
                        <div class="col-5"> 

                                <label for="txtnote" id="lblnote" name="lblnote" class="form-label" >note:</label> 
                                <input type="text" class="form-control" name="txtnote" placeholder="saisir le  note">

                                <label for="txtid" id="lblid" name="lblidso">id de societe:</label>
                                        <select  class="form-control" name="txtidso">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>4</option>
                                        <option>6</option>
                                        <option>10</option>
                                        <option>12</option>
                                        </select>
                                <label for="txtiden" id="lbliden" name="lbliden">id de encadreur:</label>
                                        <select  class="form-control" name="txtiden">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>5</option>
                                        <option>10</option>
                                        </select>
                                <label for="txtiden" id="lbliden" name="lblidla">id de laureat:</label>
                                        <select  class="form-control" name="txtidla">
                                        <option>129</option>
                                        <option>130</option>
                                        <option>132</option>
                                        <option>134</option>
                                        <option>135</option>
                                        <option>137</option>
                                        <option>138</option>
                                        <option>139</option>
                                        <option>135</option>
                                        <option>140</option>
                                        </select>
                                
                        </div>
                        <div class="col-12">
                                <button id="btajouter" class="btn" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                                <a href="index.php?page=stage/index" data-toggle="tooltip" data-placement="top" title="Annuler" class="btn"><i class="material-icons">arrow_back</i></a>
                        </div>
                </div>  
        </div>          
</form> 
</body>
</html>