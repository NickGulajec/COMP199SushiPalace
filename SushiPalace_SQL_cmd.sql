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
   payment_type bit(1),
   CONSTRAINT order_id_pk PRIMARY KEY (order_id)
);

CREATE TABLE CUSTOMER_TBL 
  (customer_id int(10) not null AUTO_INCREMENT,
   first_name varchar(25),
   last_name varchar(25),
   customer_address varchar(50),
   customer_phone_no varchar(25),
   CONSTRAINT customer_id_pk PRIMARY KEY (customer_id)
);

CREATE TABLE PRODUCT_TBL
  (product_id int(10) not null AUTO_INCREMENT,
   product_name varchar(25),
   price decimal(6,2),
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

INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Dynamite Roll", 5.49 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "California Roll", 4.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES (  "Sakura Roll", 5.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES (  "Spider Roll", 5.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES (  "Dragon Roll", 6.49 );

INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Yamacado Roll", 4.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Imperial Roll", 5.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Tokyo Roll", 6.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "B.C. Roll", 6.49 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "House Special", 7.49 );

INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Tempura", 10.49 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Beef Teriyaki", 11.49 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Katsu Don", 9.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Miso Soup", 1.99 );
INSERT INTO PRODUCT_TBL ( product_name, price ) VALUES ( "Inari", 1.49 );


/*** Customer Table Insert ***/

INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no)
	VALUES ( "Mayumi", "Connor", "111 Main St.", 123 );
INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no)
	VALUES ( "Ian", "Fulton", "456 Second St.", 456 );
INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no)
	VALUES ( "Nick", "Gulajec", "789 Third St.", 789 );

	
/*** Order Table Insert (test only, normally submitted via web, test values only)  ***/

INSERT INTO ORDER_TBL ( customer_id ) VALUES ( 1 );



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
