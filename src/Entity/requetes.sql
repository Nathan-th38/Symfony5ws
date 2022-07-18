USE mi5;

# INSERT INTO USER(id, email, roles, password, nom, prenom)
# VALUES (1, "christian.bale@gmail.com", '{"member": "admin"}', "MotDePasseChristian", "Christian", "Bale"),
#        (2, "matthew.mcconaughey@gmail.com", '{"member": "user"}', "MotDePasseMattew", "Matthew", "Mcconaughey"),
#        (3, "leonardo.dicaprio@outlook.fr", '{"member": "user"}', "MotDePasseLeonardo", "Leonardo", "Dicaprio");


# INSERT INTO COMMANDE(id, date_commande, statut, user_id)
# VALUES (1, '2022-06-3', "terminée", 1),
#        (2, '2022-07-1', "terminée", 2),
#        (3, '2022-07-11', "terminée", 2),
#        (4, '2022-07-12', "en cours de livraison", 3),
#        (5, '2022-07-13', "en attente", 1);

INSERT INTO ligne_commande(id_commande_id, quantite, prix, produit_id, id)
VALUES (1, 3, 9, 1, 1),
       (2, 4, 12, 3, 2),
       (3, 1, 3, 6, 3),
       (4, 1, 2, 8, 4),
       (5, 2, 6, 9, 5);
