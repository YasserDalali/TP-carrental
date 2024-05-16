CREATE TABLE Voiture (
    Matricule VARCHAR(24) primary key not null,
    Marque VARCHAR(25),
    Prix DECIMAL(10, 2)
);
CREATE TABLE Adherent (
    NumAd INT primary key not null AUTO_INCREMENT,
    Nom VARCHAR(25),
    Prenom VARCHAR(25)
);  

CREATE TABLE ReservationVoiture (
    CodeRes INT primary key not null AUTO_INCREMENT,
    Matricule VARCHAR(24),
    NumAd INT,
    DateDebut DATE DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (Matricule) REFERENCES Voiture(Matricule),
    FOREIGN KEY (NumAd) REFERENCES Adherent(NumAd)
);

CREATE TABLE Location (
    CodeLoc INT NOT NULL AUTO_INCREMENT,
    Matricule INT NOT NULL,
    NumAd INT NOT NULL,
    DateDebut DATE NOT NULL,
    PRIMARY KEY (CodeLoc)
);



-- Voiture table data:
INSERT INTO Voiture (Matricule, Marque, Prix) VALUES
('ABC123', 'Toyota', 20000.00),
('DEF456', 'Honda', 25000.00),
('GHI789', 'Ford', 18000.00);

-- Adherent table data:
INSERT INTO Adherent (Nom, Prenom) VALUES
('Smith', 'John'),
('Doe', 'Jane'),
('Johnson', 'Alice');


SELECT * FROM Voiture;
SELECT * FROM adherent;
SELECT * FROM reservationvoiture;
