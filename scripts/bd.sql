create table cliente(
  id    int not null auto_increment primary key,
  nome      varchar(100) not null,
  celular   varchar(50),
  email     varchar(100),
  tamanho   char not null default 'P',
  clicep       varchar(9) not null,
  clirua       varchar(100) not null,
  clibairro    varchar(100) not null,
  clicidade    varchar(100) not null,
  cliuf        varchar(2) not null,
  clinumcasa   varchar(20),
  clicomplemento varchar(200),
  clisituacao  varchar(20) not null
)engine=innoDB charset='utf8';

create table categoria(
  catcodigo    int not null auto_increment primary key,
  cardescricao varchar(250) not null
)engine=innoDB charset='utf8';

create table produto(
  procodigo     int not null auto_increment primary key,
  prodescricao  varchar(200) not null,
  prosku        varchar(40) not null,
  protamanho    char not null,
  proqtd        int not null,
  provalorcompra double(8,2) not null,
  provalorvenda  double(8,2) not null,
  proobs        varchar(250),
  procatcodigo  int not null,
  proimgcodigo  blob,

  foreign key(procatcodigo) references categoria(catcodigo)
)engine=innoDB charset='utf8';

create table despesa(
  id     int not null auto_increment primary key,
  desdescricao  varchar(250) not null,
  desdata       date not null,
  desvalor      double(8,2) not null,
  desobs        varchar(250)
)engine=innoDB charset='utf8';

create table tipousuario(
  id int not null auto_increment primary key,
  descricao varchar(20) not null
)engine=innoDB charset='utf8';

create table funcionario(
  id    int not null auto_increment primary key,
  funnome      varchar(100) not null,
  funlogin     varchar(20) not null,
  funsenha     varchar(20) not null,
  funtpuid     int not null,

  foreign key(funtpuid) references tipousuario(id)
)engine=innoDB charset='utf8';

insert into tipousuario values(0,'administrador');
insert into tipousuario values(0,'funcionario');
insert into tipousuario values(0,'cliente');

create table venda(
  id    int not null auto_increment primary key,
  venclicodigo int not null,
  venfuncodigo int not null,
  venvalortotal double(8,2) not null,
  venvalorpago  double(8,2),
  venqtdparcela int default 1,
  vendata      date,
  venstatus    int default 1,

  foreign key(venclicodigo) references cliente(id),
  foreign key(venfuncodigo) references funcionario(id)
)engine=innoDB charset='utf8';


create table itemvenda(
  itvvencodigo    int not null,
  itvprocodigo    int not null,
  itvqtd          int not null,

  primary key(itvvencodigo, itvprocodigo),
  foreign key(itvvencodigo) references venda(vencodigo),
  foreign key(itvprocodigo) references produto(procodigo)
)engine=innoDB charset='utf8';


insert into categoria values (0,'Top');
insert into produto values(0,' Top preto','KJU-IHIIHS','P',2,16.00,32.00,'',1,null);
