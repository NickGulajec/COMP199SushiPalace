/***********************************
 Sushi Palace SQL Table Data Dump

 Developed by Mayumi Connor, Ian Fulton, and Nicholas Gulajec
 For Deid Reimer and C199, April-June 2013 Q3 Camosun College
 Database: sushiC199
 **********************************/

/*** Create Table Commands ***/

CREATE TABLE ORDER_PRODUCT_TBL 
  (order_id int(10) not null,
   product_id int(10) not null,
   quantity int(10),
   payment_type bit(1)
); /*** Removed primary key constraint "CONSTRAINT order_id_pk PRIMARY KEY (order_id)" because the PK is actually a 2-field key and couldn't insert into table properly ***/



CREATE TABLE CUSTOMER_TBL 
  (customer_id int(10) not null AUTO_INCREMENT,
   first_name varchar(25),
   last_name varchar(25),
   customer_address varchar(50),
   customer_phone_no varchar(25),
   customer_email varchar(100),
   customer_password varchar(25),
   CONSTRAINT customer_id_pk PRIMARY KEY (customer_id)
);

CREATE TABLE PRODUCT_TBL
  (product_id int(10) not null AUTO_INCREMENT,
   product_name varchar(25),
   price decimal(6,2),
   category varchar(25),
   description varchar(100),
   CONSTRAINT product_id_pk PRIMARY KEY (product_id)
);

CREATE TABLE ORDER_TBL
  (order_id int(10) not null AUTO_INCREMENT,
   customer_id int(10) not null,
   order_date timestamp,
   CONSTRAINT order_id_pk PRIMARY KEY (order_id)
);

/*** Alter ORDER_TBL ***/

ALTER TABLE ORDER_TBL
ADD CONSTRAINT  fk_customer_id
FOREIGN KEY(customer_id) REFERENCES CUSTOMER_TBL(customer_id);

/*** Alter ORDER_PRODUCT_TBL ***/

ALTER TABLE ORDER_PRODUCT_TBL
ADD CONSTRAINT  fk_product_id
FOREIGN KEY(product_id) REFERENCES PRODUCT_TBL(product_id);



/*** Menu Table Insert  ***/
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Kappa Maki",2.95,"Sushi Roll","Cucumber roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Oshinko Maki",3.75,"Sushi Roll","Japanese pickles roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Tekka Maki",3.95,"Sushi Roll","Tuna roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Sake Maki",3.95,"Sushi Roll","Salmon roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Negitoro",4.25,"Sushi Roll","Tuna & green onion");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Futo Maki",6.55,"Sushi Roll","Crab, egg, assorted vegetables in roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Sakura Roll",6.55,"Sushi Roll","Spicy mayo, salmon, avocado, tempura bit");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Rob's Roll",6.55,"Sushi Roll","Tempura prawn, yam & sauce in roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "California Roll",4.65,"Sushi Roll","Imitation crab, avocado, and sesame seed");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Avocado Roll",4.25,"Sushi Roll","Avocado, sesame seed");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Yam Roll",5.45,"Sushi Roll","Tempura yam & sauce in roll");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Vegetable Roll",4.95,"Sushi Roll","Lettuce, cucumber, pickle, shitake mushroom, avocado, sesame seed");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Yamakado Roll",5.95,"Sushi Roll","Yam and avocado");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Dynamite Roll",5.95,"Sushi Roll","Tempura prawn, cucumber & sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Canadian Roll",5.95,"Sushi Roll","Smoked salmon, cucumber, onion");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Victoria Roll",6.55,"Sushi Roll","Tuna, salmon, shrimp, and tobiko caviar");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Vancouver Roll",5.95,"Sushi Roll","Imitation crab, shrimp, avocado");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "B.C. Roll",5.95,"Sushi Roll","BBQ skin salmon, scallop, imitation crab, cucumber");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Tokyo Roll",6.95,"Sushi Roll","BBQ eel, cucumber, sesames seed, and tobiko caviar");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Spider Roll",7.95,"Sushi Roll","Tempura soft shell crab, cucumber, lettuce, tobiko caviar, and sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "House Special",6.55,"Sushi Roll","Tuna, salmon, imitation crab, shrimp, cucumber, and tobiko caviar");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Scallop Roll",6.95,"Sushi Roll","Scallop, cucumber, spicy sauce, and tobiko caviar");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Ninja Roll", 6.55,"Sushi Roll","Tempura tuna, avocado, imitation crab, and sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Prawn Tempura", 10.49 ,"Appetizers","Deep fried prawns, and assorted vegetables with our tempura sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Beef Teriyaki", 11.49 ,"Entrees", "Served with steam rice, green salad. Beef is marinated and char broiled");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Katsu Don", 9.99 ,"Donburi","Deep fried pork cutlet, scrambled egg topping with our teriyaki sauce on rice");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Miso Soup", 1.99 ,"Appetizers","Famous Japanese bean paste soup with tofu seaweed and scallions");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Agedashi Tofu", 3.99 ,"Appetizers","Deep fried tofu served with bonito flakes, scallions, and delicious light soy sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Platter A", 29.49,"Party Tray","California Roll - 16pcs, Salmon Roll - 24 pcs, Tuna Roll - 24pcs, Cucumber Roll - 14pcs, B.C.Roll - 6pcs");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Platter B", 33.99,"Party Tray","Nigiri: Tuna, Salmon, Prawn, Cooked egg, Eel, Toro, Tobiko Imitation crab - 2pcs each California Roll - 16pcs, Salmon Roll - 8pcs, Tuna Roll - 8pcs, BC Roll - 6pcs");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Gyoza", 6.45 ,"Appetizers","Deep fried Japanese dumpling with our dipping sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Tempura Don", 8.99 ,"Donburi","Tempura prawns, vegetables on rice with our tempura sauce");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Oyako Don", 9.99 ,"Donburi","Grilled chicken, scrambled egg topping with our teriyaki sauce on rice");
INSERT INTO PRODUCT_TBL ( product_name, price ,category,description) VALUES ( "Chicken Teriyaki", 11.49 ,"Entrees", "Grilled chicken served with steamed rice and green salad");

/*** Customer Table Insert ***/

INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no)
	VALUES ( "Mayumi", "Connor", "111 Main St.", 123 );
INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no)
	VALUES ( "Ian", "Fulton", "456 Second St.", 456 );
INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no)
	VALUES ( "Nick", "Gulajec", "789 Third St.", 789 );

	
/*** Order Table Insert (test only, normally submitted via web, test values only)  ***/

INSERT INTO ORDER_TBL ( customer_id ) VALUES ( 1 );


/*** ORDER_PRODUCT_TBL Insert (test data) ***/

INSERT INTO ORDER_PRODUCT_TBL ( order_id, product_id, quantity ) VALUES ( 1, 1, 2 );
INSERT INTO ORDER_PRODUCT_TBL ( order_id, product_id, quantity ) VALUES ( 1, 2, 1 );
INSERT INTO ORDER_PRODUCT_TBL ( order_id, product_id, quantity ) VALUES ( 1, 3, 3 );

/*** Clean Up Schema ***/

DROP TABLE ORDER_PRODUCT_TBL; 
DROP TABLE ORDER_TBL; 
DROP TABLE CUSTOMER_TBL; 
DROP TABLE PRODUCT_TBL; 




/*** other stuff

select *
from information_schema.table_constraints;

***/



/*** other stuff

change COLUMN NAME

ALTER TABLE CUSTOMER_TBL CHANGE COLUMN customer_adress customer_address varchar(50);

***/

/*** other stuff

create table sales(
id int, name varchar(10), d date, index(name),
  -> 
/*** Alter ORDER_TBL ***/

ALTER TABLE ORDER_TBL
ADD CONSTRAINT  fk_customer_id
FOREIGN KEY(customer_id) REFERENCES CUSTOMER_TBL(customer_id) engine=InnoDB;
