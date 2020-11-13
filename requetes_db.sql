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


INSERT INTO `single_examen_labo` (`id`, `designation`, `unite_si`, `unite_traditionnelle`, `prix_unitaire`, `active`, `examen_labo_id`) VALUES
(NULL, 'Albumine (Sérum)', '35-50g/L', '3,5-5,0 g/dL', '7000', '1', '1'),
(NULL, 'Antigène prostatique spécifique (PSA,APS)', '0-4µg/L', '0-4,0 ng/mL', '7000', '1', '1'),
(NULL, 'Azote uréique (BUN)(plasma ou sérum)', '2,9-8,2 nmol/L', '8-23 mg/dL', '7000', '1', '1'),
(NULL, 'Bilurubine (sérum) -Nouveau-né(directe)', '0-10µmol/L', '0-0,6mg/dL', '7000', '1', '1'),
(NULL, 'Bilurubine (sérum) -Adulte(directe)', '0-5 µmol/L', '0-0,3 mg/dL', '7000', '1', '1'),
(NULL, 'Calcium (sérum)', '', '', '7900', '1', '1'),
(NULL, 'Cholestérol (sérum)', '˂5,2 nmol/L', '˂200 mg/dL', '7900', '1', '1'),
(NULL, ' Cortisol (plasma)-8h', '170-635 nmol/L', '6-23 µg/dL', '7900', '1', '1'),
(NULL, ' Cortisol (plasma)-16h', '82-413 nmol/L', '3-15 µg/D', '7900', '1', '1'),
(NULL, ' Créatine (sérum)', '50-110 µmol/L', '0,6-1,2 mg/dL ', '7900', '1', '1'),
(NULL, ' Créatine (sérum) femme', '7,0-15,8 nmol/jour', ' 0,8-1,8 g/24h', '7900', '1', '1'),
(NULL, 'CréatineKinase (CK,CPK) - Homme (dépendant de la racec) ', '20-215UI/L', '20-215 U/L', '7900', '1', '1'),
(NULL, 'CréatineKinase (CK,CPK) - Femme (dépendant de la racec) ', '20-160 UI/L', '20-160 U/L', '7900', '1', '1'),
(NULL, 'Densité', '1,003-1,030', ' 1,003-1,030', '7900', '1', '1'),
(NULL, 'Glucose (à jeun)(plasma ou sérum)', '3,9-6,1 nmol/L', '70-110 mg/dL', '7900', '1', '1'),
(NULL, 'Lipoprotéines de Basse densité (LDL)(recommandé)', '˂3,4 nmol/L', '˂ 130 mg/dL', '7900', '1', '1'),
(NULL, 'Lipoprotéines de Haute densité (HDL)(recommandé)', '˃ 0,91 nmol/L ', '˃ 35 mg/dL', '7900', '1', '1'),
(NULL, ' Phosphatase alcaline (sérum)-acide', '40-160 UI/L ', '40-160 U/L ', '7900', '1', '1'),
(NULL, 'Phosphatase - Adulte', ' 1,0-1,5 nmol/L', '3,0-4,5 mg/dL', '7900', '1', '1'),
(NULL, 'Phosphatase - Enfant', ' 1,3-2,3 mmol/L', ' 4,0-7,0 mg/dL ', '7900', '1', '1'),
(NULL, 'Protéines (sérum) - Totales', '60-80 g/L', '6,0-8,0 g/dL', '7900', '1', '1'),
(NULL, 'Protéines (sérum) - Albumine', ' 35-55 g/L', '3,5-5,5 g/dL', '7900', '1', '1'),
(NULL, 'Urée (plasma ou sérum)', '2,9-8,2 nmol/L', '38-23 mg/dL', '7900', '1', '1'),
(NULL, 'Zinc', '2X(48+12)ml=1', '', '7900', '1', '1'),
(NULL, ' Lipase', '2X(48+12)ml=1', '', '7900', '1', '1'),
(NULL, ' ALP', '2X(48+12)ml=1', '', '7900', '1', '1'),
(NULL, ' Phosphore', '2X(48+12)ml=1', '', '7900', '1', '1'),
(NULL, 'CK Nac', '2X(48+12)ml=1', '', '7900', '1', '1'),
(NULL, 'TP', '8X20ml=1', '', '7900', '1', '1'),
(NULL, 'Amylase', '50ml+18ml=1', '', '7900', '1', '1');



INSERT INTO `single_examen_labo` (`id`, `designation`, `unite_si`, `unite_traditionnelle`, `prix_unitaire`, `active`, `examen_labo_id`) VALUES
 (NULL, 'Chlorure (Urine)-Nourrisson', '96-106 nmol/jour', '2-10 mEq/24h', '500', '1', '2'),
 (NULL, 'Chlorure (Urine)-Enfant', '14-50 mmol/Jour', '14-50 mEq/24 h', '500', '1', '2'),
 (NULL, 'Chlorure (Urine)-Adulte', '110-250 mmol/jour', '110-250 mEq/24 h', '500', '1', '2'),
 (NULL, 'Fer (sérum) - Homme', '13-31 µmol/L', '75-175 µg/dL', '500', '1', '2'),
 (NULL, 'Magnesium (sérum)', ' 0,65-1,05 mmol/L', '1,3-2,1 mg/dL ', '500', '1', '2'),
 (NULL, 'Potassium (sérum) -Nouveau-né', '3,7-5;9 mmol/L ', ' 3,7-5,9 mEq/L ', '500', '1', '2'),
 (NULL, 'Potassium (sérum) -Nourrisson', ' 4,1-5,3 mmol/L ', ' 4,1-5,3 mEq/L ', '500', '1', '2'),
 (NULL, 'Potassium (sérum) -Enfant', '3,4-4,7 mmol/L ', '3,4-4,7 mEq/L', '500', '1', '2'),
 (NULL, 'Potassium (sérum) -Adulte', ' 3,5-5,1 mmol/L ', '3,5-5,1 mEq/L', '500', '1', '2'),
 (NULL, 'Sodium (sérum ou plasma)', ' 135-145 mmol/L ', '135-145 mEq/L', '500', '1', '2'),
 (NULL, 'Sodium (urine)***', '40-220 mmol/jour', '40-220 mEq/24 h', '500', '1', '2');


 INSERT INTO `single_examen_labo` (`id`, `designation`, `unite_si`, `unite_traditionnelle`, `prix_unitaire`, `active`, `examen_labo_id`) VALUES
 (NULL, 'Erythrocytes (G.R) - Homme', '4,6-6,2 X 1012/L', '4,6-6,2 million/mm3', '3750', '1', '3'),
 (NULL, 'Erythrocytes (G.R) - Femme', '4,2-5,4 X 1012/L', '4,6-6,2 million/mm3', '3750', '1', '3'),
 (NULL, 'Formule Leucocytaire - Totale', ' 3,5-12,0 X 1012/L', '3500-12,000/mm3 ', '3750', '1', '3'),
  (NULL, 'Différentielle: - Neutrophiles', '3000-5800 X 106/L ', '3000-5800/mm3 ', '3750', '1', '3'),
  (NULL, 'Différentielle: - Lymphocytes ', ' 1500-3000 X 106/L ', '1500-3000/mm3 ', '3750', '1', '3'),
  (NULL, 'Différentielle: - Monocytes ', ' 300-500 X 106/L', ' 300-500/mm3', '3750', '1', '3'),
  (NULL, 'Différentielle: - Eosinophiles  ', ' 50-250 X 106/L ', '50-250/mm3 ', '3750', '1', '3'),
  (NULL, 'Différentielle: - Basophile  ', ' 15-50 X 106/L ', ' 15-50/mm3 ', '3750', '1', '3'),
  (NULL, 'Hématocrite - Nouveau-né', '0,49-0,54', '49-54%', '3750', '1', '3'),
  (NULL, 'Hématocrite - Enfant**', '0,35-0,49', '35-49%', '3750', '1', '3'),
  (NULL, 'Hématocrite - Homme ', '0,40-0,54', ' 40-54% ', '3750', '1', '3'),

  (NULL, 'Hémoglobine (Hb) - Nouveau-né', '165-195 g/L', ' 16,5-19,5 g/dL ', '3750', '1', '3'),
  (NULL, 'Hémoglobine (Hb) - Homme', '140-180 g/L', '14,0-18,0 g/dL', '3750', '1', '3'),
  (NULL, 'Hémoglobine (Hb) - Femme', '1120-160 g/L', '12,0-16,0 g/dL', '3750', '1', '3'),
  (NULL, 'Numération Plaquettaire', '150-400 X 109/L', '15,000-400,000/mm3 ', '6700', '1', '3'),
  (NULL, 'Vitesse de sédimentation (VS)', ' 0-15 mm/h', '0-15 mm/h', '8700', '1', '3'),
  (NULL, 'Volume Globulaire moyen (VGM)', ' 76-100fL', '176-100 µm3', '8700', '1', '3');

INSERT INTO `single_examen_labo` (`id`, `designation`, `unite_si`, `unite_traditionnelle`, `prix_unitaire`, `active`, `examen_labo_id`) VALUES
(NULL, 'Hormone folliculostimulante (FSH)(plasma)-Homme', '1-10 UI/L', ' 1-10 mU/mL', '7000', '1', '4'),
(NULL, 'Hormone folliculostimulante (FSH)(plasma)-Femme, phase lutéale', ' 20-50 UI/L', '20-50 mU/mL', '7000', '1', '4'),
(NULL, 'Hormone folliculostimulante (FSH)(plasma)-Femme, ménopause', '40-250 UI/L', '40-250 mU/mL', '7000', '1', '4'),
(NULL, 'Hormone Lutéinisante (LH) (sérum) - Homme', '1-9 UI/L', '1-9 UI/L', '7000', '1', '4'),
(NULL, 'Hormone Lutéinisante (LH) (sérum) - Femme (phase folliculaire)', '2-10 UI/L', '2-10 UI/L', '7000', '1', '4'),
(NULL, 'Hormone Lutéinisante (LH) (sérum) - Femme (milieu de cycle)', '15-65 UI/L', '15-65 UI/L', '7000', '1', '4'),
(NULL, 'Hormone Lutéinisante (LH) (sérum) - Femme (phase lutéale)', '1-12 UI/L', '1-12 UI/L', '7000', '1', '4'),
(NULL, 'Hormone Lutéinisante (LH) (sérum) - Femme  (ménopause)', '12-65 UI/L', '12-65 UI/L', '7000', '1', '4'),
(NULL, 'Hormone parathyroïdienne (PTH)', '1,4-6,8 pmol/L ', '13,2-64,1 pg/m', '7000', '1', '4'),
(NULL, 'Hormone thyréostimulante (TSH) (sérum) - Adulte', '0,4-4,8 mUI/L', '0,4-4,8 mUI/L', '7000', '1', '4'),
(NULL, 'Hormone thyréostimulante (TSH) (sérum) -  Nouveau-né à terme (0-1 jour)', '1-39 mUI/L', '1-39 mUI/L', '7000', '1', '4'),
(NULL, 'Hormone thyréostimulante (TSH) (sérum) -  Nouveau-né à terme (1-4 jours)', '1-17 mUI/L', '1-17 mUI/L', '7000', '1', '4'),
(NULL, 'Hormone thyréostimulante (TSH) (sérum) -  Nouveau-né à terme (2-20 semaines)', '1,7 - 9,1 mUI/L', '1,7-9,1 mUI/L', '7000', '1', '4'),
(NULL, 'Hormone thyréostimulante (TSH) (sérum) -  Nouveau-né à terme (21 semaines - 20 ans)', '0,7-6,4 mUI/L', '0,7-6,4 mUI/L', '7000', '1', '4'),
(NULL, 'Progrestérone (sérum) (adulte) - Homme', ' 0,0-1,3 nmol/L', ' 0,0-0,4 ng/mL ', '7000', '1', '4'),
(NULL, 'Progrestérone (sérum) (adulte) - Femme (phase folliculaire)', '0,3-4,8 nmol/L', '0,1-1,5 ng/mL', '7000', '1', '4'),
(NULL, 'Progrestérone (sérum) (adulte) - Femme (phase lutéale)', '8,0-89,0 nmol/L', '2,5-28,0 ng/mL', '7000', '1', '4'),
(NULL, 'Prolactine (sérum) - Homme', '1-20 µg/L', '1-20 ng/mL', '7000', '1', '4'),
(NULL, 'Prolactine (sérum) -  Femme', ' 1-25 µg/L', '1-20 ng/mL', '7000', '1', '4'),
(NULL, 'Testostérone - Homme', '9,5-30 nmol/L', '275-875 ng/dL', '7000', '1', '4'),
(NULL, 'Testostérone - Femme', '0,8-2,6 nmol/L', '23-75 ng/dL', '7000', '1', '4'),
(NULL, 'Testostérone - Femme enceinte', '1,3-6,6 nmol/L', '38-190 ng/dL', '7000', '1', '4'),
(NULL, 'Thyroxine totale (T4)', '66-155 nmol/L', ' 5-12 µg/d', '7000', '1', '4'),
(NULL, 'Thyroxine totale (T4)', '13-27 pmol/L', '1,0-2,1 ng/dL', '7000', '1', '4'),
(NULL, 'Triiodothyronime totale (T3)', '1,1-2,9 nmol/L', '70-190 ng/dL', '7000', '1', '4');


INSERT INTO `single_examen_labo` (`id`, `designation`, `unite_si`, `unite_traditionnelle`, `prix_unitaire`, `active`, `examen_labo_id`) VALUES
(NULL, 'INR, RNI', '0,9-1,1', '9 0,9-1,1', '5700', '1', '5'),

(NULL, 'Chlorure (sérum)', '96-106mmol/L', '96-106 mEq/L', '5700', '1', '5'),
(NULL, 'Prothrombine (temps de) (PT, TP)', '9-12Sec', '9-12Sec', '5700', '1', '5'),
(NULL, 'Temps de saignement (Ivy)', '˂ 5min', '˂ 5min', '5700', '1', '5');





