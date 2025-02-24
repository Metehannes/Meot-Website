CREATE DATABASE my1database;
USE my1database;

-- Ürünler tablosunu oluştur
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Üretim aşamaları tablosunu oluştur
CREATE TABLE production_stages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Ürünlerin üretim aşamalarını ve sürelerini saklayan tablo
CREATE TABLE product_production (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    stage_id INT,
    time_required INT, -- Süre dakika cinsinden
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (stage_id) REFERENCES production_stages(id)
);

-- Veri ekle: Ürünler
INSERT INTO products (name) VALUES ('Bar Taburesi');
INSERT INTO products (name) VALUES ('Merdiven Tabure');
INSERT INTO products (name) VALUES ('O Tabure');
INSERT INTO products (name) VALUES ('Mutfak Taburesi');
INSERT INTO products (name) VALUES ('Kızaklı Laptop Tutacağı');
INSERT INTO products (name) VALUES ('X Laptop Tutacağı');
INSERT INTO products (name) VALUES ('Kablo Verici');

-- Veri ekle: Üretim aşamaları
INSERT INTO production_stages (name) VALUES ('CNC Kesimi');
INSERT INTO production_stages (name) VALUES ('Zımpara');
INSERT INTO production_stages (name) VALUES ('Boyama');
INSERT INTO production_stages (name) VALUES ('Birleştirme');

-- Veri ekle: Ürünlerin üretim aşamalarını ve sürelerini
-- Bar Taburesi üretim aşamaları ve süreleri
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (1, 1, 2); -- Bar Taburesi, CNC Kesimi, 2 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (1, 2, 25); -- Bar Taburesi, Zımpara, 25 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (1, 3, 10); -- Bar Taburesi, Boyama, 10 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (1, 4, 3); -- Bar Taburesi, Birleştirme, 3 dakika

INSERT INTO product_production (product_id, stage_id, time_required) VALUES (2, 1, 2); -- Merdiven Taburesi, CNC Kesimi, 2 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (2, 2, 25); -- Merdiven Taburesi, Zımpara, 25 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (2, 3, 10); -- Merdiven Taburesi, Boyama, 10 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (2, 4, 3); -- Merdiven Taburesi, Birleştirme, 3 dakika

INSERT INTO product_production (product_id, stage_id, time_required) VALUES (3, 1, 1); -- O Tabure, CNC Kesimi, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (3, 2, 20); -- O Tabure, Zımpara, 20 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (3, 3, 7); -- O Tabure, Boyama, 7 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (3, 4, 3); -- O Tabure, Birleştirme, 3 dakika

INSERT INTO product_production (product_id, stage_id, time_required) VALUES (4, 1, 1); -- Mutfak Taburesi, CNC Kesimi, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (4, 2, 20); -- Mutfak Taburesi, Zımpara, 20 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (4, 3, 7); -- Mutfak Taburesi, Boyama, 7 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (4, 4, 3); -- Mutfak Taburesi, Birleştirme, 3 dakika

INSERT INTO product_production (product_id, stage_id, time_required) VALUES (5, 1, 1); -- Kızaklı Laptop Tutacağı, CNC Kesimi, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (5, 2, 10); -- Kızaklı Laptop Tutacağı, Zımpara, 10 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (5, 3, 1); -- Kızaklı Laptop Tutacağı, Boyama, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (5, 4, 3); -- Kızaklı Laptop Tutacağı, Birleştirme, 3 dakika

INSERT INTO product_production (product_id, stage_id, time_required) VALUES (6, 1, 1); -- X Laptop Tutacağı, CNC Kesimi, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (6, 2, 10); -- X Laptop Tutacağı, Zımpara, 10 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (6, 3, 1); -- X Laptop Tutacağı, Boyama, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (6, 4, 3); -- X Laptop Tutacağı, Birleştirme, 3 dakika

INSERT INTO product_production (product_id, stage_id, time_required) VALUES (7, 1, 1); -- Kablo Verici, CNC Kesimi, 1 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (7, 2, 6); -- Kablo Verici, Zımpara, 6 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (7, 3, 2); -- Kablo Verici, Boyama, 2 dakika
INSERT INTO product_production (product_id, stage_id, time_required) VALUES (7, 4, 4); -- Kablo Verici, Birleştirme, 4 dakika
-- Diğer ürünlerin üretim aşamalarını ve sürelerini buraya ekle
