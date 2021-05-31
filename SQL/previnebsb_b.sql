create database PrevineBsB_B;
use PrevineBsB_B;

create table Usuarios (
id_usuarios int auto_increment not null,
cpf char(12) not null,
nome varchar(40) not null,
DataNascimento date not null,
email varchar(30) not null,
telefone char(10) default null,
celular char(11) not null,
cep char(8) not null,
estado char(2) not null,
cidade varchar(20) not null,
bairro varchar(20) not null,
logradouro varchar(20) not null,
complemento varchar(30) default null,
senha varchar(20) not null,
unique key(cpf),
primary key(id_usuarios)
);

create table StatusColaborador(
idCol int not null,
StatusColaborador varchar(20) not null,
primary key(idCol)
);

create table Colaborador(
usuarios_id_usuarios int not null,
matricula varchar(20) not null,
funcao varchar(50)  default null,
cargo varchar(20) not null,
areaatuacao varchar(20) not null,
StatusColaborador_idCol int not null,
unique key (matricula),
primary key (usuarios_id_usuarios),
foreign key (usuarios_id_usuarios) references Usuarios(id_usuarios),
foreign key (StatusColaborador_idCol) references StatusColaborador(idCol)
);


create table StatusUsuarioSUS(
idUsu int not null,
StatusUsuario varchar(20) not null,
primary key(idUsu)
);

create table Paciente(
usuarios_id_usuarios int not null,
CartaoSUS char(15) not null,
genero varchar(9) not null,
cor varchar(8) not null,
dependentes varchar (3) not null,
QuantDep int not null,
DiaSemana varchar(7) not null,
periodo varchar(5) not null,
StatusUsuarioSUS_idUsu int not null,
unique key(CartaoSUS),
primary key(usuarios_id_usuarios),
foreign key(usuarios_id_usuarios) references Usuarios(id_usuarios),
foreign key(StatusUsuarioSUS_idUsu) references StatusUsuarioSUS(idUsu)
);