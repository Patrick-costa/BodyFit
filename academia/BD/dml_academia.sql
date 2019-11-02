/*Insert dos planos*/
insert into tb_plano(plano,preco) values("unico",45.00),("familia",130.00),("fisio",80.00),("super", 100.00);
 
 /*insert das atividades */
insert into tb_atividades(nome_atividade) values("Zumba");
insert into tb_atividades(nome_atividade) values("Dança");
INSERT INTO TB_ATIVIDADES(nome_atividade) VALUES('Musculação');
INSERT INTO TB_ATIVIDADES(nome_atividade) VALUES('CrossFit');
INSERT INTO TB_ATIVIDADES(nome_atividade) VALUES('Ginastica');
INSERT INTO TB_ATIVIDADES(nome_atividade) VALUES('Hidroginastica');

 /*insert dos horarios */
 insert into tb_horarios(horario) values("08:00"),("08:30"),("09:00"),("09:30"),("10:00"),("10:30"),("11:00"),("11:30"),("12:00"),
 ("13:00"),("14:00"),("14:30"),("15:00"),("17:00")
 ,("20:00");
                    
-- Tentanto outro método
CREATE VIEW grade_horario as SELECT h.horario, a.nome_atividade FROM tb_horarios as h INNER JOIN tb_atividades_horarios as grade ON h.id_horario = grade.horario_id
INNER JOIN tb_atividades as a ON grade.atividade_id = a.id_atividade;

-- Insert aulas iniciais
select * from tb_grade_dias;
select horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado from tb_grade_dias;
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('08:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('09:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('10:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('11:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('12:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('13:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('14:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('15:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('16:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('17:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('18:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('19:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
insert into tb_grade_dias(horario, segunda_feira, terca_feira, quarta_feira, quinta_feira, sexta_feira, sabado) values('20:00','Crossfit','Musculação','Velofit','Zumba','Dança','Hidroginastica');
