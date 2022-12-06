<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= @$title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="img/icone.ico">

</head>
<body>
    <?php include('menu.php'); ?>
    <div id="app">
    <?= @$content ?>
    </div>
    <?php include('footer.php');?>

<style>
*{  
    margin: 0;
    padding: 0;
    box-sizing: border-box;  
}

html {
    font-size: 16px;
}

body {
    background-image : linear-gradient(250deg, rgb(163, 232, 245) 0%, rgb(145, 138, 247) 40%, rgb(55, 42, 241) 100%); 
    display: block;
}

header {
    position: absolute;
    width: 100%;
    height: 10vh;
    top: 0;
    left: 0;
    background: #000;
    color: #fff;
    padding: 0 2rem;
}

nav {
    width: 100%;
    height: 4em;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(15, 15, 15);
    position: fixed;
    top: 0;
    z-index: 10;
}

nav > .titre{
    color : whitesmoke;
    margin: 10px;
}
.flex-container-principal{
    margin-top: 7em;
} 

.logo {
    font-size: 2rem;
    display: none;
    color: white;
}

.toggle {
    display: none;
    color: white;
    
}

.menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
    list-style: none;
    width: 800px;
    margin: 10px;
}

.menu li a:hover{
    color: rgb(145, 138, 247);
}

.menu .ongletMenu:hover{  
    border-bottom : solid rgb(145, 138, 247);
}


.menu li a {
    color: #fff;
    text-decoration: none;  
}


.btn {
    border: 0;
    background: rgb(145, 138, 247);
    font-size: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
}

.btn:hover{
    cursor: pointer;
    background: rgba(145, 138, 247, 0.575);   
}

.btn.btn-secondary {
    background: transparent;
    border: 2px solid rgb(145, 138, 247);
    color: #fff;
}

.btn.btn-secondary:hover{
    cursor: pointer;
    background: rgba(145, 138, 247, 0.308);
    
}

/* -------------------------------------------------------*/

/* CSS Connexion Form */

* {
  box-sizing: border-box;
}

input[type=text], [type=password], textarea, [type=email], [type=tel], select{
  width: 100%;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 3px;
  resize: vertical;
}

input[type=submit]{
  background-color: blueviolet;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-75 {
  float: left;
  width: 85%;
  margin-top: 6px;
}

/* ---------------------------------------------------*/

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout*/
@media screen and (max-width: 600px) {
    .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

/* ----------------------------------------------------------------- */

/* Responsive table */

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  margin-top: 1rem;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

/* ----------------------------------------------------------------- */

/*Section Hero : image de fond*/ 
.hero {
    
    height: 50vmax;  
    background-image: url('img/fond5.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}


/* ----------------------------------------------------------------- */

/*Responsive menu*/
@media all and (max-width: 1150px) {
    
    header {
        background: rgba(0, 0, 0, 0.753);      
    }
    
    .toggle {
        display: block;
        font-size: 2rem;
        cursor: pointer;
        position: relative;
        z-index: 20;
    }
    
    .logo {
        position: relative;
        z-index: 20;
        display: block;
    }
    
    .ouvrir {
        display: block;         /* logo ouvrir */
    }
    
    .fermer {
        display: none;          /* logo fermer */
        
    }
    
    .music{
        display: none;         /* logo music */
    }
    
    
    .open{
        overflow-y: hidden;
    }
    
    .open .titre{
        display : none;         /* titre remplacer par logo music */
    }
    
    .open .music{
        display: block;         /* logo music apres click bouton ouvrir */
    }
    
    .open .ouvrir {
        display: none;          /* logo ouvrir apres click bouton ouvrir */
    }
    .open .fermer {
        display: block;         /* logo fermer apres click bouton fermer */
    }
    
    .open .flex-container{
        display: none;          /* Image menu none apres click bouton ouvrir */
        
    }
    
    .menu {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: #000;
        flex-direction: column;
        padding: 2rem;
        justify-content: space-around;
        transform: translateX(-100%);
        transition: transform 1s;
    }
    
    .open h2 {
        display: block;
        position: absolute;
    }
    .menu li a {
        font-size: 2rem;
    }
    
    .btn {
        font-size: 2rem;
    }
    
    .open .menu {
        transform: translateX(0);
    }
    
    .hero {    
        
        background-image: url('img/fond5.jpg');
        height : 100vmax;
        max-height : 100%;
        min-height: 100%;
    }
    
/* ----------------------------------------------------------------- */
}

.binfo{
    padding:5rem;
    border-radius:2px;
    border:5px solid rgb(125, 202, 218);
    position:relative;
    text-align: center;
}
.btn-register {
    position:absolute;
    
    bottom:8px;
    padding:8px;
    left:0;
    right:0;
    margin:auto;
    
    width:200px;
    font-weight: bold;
    
    background:rgb(125, 202, 218);
    color:black;
    text-decoration: none;
    text-align:center;
    font-size: 18px;
}

/* ----------------------------------------------------------------- */

/*Search bar responsive*/

.topnav {
    overflow: hidden;
}

.topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 17px 16px;    
    text-decoration: none;
    font-size: 14px;     
    color : #ffff;
    
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #2196F3;
    color: white;
}

.topnav .search-container {
    float: left;
}

.topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 14px;
    border: none;
}

.topnav .search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.topnav .search-container button:hover {
    background: #ccc;
}

/* ----------------------------------------------------------------- */

/* Methode div flex box Menu Image*/

.flex-container {
    display: flex;
    flex-direction: row;
    font-size: 24px;
    text-align: center;
    
    position: relative;       
}

.flex-item {    
    padding: 10px;
    flex: 50%;  
}

.EveilImg{
    width: 200px;
    height: 200px;
}

.PratiqueImg{
    width: 200px;
    height: 200px;
}

.EnseignementImg{
    width: 200px;
    height: 200px;
}

.AccompagnementImg{
    width: 200px;
    height: 200px;
}

.DiffusionImg{
    width: 200px;
    height: 200px;
}
img:hover {
    cursor: pointer;
    box-shadow : 8px 8px 10px 0 rgba(0,0,0,0.5); 
}




@media (max-width: 800px) {
    .flex-container {
        flex-direction: column;
    }
}


/* ----------------------------------------------------------------- */

/* Enseignement */

.btn-instru{     
    background-color: blueviolet;
    align-items: center;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    margin: 3px;
    width: 100px;
    height: 50px;
}


/* ----------------------------------------------------------------- */


/* CSS pour les annonces*/
div{
    position: block;
}

.Structure {
    position: relative;
    background-color: rgba(255, 255, 255, 0.5);
    width: 50%;
    margin: 20px;
    
    border-radius: 5ch;
}

.offre{
    
    margin: 20px;
    display:flex;
    justify-content:left;
    
    position: absolute; 
}

.imgStructure{
    width: 30%;
    margin: 20px;  
    
}

.imageDetaille{
    max-width: 10em;
} 

.test{
    margin: 20px;
    display:flex;
    justify-content:space-between;
}

.nomStructure{
    margin: 20px;
    width: 60%;
    position: relative;
    font-size: 21px;
    
}

.infoStructure{
    margin: 20px;
    font-size: 15px;
    
} 

.offre > p {
    color: rgba(189, 39, 39, 0.877)
}

/* ----------------------------------------------------------------- */

/* Footer CSS */

footer{
    justify-content: center;
    flex-wrap:wrap;
    height:15vh;
    background:black;
    color:white !important;
    width: 100%;
    
    text-align: center;
}



#app{
    min-height:90vh;
    margin-top:5rem;
    margin-bottom:5rem;
    width:100%;
    display:flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.cartes {
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
}
.carte {
    flex: 200px;
    margin: 10px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
    display:flex;
    flex-direction:column;
    justify-content:space-around;
    flex:1;
    height:20rem
} 
.carte img {
    max-width: 100%;
    flex:1;
    margin-bottom:10px;
}
.carte .text {
    padding: 0 20px 20px;
}
.carte .text > button {
    background: gray;
    border: 0;
    color: white;
    padding: 10px;
    width: 100%;
}
main{
    display:flex;
    align-items:center;
    justify-content: center;
    flex-wrap:wrap;
}

.fauto{
    display: flex;
    align-items: center;
    justify-content: center;
} 
/* ----------------------------------------------------------------- */

</style> 


</body>
</html>