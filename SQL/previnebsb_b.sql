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
registro timestamp not null,
unique key(cpf),
primary key(id_usuarios)
);

create table StatusColaborador(
id_statuscolaborador int not null,
statusColaborador varchar(20) not null,
primary key(id_statuscolaborador)
);

create table Colaborador(
usuarios_id_usuarios int not null,
matricula varchar(20) not null,
funcao varchar(50)  default null,
cargo varchar(20) not null,
areaatuacao varchar(20) not null,
StatusColaborador_id_statuscolaborador int not null,
unique key (matricula),
primary key (usuarios_id_usuarios),
foreign key (usuarios_id_usuarios) references Usuarios(id_usuarios),
foreign key (StatusColaborador_id_statuscolaborador) references StatusColaborador(id_statuscolaborador)
);


create table StatusPaciente(
id_statuspaciente int not null,
statusPaciente varchar(20) not null,
primary key(id_statuspaciente)
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
StatusPaciente_id_statuspaciente int not null,
unique key(CartaoSUS),
primary key(usuarios_id_usuarios),
foreign key(usuarios_id_usuarios) references Usuarios(id_usuarios),
foreign key(StatusPaciente_id_statuspaciente) references StatusPaciente(id_statuspaciente)
);