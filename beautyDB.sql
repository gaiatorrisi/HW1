drop database if exists beautydb;
create DATABASE beautydb;
use beautydb;

create table account(
    nome varchar(255) not null,
    cognome varchar(255) not null,
    username varchar(255) primary key not null UNIQUE,
    email varchar(255) not null UNIQUE,
    password varchar(255) not null
);

create table regali(
    tipologia varchar(255) primary key not null UNIQUE,
    costo varchar(255) not null 
);

create table appuntamenit(
    nome varchar(255) not null primary key,
    richiesta varchar(255) not null,
    tel varchar(255) not null,
    mail varchar(255) not null 
);

create table recensioni(
    utente varchar(255) not null primary key,
    commento varchar(255) not null 
);

create table trattamenti (
    intestazione varchar(255) not null primary key,
    descrizione varchar(255) not null,
    foto varchar(255) not null 
);


insert into trattamenti(intestazione,descrizione,foto) values('manicure','Limatura delle unghie per forma e lunghezza, bagno mani con perfezionamento zona cuticolare ed eliminazione ipercheratosi in eccesso.','16.png');
insert into trattamenti(intestazione,descrizione,foto) values('massaggi','Mani esperte e oli profumati ti avvolgeranno in modo da riequilibrare il delicato e fondamentale rapporto corpo e anima.','19.png');
insert into trattamenti(intestazione,descrizione,foto) values('trucco','Per un’occasione speciale avere un trucco che riesce a essere perfetto rappresenta la scelta migliore sotto ogni aspetto.','17.png');

