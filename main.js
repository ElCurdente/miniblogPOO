// ======= MENU BURGER ========
const navMenu = document.getElementById('nav-menu'),
    toggleMenu = document.getElementById('nav-toggle'),
    closeMenu = document.getElementById('nav-close');

// VISIBLE
toggleMenu.addEventListener('click', () => {
    navMenu.classList.toggle('show');
})

// CACHE
closeMenu.addEventListener('click', () => {
    navMenu.classList.remove('show');
})

// ACTIVE ET DESACTIVE LE MENU
const navLink = document.querySelectorAll('.nav_link');

function linkAction() {
    // ACTIVE
    navLink.forEach(n => n.classList.remove('active'));
    this.classList.add('active');

    // DESACTIVE
    navMenu.classList.remove('show');
}

navLink.forEach(n => n.addEventListener('click', linkAction));

// Bandeau derrière le menu au scroll
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})

// MENU ACTIF SUIVANT LE SCROLL
const sections = document.querySelectorAll('section');
const navLi = document.querySelectorAll('.nav_link');

window.addEventListener("scroll", () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (window.pageYOffset >= (sectionTop - sectionHeight / 4)) {
            current = section.getAttribute('id');
        }
    })

    navLi.forEach(li => {
        li.classList.remove('active');
        const href = li.getAttribute('href').substring(1);
        if (href === current) {
            li.classList.add('active');
        }
    });
})

//COMMENTAIRES
// Afficher les commentaires
document.querySelector('.btn-com').addEventListener('click', e => {
    document.querySelector('.btn-com').style.display = 'none';
    document.querySelector('.btn-close').style.display = 'block';
    document.querySelectorAll('.comment').forEach(element => {
        element.style.display = 'block';
    });
})

// Masquer les commentaires
document.querySelector('.btn-close').addEventListener('click', e => {
    document.querySelector('.btn-close').style.display = 'none';
    document.querySelector('.btn-com').style.display = 'block';
    document.querySelectorAll('.comment').forEach(element => {
        element.style.display = 'none';
    });
    
})

// Lien retour si l'utilisateur ne veut pas se connecter pour écrire un commentaire 
document.querySelector('.retour').addEventListener('click', e => {
    document.querySelector('.co-obl').style.display = 'none';
})