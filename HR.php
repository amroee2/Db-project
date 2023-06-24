<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="banner"> 
        <div>
            <div class="third_1">
                <a href="HR.php">
                    <img src="images/logo.png" alt="" style="width: 55px; height: 55px;">
                    </a>
                <h3>Barca Market</h3>
            </div>
        </div>
        <div class="third_2">
            <div >
                 <input type="search" placeholder=" Search" >
                 <button>
                    <span class="material-symbols-outlined">
                        search
                     </span>
                 </button>
            </div>
        </div>
        <div class="third_3">
                <img src="images/Palestine-Flag-PNG-HD.png">
                <a href="SignUp.php"class="btn2" style="text-decoration:none;">Sign Up</a>
                <a href="adminForm.php"class="btn2" style="text-decoration:none;">Sign In</a>
                <button id="btn1">EN</button>
        </div>
    </div>

    <div class="categories">
        <!-- center the sub-categories -->

            <div class="sub-categories_3">
                <a href="warehouse.php"><div>Warehouse</div></a>

                <a href="Store.php"><div>Store</div></a>
            </div>
</div>

    </div>
    <!-- contains all -->
    <div class="main-page" >
    <div class="image-slider">
            <div  class="slides"><img id="img1" src="images/m.jpg" ></div>
            <div class="slides" ><img id="img2"  src="images/razi.jpg" ></div>
            <div  class="slides"><img id="img3" src="images/O.jpg" ></div>
            <div  class="slides"><img id="img4" src="images/cart.jpg" ></div>
        </div>
        <div>
            
        </div>
        <div class="whitePage">

        <div class="trendCenter">

<div class="images_trends">
<div class="trends"> 
    <div class="container">
    <img  id="img5" src="images/supermarket.png">
</div>
</div>
<div class="trends"> 
    <div class="container">
    <img  id="img6" src="images/Artboard-1.png">
</div>
</div>
<div class="trends"> 
    <div class="container">
    <img id="img7" src="images/6.jpg">
</div>
</div>
</div>
</div>
</div>
        <div class="whitePage">
            <div class="product">
             </div>
        </div>
    </div>
<footer>
    <div class="First_Part">
    <div class="gapping">
        <img src="images/logo.png"> 
        <h3 style="font-size: 30px;margin: 15px 5px; margin-top: 30px;">Barca Market</h3>
    </div>
    <div>
        <h3 class="Copyright">&copy; Official Barca Market Website</h3>
    </div>
    </div>
    </footer>
</body>
<style>
.trendCenter{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-top: 50px;
}
.trends{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.trends img{
    max-height: 400px;
    aspect-ratio: 1;
    object-fit: cover;
    display:block;
    width:100%;
    height:auto;
    transition: 0.75s ease;
}
.images_trends{
    display: flex;
    justify-content: space-between;
    width: 95%;
    column-gap: 25px;
}
/* .container{ 
    /* position: relative; */
    /* z-index: 1; 
} */
.overlay{
    position: absolute;
    background-color: rgba(0, 0, 0, 0.75);
    bottom: 85px;
    left:0;
    right:0;
    overflow: hidden;
    width:100%;
    height: 0;
    transition: .5s ease;
    
} 
 .trends:hover .overlay{
    height:50px;
} 
h1{
    width:100%;
    margin: top 30%;
    color:white;
    font-size: 4vw;
    position:absolute;
    text-align: center;
}
.btn2{
    width: 60px;
    background-color: #FDC52C;
    color: white;
    border: none;
    border-radius: 3px;
    padding: 5px;
    font-weight: bold;
}
</style>


<script>
    var img1 = document.getElementById("img1");
    var img2 = document.getElementById("img2");
    var img3 = document.getElementById("img3");
    var img4 = document.getElementById("img4");
    var img5 = document.getElementById("img5");
    var img6 = document.getElementById("img6");
    var img7 = document.getElementById("img7");
    var name = document.getElementById("trendsDes");
    var box = document.getElementById("trendimage");
    var razi = document.getElementById("razi");
    img1.addEventListener("mouseover", (event) =>{
        img2.style.aspectRatio=1;
        img3.style.aspectRatio=1;
        img1.style.aspectRatio=16/9;
        img4.style.aspectRatio=1;
    });
    img2.addEventListener("mouseover", (event) =>{
        img1.style.aspectRatio=1;
        img3.style.aspectRatio=1;
        img2.style.aspectRatio=16/9;
        img4.style.aspectRatio=1;
    });
    img3.addEventListener("mouseover", (event) =>{
        img1.style.aspectRatio=1;
        img2.style.aspectRatio=1;
        img3.style.aspectRatio=16/9;
        img4.style.aspectRatio=1;
    });

    img4.addEventListener("mouseover", (event) =>{
        img1.style.aspectRatio=1;
        img2.style.aspectRatio=1;
        img3.style.aspectRatio=1;
        img4.style.aspectRatio=16/9;
    });

    // img5.addEventListener("mouseover", (event) =>{ 
    //     img5.style.transform= "scale(1.1)";
    // });

    // img5.addEventListener("mouseleave", (event) =>{
    //     img5.style.transform= "scale(1)";
    // });
    // img6.addEventListener("mouseover", (event) =>{
    //     img6.style.transform= "scale(1.1)"; 
    // });
    // img6.addEventListener("mouseleave", (event) =>{
    //     img6.style.transform= "scale(1)";
    // });
    // img7.addEventListener("mouseover", (event) =>{
    //     img7.style.transform= "scale(1.1)"; 
    // });
    // img7.addEventListener("mouseleave", (event) =>{
    //     img7.style.transform= "scale(1)";
    // });

</script>
</html>