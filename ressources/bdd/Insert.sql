
/* Insertion d'utilisateurs */
INSERT INTO Utilisateur (Niveau_U, Mail_U, Mdp_U, Pseudo_U, Photo_U ,Tmp)
  VALUES(0, "visiteur@visiteur.com", "$2y$10$mzuH7WTRawREWsYzexbkWeXQsP864ObU0p87JgDUvv7wzQSOmHzR.", "Visiteur", "img.png", 0);
INSERT INTO Utilisateur (Niveau_U, Mail_U, Mdp_U, Pseudo_U, Photo_U ,Tmp)
  VALUES(1, "Utilisateur@utilisateur.com", "$2y$10$Ryj1/qGlYJY9XBQe4WbUq.4O14MBSSemyIPh5eB6cIDRCsQos1YxO", "Utilisateur", "img.png", 0);
INSERT INTO Utilisateur (Niveau_U, Mail_U, Mdp_U, Pseudo_U, Photo_U ,Tmp)
  VALUES(2, "Administrateur@administrateur.com", "$2y$10$7GujrhaRNwdJn7RuZ5O0rO1oG7UiuAvPEKFHNQR/4a/RoPofQ/p1G", "Administrateur", "img.png", 0);


/* Insertion de Photo OK*/
INSERT INTO Photo (Titre_P, Chemin_P, Compteur_P, Date_P, DateU_P, Id_User, Id_Album)
  VALUES("Photo1", "/ressources/images/photo1.jpg", 0, "2018-05-02", "2018-05-03", 1, 1);

/* Insertion d'album OK*/
INSERT INTO Album (Nom_A, Description_A, DateCreation_A, Priver_A, Visuel_A, Id_E, Id_U)
  VALUES("Vacance 2018", "Album des vacances de 2018", "2018-05-02",0, "ressources/images/visuel/visuel1.png", 1, 1);

/* Insertion Evenement OK */
INSERT INTO Evenement (Titre_E, Description_E, DateCreation_E, DateHeureFin_E, Archiver_E, Id_U, Id_Em)
  VALUES ("Vancance 2018", "Ete au camping", "2018-01-03", "2018-05-02 22:00:00", 0, 1, 1);

/* Insertion Message OK*/
INSERT INTO Message (Contenu_M, Id_E, Id_U)
  VALUES ("Bonjour, dans quel camping allons-nous ?", 1, 1);

/* Insertion Emoticon OK */
INSERT INTO Emoticon (Titre_Em, Chemin_E)
  VALUES ("Sourire", "ressources/images/emoticon/sourire.png");

/* Insertion Cagnotte OK*/
INSERT INTO Cagnotte (Titre_C, Description_C, DateHeureFin_C, ArgentR_C, Id_E)
  VALUES ("Cagnotte vacance", "Mettez une petite piece pour les vacances !", "2018-05-03 23:00:00", 0, 1);

/* Insertion Acces OK*/
INSERT INTO Acces (Id_E, Id_U)
  VALUES (1, 1);
