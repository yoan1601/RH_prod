insert into compagnies values
    (default,'Canal +', 'canal.jpg', 1),
    (default,'Telma', 'telma.jpg', 1),
    (default,'United Nations International Development Organisation', 'unido.jpg', 1),
    (default,'Banque Mondiale', 'Bmondial.jpg', 1),
    (default,'Radisson', 'radisson.jpg', 1),
    (default,'Fondation Axian', 'axian.jpg', 1),
    (default,'BNI Madagascar', 'bni.jpg', 1),
    (default,"Ministère de l'environnement et du développement durable", 'ministere.jpg', 1);

INSERT INTO users (nom, telephone, mail,mot_de_passe, is_admin, etat) VALUES
    ('root', '+261 34 10 240 00', 'root@root.com', md5('root') , 111, 1),
    ('John Doe', '+261 34 10 240 00', 'john.doe@example.com', md5('john') , 11, 1),
    ('Jane Smith', '+261 34 10 250 00', 'jane.smith@example.com',md5('jane'), 11, 1),
    ('Alice Johnson', '+261 33 10 234 00', 'alice.johnson@example.com',md5('alice'), 1, 1),
    ('Bob Brown', '+261 32 10 123 00', 'bob.brown@example.com',md5('bob'), 1, 1),
    ('Eve White', '+261 38 10 124 00', 'eve.white@example.com',md5('eve'), 1, 0);

INSERT INTO achievements values
    (null,
    1,
    106,
    'Construction d\'aire d\'assainissement et équipement de pompage solaire dans la commune Ejeda',
    'Construction of a sewage treatment plant and solar pumping equipment in the municipality of Ejeda',
    'Commune Ejeda',
    'ADRA MADAGASCAR',
    ' Monsieur Zefaniarintsalama Nomenahasina',
    'ADRA MADAGASCAR',
    '2023-04-18',
    '2023-05-18',
     30,
     '+261 34 85 301 80',
    'hasina.zefaniarintsalama@adra.mg',
    "Le projet d'urgence 'AINA Emergency Relief 2021' (AINA) financé par USAID/BHA, mis en œuvre par ADRA dans le district d'Ampanihy vise à fournir une aide alimentaire vitale, un soutien à l'
    agriculture et des interventions en Eau, Assainissement et Hygiène, dans la région du Grand Sud de Madagascar afin de réduire l'insécurité alimentaire et de remédier aux conditions désastreuses
     en matière d'eau et d'hygiène de 8 900 ménages vulnérables pendant l'urgence actuelle. 
    Dans cette optique, le projet ADRA AINA lance un appel d'offres pour les travaux de construction des ouvrages d'aire d'assainissement et des pompes solaires de huit (8) points de forage y compris
     les travaux annexes dont : 
    - Construction de DEUX (2) sites dans la commune Maniry ; - Construction de SIX (6) sites dans la commune Ejeda. ",
    "The USAID/BHA-funded 'AINA Emergency Relief 2021' (AINA) project, implemented by ADRA in the Ampanihy district, aims to provide life-saving food aid, agricultural support and Water, Sanitation and Hygiene
    (WASH) interventions in Madagascar's Grand Sud region, in order to reduce food insecurity and address the dire water and hygiene conditions of 8,900 vulnerable households during the current emergency. 
    To this end, the ADRA AINA project is launching a call for tenders for the construction of sanitation works and solar pumps for eight (8) drilling points, including ancillary works such as : 
    - Construction of TWO (2) sites in the Maniry commune; - Construction of SIX (6) sites in the Ejeda commune.",
    'Les équipes de la société HYDROCAMP a été chargé de la conception et la réalisation du projet',
    'HYDROCAMP was responsible for the design and implementation of the project.',
    'adra.jpg',
    'achiev1.jpg',
    '2023-01-01',
    '',
    1);

INSERT INTO achievements values
    (null,
    1,
    106,
    "Mise en place d'un impluvium et construction d'un Château d'eau à double réservoir 15m3",
    "Installation of an impluvium and construction of a water tower with double 15m3 reservoir",
    "Ambositra, Région Amorin'i Mania",
    "L'ECOLE SAINT JOSEPH DE CLUNY",
    "Sœur RAFARAMANGA Odette",
    "ECOLE SAINT JOSEPH DE CLUNY AMBOSITRA",
    "2022-03-01",
    "2022-04-20",
    50,
    "+261 34 28 980 66",
    "rafaramangaodette@yahoo.fr",
    "",
    "",
    "Les équipes de la société HYDROCAMP a été chargé de la conception et la réalisation du projet WASH de l'école",
    "The HYDROCAMP teams were responsible for the design and implementation of the school's WASH project.",
    "",
    "achiev2_3.jpg",
    "2022-04-20",
    "",
    1);

INSERT INTO achievements values
    (null,
    1,
    106,
    "Réalisation d'un forage équipé d'un système de pompage solaire et construction d'un Château d'eau-Réhabilitation des blocs sanitaires au sein du centre",
    "Drilling of a borehole equipped with a solar pumping system and construction of a water tower-Rehabilitation of sanitary blocks at the center",
    "Ville de Port Berger",
    "Congrégation des Sœurs Fille Marie Auxiliatrice Madagascar",
    "Sœur Alejandra Strada",
    "Fille Marie Auxiliatrice Port Berger",
    "2022-02-05",
    "2022-03-22",
    45,
    "+261 34 93 088 07",
    "ecofma.mdg@gmail.com",
    "La ville de Port Berger est largement frappée par le trouble et l'insuffisance en eau pour l'année dernière. Par conséquent, la maison des sœurs en soutien
     avec les associations Chrétiennes et l'église Catholique ont fait appel à l'HYDROCAMP pour apporter des solutions. C'est dans cette optique que nous à étudier
      la faisabilité d'un Projet AEPS pour le centre et inciter la réhabilitation des WASH BLOCS.",
    "The town of Port Berger has been badly hit by water shortages over the past year. Consequently, the sisters' house, in support
     with Christian associations and the Catholic Church have called on HYDROCAMP to provide solutions. With this in mind, we are studying
      the feasibility of an AEPS project for the center and encourage the rehabilitation of WASH BLOCKS.",
    "",
    "",
    "",
    "achiev3_1.jpg",
    "2022-03-22",
    "",
    1);

INSERT INTO achievements values
    (null,
    1,
    106,
    "PROJET D'ADDUCTION EN EAU POTABLE DURABLE, ASSAINISSEMENT ET HYGEIENE DE L'ECAR HOPITAL HENSEIN DE MARANA : Mise en place d'un forage équipé d'un système de pompage solaire, construction d'un château d'eau, réhabilitation des blocs sanitaire de l'Hôpital, construction d'un nouveau DLM et WASH Bloc pour les villages des patients",
    "SUSTAINABLE DRINKING WATER SUPPLY, SANITATION AND HYGIENE PROJECT AT THE HENSEIN HOSPITAL IN MARANA: Installation of a borehole equipped with a solar pumping system, construction of a water tower, rehabilitation of the hospital's sanitary blocks, construction of a new MLD and WASH block for the patients' villages.",
    "Ville de FIANARANTSOA",
    "ECAR HOPITAL HENSEIN DE MARANA",
    "Sœur Catherine",
    "ECAR HOPITAL HENSEIN DE MARANA FIANARANTSOA",
    "2021-10-10",
    "2021-12-15",
    65,
    "+261 34 29 328 43",
    "",
    "L'ECAR HOPITAL HEINSIEN DE MARANA est d'un centre où l'association des sœurs SAINT JOSEPH DE CLUNY préoccupe des patients victimes de la maladie HABOKANA (lèpres). En effet le renforcement du projet eau, assainissement et hygiène est primordiale. Comme la ville de FIANARANTSOA est vulnérable en termes d'accès en eau, le responsable a fait appel à l'HYDROCAMP pour résoudre le fléau. Dans ce cas, nous a étudiés la faisabilité d'un projet d'adduction en eau par forage dans le lieu afin de se poursuivre à la réhabilitation des blocs sanitaire au sein de l'hôpital ainsi que la construction d'un nouveau bloc sanitaire dans le village des patients.
    Description des services effectivement rendus par votre personnel dans le cadre de la mission :
    -Les équipe de la société HYDROCAMP GROUP SARL servent les investigation hydrogéologique et géophysique au sein de l'enceinte afin de déterminer les points favorables à l'implantation des points de captages d'eau souterraine
    -L'HYDROCAMP a assuré la construction du château d'eau et la mise en place du système de pompage solaire
    -l'HYDROCAMP a réhabilité les blocs sanitaires au sein de l'hôpital
    -l'HYDROCAMP a construit un DLM dans le village et un WASH BLOC",
    "The ECAR HOPITAL HEINSIEN DE MARANA is a center where the SAINT JOSEPH DE CLUNY sisters' association cares for patients suffering from the HABOKANA disease (leprosy). Strengthening the water, sanitation and hygiene project is essential. As the town of FIANARANTSOA is vulnerable in terms of access to water, the person in charge called on HYDROCAMP to solve the problem. In this case, we studied the feasibility of a borehole water supply project in the area in order to continue with the rehabilitation of the sanitary blocks within the hospital as well as the construction of a new sanitary block in the patients' village.
    Description of the services actually rendered by your staff as part of the mission:
    -The HYDROCAMP GROUP SARL teams carry out hydrogeological and geophysical investigations within the compound to determine the most suitable locations for groundwater catchment points.
    -HYDROCAMP built the water tower and installed the solar pumping system.
    -HYDROCAMP rehabilitated the hospital's sanitary blocks.
    -HYDROCAMP has built a DLM in the village and a WASH BLOCK in the hospital.",
    "",
    "",
    "",
    "achiev4_2.jpg",
    "2021-12-15",
    "",
    1);

INSERT INTO achievements values
    (null,
    1,
    106,
    "Projet d'adduction en eau potable de l'école SAINT JOSEPH DE CLUNY AMBOSITRA : réalisation d'un forage équipé d'un système de pompage solaire et construction d'un local technique",
    "Drinking water supply project for the SAINT JOSEPH DE CLUNY AMBOSITRA school: construction of a borehole equipped with a solar pumping system, and construction of a technical room.",
    "Ville d'Ambositra",
    "Congrégation des Sœurs Saint Joseph de Cluny Madagascar",
    "Sœur RAFARAMANGA Odette",
    "ECOLE SAINT JOSEPH DE CLUNY AMBOSITRA",
    "2021-04-26",
    "2021-05-10",
    45,
    "+261 34 28 980 66",
    "",
    "La ville d'Ambositra est largement frappée par le trouble et l'insuffisance en eau l'année dernière. Par conséquent, l'Ecole Saint Joseph de Cluny en soutien avec les associations Chrétiennes et l'église Catholique ont fait appel à l'HYDROCAMP pour apporter des solutions. C'est dans cette optique que nous à étudier la faisabilité d'un Projet AEP pour le centre et inciter la réhabilitation des blocs sanitaire
    -Les équipe de la société HYDROCAMP GROUP servent les investigation hydrogéologique et géophysique au sein de l'enceinte afin de déterminer les points favorables à l'implantation des points de captages d'eau souterraine.
    -L'HYDROCAMP a assuré la mise en place du système de pompage électrique
    -l'HYDROCAMP a réhabilité le DLM existant au sein de l'école et a réhabilité les blocs sanitaires",
    "The town of Ambositra has been badly hit by water shortages over the past year. Consequently, the Ecole Saint Joseph de Cluny, in support of Christian associations and the Catholic Church, called on HYDROCAMP to provide solutions. With this in mind, we studied the feasibility of an AEP project for the center and encouraged the rehabilitation of the sanitary blocks.
    -The HYDROCAMP GROUP teams are carrying out hydrogeological and geophysical investigations within the compound to determine the most suitable locations for groundwater catchment points.
    -HYDROCAMP installed the electric pumping system.
    -HYDROCAMP rehabilitated the school's existing MLD and sanitary blocks.",
    "",
    "",
    "",
    "achiev5_1.jpg",
    "2021-05-10",
    "",
    1);

INSERT INTO blogs (idUser, titre_FR, titre_EN, detail_FR, detail_EN, date_publication,image_couverture, auteur, etat)
VALUES
    (2, "L'importance de la biodiversité", "The Importance of Biodiversity",
     "La biodiversité est essentielle pour maintenir l'équilibre des écosystèmes. Elle permet de préserver la variété des espèces et de garantir la survie de nombreuses formes de vie. La perte de biodiversité peut avoir des conséquences graves sur la santé de notre planète et sur notre propre bien-être. Il est impératif de prendre des mesures pour protéger et restaurer la biodiversité, en prévenant la disparition d'espèces et en préservant les habitats naturels.",
     "Biodiversity is crucial for maintaining ecosystem balance. It helps preserve species variety and ensures the survival of many forms of life. The loss of biodiversity can have serious consequences for the health of our planet and our own well-being. It is imperative to take action to protect and restore biodiversity, preventing species extinction and preserving natural habitats.",
     '2023-07-01','biodiversite.jpg', 'Jane Doe', 1),

    (2, "Les énergies renouvelables", "Renewable Energies",
     "Les énergies renouvelables, telles que l'énergie solaire et éolienne, sont des solutions durables pour réduire notre dépendance aux combustibles fossiles et réduire les émissions de gaz à effet de serre. La transition vers les énergies renouvelables est cruciale pour atténuer les effets du changement climatique et assurer un avenir durable pour les générations futures. Investir dans les énergies propres est un choix éclairé pour préserver notre planète.",
     "Renewable energies, such as solar and wind energy, are sustainable solutions to reduce our dependence on fossil fuels and decrease greenhouse gas emissions. The transition to renewable energies is crucial to mitigate the effects of climate change and ensure a sustainable future for generations to come. Investing in clean energies is an enlightened choice to preserve our planet.",
     '2023-07-15','energie-renouvelable.jpg', 'John Smith', 1),

    (3, "Gestion responsable des déchets", "Responsible Waste Management",
     "Une gestion responsable des déchets est essentielle pour préserver notre environnement. Le recyclage et la réduction des déchets sont des pratiques clés pour minimiser notre impact sur la planète. En adoptant des habitudes responsables, nous pouvons contribuer à la réduction de la pollution et à la préservation des ressources naturelles.",
     "Responsible waste management is crucial for preserving our environment. Recycling and waste reduction are key practices to minimize our impact on the planet. By adopting responsible habits, we can contribute to reducing pollution and preserving natural resources.",
     '2023-08-01','recyclage.jpg', 'Alice Johnson', 1),

    (4, "Conservation des ressources en eau", "Conservation of Water Resources",
     "La conservation des ressources en eau est cruciale alors que les pénuries d'eau deviennent de plus en plus fréquentes. Des gestes simples, tels que la réparation des fuites et la réduction de la consommation, peuvent faire une grande différence. En préservant l'eau, nous contribuons à la durabilité de notre planète et à la préservation de cet élément essentiel à la vie.",
     "Conserving water resources is crucial as water shortages become increasingly common. Simple actions, such as fixing leaks and reducing consumption, can make a significant difference. By preserving water, we contribute to the sustainability of our planet and the preservation of this essential element for life.",
     '2023-08-10','ressource.jpg', 'Michael Brown', 1),

    (5, "L'importance des forêts", "The Importance of Forests",
     "Les forêts jouent un rôle vital dans la régulation du climat, la préservation de la biodiversité et la fourniture d'habitats pour de nombreuses espèces. Il est essentiel de les protéger et de les gérer durablement. En adoptant des pratiques de foresterie responsable, nous pouvons maintenir l'équilibre entre les besoins humains et la conservation de la nature.",
     "Forests play a vital role in climate regulation, preserving biodiversity, and providing habitats for many species. It is crucial to protect and sustainably manage them. By adopting responsible forestry practices, we can maintain the balance between human needs and nature conservation.",
     '2023-08-20','foret.jpg', 'Emily Davis', 1),

    (6, "Réduction de l'utilisation des plastiques", "Reducing Plastic Usage",
     "La réduction de l'utilisation des plastiques est essentielle pour lutter contre la pollution plastique dans nos océans et écosystèmes. Opter pour des alternatives durables peut aider à préserver notre environnement. En privilégiant les matériaux biodégradables et en évitant les plastiques à usage unique, nous contribuons à réduire notre empreinte écologique.",
     "Reducing plastic usage is essential to combat plastic pollution in our oceans and ecosystems. Opting for sustainable alternatives can help preserve our environment. By favoring biodegradable materials and avoiding single-use plastics, we contribute to reducing our ecological footprint.",
     '2023-09-05','plastique.jpg', 'David Wilson', 1),

    (4, "L'importance de l'éducation environnementale", "The Importance of Environmental Education",
     "L'éducation environnementale joue un rôle crucial dans la sensibilisation aux enjeux environnementaux et dans la promotion de pratiques durables. Elle aide à former des citoyens responsables et conscients de leur impact sur la planète. En enseignant aux jeunes générations l'importance de préserver l'environnement, nous investissons dans un avenir meilleur.",
     "Environmental education plays a crucial role in raising awareness about environmental issues and promoting sustainable practices. It helps shape responsible citizens who are aware of their impact on the planet. By teaching younger generations the importance of preserving the environment, we invest in a better future.",
     '2023-09-15','education.jpg', 'Sophia Martinez', 1),

    (2, "Protection des espèces en voie de disparition", "Protection of Endangered Species",
     "La protection des espèces en voie de disparition est une priorité pour préserver la diversité biologique. Les efforts de conservation sont essentiels pour sauver des animaux et des plantes menacés d'extinction. Les actions de protection des espèces peuvent avoir un impact positif sur l'ensemble de l'écosystème, car chaque espèce joue un rôle important dans le maintien de l'équilibre naturel. En sensibilisant le public et en prenant des mesures de conservation actives, nous pouvons contribuer à la préservation de la vie sur Terre.",
     "Protecting endangered species is a priority to preserve biological diversity. Conservation efforts are crucial to save threatened animals and plants from extinction. Species protection actions can have a positive impact on the entire ecosystem, as each species plays an important role in maintaining the natural balance. By raising awareness and taking active conservation measures, we can contribute to the preservation of life on Earth.",
     '2023-09-25','especes.jpg', 'Daniel Lee', 1);

insert into achievements_images values
    (default,1,'achiev1.jpg'),
    (default,1,'achiev2.jpg'),
    (default,1,'achiev3.jpg'),
    (default,1,'achiev4.jpg'),
    (default,2,'achiev2_3.jpg'),
    (default,2,'achiev2_1.jpg'),
    (default,2,'achiev2_2.jpg'),
    (default,3,'achiev3_1.jpg'),
    (default,3,'achiev3_2.jpg'),
    (default,4,'achiev4_2.jpg'),
    (default,4,'achiev4_1.jpg'),
    (default,4,'achiev4_3.jpg'),
    (default,4,'achiev4_4.jpg'),
    (default,5,'achiev5_1.jpg');

insert into blogs_images VALUES
    (default,1,'biodiversite.jpg'),
    (default,2,'energie-renouvelable.jpg'),
    (default,3,'recyclage.jpg'),
    (default,4,'ressource.jpg'),
    (default,5,'foret.jpg'),
    (default,6,'plastique.jpg'),
    (default,7,'education.jpg'),
    (default,8,'especes.jpg');


INSERT INTO devis (idUser, type_projet, description_projet, montant_estime, etat, date_creation)
VALUES
    (1, "Site Web", "Développement d'un site web pour une entreprise", 1500.00*10000, 1, NOW()),
    (2, "Application Mobile", "Création d'une application mobile de suivi de fitness", 2000.00*10000, 1, NOW()),
    (1, "Logo Design", "Conception d'un logo pour une nouvelle marque", 300.00*10000, 0, NOW()),
    (3, "Réparation PC", "Réparation et entretien d'ordinateurs", 500.00*10000, 1, NOW()),
    (2, "Consultation Marketing", "Consultation pour une stratégie de marketing en ligne", 800.00*10000, 0, NOW());

 INSERT INTO devis (idUser, type_projet, description_projet, montant_estime, etat, date_creation)
VALUES
    (1, "Conception Graphique", "Création de visuels pour une campagne publicitaire", 800.00*10000, 1, NOW()),
    (4, "Développement Application", "Développement d'une application de gestion des stocks", 2500.00*10000, 1, NOW()),
    (3, "Traduction Document", "Traduction d'un document technique en anglais", 400.00*10000, 1, NOW()),
    (5, "Consultation Juridique", "Consultation pour des questions juridiques liées à une entreprise", 600.00*10000, 1, NOW()),
    (2, "Optimisation SEO", "Optimisation du référencement pour un site web", 350.00*10000, 1, NOW()),
    (4, "Création de Contenu", "Création d'articles de blog sur divers sujets", 180.00*10000, 1, NOW());




