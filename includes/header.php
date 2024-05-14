<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($page_title)) {
            echo "$page_title";
        } ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../images/a31.png" sizes="16x16 32x32 64x64"> 
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        .nun{
    text-decoration: none;
}
#section1{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    background: #f6f6f6;
    height: 100vh;
}
#section2{
    display: flex;
    background: #fff;
    justify-content: center;
    align-items: center;
    width: 160%;
    height: 95vh;
    margin: 1%;
    padding: 3px;
    margin-left: 0;
}
#section3{
    display: flex;
    background: #fff;
    width: 100%;
    height: 95vh;
    margin: 1%;
    padding: 3px; 
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-right: 0;
}
#section2 h3 {
position: relative;
font-size: 50px;
font-weight: 700;
margin: 0;
color: #00abf0;

 }
.multiple-text{
    
    color: #013144;
    width: auto;
}
#section2 h3::before {
    content:'';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: #030f18;
    animation: showRight 1s ease forwards;
    animation-delay: 1.3s;
}
@keyframes showRight{
    100%{
        width: 0;
    }
}
#section2 img{
    width: 50%;
    height: 50%;
}
.s2-1{
    margin: 1%;
    padding: 3%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
#section3 h2{
    font-size: 50px;
}
.s3-1{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
button {
border: none;
display: block;
position: relative;
padding: 0.7em 2.4em;
font-size: 18px;
background: transparent;
cursor: pointer;
user-select: none;
overflow: hidden;
color: royalblue;
z-index: 1;
font-family: inherit;
font-weight: 500;
margin: 20px;
}

button span {
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 100%;
background: transparent;
z-index: -1;
border: 4px solid grey;
}

button span::before {
content: "";
display: block;
position: absolute;
width: 8%;
height: 500%;
background: var(--lightgray);
top: 50%;
left: 50%;
transform: translate(-50%, -50%) rotate(-60deg);
transition: all 0.3s;
}

button:hover span::before {
transform: translate(-50%, -50%) rotate(-90deg);
width: 100%;
background: grey;
}

button:hover {
color: white;
}

button:active span::before {
background: grey;
}

@media screen and (max-width: 768px) {
    #section1 {
        flex-direction: column;
        align-items: stretch;
        height: auto;
    }
    #section2, #section3 {
        width: 100%;
        margin: 0;
        padding: 20px; /* Add padding for better spacing */
    }
    #section2 {
        height: auto;
    }
    #section2 img {
        width: 100%;
        height: auto;
    }
    #section3 {
        height: auto;
    }
    .s3-1 {
        flex-direction: column;
        align-items: stretch;
    }
    button {
        width: 100%;
        margin: 10px 0;
    }
}

/* Styles for small screens */
@media screen and (max-width: 767px) {
    #section2, #section3 {
        width: 100%;
        margin: 0;
        padding: 20px; /* Add padding for better spacing */
    }
    #section2 img {
        width: 100%;
        height: auto;
    }
    .s2-1, .s3-1 {
        text-align: center; /* Center align text */
    }
    button {
        width: 100%;
        margin: 10px 0;
    }
}
/* Styles for small screens */
@media screen and (max-width: 767px) {
    #section2 {
        flex-direction: column;
    }
    #section2 img {
        order: 2; /* Move the image below the multiple text */
    }
    .s2-1 p {
        order: 3; /* Move the paragraph below the image */
    }
}
    /* Pop-up styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.modal button{
    color: #013144;

}

    </style>
    
</head>

<body>