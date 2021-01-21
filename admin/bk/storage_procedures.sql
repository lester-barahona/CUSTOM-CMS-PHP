-- --------------------------------------------------------------------------------------CONFIGURATIONS

create procedure `sp_get_configuration_by_name`(`p_conf_name` varchar(50))
	select * from configurations where conf_name=p_conf_name;
    
create procedure `sp_insert_configuration`(`p_conf_name` varchar(50),`p_conf_value` text,`p_category` varchar(50))
	insert into configurations(conf_name,conf_value,category) values(p_conf_name,p_conf_value,p_category);   

create procedure `sp_update_configuration_by_conf_name`(`p_conf_name` varchar(50),`p_conf_value` text)
	update configurations set conf_value=p_conf_value where conf_name=p_conf_name;    
    
create procedure `sp_get_configurations_by_category`(`p_category` varchar(50))
		select * from configurations where category=p_category;
   
-- --------------------------------------------------------------------------------------PAGES

create procedure `sp_insert_page`(`p_title` varchar(100),`p_content` text)
	insert into pages(title,content) values(p_title,p_content);
 
create procedure `sp_get_page`(`p_id_page` int) 
	select * from pages where id_page=p_id_page;

create procedure `sp_get_pages`(`p_title` varchar(100)) 
	select * from pages where title like concat('%',p_title,'%');
    
create procedure `sp_update_page`(`p_id_page` int,`p_title` varchar(100),`p_content` text)
	update pages set title=p_title,content=p_content where id_page=p_id_page;
    
create procedure `sp_delete_page`(`p_id_page` int)
	delete from pages where id_page=p_id_page;
    
-- -------------------------------------------------------------------------------------IMAGES
create procedure `sp_insert_image`(`p_id_page` int,`p_url` varchar(80))
	insert into images(id_page,url) values(p_id_page,p_url);

create procedure `sp_delete_image`(`p_id_image` int) 
		delete from images where id_image=p_id_image;
        
create procedure `sp_delete_images_by_page` (`p_id_page` int)  
		delete from images where id_page=p_id_page;
        
create procedure `sp_get_image`(`p_id_image` int)
		select * from images where id_image=p_id_image;
        
create procedure `sp_get_images_by_page`(`p_id_page` int)
		select * from images where id_page=p_id_page;   
        
  -- -------------------------------------------------------------------------------------SLIDES
create procedure `sp_insert_slide`(`p_text_content` text,`p_url` varchar(200))
	insert into slides(text_content,url) values(p_text_content,p_url);

create procedure `sp_delete_slide`(`p_id_slide` int) 
		delete from slides where id_slide=p_id_slide;
             
create procedure `sp_get_slide`(`p_id_slide` int)
		select * from slides where id_slide=p_id_slide; 
        
create procedure `sp_get_slides`()
		select * from slides;
        
create procedure `sp_update_slide`(`p_id_slide` int,`p_text_content` text,`p_url` varchar(200))
		update slides set text_content=p_text_content,url=p_url where id_slide=p_id_slide;  
        
create procedure `sp_get_last_id_slide`() 
	select MAX(id_slide) as id_slide from slides;       
  