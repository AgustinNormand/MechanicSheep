/*select * from personas as per where NRO_DOC = "" and (select count(*) from personas as sonas where sonas.NOMBRE like CONCAT('%', per.NOMBRE ,'%') and sonas.APELLIDO like CONCAT('%', per.APELLIDO ,'%'))>=2;*/

/*select * from personas as per where NRO_DOC = "" and (select count(*) from personas as sonas where sonas.NOMBRE = per.NOMBRE and sonas.APELLIDO = per.APELLIDO) <> 1;*/

/*select * from personas where NOMBRE like CONCAT('%', "" ,'%') and APELLIDO like CONCAT('%', "GUILLERMO" ,'%')*/