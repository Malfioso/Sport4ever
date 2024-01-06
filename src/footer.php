
<footer>
</footer>
</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const numberOfSVGs = 10; // Nombre d'instances SVG à créer
        const svgContainer = document.querySelector('.svg-background'); // Conteneur pour les SVG

        fetch('../assets/svgs/lieg_ball.svg') // Remplacez par le chemin de votre fichier SVG
            .then(response => response.text())
            .then(svgData => {
                for (let i = 0; i < numberOfSVGs; i++) {
                    let svg = document.createElement('div');
                    svg.innerHTML = svgData; // SVG chargé depuis le fichier

                    // Appliquez des styles aléatoires
                    svg.style.width = `${randomSize()}px`;
                    svg.style.height = `${randomSize()}px`;
                    svg.style.filter = `blur(${randomBlur()}px)`;
                    svg.style.position = 'absolute';
                    svg.style.top = `${randomPosition()}%`;
                    svg.style.left = `${randomPosition()}%`;

                    svgContainer.appendChild(svg);
                }
            });

        function randomSize() {
            return Math.floor(Math.random() * 1) + 50; // Tailles aléatoires entre 50px et 150px
        }


        function randomBlur() {
            return Math.floor(Math.random() * 5);
        }

        function randomPosition() {
            // Réduire la valeur maximale pour éviter de placer les SVG trop près des bords
            return Math.floor(Math.random() * 80) + 10; // Entre 10% et 90%
        }

    });
</script>