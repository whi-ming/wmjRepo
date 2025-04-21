<link rel="shortcut icon" href="<?php echo BASE_URL . '/back/assets/images/smile.png'?>" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo BASE_URL . '/back/assets/css/front.css'?>">
<link rel="stylesheet" href="<?php echo BASE_URL . '/front/assets/css/index.css?version=10' ?>">
<style>
    .loader{
    position: relative;
    z-index: 10;
    position: fixed;
    min-height: 100vh;
    min-width: 100vw;
    background-color: white;
    animation: 1s ease-out 0s 1 load_page;
    animation-fill-mode: forwards;
}
@keyframes load_page {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
        z-index: 0;
        display: none;
    }
}
.title{
    max-width: 40vw;
    margin-top: 5%;

    position: relative;
    z-index: 4;

    animation: title_appear linear;
    animation-timeline: scroll();
    animation-range: entry 0% ;
    animation-fill-mode: forwards;
}
.back{
    position: relative;
    z-index: 10;
    position: fixed;
}

</style>