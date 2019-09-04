drop procedure if exists Guardar_Publicidad;
delimiter $$
create procedure Guardar_Publicidad(_idplan int,
								    _idempresa int,
                                    _imagen varchar(250),
                                    _fechainicio date, 
                                    _fechafin date)

begin
	declare _diasrestantes int;
	select datediff(fechafin, fechainicio) dias into _diasrestantes;
    
    insert into publicidad(idempresa, fechainicio, fechafin, imagen, diasrestantes, idplan) 
    values(_idempresa, _fechainicio, _fechafin, _imagen, _diasrestantes, _idplan);
    
end $$

delimiter $$
create procedure Eliminar_Publicidad()

begin
	declare _diasrestantes int;
    declare _idpublicidad int;
    
    select idPublicidad, diasrestantes into _idpublicidad ,_diasrestantes from publicidad;
    
    if(_diasrestantes = 0) then
		delete from publicidad where idpublicidad = _idpublicidad;
	end if;
    
end $$

drop procedure if exists Obtener_Publicidad;
delimiter $$
create procedure Obtener_Publicidad()
	
begin 
	select * from publicidad;
end $$

drop procedure if exists Obtener_Publicidad_Aleatoria;
delimiter $$
create procedure Obtener_Publicidad_Aleatoria()
	
begin 
	select * from publicidad order by rand();
end $$


