CREATE TABLE USERS(
	id VARCHAR(11) NOT NULL,
	pass VARCHAR(128) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO USERS VALUES ('admin', '$2y$10$OkUkoyPxBC8jJjYrStk0sOceTxtKbELJHTULeQ4v0Kyxbm1D9Ruoy');

CREATE TABLE SQUADS(
	Username VARCHAR(11) NOT NULL,
	TeamName VARCHAR(20) NOT NULL,
	Formation VARCHAR(20) NOT NULL,
	Out0 INT,
	Out1 INT,
	Out2 INT, 
	Out3 INT,
	Out4 INT,
	Out5 INT,
	Out6 INT,
	Out7 INT,
	Out8 INT,
	Out9 INT,
	GK INT,
	PRIMARY KEY (Username),
	FOREIGN KEY (Username) REFERENCES USERS(id)
);

CREATE TABLE ARSENAL_OUT(
	FNAME VARCHAR (20),
	LNAME VARCHAR(20) NOT NULL,
	KITNUM INT NOT NULL,
	POS VARCHAR(2) NOT NULL,
	NATIONALITY VARCHAR(3) NOT NULL,
	OVERALL INT NOT NULL,
	PACE INT,
	SHOOTING INT,
	PASSING INT,
	DRIBBLING INT,
	DEFENDING INT,
	PHYSICAL INT,
	PRIMARY KEY (KITNUM)
);

CREATE TABLE JUVENTUS_OUT(
	FNAME VARCHAR (20),
	LNAME VARCHAR(20) NOT NULL,
    KITNUM INT NOT NULL,
	POS VARCHAR(2) NOT NULL,
	NATIONALITY VARCHAR(3) NOT NULL,
	OVERALL INT NOT NULL,
	PACE INT,
	SHOOTING INT,
	PASSING INT,
	DRIBBLING INT,
	DEFENDING INT,
	PHYSICAL INT,
	PRIMARY KEY (KITNUM)
);

CREATE TABLE ARSENAL_GK(
	FNAME VARCHAR (20),
	LNAME VARCHAR(20) NOT NULL,
	KITNUM INT NOT NULL,
	POS VARCHAR(2) NOT NULL,
	NATIONALITY VARCHAR(3) NOT NULL,
	OVERALL INT NOT NULL,
	DIVING INT,
	HANDLING INT,
	KICKING INT,
	REFLEXES INT,
	SPEED INT,
	POSITIONING INT,
	PRIMARY KEY (KITNUM)
);
CREATE TABLE JUVENTUS_GK(
	FNAME VARCHAR (20),
	LNAME VARCHAR(20) NOT NULL,
	KITNUM INT NOT NULL,
	POS VARCHAR(2) NOT NULL,
	NATIONALITY VARCHAR(3) NOT NULL,
	OVERALL INT NOT NULL,
	DIVING INT,
	HANDLING INT,
	KICKING INT,
	REFLEXES INT,
	SPEED INT,
	POSITIONING INT,
	PRIMARY KEY (KITNUM)
);


INSERT INTO ARSENAL_OUT VALUES ('Mathieu', 'Debuchy', 2, 'DF', 'FRA', 80, 74, 65, 73, 73, 79, 77);
INSERT INTO ARSENAL_OUT VALUES ('Kieran', 'Gibbs', 3, 'DF', 'ENG', 80, 81, 57, 72, 77, 80, 72);
INSERT INTO ARSENAL_OUT VALUES ('Per', 'Mertesacker', 4, 'DF', 'GER', 83, 27, 41, 56, 48, 88, 75);
INSERT INTO ARSENAL_OUT VALUES (NULL, 'Gabriel', 5, 'DF', 'BRA', 79, 70, 54, 65, 64, 80, 76);
INSERT INTO ARSENAL_OUT VALUES ('Laurent', 'Koscielny', 6, 'DF', 'FRA', 85, 78, 40, 62, 65, 85, 78);
INSERT INTO ARSENAL_OUT VALUES ('Alexis', 'Sanchez', 7, 'FW', 'CHI', 88, 86, 84, 79, 88, 40, 78);
INSERT INTO ARSENAL_OUT VALUES ('Aaron', 'Ramsey', 8, 'MF', 'WAL', 84, 69, 77, 80, 81, 68, 76);
INSERT INTO ARSENAL_OUT VALUES ('Lucas', 'Perez', 9, 'FW', 'ESP', 81, 76, 83, 76, 80, 31, 72);
INSERT INTO ARSENAL_OUT VALUES ('Mesut', 'Ozil', 11, 'MF', 'GER', 89, 72, 74, 86, 86, 23, 58);
INSERT INTO ARSENAL_OUT VALUES ('Olivier', 'Giroud', 12, 'FW', 'FRA', 83, 64, 82, 69, 72, 38, 83);
INSERT INTO ARSENAL_OUT VALUES ('Theo', 'Walcott', 14, 'FW', 'ENG', 81, 93, 77, 73, 80, 38, 66);
INSERT INTO ARSENAL_OUT VALUES ('Alex', 'Oxlade-Chamberlain', 15, 'MF', 'ENG', 79, 89, 71, 73, 84, 42, 70);
INSERT INTO ARSENAL_OUT VALUES ('Rob', 'Holding', 16, 'DF', 'ENG', 67, 65, 34, 52, 61, 65, 72);
INSERT INTO ARSENAL_OUT VALUES ('Alex', 'Iwobi', 17, 'FW', 'NGA', 74, 77, 61, 66, 82, 28, 66);
INSERT INTO ARSENAL_OUT VALUES ('Nacho', 'Monreal', 18, 'DF', 'ESP', 81, 77, 53, 72, 75, 81, 73);
INSERT INTO ARSENAL_OUT VALUES ('Santi', 'Carzola', 19, 'MF', 'ESP', 86, 71, 78, 85, 86, 57, 64);
INSERT INTO ARSENAL_OUT VALUES ('Shkodran', 'Mustafi', 20, 'DF', 'GER', 83, 70, 57, 63, 60, 83, 79);
INSERT INTO ARSENAL_OUT VALUES ('Yaya', 'Sanogo', 22, 'FW', 'FRA', 69, 69, 65, 52, 60, 28, 69);
INSERT INTO ARSENAL_OUT VALUES ('Danny', 'Welbeck', 23, 'FW', 'ENG', 80, 86, 75, 71, 80, 34, 79);
INSERT INTO ARSENAL_OUT VALUES ('Hector', 'Bellerin', 24, 'DF', 'ESP', 80, 95, 51, 69, 78, 75, 69);
INSERT INTO ARSENAL_OUT VALUES ('Carl', 'Jenkinson', 25, 'DF', 'ENG', 73, 74, 50, 66, 68, 72, 74);
INSERT INTO ARSENAL_OUT VALUES ('Granit', 'Xhaka', 29, 'MF', 'SUI', 84, 51, 66, 81, 72, 72, 77);
INSERT INTO ARSENAL_OUT VALUES ('Jeff', 'Reine-Adelaide', 31, 'MF', 'FRA', 63, 78, 48, 57 ,66, 44, 54);
INSERT INTO ARSENAL_OUT VALUES ('Francis', 'Coquelin', 34, 'MF', 'FRA', 81, 70, 54, 70, 76, 79, 81);
INSERT INTO ARSENAL_OUT VALUES ('Mohamed', 'Elneny', 35, 'MF', 'EGY', 77, 63, 67, 73, 70, 73, 78);

INSERT INTO ARSENAL_GK VALUES ('David', 'Ospina', 13, 'GK', 'COL', 79, 83, 71, 78, 84, 34, 77);
INSERT INTO ARSENAL_GK VALUES ('Petr', 'Cech', 33, 'GK', 'CZE', 88, 83, 90, 77, 85, 45, 85);

INSERT INTO JUVENTUS_OUT VALUES ('Giorgio', 'Chiellini', 3, 'DF', 'ITA', 88, 74, 46, 53, 58, 90, 85);
INSERT INTO JUVENTUS_OUT VALUES ('Medhi', 'Benatia', 4, 'DF', 'MAR', 83, 67, 44, 54, 61, 83, 81);
INSERT INTO JUVENTUS_OUT VALUES ('Miralem', 'Pjanic', 5, 'MF', 'BIH', 85, 74, 75, 86, 84, 64, 68);
INSERT INTO JUVENTUS_OUT VALUES ('Sami', 'Khedira', 6, 'MF', 'GER', 83, 66, 76, 78, 76, 81, 85);
INSERT INTO JUVENTUS_OUT VALUES ('Juan', 'Cuadrado', 7, 'MF', 'COL', 83, 92, 76, 75, 88, 55, 68);
INSERT INTO JUVENTUS_OUT VALUES ('Claudio', 'Marchisio', 8, 'MF', 'ITA', 86, 77, 74, 83, 83, 76, 75);
INSERT INTO JUVENTUS_OUT VALUES ('Gonzalo', 'Higuain', 9, 'FW', 'ARG', 89, 80, 88, 69, 83, 24, 75);
INSERT INTO JUVENTUS_OUT VALUES ('Alex', 'Sandro', 12, 'DF', 'BRA', 84, 87, 64, 75, 81, 79, 76);
INSERT INTO JUVENTUS_OUT VALUES ('Federico', 'Mattiello', 14, 'MF', 'ITA', 72, 79, 59, 67, 71, 70, 70);
INSERT INTO JUVENTUS_OUT VALUES ('Andrea', 'Barzagli', 15, 'DF', 'ITA', 86, 74, 37, 56, 63, 89, 79);
INSERT INTO JUVENTUS_OUT VALUES ('Mario', 'Mandzukic', 17, 'FW', 'CRO', 83, 70, 78, 60, 73, 42, 85);
INSERT INTO JUVENTUS_OUT VALUES ('Mario', 'Lemina', 18, 'MF', 'GAB', 77, 79, 66, 76, 79, 64, 78);
INSERT INTO JUVENTUS_OUT VALUES ('Leonardo', 'Bonucci', 19, 'DF', 'ITA', 77, 79, 66, 76, 79, 64, 78);
INSERT INTO JUVENTUS_OUT VALUES ('Marko', 'Pjaca', 20, 'FW', 'CRO', 76, 85, 67, 74, 84, 28, 70);
INSERT INTO JUVENTUS_OUT VALUES ('Paulo', 'Dybala', 21, 'FW', 'ARG', 86, 88, 86, 77, 90, 24, 66);
INSERT INTO JUVENTUS_OUT VALUES ('Kwadwo', 'Asamoah', 22, 'MF', 'GHA', 80, 80, 73, 77, 82, 71, 76);
INSERT INTO JUVENTUS_OUT VALUES ('Dani', 'Alves', 23, 'DF', 'BRA', 85, 87, 70, 76, 82, 78, 69);
INSERT INTO JUVENTUS_OUT VALUES ('Daniele', 'Rugani', 24, 'DF', 'ITA', 80, 64, 39, 51, 62, 84, 75);
INSERT INTO JUVENTUS_OUT VALUES ('Stephan', 'Lichtsteiner', 26, 'DF', 'SUI', 83, 81, 59, 73, 76, 79, 80);
INSERT INTO JUVENTUS_OUT VALUES ('Stefano', 'Sturaro', 27, 'MF', 'ITA', 77, 75, 68, 73, 76, 74, 79);
INSERT INTO JUVENTUS_OUT VALUES ('Tomas', 'Rincon', 28, 'MF', 'VEN', 76, 72, 64, 73, 73, 74, 78);
INSERT INTO JUVENTUS_OUT VALUES ('Paolo', 'De Ceglie', 29, 'DF', 'ITA', 72, 74, 51, 66, 69, 69, 65);
INSERT INTO JUVENTUS_OUT VALUES ('Rolando', 'Mandragora', 38, 'MF', 'ITA', 69, 60, 50, 68, 70, 64, 74);

INSERT INTO JUVENTUS_GK VALUES ('Gianluigi', 'Buffon', 1, 'GK', 'ITA', 88, 87, 88, 68, 84, 49, 90);
INSERT INTO JUVENTUS_GK VALUES (NULL, 'Neto', 25, 'GK', 'BRA', 80, 84, 80, 74, 83, 53, 74);
INSERT INTO JUVENTUS_GK VALUES ('Emil', 'Audero', 32, 'GK', 'ITA', 67, 72, 64, 60, 76, 55, 60);