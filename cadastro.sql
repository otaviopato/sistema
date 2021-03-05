CREATE TABLE aut_noticias (
id int(11) NOT NULL auto_increment PRIMARY KEY,
titulo varchar(255) NOT NULL default '''''''',
conteudo text NOT NULL,
autor_id int (11) NOT NULL default ''''0'''',
data int (11) NOT NULL default ''''0''''
) ENGINE=MyISAM AUTO_INCREMENT=4