use laboratorio;

######## CREACION DE LA TABLA TEMPORTAL 
create table temporal_lab1 (
codhora varchar(4),
codexp varchar(4),
codlab varchar(4)
);
#### INSERTANDO TODAS LAS POSIBILIDADES 
insert into temporal_lab1 (codhora , codlab, codexp)
select horas.codhor , laboratorio.codlab ,experimento.codexp
from horas 
cross join laboratorio
cross join experimento ;
select * from temporal_lab1;


######## SCRIPT DE COMPARACION.
select horas.descripcion as 'Hora',
experimento.descripcion as 'Experimento' ,
laboratorio.descripcion as 'Laboratorio'
from temporal_lab1
 inner join horas on horas.codhor = temporal_lab1.codhora
 inner join experimento on experimento.codexp = temporal_lab1.codexp
 inner join laboratorio on laboratorio.codlab = temporal_lab1.codlab
where ((temporal_lab1.codhora, temporal_lab1.codlab, temporal_lab1.codexp) 
NOT IN(SELECT reserva.codhora, reserva.codlab , 
reserva.codexp FROM reserva where (codlab='lab1')
and (fecha = '2017-10-18')))
and (temporal_lab1.codlab='lab1');

select * from horas;

ALTER TABLE temporal_lab1 
ADD CONSTRAINT fk_hora
FOREIGN KEY (codhora) REFERENCES horas(codhor);

ALTER TABLE temporal_lab1 
ADD CONSTRAINT fk_exp
FOREIGN KEY (codexp) REFERENCES experimento(codexp);

ALTER TABLE temporal_lab1 
ADD CONSTRAINT fk_lab
FOREIGN KEY (codlab) REFERENCES laboratorio(codlab);

select * from horas;



select * from users;