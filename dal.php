

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
  $sql="SELECT numero, sezione FROM classe ";
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