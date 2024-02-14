<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {
        $nom=$_POST["txtnom"];
        $id=$_POST["txtid"];
        $duree=$_POST['txtduree'];
        $genre=$_POST['txtgenre'];
        $idlaureat=$_POST['txtidlau'];
        $values=[$id, $nom, $duree, $genre,$idlaureat];
        $m=new FormationModel();
        $m->insertformation($values);
        header('Location:index.php?page=formation/index');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Ajouter Formation</title>
    <style type="text/css">
        .btn{
            background-color: #337ab7;
            color: white;
        }                  
    </style>
</head>
<body>
<form method="post" class="custom-centered" style="margin-top: 120px;">
    <div class="container">
        <div class="row g-1 align-items-center">
            <div class="col-5">
                <label for="txtid" id="lblid" name="lblid" class="form-label">id:</label>
                <input type="text"  class="form-control" name="txtid"  placeholder="saisir le id">

                <label for="txtnom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                <input type="text"  class="form-control" name="txtnom" placeholder="saisir le nom">
            
                <label for="txtdurée" id="lbldurée" name="lbldurée" class="form-label">durée:</label>
                <input type="number" class="form-control" name="txtduree" placeholder="saisir la durée">
            </div>
            <div class="col-2"> 
            </div>
            <div class="col-5">       
                <label for="txtgenre" id="lblgenre" name="lblgenre" class="form-label">genre:</label> 
                <input type="text" class="form-control"  name="txtgenre" placeholder="saisir le genre">
        
                <label for="txtiden" id="lbliden" name="txtidlau">id de laureat:</label>
                <select  class="form-control" name="txtidlau">
                        <option>129</option>
                        <option>130</option>
                        <option>132</option>
                        <option>134</option>
                        <option>135</option>
                        <option>137</option>
                        <option>138</option>
                        <option>139</option>
                        <option>140</option>
                </select> 
            </div>
            <div class="col-12">
                    <button id="btajouter" class="btn" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit"><i class="material-icons">add_box</i></button>
                    <a href="index.php?page=formation/index" data-toggle="tooltip" data-placement="top" title="Annuler" class="btn"class="text-light"><i class="material-icons">arrow_back</i></a>
            </div>  
        </div>   
    </div> 
</form>    
</body>
</html>