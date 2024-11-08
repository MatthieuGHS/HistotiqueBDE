<?php
$data = ['Aquila', 'Astro', 'Atlas', 'Naga', 'Kraken', 'Spectre', 'Raven', 'Apocalyse', 'Phoenix', 'Pandore'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique - BDE TMSP</title>
    <link rel="icon" href="./img/bdeLogo.png">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lexend:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script>
        function createConfetti(event, imageSrc) {
            const numberOfConfetti = 15; 
            const body = document.body;

            for (let i = 0; i < numberOfConfetti; i++) {
                const confetti = document.createElement("img");
                confetti.src = imageSrc; 
                confetti.classList.add("confetti");
                confetti.style.position = 'absolute';
                confetti.style.width = '60px'; 
                confetti.style.height = '60px'; 
                confetti.style.left = event.clientX + 'px'; 
                confetti.style.top = event.clientY + window.scrollY + 'px';

                body.appendChild(confetti);

                const animationDuration = Math.random() * 2 + 1; 
                const translateX = (Math.random() - 0.5) * 300; 
                const translateY = Math.random() * -300;

                confetti.animate([
                    { transform: `translate(0, 0)`, opacity: 1 },
                    { transform: `translate(${translateX}px, ${translateY}px)`, opacity: 0 }
                ], {
                    duration: animationDuration * 1000,
                    easing: 'ease-out',
                    iterations: 1,
                    fill: 'forwards'
                });

                setTimeout(() => {
                    confetti.remove();
                }, animationDuration * 1000);
            }
        }
    
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('click', (event) => {
                createConfetti(event, img.src); 
            });
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            let currentSection = 0;
            const sections = document.querySelectorAll('#main'); 
            const numberOfSections = sections.length;
            const navbarHeight = document.querySelector('nav').offsetHeight;
            let timer;
    
            function scrollToSection(index) {
                const sectionTop = sections[index].offsetTop; 
                window.scrollTo({
                    top: sectionTop, 
                    behavior: 'smooth'
                });
            }
    
            function scrollDown() {
                setTimer();
                currentSection = (currentSection + 1) % numberOfSections; 
                scrollToSection(currentSection);
            }
    
            function scrollUp() {
                setTimer();
                currentSection = (currentSection - 1 ) ; 
                if(currentSection < 0){
                    currentSection = 0;
                }
                scrollToSection(currentSection);
            }
    
            function autoScroll() {
                scrollDown(); 
            }
    
            function setTimer(){
                if(timer){
                    clearInterval(timer);
                }
                timer = setInterval(autoScroll, 5000);
            }

            setTimer();
    
            document.querySelectorAll('.scroll-up').forEach(img => {
                img.addEventListener('click', (event) => {
                    scrollUp();
                    createConfetti(event, img.src); 
                });
            });
    
            document.querySelectorAll('.scroll-down').forEach(img => {
                img.addEventListener('click', (event) => {
                    scrollDown();
                    createConfetti(event, img.src);
                });
            });
        });
    </script>
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./img/bdeLogo.png" alt="Logo" height="50" class="d-inline-block align-text-center">
                Historique - BDE TMSP
            </a>
        </div>
    </nav>
    <?php
        for ($i=0; $i < count($data); $i++) { 
    ?>
        <div id="main" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url('./img/fond/<?=$i?>.jpg');">
            <div id="topDiv">
                <img class="scroll-up" src="./img/evan.png" alt="top" width="50" height="50">
            </div>
            <div class="content">
                <div class="logo">
                    <img src="./img/logo/<?=$i?>.png" alt="Logo" width="200">
                </div>
                <div class="title">
                    <h1 id="text"><?=strtoupper($data[$i])?></h1> 
                </div>
                <div class="button">
                    <button class="btn btn-outline-light" onclick="window.location.href = 'more.php?BDE=<?=$i?>'">Anecdotes</button>
                </div>
            </div>
            <div id="botDiv">
                <img class="scroll-down" src="./img/evan.png" alt="Logo" width="50" height="50" id="rot">
            </div>
        </div>
    <?php
        }
      ?>
</body>
</html>
