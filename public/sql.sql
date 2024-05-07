CREATE TABLE cities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    lang VARCHAR(30)
    );

INSERT INTO cities (name, lang)  
SELECT distinct(name_uk), 'uk'
FROM `catalog_city`

INSERT INTO cities (name, lang)  
SELECT distinct(name_ru), 'ru'
  FROM `catalog_city`

UPDATE catalog_city
LEFT JOIN cities ON catalog_city.name_uk = cities.name
SET catalog_city.name_uk = cities.id
WHERE cities.lang = 'uk'

UPDATE catalog_city
LEFT JOIN cities ON catalog_city.name_ru = cities.name
SET catalog_city.name_ru = cities.id
WHERE cities.lang = 'ru'




CREATE TABLE areas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    lang VARCHAR(30)
    );

INSERT INTO areas (name, lang)  
SELECT distinct(area_name_uk), 'uk'
FROM `catalog_city`

INSERT INTO areas (name, lang)  
SELECT distinct(area_name_ru), 'ru'
FROM `catalog_city`

UPDATE catalog_city
LEFT JOIN areas ON catalog_city.area_name_uk = areas.name
SET catalog_city.area_name_uk = areas.id
WHERE areas.lang = 'uk'

UPDATE catalog_city
LEFT JOIN areas ON catalog_city.area_name_ru = areas.name
SET catalog_city.area_name_ru = areas.id
WHERE areas.lang = 'ru'


CREATE TABLE regions (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
lang VARCHAR(30)
);

INSERT INTO regions  (name, lang)  
SELECT distinct(region_name_uk), 'uk'
FROM `catalog_city`

INSERT INTO regions  (name, lang)  
SELECT distinct(region_name_ru), 'ru'
FROM `catalog_city`

UPDATE catalog_city
LEFT JOIN regions ON catalog_city.region_name_uk = regions.name
SET catalog_city.region_name_uk = regions.id
WHERE regions.lang = 'uk'

UPDATE catalog_city
LEFT JOIN regions ON catalog_city.region_name_ru = regions.name
SET catalog_city.region_name_ru = regions.id
WHERE regions.lang = 'ru'


ALTER TABLE catalog_city CHANGE name_ru city_ru_id int(3);
ALTER TABLE catalog_city CHANGE name_uk city_uk_id int(3);

ALTER TABLE catalog_city CHANGE region_name_ru region_id_ru  int(3);
ALTER TABLE catalog_city CHANGE region_name_uk region_id_uk  int(3);

ALTER TABLE catalog_city CHANGE area_name_ru area_id_ru  int(3);
ALTER TABLE catalog_city CHANGE area_name_uk area_id_uk  int(3);





