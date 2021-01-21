/*
IF4101 - Lenguajes para Aplicaciones Comerciales
Lester Barahona Aguirre
Proyecto Programado #1

ÚLTIMA MODIFICACIÓN: 26-04-2020
*/
drop database if exists db_pp;
create database db_pp;
use db_pp;

create table configurations(
id_conf  int auto_increment primary key ,
conf_name varchar(50) not null unique,
conf_value text not null,
category varchar(50) not null
);

create table pages(
id_page int auto_increment primary key,
title varchar(100) not null,
content text not null
);

create table images(
id_image int auto_increment primary key,
id_page int,
url varchar(200) not null,
foreign key(id_page) references pages(id_page)
);

create table slides(
	id_slide int auto_increment primary key,
    text_content text not null,
    url varchar(200) not null
);

-- ------------------------------------------------------------------------------------DEFAULT DATA-------------------------------------
-- ------------------------------------------------------PAGES 
call sp_insert_page('Eventos','<p>En esta secci&oacute;n mostramos con orgullo algunos de los eventos importantes a los cuales hemos asistido para demostrar a nuestros clientes la calidad de nuestros autos.En esta secci&oacute;n mostramos con orgullo algunos de los eventos importantes a los cuales hemos asistido para demostrar a nuestros clientes la calidad de nuestros autos.En esta secci&oacute;n mostramos con orgullo algunos de los eventos importantes a los cuales hemos asistido para demostrar a nuestros clientes la calidad de nuestros autos.</p>
 <p>En esta secci&oacute;n mostramos con orgullo algunos de los eventos importantes a los cuales hemos asistido para demostrar a nuestros clientes la calidad de nuestros autos.</p>
 <p>&nbsp;</p>');
call sp_insert_page('Autos','<p>En esta seccion se muestran la gran variedad de automoviles que tenemos a disposici&oacute;n de nuestros clientes, todos los tipos de modelos y a el mejor precio del mercado.En esta seccion se muestran la gran variedad de automoviles que tenemos a disposici&oacute;n de nuestros clientes, todos los tipos de modelos y a el mejor precio del mercado.En esta seccion se muestran la gran variedad de automoviles que tenemos a disposici&oacute;n de nuestros clientes, todos los tipos de modelos y a el mejor precio del mercado.</p>
 <p>En esta seccion se muestran la gran variedad de automoviles que tenemos a disposici&oacute;n de nuestros clientes, todos los tipos de modelos y a el mejor precio del mercado.</p>');
-- ---------------------------------------------------------------PAGES IMAGES
call sp_insert_image(1,'assets/uploads/gallery/1_squad-car-1209719_1920.jpg');
call sp_insert_image(1,'assets/uploads/gallery/1_car-604019_1920.jpg');
call sp_insert_image(1,'assets/uploads/gallery/1_auto-788747_1920.jpg');
call sp_insert_image(1,'assets/uploads/gallery/1_classic-car-362176_1920.jpg');
call sp_insert_image(1,'assets/uploads/gallery/1_dog-1149964_1920.jpg');
call sp_insert_image(1,'assets/uploads/gallery/1_bmw-768688_1920.jpg');


call sp_insert_image(2,'assets/uploads/gallery/2_car-4393990_1920.jpg');
call sp_insert_image(2,'assets/uploads/gallery/2_bmw-768688_1920.jpg');
call sp_insert_image(2,'assets/uploads/gallery/2_car-1376190_1920.jpg');
call sp_insert_image(2,'assets/uploads/gallery/2_amg-1880381_1920.jpg');
call sp_insert_image(2,'assets/uploads/gallery/2_car-racing-4394450_1920.jpg');
call sp_insert_image(2,'assets/uploads/gallery/2_car-race-438467_1920.jpg');
call sp_insert_image(2,'assets/uploads/gallery/2_car-604019_1920.jpg');

-- ---------------------------------------------------------CONFIGURATIONS INFORMATION
call sp_insert_configuration('logo','assets/uploads/logo/logo_logo.png','information');
call sp_insert_configuration('name','Rapí Cars','information');
call sp_insert_configuration('email','letybarahonaaguirre@gmail.com','information');
call sp_insert_configuration('phone','62507315','information');
-- ----------------------------------------------------------CONFIGURATIONS SOCIAL
call sp_insert_configuration('facebook','https://www.facebook.com/','social');
call sp_insert_configuration('twitter','https://twitter.com/login','social');
call sp_insert_configuration('instagram','https://www.instagram.com/?hl=en','social');
call sp_insert_configuration('youtube','https://www.youtube.com/?hl=es&gl=ES','social');
call sp_insert_configuration('pinterest','https://www.pinterest.com/','social');
-- ----------------------------------------------------------CONFIGURATIONS TITLES
call sp_insert_configuration('title1','<h2 style="text-align: center;">Velocidad</h2>
 <p>Con los mejores motores con hata 2000 caballos de fuerza nunca te quedaras atr&aacute;s en ninguno de tus viajes.</p>','title');
call sp_insert_configuration('title2','<h2 style="text-align: center;">Comodidad</h2>
 <p>Finos acabados especialmente fabricados para brindar la mayor comodidad a sus pasajeros.</p>','title');
call sp_insert_configuration('title3','<h2 style="text-align: center;">Mejor Precio</h2>
 <p>Con los mejores precios del mercado <strong>Rap&iacute; Cars </strong>te invita a adquirir un nuevo automovil para tus viajes.</p>','title');
-- ----------------------------------------------------------CONFIGURATIONS BRAND
call sp_insert_configuration('brand','Todo especialmente pensado para satisfacer a los conductores más exigentes.','brand');
-- ----------------------------------------------------------CONFIGURATIONS GALLERY
call sp_insert_configuration('img_gallery_1','assets/uploads/gallery/img_gallery_1_beautiful-1845572_1920.jpg','gallery');
call sp_insert_configuration('img_gallery_2','assets/uploads/gallery/img_gallery_2_dog-1149964_1920.jpg','gallery');
call sp_insert_configuration('img_gallery_3','assets/uploads/gallery/img_gallery_3_auto-3298890_1920.jpg','gallery');
call sp_insert_configuration('img_gallery_4','assets/uploads/gallery/img_gallery_4_car-1149997_1920.jpg','gallery');
-- --------------------------------------------------------------SLIDERS
call sp_insert_slide('<h2>Elegancia y Comodidad.</h2>','assets/uploads/slider/1_buildings-1851246_1920.jpg');
call sp_insert_slide('<h2>Velocidad Sin Limites.</h2>','assets/uploads/slider/2_corvette-4815234_1920.jpg');
call sp_insert_slide('<h2>Confort y Seguridad.</h2>','assets/uploads/slider/3_car-1281698_1920.jpg');
call sp_insert_slide('<h2>Todo Tipo de Terreno</h2>','assets/uploads/slider/4_car-racing-4394450_1920.jpg');






