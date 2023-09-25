<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Data_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Data_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }


  public function getData(){
    $data= array(
      'accueil_en' =>array(
          'button' => 'Find out more about us',
          'who' => 'Who are we ?',
          'answer' => 'Your expert partner for sustainable development',
          'accueil_droite1' =>'HYDROCAMP GROUP is a company specializing in sustainable development and engineering.',
          'accueil_droite2' =>'Experts in engineering and the environment, designing sustainable infrastructures to meet people\'s needs and a better future.',
          'accueil_droite3' => '
          Driven by a passionate and experienced team, HYDROCAMP GROUP is fully committed to promoting sustainable development. From careful study to realization, our commitment to water, the environment and infrastructure guides every step of our mission.',
          'button2' => 'Find out more',
          'combien1' => '15+',
          'combien2' => '40+',
          'expert_permanent' => 'Ongoing experts',
          'consultant' => 'Consultants',
          'titre' => 'Our services',
          'apres titre' => 'Your sustainable future, our expertise. Innovative solutions for a prosperous future.',
          'eau' => 'Water',
          'infrastructure' => 'Infrastructure',
          'env' => 'Environmental',
          'detail_eau'=>'Our commitment materializes through the design and implementation of projects related to Water, Sanitation and Hygiene (WASH), the installation of water boreholes and the development of long-term solutions that ensure constant and reliable access to this vital resource.',
          'detail_infrastructure'=>'We are dedicated to shaping a solid future by designing and carrying out hydraulic developments, public works and adapted infrastructures, thus contributing to the harmonious development of the territories.',
          'detail_env'=>'Our actions encompass environmental impact studies, geological sciences and risk management, all with the aim of safeguarding natural resources and promoting a sustainable future.',
          'propos' => 'About us',
          'caroussel1_titre' => 'Shape a Green Future',
          'caroussel1_p' => 'Explore a future powered by water with Hydrocamp Group, your guide to sustainable solutions.',
          'caroussel2_titre' => 'Water Source of Innovation',
          'caroussel2_p' => 'Immerse yourself in our universe where water inspires the creation of future solutions with Hydrocamp Group.',
          'caroussel3_titre' => 'Flow towards Tomorrow',
          'caroussel3_p' => 'Follow the flow of innovation led by Hydrocamp Group, where water is the key to a thriving future.',
          'engagement' => 'Committed to a sustainable future',
          'propos_droite_UL_titre' => '15+ Permanent Experts',
          'propos_droite_UL_detail' => 'Experts dedicated to water, environment and infrastructure ensure sustainable and innovative solutions.',
          'propos_droite_UR_titre' => '40+ Consultants',
          'propos_droite_UR_detail' => 'A team of more than 40 specialized consultants forges ingenious solutions for a positive and lasting impact.',
          'propos_droite_DL_titre' => 'Passion for a green future',
          'propos_droite_DL_detail' => 'We collaborate with government agencies for eco-responsible infrastructure.',
          'propos_droite_DR_titre' => 'Complete expertise',
          'propos_droite_DR_detail' => 'Experts, engineers and technicians work together for complete solutions, from design to completion.'
        ),
      'accueil_fr' => array(
          'button' => 'Découvrez-nous',
          'who' => 'Qui sommes-nous ?',
          'answer' => 'Votre partenaire expert pour un développement durable',
          'accueil_droite1' =>'HYDROCAMP GROUP est une société spécialisée dans le développement durable et l\'ingénierie ',
          'accueil_droite2' =>'Experts en ingénierie et environnement, concevant des infrastructures durables pour répondre aux besoins des populations et favoriser un avenir meilleur.',
          'accueil_droite3' => 'Portés par une équipe passionnée et expérimentée, HYDROCAMP GROUP s\'investit pleinement dans la promotion du développement durable. De l\'étude minutieuse à la concrétisation, notre engagement envers l\'eau, l\'environnement et les infrastructures guide chaque étape de notre mission.',
          'button2' => 'En savoir plus',
          'combien1' => '15+',
          'combien2' => '40+',
          'expert_permanent' => 'Experts permanents',
          'consultant' => 'Consultants',
          'titre' => 'Nos services',
          'apres titre' => 'Votre avenir durable, notre expertise. Solutions novatrices pour un futur prospère',
          'eau' => 'Eau',
          'infrastructure' => 'Infrastructure',
          'env' => 'Environnement',
          'detail_eau'=>'Notre engagement se matérialise à travers la conception et la réalisation de projets liés à l\'Eau, l\'Assainissement et l\'Hygiène (EAH), la mise en place de forages d\'eau et l\'élaboration de solutions à long terme qui assurent une accessibilité constante et fiable à cette ressource vitale.',
          'detail_infrastructure'=>'Nous sommes dédiés à façonner un avenir solide en concevant et réalisant des aménagements hydrauliques, des travaux publics et des infrastructures adaptées, contribuant ainsi au développement harmonieux des territoires.',
          'detail_env'=>'Nos actions englobent des études d\'impact environnemental, des sciences géologiques ainsi que la gestion des risques, tout cela dans le but de sauvegarder les ressources naturelles et de promouvoir un avenir durable.',
          'propos' => 'A propos de nous',
          'caroussel1_titre' => 'Façonnez un Avenir Écologique',
          'caroussel1_p' => 'Explorez un avenir propulsé par l\'eau avec Hydrocamp Group, votre guide vers des solutions durables.',
          'caroussel2_titre' => 'L\'Eau Source d\'Innovation',
          'caroussel2_p' => 'Plongez dans notre univers où l\'eau inspire la création de solutions d\'avenir avec Hydrocamp Group.',
          'caroussel3_titre' => 'Fluidez vers Demain',
          'caroussel3_p' => 'Suivez le courant de l\'innovation guidé par Hydrocamp Group, où l\'eau est la clé d\'un avenir florissant.',
          'engagement' => 'Notre Engagement envers un Avenir Durable',
          'propos_droite_UL_titre' => '15+ Experts permanents',
          'propos_droite_UL_detail' => 'Des experts dédiés à l\'eau, l\'environnement et les infrastructures assurent des solutions durables et novatrices.',
          'propos_droite_UR_titre' => '40+ Consultants',
          'propos_droite_UR_detail' => 'Une équipe de plus de 40 consultants spécialisés forge des solutions ingénieuses pour un impact positif et durable.',
          'propos_droite_DL_titre' => 'Passion pour un avenir vert',
          'propos_droite_DL_detail' => 'Nous collaborons avec les organismes gouvernementaux pour des infrastructures écoresponsables.',
          'propos_droite_DR_titre' => 'Expertise complète',
          'propos_droite_DR_detail' => 'Des experts, ingénieurs et techniciens travaillent ensemble pour des solutions complètes, de la conception à la réalisation.'
      ),
      'header_en' => array(
        'item1' => 'Home',
        'item2' => 'Our references',
        'item3' => 'Our achievements',
        'item4' => 'Blog',
        'item5' => 'Contact Us',
        'item6' => 'Customer Area',
        'item7' => 'Log In',
        'item8' => 'Log Out'
      ),
      'header_fr' => array(
          'item1' => 'Accueil',
          'item2' => 'Nos Références',
          'item3' => 'Nos Réalisations',
          'item4' => 'Blog',
          'item5' => 'Nous Contacter',
          'item6' => 'Espace Client',
          'item7' => 'Se connecter',
          'item8' => 'Se déconnecter'
      ),
      'footer_en' => array(
          'item1'=> 'For your ambitious water, infrastructure and environmental projects, HYDROCAMP GROUP is your trusted partner. Together, towards a sustainable future.',
          'button_devis' => 'Ask for a quote',
          'item2' => 'HYDROCAMP GROUP is a company specializing in sustainable development and engineering.',
          'item3'=> 'Pages',
          'item4' => 'Subscribe to our newsletter to keep up to date with all our news!',
          'address' => 'Address',
          'mail' => 'Your e-mail',
          'inscription' => 'Sign up'
      ),
      'footer_fr' => array(
          'item1'=> 'Pour vos projets ambitieux en eau,infrastructure et environnement, HYDROCAMP GROUP est votre partenaire de confiance. Ensemble, vers un avenir durable.',
          'button_devis' => 'Demander un devis',
          'item2' => 'HYDROCAMP GROUP est une société spécialisée dans le développement durable et l\'ingénierie',
          'item3'=> 'Pages',
          'item4' => 'Inscrivez-vous à notre newsletter pour rester informé de toutes nos actualités !',
          'address' => 'Adresse',
          'mail' => 'Votre e-mail',
          'inscription' => "S'inscrire"
      ),
      'reference_en' => array(
          'item1' =>'Our references',
          'item2' => 'Discover our references. Sustainable projects that have made a difference.'
      ),
      'reference_fr' => array(
          'item1' =>'Nos références',
          'item2' => 'Découvrez nos références. Des projets durables qui ont fait la différence'
      ),
      'contact_fr' => array(
          'item1' =>'Contact',
          'item2' =>'Message',
          'item3' => 'Votre Email',
          'item4' => 'Envoyer',
          'item5' => "Nos services étudient et interviennent à la réalisation, en intégrant les normes liées au respect de l'environnement, dans les domaines liés à",
          'item6' => "Eau, Assainissement et Hygiène (EAH)",
          'item7' => "Aménagement hydraulique (Hydro-agricole, bassin versant, barrage, aménagement du territoire …)",
          'item8' => "Adduction en eau potable (FPMH, AEPS, AEPG)",
          'item9' => "Forage deau et puits moderne",
          'item10' => "Energie renouvelable",
          'item11' => "Bâtiment et travaux public",
          'item12' => "Géosciences (Hydrogéologie, Géophysique, géotechnique, mines, environnement, SIG et télédétection)",
          'item13' => "Etude d' impact environnemental",
          'item14' => "Gestion des risques et catastrophes naturelles",
          'item15' => "Ainsi, toutes activités pouvant rattachés directement ou indirectement à lobjet social.",
          'item16' => "Laissez-nous prendre en charge votre projet, nous nous occupons de tout le reste.",
          'item17' => "Contactez-nous"
      ),
      'contact_en' => array(
        'item1' =>'Contact',
        'item2' =>'Message',
        'item3' => 'Your Email',
        'item4' => 'Send',
        'item5' => "Our services include design and implementation of environmentally-friendly solutions in the fields of",
        'item6' => "Water, Sanitation and Hygiene (WASH)",
        'item7' => "Hydraulic engineering (Hydro-agricultural, watershed, dam, land use development ...)",
        'item8' => "Drinking water supplies (FPMH, AEPS, AEPG)",
        'item9' => "Water drilling and modern wells",
        'item10' => "Renewable energy",
        'item11' => "Building and civil engineering",
        'item12' => "Geosciences (hydrogeology, geophysics, geotechnics, mining, environment, GIS and remote sensing)",
        'item13' => "Environmental impact study",
        'item14' => "Risk and disaster management",
        'item15' => "All activities directly or indirectly related to the corporate purpose.",
        'item16' => "Let us take care of your project, and we'll take care of the rest.",
        'item17' => "Contact us"
      ),
      'realisation_fr' => array(
        'item1' =>'Explorez nos réalisations . Des projets durables qui font la différence.',
        'item2' => 'Mot clé',
        'item3' => 'année',
        'item4' => 'Résultats',
        'item5' => 'Nom de la mission',
        'item6' => 'Pays',
        'item7' => 'Année'
      ),
      'realisation_en' => array(
        'item1' =>'Explore our achievements . Sustainable projects that make a difference.',
        'item2' => 'KeyWord',
        'item3' => 'year',
        'item4' => 'Results',
        'item5' => 'Mission name',
        'item6' => 'Country',
        'item7' => 'Year'
      ),
      'sign_in_fr' => array(
        'item1' => 'Connexion',
        'item2' => 'Votre email',
        'item3' => 'Se connecter',
        'item4' => "J'ai pas encore de compte. ",
        'item5' => "S'inscrire?",
        'item6' => 'Mot de passe'
      ),
      'sign_in_en' => array(
        'item1' => 'Login',
        'item2' => 'Your e-mail',
        'item3' => 'Connect',
        'item4' => "I don't have an account yet. ",
        'item5' => "Join us?",
        'item6' => 'Password'
      ),
      'sign_up_fr' => array(
        'item1' => 'Inscription',
        'item2' => 'Nom',
        'item3' => 'Email',
        'item4' => "Numéro de téléphone",
        'item5' => "S'inscrire gratuitement",
        'item6' => "J'ai déjà un compte. ",
        'item7' => "Se connecter"
      ),
      'sign_up_en' => array(
        'item1' => 'Register',
        'item2' => 'Name',
        'item3' => 'E-mail',
        'item4' => "Phone number",
        'item5' => "Register for free",
        'item6' => "I already have an account. ",
        'item7' => "Log in"
      ),
      'detail_achievements_fr' => array(
        'item1' =>'Publié le:',
        'item2' => '#équipe #environnement #approche',
        'item3' => 'Par',
        'item4' => 'Inconnu'
      ),
      'detail_achievements_en' => array(
        'item1'=> 'Released on:',
        'item2' => '#team #environment #approach',
        'item3' => 'By',
        'item4' => 'Unknown'
      ),
      'blog_en' => array (
        'item1' => "Explore our news blogs. Keep up to date with the latest developments and discover our articles.",
        'item2' => "Category"
      ),
      'blog_fr' => array(
        'item1' => "Explorez nos blogs d'actualités. Restez informé des dernières avancées et découvrez nos articles.",
        'item2' => "catégorie"
      ),
      'devis_fr' => array(
        'titre' => 'Demander un devis',
        'item1'=> 'Laissez-nous prendre en charge votre projet, nous nous occupons de tout le reste.',
        'item2' => ' Ensemble, vers un avenir durable !',
        'item3' => 'Contactez-nous et Demandez votre devis sur-mesure !',
        'item4' => 'Présentez-nous votre projet et vos besoins, nous vous répondrons avec un devis personnalisé',
        'item5' => 'Devis sur-mesure - À vous de jouer !',
        'item6' => 'Recevez notre proposition détaillée, adaptée spécialement à vos exigences et à votre budget.',
        'item7' => 'Laissez-nous réaliser votre projet',
        'item8' => 'Une fois le devis validé, notre équipe d\' experts se mettra en action pour concrétiser votre projet avec passion et professionnalisme.',
        'item9' => 'Type de projet',
        'item10' => 'Description brève du projet',
        'item11' => 'Montant estimé',
        'item12' => 'Valider'
      ),
      'devis_en' => array(
        'titre' => 'Demander un devis',
        'item1'=> "Let us take care of your project, and we'll take care of the rest.",
        'item2' => 'Together, towards a sustainable future !',
        'item3' => 'Contact us and ask for your customized quote !',
        'item4' => "Tell us about your project and your needs, and we'll give you a personalized quote.",
        'item5' => "Customized quotations - It's up to you !",
        'item6' => 'Receive our detailed proposal, specially tailored to your requirements and budget.',
        'item7' => 'Let us take care of your project',
        'item8' => 'Once the estimate has been validated, our team of experts will set to work to bring your project to fruition with passion and professionalism.',
        'item9' => 'Type of project',
        'item10' => 'Brief description of the project',
        'item11' => 'Estimated value',
        'item12' => 'Validate'
      ),
      'espace_fr' => array (
        'titre' => 'Liste de vos devis',
        'keyWord' => 'Mot clé'
      ),
      'espace_en' => array (
        'titre' => 'List of your quotes',
        'keyWord' => 'keyWord'
      )
    );
      return $data;
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */