CREATE DATABASE CINEMA;

USE CINEMA;

CREATE TABLE ACCOUNT (
	C_ID VARCHAR(20) UNIQUE NOT NULL,
	C_USER VARCHAR(50) UNIQUE NOT NULL,
	C_PASS VARCHAR(100) NOT NULL,
	C_ROLE NVARCHAR(20),
	CONSTRAINT PK_ACCOUNT PRIMARY KEY (C_ID)
);

CREATE TABLE MOVIE (
	MV_ID VARCHAR(10)	NOT NULL,
	MV_NAME NVARCHAR(100),
	MV_TYPE NVARCHAR(50),
	MV_RESTRICT VARCHAR(10),
	MV_DETAIL NVARCHAR(500),
	MV_DURATION TIME,
	MV_START DATE,
	MV_END DATE,
	MV_CAP NVARCHAR(20),
	MV_LINK VARCHAR(50),
	CONSTRAINT PK_MOVIE PRIMARY KEY (MV_ID)
);

CREATE TABLE CUSTOMER (
	CUS_ID VARCHAR(10)	NOT NULL,
	CUS_NAME NVARCHAR(100),
	CUS_PHONE VARCHAR(20),
	CUS_ADDR NVARCHAR(100),
	CUS_GENDER VARCHAR(10),
	CUS_EMAIL VARCHAR(50),
	CUS_USER VARCHAR(50),
	CUS_DOB DATE,
	CUS_TYPE NVARCHAR(30),
	CUS_POINT INT,
	CONSTRAINT PK_CUSTOMER PRIMARY KEY (CUS_ID)
);

CREATE TABLE ROOM (
	R_ID VARCHAR(10)	NOT NULL,
	R_CAPACITY INT,
	R_ORDERED INT,
	R_AVAILABLE INT,
	CONSTRAINT PK_MOVIE PRIMARY KEY (R_ID)
);

CREATE TABLE TICKET (
	TK_ID VARCHAR(10)	NOT NULL,
	MV_ID VARCHAR(10) NOT NULL,
	SL_ID VARCHAR(10) NOT NULL,
	R_ID VARCHAR(10) NOT NULL,
	TK_VALUE DECIMAL(15,2) NOT NULL,
	ST_ID VARCHAR(10) NOT NULL,
	TK_TYPE VARCHAR(20),
	BI_ID VARCHAR(10) NOT NULL,
	CONSTRAINT PK_TICKET PRIMARY KEY (TK_ID)
);

CREATE TABLE BILL (
	BI_ID VARCHAR(10)	NOT NULL,
	DIS_ID VARCHAR(100),
	CUS_ID VARCHAR(10),
	TK_COUNT INT,
	BI_VALUE DECIMAL(15,2),
	CONSTRAINT PK_BILL PRIMARY KEY (BI_ID)
);

CREATE TABLE SLOT (
	SL_ID VARCHAR(10)	NOT NULL,
	R_ID VARCHAR(10),
	MV_ID VARCHAR(10),
	MV_DURATION TIME,
	SL_START DATETIME,
	SL_END DATETIME,
	CONSTRAINT PK_SLOT PRIMARY KEY (SL_ID)
);

CREATE TABLE DISCOUNT (
	DIS_ID VARCHAR(10)	NOT NULL,
	DIS_NAME NVARCHAR(100),
	DIS_START DATE,
	DIS_END DATE,
	DIS_PERCENT FLOAT,
	CONSTRAINT PK_DISCOUNT PRIMARY KEY (DIS_ID)
);

CREATE TABLE SEAT (
	ST_ID VARCHAR(10)	NOT NULL,
	R_ID VARCHAR(10),
	ST_TYPE NVARCHAR(20),
	ST_AVAILABLE INT,
	CONSTRAINT PK_SEAT PRIMARY KEY (ST_ID)
);

CREATE TABLE MONTHLYREVENUE (
	MRE_ID VARCHAR(10)	NOT NULL,
	MRE_MONTH INT NOT NULL,
	MRE_YRE_ID VARCHAR(10) NOT NULL,
	MRE_COUNT INT,
	MRE_VALUE DECIMAL(15,2),
	CONSTRAINT PK_MONTHLYREVENUE PRIMARY KEY (MRE_ID)
);

CREATE TABLE YEARLYREVENUE (
	YRE_ID VARCHAR(10)	NOT NULL,
	YRE_YEAR INT,
	YRE_COUNT INT,
	YRE_VALUE DECIMAL(15,2),
	CONSTRAINT PK_YEARLYREVENUE PRIMARY KEY (YRE_ID)
);

-- TICKET
ALTER TABLE TICKET ADD CONSTRAINT FK_TICKET_MOVIE FOREIGN KEY (MV_ID) REFERENCES MOVIE(MV_ID);
ALTER TABLE TICKET ADD CONSTRAINT FK_TICKET_SLOT FOREIGN KEY (SL_ID) REFERENCES SLOT(SL_ID);
ALTER TABLE TICKET ADD CONSTRAINT FK_TICKET_ROOM FOREIGN KEY (R_ID) REFERENCES ROOM(R_ID);
ALTER TABLE TICKET ADD CONSTRAINT FK_TICKET_BILL FOREIGN KEY (BI_ID) REFERENCES BILL(BI_ID);

-- CUSTOMER
ALTER TABLE CUSTOMER ADD CONSTRAINT FK_CUSTOMER_ACCOUNT_U FOREIGN KEY (CUS_USER) REFERENCES ACCOUNT(C_USER);
-- ALTER TABLE CUSTOMER ADD CONSTRAINT FK_CUSTOMER_ACCOUNT_P FOREIGN KEY (CUS_PASS) REFERENCES ACCOUNT(C_PASS);
 
-- BILL
ALTER TABLE BILL ADD CONSTRAINT FK_BILL_DISCOUNT FOREIGN KEY (DIS_ID) REFERENCES DISCOUNT(DIS_ID);
ALTER TABLE BILL ADD CONSTRAINT FK_BILL_CUSTOMER FOREIGN KEY (CUS_ID) REFERENCES CUSTOMER(CUS_ID);

-- SLOT
ALTER TABLE SLOT ADD CONSTRAINT FK_SLOT_ROOM FOREIGN KEY (R_ID) REFERENCES ROOM(R_ID);
ALTER TABLE SLOT ADD CONSTRAINT FK_SLOT_MOVIE_ID FOREIGN KEY (MV_ID) REFERENCES MOVIE(MV_ID);
-- ALTER TABLE SLOT ADD CONSTRAINT FK_SLOT_MOVIE_DU FOREIGN KEY (MV_DURATION) REFERENCES MOVIE(MV_DURATION);

-- SEAT
ALTER TABLE SEAT ADD CONSTRAINT FK_SEAT_ROOM FOREIGN KEY (R_ID) REFERENCES ROOM(R_ID);

-- REVENUE
-- ALTER TABLE YEARLYREVENUE ADD CONSTRAINT FK_YEAR_MONTH FOREIGN KEY (YRE_YEAR) REFERENCES MONTHLYREVENUE(MRE_YEAR);
ALTER TABLE MONTHLYREVENUE ADD CONSTRAINT FK_MONTH_YEAR FOREIGN KEY (MRE_YRE_ID) REFERENCES YEARLYREVENUE(YRE_ID);
