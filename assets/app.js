/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// hides header buttons on small screens and show burger icon


let fullHeader = `<header id="header" class="fixed flex justify-evenly z-10 w-full text-text-50">
    <div class="bg-secondary-800/50 w-full absolute h-24 lg:h-12 z-[-1] bg-clip-padding  backdrop-filter backdrop-blur-sm border-b border-secondary-50 border-s"></div>
    <div class="btn-container flex justify-between gap-6">
        <button class="mt-3 p-4 bg-secondary-800/50  rounded-2xl bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Découvrir le parc</button>
        <button class="mt-3 p-4 bg-secondary-800/50  rounded-2xl bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Préparez votre visite</button>
        <button class="mt-3 p-4 bg-secondary-800/50  rounded-2xl bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Spectacles et activités</button>
    </div>
    <img src="images/LogoZoo.png" class="navbar__logo h-20 lg:h-10 pt-1" alt="Logo">
    <div class="btn-container flex justify-between gap-6">
        <button class="mt-3 p-4 bg-secondary-800/50  rounded-2xl bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Les hôtels du parc</button>
        <button class="mt-3 p-4 bg-secondary-800/50  rounded-2xl bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Se connecter</button>
        <button class="mt-3 p-4 bg-primary-500/50 rounded-2xl bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Réservez vos billets</button>
    </div>
</header>`;

let mobileheader = `<header id="header" class="fixed flex justify-between z-10 w-full text-text-50">
                <div class="bg-secondary-800/50 w-full absolute h-24 lg:h-12 z-[-1] bg-clip-padding  backdrop-filter backdrop-blur-sm border-b border-secondary-50 border-s"></div>

                <div class="my-auto pt-2 h-20 w-20"></div>

                <img src="images/LogoZoo.png" class="navbar__logo h-20 lg:h-10 pt-1" alt="Logo">

                <svg id="burger" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="my-auto pt-2 h-20 w-20 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>

                <div id="headerButtons" class="btn-container flex flex-col justify-between absolute top-24 w-full text-4xl hidden">
                    <button class="p-3 bg-secondary-800/50  bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Découvrir le parc</button>
                    <button class="p-3 bg-secondary-800/50  bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Préparez votre visite</button>
                    <button class="p-3 bg-secondary-800/50  bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Spectacles et activités</button>
                    <button class="p-3 bg-secondary-800/50  bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Les hôtels du parc</button>
                    <button class="p-3 bg-secondary-800/50  bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Se connecter</button>
                    <button class="p-3 bg-primary-500/50 bg-clip-padding  backdrop-filter backdrop-blur-sm border border-secondary-50 border-s">Réservez vos billets</button>
                </div>
        </header>`;

let header = document.getElementById('header');

function changeHeader() {
    // if window size is smaller than 1024px show mobile header, else show full header
    if (window.innerWidth < 1024) {
        header.innerHTML = mobileheader;

        let headerButtons = document.getElementById('headerButtons');
        let burger = document.getElementById('burger');

        burger.addEventListener('click', () => {
            headerButtons.classList.toggle('hidden');
        });

    } else {
        header.innerHTML = fullHeader;
    }
}

changeHeader();

window.addEventListener('resize', () => {
    changeHeader();
});