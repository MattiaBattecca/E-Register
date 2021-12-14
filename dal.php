

<?php
//connessione
function db_connect(){
  $mysqli = new mysqli("localhost", "registro", "4Uu4eK0mE7amLwPi", "registro");
  if($mysqli->connect_error){
    die('Connection failed. Error: '. $mysqli->connect_error);
  }
  return $mysqli;
}

function classi_sel_all(){
  $mysqli=db_connect();
  $sql="SELECT * FROM classe ";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $data;
}

function log_insegnante($user, $pass){
    
  $mysqli=db_connect();
  $sql="SELECT 'password', id_insegnante FROM insegnante WHERE LOWER(username) LIKE LOWER('$user')";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();

    if($data!=null)
    {
        echo(implode("|",$data[0][0]));
        echo(implode("|",$data[0][1]));
        echo("\n\n\n\n");
        if($pass==$data[0])
        {
            return $data[1];
        }
        else
        {
            return 0;
        }
    }
    else
    {
        return 0;
    }
}

function media_tot(){
  $mysqli=db_connect();
  $sql="SELECT AVG(valore) FROM(SELECT voto.valore FROM voto) AS media_tot";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0];
}

function massimo_tot(){
  $mysqli=db_connect();
  $sql="SELECT MAX(valore) FROM(SELECT voto.valore FROM voto) AS massimo_tot";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0];
}

function minimo_tot(){
  $mysqli=db_connect();
  $sql="SELECT MIN(valore) FROM(SELECT voto.valore FROM voto) AS minimo_tot";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0];
}

function deviazione_tot(){
  $mysqli=db_connect();
  $sql="SELECT STDDEV_POP(voto.valore) FROM voto";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0];
}

function media_cls($classe){
  $mysqli=db_connect();
  $sql="SELECT AVG(valore) FROM(SELECT voto.valore FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe)) AS media_cls";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0][0];
}

function massimo_cls($classe){
  $mysqli=db_connect();
  $sql="SELECT MAX(valore) FROM(SELECT voto.valore FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe)) AS massimo_cls";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0][0];
}

function minimo_cls($classe){
  $mysqli=db_connect();
  $sql="SELECT MIN(valore) FROM(SELECT voto.valore FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe)) AS minimo_cls";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0][0];
}

function deviazione_cls($classe){
  $mysqli=db_connect();
  $sql="SELECT STDDEV_POP(dev.valore) FROM(SELECT voto.valore FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe)) AS dev";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return $data[0][0];
}


function log_studente($user, $pass){
    
  $mysqli=db_connect();
  $sql="SELECT 'password', id_studente FROM studente WHERE LOWER(username) LIKE LOWER('$user') ";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();

  if($data!=null)
  {
    if($pass==$data[0][0])
    {
        return $data[0][1];
    }
  }
  else{
      return 0;
  }
}

function mesi(){
  $arr=[];
  $sql1="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-09-%') AS val";
  $sql2="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-10-%') AS val";
  $sql3="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-11-%') AS val";
  $sql4="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-12-%') AS val";
  $sql5="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-01-%') AS val";
  $sql6="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-02-%') AS val";
  $sql7="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-03-%') AS val";
  $sql8="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-04-%') AS val";
  $sql9="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-05-%') AS val";
  $sql10="SELECT AVG(valore) FROM (SELECT voto.valore FROM voto WHERE voto.data LIKE '%-06-%') AS val";



  $mysqli=db_connect();



  $result=$mysqli->query($sql1);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql2);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql3);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql4);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql5);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql6);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql7);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql8);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql9);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql10);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);



  $mysqli->close();

  return $arr;
}

function mesi_cls($classe){
  $arr=[];
  $sql1="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-09-%')) AS val";
  $sql2="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-10-%')) AS val";
  $sql3="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-11-%')) AS val";
  $sql4="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-12-%')) AS val";
  $sql5="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-01-%')) AS val";
  $sql6="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-02-%')) AS val";
  $sql7="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-03-%')) AS val";
  $sql8="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-04-%')) AS val";
  $sql9="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-05-%')) AS val";
  $sql10="SELECT AVG(valore) FROM (SELECT voto.valore, voto.data FROM voto WHERE voto.id_studente IN (SELECT studente.id_studente FROM studente WHERE studente.id_classe = $classe AND voto.data LIKE '%-06-%')) AS val";



  $mysqli=db_connect();



  $result=$mysqli->query($sql1);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql2);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql3);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql4);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql5);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql6);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql7);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql8);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql9);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);

  $result=$mysqli->query($sql10);
  $data=$result->fetch_all();
  $result->free();
  array_push($arr,$data[0][0]);



  $mysqli->close();

  return $arr;
}


function classe($str){  
  $a = $str[0];
  $b = $str[1];
  $mysqli=db_connect();
  $sql="SELECT classe.id_classe FROM classe WHERE classe.numero = $a AND LOWER(classe.sezione) = LOWER('$b')";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();

  if(count($data)>0){
    return $data[0][0];
  }
  else{
    return -1;
  }
}


function classe_from_id($id){
  $mysqli=db_connect();
  $sql="SELECT classe.numero, classe.sezione FROM classe WHERE classe.id_classe = $id";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all();
  $result->free();
  $mysqli->close();
  return strval($data[0][0]).strtoupper(strval($data[0][1]));
}









































function nazioni_sel_all(){
  $mysqli=db_connect();
  $sql="SELECT * FROM country ORDER BY Name";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $data;
}
function nazioni_sel_all_lin(){
  $mysqli=db_connect();
  $sql="SELECT c.Code, c.Name, c.Continent, COUNT(l.CountryCode) AS LanguagesNum FROM country c INNER 
  JOIN countrylanguage l ON c.Code=l.CountryCode GROUP BY l.CountryCode ORDER BY c.Name";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $data;
}
// Seleziona comparando a una srtringa
function nazioni_sel_filt($filt){
  $mysqli=db_connect();
  $sql="SELECT * FROM country WHERE Name like '%$filt%' ORDER BY Name";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $data;
}
function nazioni_sel_filt_lin($filt){
  $mysqli=db_connect();
  $sql="SELECT c.Code, c.Name, c.Continent, COUNT(l.CountryCode) AS LanguagesNum FROM country c INNER 
  JOIN countrylanguage l ON c.Code=l.CountryCode GROUP BY l.CountryCode HAVING c.Name like '%$filt%' ORDER BY c.Name";
  $result=$mysqli->query($sql);
  $data=$result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $mysqli->close();
  return $data;
}
// aggiorna
function nazioni_mod_id($oldcode, $code, $name, $cont){
  $mysqli=db_connect();
  $sql="UPDATE country SET Code='$code', Name='$name', Continent='$cont' where Code='$oldcode'";
  $result=$mysqli->query($sql);
  $mysqli->close();
}
// elimina
function delete($text){
  $mysqli=db_connect();
  $sql="DELETE FROM column WHERE attribute='$text'";
  $result=$mysqli->query($sql);
  $mysqli->close();
}



?>