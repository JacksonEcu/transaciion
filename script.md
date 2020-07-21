create table tra(nro_cuenta varchar(20) primary key,cedula varchar(20),saldo decimal);

insert into cuentas values ('11','jackson',1000);
insert into cuentas values ('12','stward',2000);

utilizacion del begin, commmit , roolback

try {  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $db->beginTransaction();
    $db->exec("UPDATE  tra set saldo= saldo - 10 where nro_cuenta  = '11' ");
    echo $db->inTransaction();
    $db->exec("UPDATE  tra set saldo= saldo + 10 where nro_cuenta  = '12' ");
    $db->commit();
    
  } catch (Exception $e) {
    $db->rollBack();
    echo "Fallo: " . $e->getMessage();
  }
