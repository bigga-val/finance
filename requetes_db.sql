fonction(id, nom_fonction, active)
agent(id, nom, postnom, id_fonction, active)
user(id, id_agent, email, password, active)
service(id, designation, active);
acte(id, id_service, designation, prix, active);
produit(id, designation, format, prix_unitaire)
paiement_acte(id, id_patient, id_acte, date_paiement, active, id_user)
paiement_produit(id, id_patient, id_ordonnance, id_produit, quantite, prix_total, id_user)
bon_demande_sortie(id, date_creation, commentaire, montant, id_departement, approbation_ag, approbation_mdh, active)
bon_sortie(id, date_creation, commentaire, montant, approbation_ag, approbation_mdh, approbation_comptable, approbation_caisse, id_bon_demande_sortie, active)